<?php

namespace App\Http\Controllers;

use App\Models\BoardCard;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show()
    {
        // Projects
        $projects = Project::whereHas('staff', function(Builder $query) {
            return $query->where('user_id', Auth::user()->id);
        })->with(['meta', 'state', 'client'])->get();

        // Cards
        $cards = BoardCard::whereHas('assignedUser', function(Builder $query) {
            return $query->where('assigned_user_id', Auth::user()->id);
        })->with(['column'])->limit(6)->get();
        $cards->each(function($card) {
           $card->board = $card->column->board;
        });

        // Extra info
        $projectCount = Project::where('project_state_id', 5)->count();
        $behindCount = Project::where('project_state_id', 11)->count();

        // Response
        return response()->json([
            'projects' => $projects,
            'cards' => $cards,
            'info' => [
                'totalProjects' => [
                    'key' => 'Your Projects in Progress',
                    'value' => $projectCount,
                ],
                'behindProjects' => [
                    'key' => 'Total Projects Behind Schedule',
                    'value' => $behindCount,
                ],
            ]
        ]);
    }

}
