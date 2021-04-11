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

    /**
     * Adds a record to the user_activations table for a new user
     * account that needs activating.
     * @return mixed
     */
    public function createActivationRecord(User $user);

}