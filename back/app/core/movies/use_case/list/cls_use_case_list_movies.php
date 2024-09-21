<?php

namespace App\core\movies\use_case\list;


use App\core\movies\resource\interface\int_resource_movies;
use App\core\movies\use_case\list\dto\dto_list_movies_actors_out;
use App\core\movies\use_case\list\dto\dto_list_movies_out;

use App\core\infra\laravel\services\cls_tmdb_service;

class cls_use_case_list_movies
{
    protected $tmdbService;

    public function __construct(private int_resource_movies $resource_movies)
    {
        $this->tmdbService = new cls_tmdb_service;
    }

    private function de_entidade_para_dto($entities): array
    {
        $out = [];
        foreach ($entities as $entity) {
            $out_actors = [];
            foreach ($entity->actors() as $actor) {
                array_push($out_actors, new dto_list_movies_actors_out(
                    $actor->id(),
                    $actor->name(),
                    $actor->birth(),
                    $actor->country()
                ));
            }
            $poster_url = $this->tmdbService->getPosterByMovieId($entity->tmdb_id());
            array_push($out, new dto_list_movies_out(
                $entity->id(),
                $entity->title(),
                $entity->genre(),
                $entity->year(),
                $entity->rating(),
                $poster_url,
                $out_actors,
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
