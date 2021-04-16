<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{

    public function __construct() {
        $this->authorizeResource(Team::class, 'team');
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $teams = Team::with('members')->get();
        return response()->json($teams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $team = Team::create($request->all());
        return response()->json([
            'success' => true,
            'teams' => Team::with('members')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Team $team
     * @return JsonResponse
     */
    public function show(Team $team)
    {
        $team->load('members');
        return response()->json($team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Team $team
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Team $team)
    {
        $team->fill($request->all());
        $team->save();
        return response()->json([
            'success' => true,
            'teams' => Team::with('members')->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }

    /**
     * Finds a user for a team
     */
    public function search(Request $request) {

        // Find all users that apply
        $users = User::whereIn('type_id', [0, 1, 2])
                    ->where('name', 'like',  '%'.$request->input('name').'%')
                    ->orderBy('name')->with('team')->get();

        // Only show those not in teams
        $users = $users->filter(function($user, $key) {
            return count($user->team) === 0;
        });

        // Only return the first 5
        $users->filter(function ($user, $index) {
            return $index < 5;
        });

        return response()->json($users);
    }

    /**
     * Adds the given user to the team.
     *
     * @param Team $team
     * @param User $user
     */
    public function storeUser(Team $team, User $user) {
        $team->members()->save($user);
        return response()->json([
            'success' => true,
            'teams' => Team::with('members')->get(),
        ]);
    }

    /**
     * Removes the user from the team.
     *
     * @param Team $team
     * @param User $user
     */
    public function destroyUser(Team $team, User $user) {
        DB::table('users_to_teams')->where([
            ['team_id', $team->id],
            ['user_id', $user->id],
        ])->delete();
        return response()->json([
            'success' => true,
            'teams' => Team::with('members')->get(),
        ]);
    }

}
