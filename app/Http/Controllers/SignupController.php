<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Rules\FukuokaAddress;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        //$request->dd();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['','required', 'email:filter',Rule::unique('users')],
            'password' => ['required', 'string', 'min:8'],
            //'address' => ['required_if:pref,福岡県']
            //'address' => [new FukuokaAddress($request->input('pref'))]
        ]);
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Auth::login($user);

        return redirect('mypage');
    }
}
