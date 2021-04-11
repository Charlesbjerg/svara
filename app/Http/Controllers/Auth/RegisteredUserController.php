<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'jobRole' => 'required|string',
            'type' => 'required|int',
            'team' => 'required|int'
        ]);

        $user = new User($request->all());
        $user->type_id = $request->input('type');
        // Add temporary password until account is activated
        $user->password = Hash::make(rand(100000, 100000000));
        $user->save();
        $user->team()->save(Team::where('id', $request->input('team')));

        event(new Registered($user));

        return response()->json(['success' => true, 'data' => $user]);
    }
}
