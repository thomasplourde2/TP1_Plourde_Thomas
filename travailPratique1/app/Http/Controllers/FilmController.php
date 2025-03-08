<?php

namespace App\Http\Controllers;

use App\Http\Resources\FilmResource;
use Illuminate\Http\Request;
use App\Models\Film;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            return FilmResource::collection(Film::paginate(10))->response()->setStatusCode(OK);    
        }
        catch(Exception $ex){
            abort(SERVER_ERROR, 'Server error');
        }
    }

    public function research(string $keyword, string $rating, string $minLength, string $maxLength)
    {
        try{
            $films = Film::all();

            Log::debug("Received parameters:", [
                'keyword' => $keyword,
                'rating' => $rating,
                'minLength' => $minLength,
                'maxLength' => $maxLength,
            ]);

            if ($keyword) {
                $films = $films->where('title', 'LIKE', "%$keyword%");
            }
            if ($rating) {
                $films = $films->where('rating', $rating);
            }
            if ($minLength) {
                $films = $films->where('length', '>=', $minLength);
            }
            if ($maxLength) {
                $films = $films->where('length', '<=', $maxLength);
            }
            return FilmResource::collection($films)->response()->setStatusCode(OK);
        }
        catch(QueryException $ex){
            abort(NOT_FOUND, 'Invalid Id');
        }
        catch(Exception $ex){
            Log::error("Server error: " . $ex->getMessage());
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
