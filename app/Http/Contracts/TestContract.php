<?php

namespace App\Http\Contracts;

use App\Models\Test;

interface TestContract
{
    public function getAllTests(): array;

    public function getTestById(int $id): ?Test;

    public function updateTestById(int $id, array $values): ?bool;

    public function createTest(array $values): ?Test;

    public function deleteTestById(int $id): ?bool;

    public function attachUserToTest(User $user, int $id);

    public function detachUserFromTest($id);
}
