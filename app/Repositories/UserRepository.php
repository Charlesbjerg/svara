<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

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

}