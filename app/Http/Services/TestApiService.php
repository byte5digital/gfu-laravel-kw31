<?php

namespace App\Http\Services;

use App\Http\Contracts\User;
use App\Models\Test;
use Illuminate\Database\Eloquent\Collection;

class TestApiService implements \App\Http\Contracts\TestContract
{

    public function getAllTests(): array
    {
        $allTests = \Http::get('http://jsonplaceholder.typicode.com/todos')->json();
        if (is_array($allTests)) {
            $testDtos = array_map(function ($o) {
                $testDto = new Test();
                return $testDto->mapFromJsonResponse($o);
            }, $allTests);
            return $testDtos;
        }
        return [];
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
        // TODO: Implement createTest() method.
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
