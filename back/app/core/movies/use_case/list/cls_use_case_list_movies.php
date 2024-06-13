<?php

namespace App\core\movies\use_case\list;

use App\core\movies\resource\interface\int_resource_movies;
use App\core\movies\use_case\list\dto\dto_list_movies_out;

class cls_use_case_list_movies
{
    public function __construct(private int_resource_movies $resource_movies)
    {
    }

    private function de_entidade_para_dto($entities): array
    {
        $out = [];
        foreach ($entities as $entity) {
            array_push($out, new dto_list_movies_out(
                $entity->id(),
                $entity->title(),
                $entity->genre(),
                $entity->year(),
                $entity->rating()
            ));
        }
        return $out;
    }

    public function execute(array $filter = [])
    {
        return $this->de_entidade_para_dto(
            $this->resource_movies->list($filter)
        );
    }
}
