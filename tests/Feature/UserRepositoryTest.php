<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Repositories\UserRepository;

class UserRepositoryTest extends TestCase
{

    private $repository;

    /**
     * Sets up an instance of the ClientRepository for use in
     * testing.
     */
    protected function setupRepository() {
        $this->repository = new UserRepository();
    }

    /**
     * Fetches a user to be used in a test.
     *
     * @return User
     */
    protected function fetchUser() {
        return User::first();
    }

    public function testUserSearchByName() {

        $this->setupRepository();
        $user = $this->fetchUser();

        $results = $this->repository->searchByName($user->name);

        // Check a non-empty collection has been returned
        $this->assertInstanceOf(Collection::class, $results);
        $this->assertNotEmpty($results);

        // Check limit has been used
        $this->assertLessThanOrEqual(5, $results->count());

        // Check at least one user has the correct name.
        $hasCorrectUser = false;
        foreach ($results as $result) {
            $result->name === $user->name ? $hasCorrectUser = true : false;
        }

        $this->assertTrue($hasCorrectUser);

    }

}
