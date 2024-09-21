<?php

namespace App\core\movies\use_case\edit;

use App\core\movies\entity\cls_movies;
use App\core\movies\resource\interface\int_resource_movies;
use App\core\movies\use_case\edit\dto\dto_edit_movie_in;
use App\core\movies\use_case\edit\dto\dto_edit_movie_out;

class cls_use_case_edit_movie{

    public function __construct(private int_resource_movies $resource_movies){}

    public function de_entidade_para_dto(cls_movies $entidade): dto_edit_movie_out
    {
        return new dto_edit_movie_out(
            $entidade->id(),
            $entidade->title(),
            $entidade->genre(),
            $entidade->year(),
            $entidade->rating()
        );
    }

    public function de_dto_para_entidade(dto_edit_movie_in $dtoin): cls_movies
    {
        return new cls_movies(
            $dtoin->id,
            $dtoin->title,
            $dtoin->genre,
            $dtoin->year,
            $dtoin->rating
        );
    }

    public function execute(dto_edit_movie_in $in): dto_edit_movie_out
    {
        $entidade = $this->de_dto_para_entidade($in);
        return $this->de_entidade_para_dto(
            $this->resource_movies->edit($entidade)
        );
    }
}
