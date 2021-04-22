<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserRepository implements UserRepositoryInterface
{

    /**
     * Search for a user by its name.
     *
     * @param string $searchTerm
     * @return Collection
     */
    public function searchByName(string $searchTerm) : Collection {
        return User::whereIn('type_id', [0, 1, 2])->where('name', 'like',  '%'.$searchTerm.'%')
            ->orderBy('name')->limit(5)->get();
    }

    /**
     * Adds a record to the user_activations table for a new user
     * account that needs activating.
     * @return mixed
     */
    public function createActivationRecord(User $user) {
        $key = base64_encode(Str::random('32'));
        DB::table('user_activations')->insert([
            'key' => $key,
            'user_id' => $user->id,
        ]);
        return $key;
    }

    /**
     * Searches through users for account managers.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function findAccountManagers(Request $request) {
        return DB::table('users')
                    ->select('users.*')
                    ->join('clients', 'users.id', '=', 'clients.account_manager_id')
                    ->where('users.name', 'LIKE', '%'.$request->input('name').'%')
                    ->groupBy('id')
                    ->get();
    }

    /**
     * Searches through users for project leads. Only returns users
     * if they're assigned to a project as a lead.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function findProjectLeads(Request $request) {
        return DB::table('users')
            ->select('users.*')
            ->join('projects', 'users.id', '=', 'projects.project_lead_id')
            ->where('users.name', 'LIKE', '%'.$request->input('name').'%')
            ->groupBy('id')
            ->get();
    }

    /**
     * Filters users without taking type into consideration
     *
     * @param array $data
     * @return mixed
     */
    public function filterUsers(array $data) {
        return User::where('name', 'like',  '%'.$data['name'].'%')
            ->orderBy('name')->limit(5)->get();
    }

}