<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstallationController extends Controller
{
    public function index() {
        return view('installation.install');
    }

    public function step_1(Request $request) {
        $request->validate([
            'host' => 'required|string',
            'database' => 'required|string',
            'password' => 'required|string',
            'username' => 'required|string',
            'post' => 'required|string'
        ]);

        return response()->json(['success'=> true]);
    }
}
