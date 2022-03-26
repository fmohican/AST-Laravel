<?php

namespace App\Http\Controllers;

use App\Models\PlayerTransfer;
use App\Models\Servers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ServersController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Registering server to database, so we can use to transfer characters.
     * We will let laravel to handle input safety...
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function create(Request $request) {
        $request->validate([
            "ServerName" => ['string', 'unique:\App\Models\Servers,ServerName', 'min:4', 'max:32'],
            "serverIp" => ['ipv4', 'required'],
            "serverPort" => ['integer', 'min:1', 'max:65535', 'required'],
            "serverPassword" => ['string', 'nullable'],
            "RconServerIp" => ['ipv4', 'required'],
            "RconServerPort" => ['integer', 'min:1', 'max:65535', 'required'],
            "RconServerPassword" => ['string', 'required'],
        ]);
        Servers::create([
            "nameNice" => $request->input('ServerName'),
            "nameSlug" => Str::slug($request->input('ServerName'), '_'),
            "serverIp" => $request->input('serverIp'),
            "serverPort" => $request->input('serverPort'),
            "serverPassword" => $request->input('serverPassword'),
            "rconIp" => $request->input('RconServerIp'),
            "rconPort" => $request->input('RconServerPort'),
            "rconPassword" => $request->input('RconServerPassword'),
        ]);
        return back();
    }

    /**
     * Soft delete existent server, but keep them in database, cuz of logs dependency.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request) {
        try {
            $request->validate([
                'serverId' => ['integer', 'required'],
            ]);
            $server = Servers::find($request->input('serverId'));
            $server->delete();
            return response()->json([
                "status" => 200,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
            ]);
        }
    }

    public function check(Request $request) {
        $request->validate([
            'serverId' => ['integer', 'required']
        ]);
        $server = Servers::find($request->input('serverId'));
        if($server->exists()) {
            try {
                $rcon = new RCONController($server->rconIp, $server->rconPassword, $server->rconPort, 60);
                $ast_check = $rcon->send("AST Ping");
                if($ast_check === "ping done.") {
                    return response()->json([
                        "title" => "Results",
                        "icon" => "success",
                        "msg" => "RCON connection has been made!<br/> AST Reached success fully!",
                    ]);
                } else {
                    return response()->json([
                        "title" => "Results",
                        "icon" => "warning",
                        "msg" => "RCON connection has been made!<br/> AST doesn't respond to our ping, it may cause problems",
                    ]);
                }
            } catch (\Exception $e) {
                return response()->json([
                    "title" => "Something went wrong",
                    "icon" => "error",
                    "msg" => $e->getMessage(),
                ]);
            }
        } else {
            Log::error("Unregistered server", $request->all());
            return response()->json([
                "title" => "Unregistered server",
                "icon" => "error",
                "msg" => "The server you requested doesn't exist or has been removed.<br/> This error will be logged.",
            ]);
        }
    }

    public function serverlink(Request $request) {
        switch ($request->input('cmd')) {
            case "export":
                return $this->export($request);
            case "import":
                return $this->import($request);
            default:
                $this->anwser(400, "Error");
        }
    }

    private function export(Request $request) {
        $server_s = filter_var($request->input('srv'), FILTER_SANITIZE_URL);
        $server_s = Servers::where('nameSlug', $server_s);
        $server_d = filter_var($request->input('prm'), FILTER_SANITIZE_URL);
        $server_d = Servers::where('nameSlug', $server_d);
        if($server_s->doesntExist()) {
            return $this->anwser(400, "cannot export - unknown source server");
        }
        $server_s = $server_s->first();
        if($server_d->doesntExist()) {
            return $this->anwser(400, "cannot export - unknown destination server");
        }
        $server_d = $server_d->first();
        try {
            $rcon = new RCONController($server_s->rconIp, $server_s->rconPassword, $server_s->rconPort);
            $result = $rcon->send('ast export "'.$request->input('fid').'"');
            if($result != "export done.")
                throw new \Exception("cannot export - rcon reply ".$result);
            $json_data = "";
            do {
                $result = $rcon->send('ast read "'.$request->input('fid').'"');
                $json_data .= $result;
            } while ($result != " ");
            $json = json_decode($json_data, true);
            if(is_bool($json))
                throw new \Exception("cannot export - invalid json received");
            PlayerTransfer::create([
                "funcomId" => $request->input('fid'),
                "from" => $server_s->id,
                "to" => $server_d->id,
                "payload" => serialize($json),
            ]);
            $rcon->send('ast remove "'.$request->input('fid').'"');
            $rcon->send('ast exec "'.$request->input('fid').'" "open '.$request->input('prm').'"');
            return $this->anwser(204, "");
        } catch (\Exception $e) {
            return $this->anwser(400, $e->getMessage());
        }
    }

    /**
     * @param int $code
     * @param string $message
     * @return string
     */
    private function anwser(int $code,string $message) {
        return response($message, $code);
    }

    private function import(Request $request)
    {
    }
}
