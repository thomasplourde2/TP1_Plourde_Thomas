<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try{
            $user = User::create($request->validated());
            return (new UserResource($user))->response()->setStatusCode(TABLE_CREATED);
        }
        catch(QueryException $ex){
            abort(INVALID_DATA, 'Invalid data');
        }
        catch(Exception $ex){
            abort(SERVER_ERROR, 'Server error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id)
    {
        try{
            $user = User::findOrFail($id);
            $user->update($request->validated());
            return (new UserResource($user))->response()->setStatusCode(TABLE_CREATED);
        }
        catch(QueryException $ex){
            abort(INVALID_DATA, 'Invalid data');
        }
        catch(Exception $ex){
            abort(SERVER_ERROR, 'Server error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
