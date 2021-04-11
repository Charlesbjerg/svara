<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
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

}