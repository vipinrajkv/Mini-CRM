<?php

namespace App\Http\Controllers;
use App\Services\UserService;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserService $userService,
    )
    {
        $this->userService = $userService;
    }
    /**
     * User Listing View
     *
     * @param Request $request
     * @return JsonResponse|View
     */
    public function index(Request $request) : JsonResponse|View
    {
        if ($request->ajax()) {
            return  $this->userService->getUserDetails();
        }

        return view('users.index');
    }
    public function login(){

        return view('login');
    }
    public function register(){

        return view('register');
    }
}
