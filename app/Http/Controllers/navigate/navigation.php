<?php

namespace App\Http\Controllers\navigate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class navigation extends Controller
{
    public function index()
    {
        dd("dkljsdfkljsdfkljs");
        if (Auth::check()) {
            //
        }
        return redirect()->route('login');
    }
}
