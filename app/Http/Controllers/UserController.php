<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        return view('users.index');
    }
    public function login(){

        return view('login');
    }
    public function register(){

        return view('register');
    }
}
