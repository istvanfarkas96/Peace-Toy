<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{

    public function index()
    {
        return view('admin/dashboard');
    }

    public function listUsers()
    {
        $users = User::all();

        return view('admin/users', [
            'users' => $users
        ]);
    }
}