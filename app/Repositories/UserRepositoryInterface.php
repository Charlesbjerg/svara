<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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

    /**
     * Searches through users for account managers.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function findAccountManagers(Request $request);

    /**
     * Searches through users for project leads. Only returns users
     * if they're assigned to a project as a lead.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function findProjectLeads(Request $request);

}