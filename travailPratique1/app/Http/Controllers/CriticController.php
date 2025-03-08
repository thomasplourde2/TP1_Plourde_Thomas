<?php

namespace App\Http\Controllers;

use App\Http\Resources\CriticResource;
use Illuminate\Http\Request;
use App\Models\Critic;
use Exception;
use Illuminate\Database\QueryException;

class CriticController extends Controller
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
        try{
            $critic = Critic::findOrFail($id);
            $critic->delete();
            return (new CriticResource($critic))->response()->setStatusCode(NO_CONTENT);
        }
        catch(QueryException $ex){
            abort(INVALID_DATA, 'Invalid data');
        }
        catch(Exception $ex){
            abort(SERVER_ERROR, 'Server error');
        }
    }
}
