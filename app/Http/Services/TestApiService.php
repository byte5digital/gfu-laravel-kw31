<?php

namespace App\Http\Services;

use App\Http\Contracts\User;
use App\Models\Test;

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

    public function getTestById(int $id): ?Test
    {
        // TODO: Implement getTestById() method.
    }

    public function updateTestById(int $id, array $values): ?bool
    {
        // TODO: Implement updateTestById() method.
    }

    public function createTest(array $values): ?Test
    {
        // TODO: Implement createTest() method.
    }

    public function deleteTestById(int $id): ?bool
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
