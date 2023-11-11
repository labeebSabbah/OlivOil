<?php 

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;

use Illuminate\Http\Request;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $request->validate([
            "password" => "required"
        ]);

        $credentials = $request->only("password");
        $credentials["username"] = "admin";

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route("admin");
        }

        return back()->withErrors([
            "password" => "كلمة المرور غير صحيحة"
        ]);
    }

    public function create()
    {
        return view("register");
    }

    public function register(Request $request)
    {
        $request->validate([
            "password" => "required|min:8"
        ]);

        $credentials = $request->only("password");
        $credentials["username"] = "admin";

        $user = User::create($credentials);

        auth()->login($user);

        $request->session()->regenerate();

        return redirect()->route("admin");
    }

    public function logout()
    {
        auth()->logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect()->route("home");
    }

}