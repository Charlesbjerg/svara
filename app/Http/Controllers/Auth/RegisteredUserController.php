<?php

namespace App\Http\Controllers\Auth;

use App\Events\AccountCreated;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Team;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
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
        ]);

        $user = new User($request->all());
        $user->type_id = $request->input('type');

        // Add temporary password until account is activated
        $user->password = Hash::make(rand(100000, 100000000));
        $user->save();

        // If type ID is in types, user is staff - Otherwise is client user
        if (in_array($user->type_id, [0, 1, 2])) {
            $user->team()->save(Team::where('id', $request->input('team'))->first());
        } else {
            $client = Client::where('id', $request->input('clientId'))->first();
            $user->clients()->save($client);
            if ($client->main_contact_id === null) {
                $client->main_contact_id = $user->id;
                $client->save();
            }
        }

        // Create new user_activation record
        $this->userRepository->createActivationRecord($user);

        // Send out activation email
        AccountCreated::dispatch($user);

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

    /**
     * Activates a user account that has been created but
     * pending activation.
     *
     * @param string $key
     * @return JsonResponse
     */
    public function activate(Request $request, string $key) {
        // Get user_activation record
        $user = DB::table('user_activations')
            ->join('users', 'user_activations.user_id', '=', 'users.id')
            ->where('user_activations.key', $key)->first();

        // Get user and set to active
        $user = User::where('id', $user->user_id)->first();
        $user->password = Hash::make($request->input('password'));
        $user->email_verified_at = now();
        $user->activated = now();
        $user->save();

        // Delete user_activation record
        DB::table('user_activations')->where('user_id', $user->id)->delete();

        // TODO: Send out account activated email

        return response()->json([
            'success' => true,
            'user' => $user,
        ]);
    }

    /**
     * Deactivates a given account.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function deactivate(User $user) {
        $user->deactivated = now();
        $user->activated = null;
        $user->save();
        return sendTrueResponse();
    }

}
