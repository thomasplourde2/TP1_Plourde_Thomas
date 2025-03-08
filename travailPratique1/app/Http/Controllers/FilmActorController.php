<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActorResource;
use Illuminate\Http\Request;
use App\Models\Film;
use Exception;
use Illuminate\Database\QueryException;

class FilmActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        try{
            return ActorResource::collection(Film::findOrFail($id)->actors)->response()->setStatusCode(OK);
        }
        catch(QueryException $ex){
            abort(NOT_FOUND, 'Invalid Id');
        }
        catch(Exception $ex){
            abort(SERVER_ERROR, 'Server error');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
