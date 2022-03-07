<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends UserController
{

    public function index()
    {
        return view('user.dashbord.index');
    }
}
