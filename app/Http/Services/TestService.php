<?php

namespace App\Http\Services;

use App\Http\Contracts\User;
use App\Models\Test;
use Illuminate\Database\Eloquent\Collection;

class TestService implements \App\Http\Contracts\TestContract
{
    public function getAllTests(): Collection
    {
        return Test::all();
    }

    public function getTestById(int $id): Test|null
    {
        // TODO: Implement getTestById() method.
    }

    public function updateTestById(int $id, array $values): bool|null
    {
        // TODO: Implement updateTestById() method.
    }

    public function createTest(array $values): Test|null
    {
        return Test::create($values);
    }

    public function deleteTestById(int $id): bool|null
    {
        // TODO: Implement deleteTestById() method.
    }

    public function attachUserToTest(User $user, int $id)
    {
        // TODO: Implement attachUserToTest() method.
    }

    public function detachUserFromTest($id)
    {
        // TODO: Implement detachUserFromTest() method.
    }
}
