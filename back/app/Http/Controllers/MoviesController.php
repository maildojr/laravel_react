<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\core\movies\use_case\list\cls_use_case_list_movies;
use App\core\movies\use_case\find\cls_use_case_find_movie;

use App\core\movies\use_case\new\cls_use_case_new_movie;
use App\core\movies\use_case\new\dto\dto_new_movie_in;

use App\core\movies\use_case\edit\cls_use_case_edit_movie;
use App\core\movies\use_case\edit\dto\dto_edit_movie_in;

use App\core\movies\use_case\remove\cls_use_case_remove_movie;

/**
 * Command to create controller with resource
 *
 * php artisan make:controller MoviesController --resource
 *
 */

class MoviesController extends Controller
{
    public function __construct(private cls_use_case_list_movies $use_case_list,
                                private cls_use_case_find_movie $use_case_find,
                                private cls_use_case_new_movie $use_case_new,
                                private cls_use_case_edit_movie $use_case_edit,
                                private cls_use_case_remove_movie $use_case_remove
    ){
    }

    /**
     * List all movies - api/movies - Method GET
     */
    public function index(Request $request)
    {
        //
        // $movies = \App\Models\Movies::all();
        // return response()->json($movies, 200);
        return response()->json($this->use_case_list->execute(), 200);
    }

    /**
     * Store a newly created movie in database. Method POST
     */
    public function store(Request $request)
    {
        //
        try{
            $dtoin=new dto_new_movie_in(
                $request->title,
                $request->genre,
                $request->year,
                $request->rating
            );
            $dtoout=$this->use_case_new->execute($dtoin);
            return response()->json($dtoout, 201);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified movie by id. Method GET {id}
     */
    public function show(string $id)
    {
        //
        try{
            // return \App\Models\Movies::find($id);
            return response()->json($this->use_case_find->execute($id), 200);
        } catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Update the specified movie in database. Method PUT
     */
    public function update(Request $request, string $id)
    {
        //
        try{
            $dtoin=new dto_edit_movie_in(
                id:$id,
                title:$request->title,
                year:$request->year,
                genre:$request->genre,
                rating:$request->rating
            );
            $out=$this->use_case_edit->execute($dtoin);
            return response()->json($out, 200);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the movie from database. Method DELETE
     */
    public function destroy(string $id)
    {
        //
        try{
            $this->use_case_remove->execute($id);
            return response()->json(['message' => 'Movie deleted successfully.'], 200);
            // return response()->noContent();
        } catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
