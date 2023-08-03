<?php

namespace App\Http\Services;

use App\Http\Contracts\User;
use App\Models\Test;

class TestService implements \App\Http\Contracts\TestContract
{
    public function getAllTests(): array
    {
        dump(memory_get_usage());
        $testCursor = Test::lazy();
        dump(memory_get_usage());
        $testCursor = Test::cursor();
        dump(memory_get_usage());
        $baseEntites = Test::all();
        foreach ($baseEntites as $test) {
            \Log::info($test->name);
            //            echo '<pre>' . dump($test) . '</pre>';
        }
        dump(memory_get_usage());

        dd($testCursor);
    }

    public function getTestById(int $id): ?Test
    {

        \DB::beginTransaction();
        // \DB::commit();
        $test = Test::find($id);
        $test->name = 'BLATESTROLL';
        $test->save();
        \DB::commit();
        //        \DB::rollBack();
        //        return Test::whereId($id)->first();
        //        return Test::whereIn('id', [2,3,4])->get();
        return Test::find($id);
    }

    public function updateTestById(int $id, array $values): ?bool
    {
        return Test::find($id)?->update($values);
    }

    public function createTest(array $values): ?Test
    {
        return Test::create($values);
    }

    public function deleteTestById(int $id): ?bool
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
