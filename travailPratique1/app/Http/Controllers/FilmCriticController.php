<?php

namespace App\Http\Controllers;

use App\Http\Resources\CriticResource;
use App\Http\Resources\FilmResource;
use Illuminate\Http\Request;
use App\Models\Film;
use Exception;
use Illuminate\Database\QueryException;

class FilmCriticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function scoreAverage($id)
    {
        try{
            $film = Film::findOrFail($id);
            $critics = $film->critics;
            //source pour avg: https://laracasts.com/discuss/channels/laravel/how-to-get-average-values
            $average = $critics->avg('score');
            return response()->json([
                'score average' =>  $average
            ]); 
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
        try{
            $film = (new FilmResource(Film::findOrFail($id)))->response()->setStatusCode(OK);
            $filmCritics = Film::findOrFail($id);
            $critics = CriticResource::collection($filmCritics->critics)->response()->setStatusCode(OK);
            return response()->json([
                'flim' => $film,
                'critics' => $critics
            ]);
        }
        catch(QueryException $ex){
            abort(NOT_FOUND, 'Invalid Id');
        }
        catch(Exception $ex){
            abort(SERVER_ERROR, 'Server error');
        }
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
