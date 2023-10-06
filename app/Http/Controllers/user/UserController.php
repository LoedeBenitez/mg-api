<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function list()
    {
        return response(User::get());
    }

    public function userGetById($id)
    {
        return User::find($id);
    }

    public function private()
    {
        // dd(auth());
        return response()->json(auth(), 201);
        // return view('private');
    }

    public function checkAuth()
    {
        $status = false;
        if (auth()->check()) {
            $status = true;
        }
        $response = [
            "status" => $status,
        ];
        return response()->json($response, 201);
    }
}
