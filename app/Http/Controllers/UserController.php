<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function index()
    {
        return $this->userRepository->index();
    }

    public function login(Request $request)
    {
        return $this->userRepository->login($request);
    }

    public function create()
    {
        return $this->userRepository->create();
    }

    public function register(Request $request)
    {
        return $this->userRepository->register($request);
    }

    public function logout()
    {
        return $this->userRepository->logout();
    } 
}
