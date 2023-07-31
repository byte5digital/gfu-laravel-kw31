<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Http\Resources\TestResource;
use App\Models\Test;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return TestResource::collection(Test::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestRequest $request)
    {

        return new TestResource(Test::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        return new TestResource($test);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        $test->update($request->validated());
        $test->save();
        return new TestResource($test);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        if ($test->delete()){
            return new JsonResponse([], 201);
        }
        return new JsonResponse([], 400);
    }
}
