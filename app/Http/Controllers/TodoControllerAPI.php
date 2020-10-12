<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Resources\TodoResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\Collections\TodoCollection;

class TodoControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\TodoCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Todo::class);

        $todo = Todo::all();

        return new TodoCollection($todo);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TodoRequest  $request
     * @return \App\Http\Resources\TodoResource
     */
    public function store(TodoRequest $request)
    {
        $this->authorize('create', Todo::class);

        $todo = Todo::create($request->validated());

        return new TodoResource($todo);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \App\Http\Resources\TodoResource
     */
    public function show(Todo $todo)
    {
        $this->authorize('view', $todo);

        return new TodoResource($todo);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TodoRequest  $request
     * @param  \App\Models\Todo  $todo
     * @return \App\Http\Resources\TodoResource
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $this->authorize('update', $todo);

        $todo->update($request->validated());

        return new TodoResource($todo);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \App\Http\Resources\TodoResource
     */
    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);

        $todo->delete();

        return new TodoResource($todo);

    }
}
