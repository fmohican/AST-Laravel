<?php

namespace App\Http\Controllers;

use App\Models\Servers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware('Admin');
    }

    public function index() {
        return view('admin.index', [
            'servers' => Servers::all(),
        ]);
    }
}
