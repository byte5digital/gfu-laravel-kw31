<?php

namespace App\Http\Services;

use App\Http\Contracts\User;
use App\Models\Test;
use Illuminate\Database\Eloquent\Collection;

class TestService implements \App\Http\Contracts\TestContract
{
    public function getAllTests(): array
    {
        return Test::all()->toArray();
    }

    public function getTestById(int $id): Test|null
    {
//        return Test::whereId($id)->first();
//        return Test::whereIn('id', [2,3,4])->get();
        return Test::find($id);
    }

    public function updateTestById(int $id, array $values): bool|null
    {
        return Test::find($id)?->update($values);
    }

    public function createTest(array $values): Test|null
    {
        return Test::create($values);
    }

    public function deleteTestById(int $id): bool|null
    {
        return Test::find($id)?->delete();
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
