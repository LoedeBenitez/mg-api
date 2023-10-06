<?php

namespace App\Livewire\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;
    public function render()
    {
        return view('livewire.user.login')->layout('components.layouts.guest');
    }

    public function submit()
    {
        $fields = $this->validate([
            "email" => "required",
            "password" => "required",
        ]);

        if (!auth()->attempt($fields)) {
            return false;
        }
        // $token = auth()->user()->createToken('myapptoken')->plainTextToken;
    }
}
