@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Server Administration</div>

                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-responsive-lg" id="mainTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>IP</th>
                                                <th>Port</th>
                                                <th>Pass</th>
                                                <th><span class="pointer-event" data-bs-toggle="tooltip" data-bs-placement="top" title="'R' stand for RCON">R-</span>IP</th>
                                                <th><span class="pointer-event" data-bs-toggle="tooltip" data-bs-placement="top" title="'R' stand for RCON">R-</span>Port</th>
                                                <th><span class="pointer-event" data-bs-toggle="tooltip" data-bs-placement="top" title="'R' stand for RCON">R-</span>Pass</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($servers as $server)
                                            <tr>
                                                <td>{{$server->id}}</td>
                                                <td>{{$server->nameNice}}</td>
                                                <td>{{$server->serverIp}}</td>
                                                <td>{{$server->serverPort}}</td>
                                                <td>{{$server->serverPassword}}</td>
                                                <td>{{$server->rconIp}}</td>
                                                <td>{{$server->rconPort}}</td>
                                                <td>{{$server->rconPassword}}</td>
                                                <td>
                                                    <span class="material-icons-round text-warning mx-1">edit</span>
                                                    <span class="material-icons-round text-danger mx-1">delete</span>
                                                    <span class="material-icons-round text-info mx-1">network_ping</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-sm btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#createServerModal">Create Server</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Create Server --}}
    <div class="modal fade" id="createServerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createServerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('app.admin.server.create')}}" method="post" class="modal-content">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="createServerModalLabel">Create New Server</h5>
                    <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="ServerName">Server Name</label>
                                <input id="ServerName" name="ServerName" type="text" minlength="4" maxlength="32" placeholder="Server Name" class="form-control" required>
                                <div id="ServerNameHelp" class="form-text">Name your server for easy identification. Min. 4 characters, Max. 32 characters.</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="basic-url" class="form-label">Game Server Details</label>
                                <div class="input-group">
                                    <input name="serverIp" type="text" minlength="7" maxlength="15" size="15" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" class="form-control w-50" placeholder="Server IP" aria-label="Server IP" required>
                                    <span class="input-group-text">:</span>
                                    <input name="serverPort" type="number" class="form-control" placeholder="Server Port" aria-label="Server Port" min="1" max="65535" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="serverPassword">Game Server Password</label>
                                <input name="serverPassword" type="text" id="serverPassword" placeholder="YourSuperSecretPassword" class="form-control">
                                <div id="passwordHelp" class="form-text">It can be blank if the server doesn't use password. In future version password will be stored encrypted in database, however in this version will be stored as plain-text</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="basic-url" class="form-label">RCON Server Details</label>
                                <div class="input-group">
                                    <input name="RconServerIp" type="text" minlength="7" maxlength="15" size="15" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" class="form-control w-50" placeholder="RCON IP" aria-label="RCON IP" required>
                                    <span class="input-group-text">:</span>
                                    <input name="RconServerPort" type="number" class="form-control" placeholder="RCON Port" aria-label="RCON Port" min="1" max="65535" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="RconServerPassword">RCON Server Password</label>
                                <input name="RconServerPassword" type="text" id="RconServerPassword" placeholder="RconYourSuperSecretPassword" class="form-control" required>
                                <div id="RconPasswordHelp" class="form-text">In future version password will be stored encrypted in database, however in this version will be stored as plain-text</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
