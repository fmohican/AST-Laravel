<?php

namespace App\Http\Controllers;

use App\Models\Servers;
use Illuminate\Http\Request;
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
}
