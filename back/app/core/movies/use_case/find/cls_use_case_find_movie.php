<?php

namespace App\core\movies\use_case\find;

use App\core\movies\resource\interface\int_resource_movies;
use App\core\movies\use_case\list\dto\dto_list_movies_out;

class cls_use_case_find_movie
{
    public function __construct(private int_resource_movies $resource_movies)
    {
    }

    private function de_entidade_para_dto($entity): dto_list_movies_out
    {
        return new dto_list_movies_out(
                $entity->id(),
                $entity->title(),
                $entity->genre(),
                $entity->year(),
                $entity->rating()
            );
    }

    public function execute($id)
    {
        return $this->de_entidade_para_dto($this->resource_movies->find($id));
    }
}
