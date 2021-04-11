<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{

    public $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
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
        $user->team()->save(Team::where('id', $request->input('team'))->first());

        // Create new user_activation record
        $this->userRepository->createActivationRecord($user);

        event(new Registered($user));

        return response()->json(['success' => true, 'data' => $user]);
    }

    /**
     * Gets the account data for activation.
     *
     * @param string $key
     */
    public function show(string $key) {
        $user = DB::table('user_activations')
            ->join('users', 'user_activations.user_id', '=', 'users.id')
            ->where('user_activations.key', $key)->first();
        return response()->json($user);
    }

}
