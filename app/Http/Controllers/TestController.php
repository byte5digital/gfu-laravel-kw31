<?php

namespace App\Http\Controllers;

use App\Http\Contracts\TestContract;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Http\Resources\TestResource;
use App\Models\Test;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{

    public function __construct(
        protected TestContract $testContract
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return TestResource::collection($this->testContract->getAllTests());
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
        try{
            return new TestResource($this->testContract->createTest($request->validated()));
        }
        catch (\Exception $exception){
            \Log::error($exception->getMessage());
            return new JsonResponse([], 400);
        }

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

        return $this->testContract->updateTestById($test->id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        $this->testContract->deleteTestById($test->id);
        return new JsonResponse([], 201);
    }
}
