<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{

    /**
     * Search for a user by its name.
     *
     * @param string $searchTerm
     * @return Collection
     */
    public function searchByName(string $searchTerm) : Collection;

}