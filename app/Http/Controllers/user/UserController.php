<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
}
