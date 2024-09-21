<?php

namespace App\core\movies\use_case\new;

use App\core\movies\entity\cls_movies;
use App\core\movies\resource\interface\int_resource_movies;
use App\core\movies\use_case\new\dto\dto_new_movie_in;
use App\core\movies\use_case\new\dto\dto_new_movie_out;

class cls_use_case_new_movie
{
    public function __construct(private int_resource_movies $resource_movies)
    {
    }

    public function de_dto_para_entidade(dto_new_movie_in $dtoin): cls_movies
    {
        return new cls_movies(
            id: 0,
            title: $dtoin->title,
            genre:$dtoin->genre,
            year: $dtoin->year,
            rating: $dtoin->rating
        );
    }

    private function de_entidade_para_dto($entity): dto_new_movie_out
    {
        return new dto_new_movie_out(
                $entity->id(),
                $entity->title(),
                $entity->genre(),
                $entity->year(),
                $entity->rating()
            );
    }

    public function execute(dto_new_movie_in $dtoin): dto_new_movie_out
    {
        $entity = $this->resource_movies->create(
            $this->de_dto_para_entidade($dtoin)
        );
        return $this->de_entidade_para_dto($entity);
    }
}
