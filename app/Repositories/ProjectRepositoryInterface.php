<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface ProjectRepositoryInterface {

    /**
     * Returns a collection of projects available to the user,
     * projects they are not involved with do not appear.
     *
     * @return Collection
     */
    public function getProjects() : Collection;

}