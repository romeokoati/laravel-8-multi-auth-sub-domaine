<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends EditorController
{

    public function index()
    {
        return view('editor.dashbord.index');
    }

}
