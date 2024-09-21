<?php

namespace App\Http\Controllers;

use App\core\actors\use_case\list\cls_use_case_list_actors;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    //
    public function __construct(private cls_use_case_list_actors $use_case_list
    ){
    }
    public function index() {
        return response()->json(
            $this->use_case_list->execute()
        , 200);
    }
}
