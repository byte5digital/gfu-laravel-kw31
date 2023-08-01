<?php

namespace App\Http\Contracts;

use App\Models\Test;
use Illuminate\Database\Eloquent\Collection;

interface TestContract
{
    public function getAllTests(): array;

    public function getTestById(int $id): Test|null;

    public function updateTestById(int $id, array $values): bool|null;

    public function createTest(array $values): Test|null;

    public function deleteTestById(int $id): bool|null;

    public function attachUserToTest(User $user, int $id);

    public function detachUserFromTest($id);

}
