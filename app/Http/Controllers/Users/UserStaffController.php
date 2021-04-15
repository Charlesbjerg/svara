<?php

namespace App\Http\Controllers\Users;

use App\Models\Team;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\UserType;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

/**
 * UserClientController class is used ONLY for users that have
 * the Staff/Manager/Owner type.
 *
 * Class UserStaffController
 * @package App\Http\Controllers
 */
class UserStaffController extends Controller
{

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserStaffController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse
    {
        $users = [];
        if (empty($request->all())) {
            $users = User::all()->sortBy('name');
        } else {
            $users = $this->userRepository->searchByName($request->input('name'));
        }
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Fetches the additional data needed to create a user
     * account.
     *
     * @return JsonResponse
     */
    public function setupData() {
        $types = UserType::all();
        $teams = Team::all();
        return response()->json(['types' => $types, 'teams' => $teams]);
    }

    /**
     * Filters users by a specific type.
     *
     * @return JsonResponse
     */
    public function filter(Request $request) {
        $users = [];
        $route = \Illuminate\Support\Facades\Route::currentRouteName();
        if ($route === 'users.account-managers') {
            $users = $this->userRepository->findAccountManagers($request);
        } else if ($route === 'users.project-leads') {
            $users = $this->userRepository->findProjectLeads($request);
        }
        return response()->json($users);
    }

}
