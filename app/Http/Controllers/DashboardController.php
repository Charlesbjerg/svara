<?php

namespace App\Http\Controllers;

use App\Models\BoardCard;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function staff()
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

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function client()
    {

        // Find Client
        $client = Auth::user()->client->first();

        // Projects
        $projects = Project::where('client_id', $client->id)->with(['meta', 'state', 'client'])->get();

        // Messages
        $threads = DB::table('message_threads')
            ->select('*', 'message_threads.id as thread_id')
            ->join('projects', 'message_threads.project_id', '=', 'projects.id')
            ->where('projects.client_id', $client->id)
            ->where('message_threads.shared_with_client', 1)->get();

        $threads->each(function($thread) {
           $thread->messageCount = DB::table('message_thread_messages')
                                        ->where('thread_id', $thread->thread_id)->count();
        });

        // Response
        return response()->json([
            'projects' => $projects,
            'messages' =>  $threads,
        ]);
    }

}
