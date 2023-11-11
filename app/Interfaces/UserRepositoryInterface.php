<?php 

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function index();
    public function login(Request $request);
    public function create();
    public function register(Request $request);
    public function logout();
}