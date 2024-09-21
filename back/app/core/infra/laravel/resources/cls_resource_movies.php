<?php

namespace App\core\infra\laravel\resources;

use App\core\base\interface\int_entidade;
use App\core\movies\entity\cls_movies;
use App\core\actors\entity\cls_actors;
use App\core\movies\resource\interface\int_resource_movies;
use App\Models\Movies;

class cls_resource_movies implements int_resource_movies{

    protected $tmdbService;
    public function __construct(private Movies $model){
    }

    public function modelo_para_entidades($rowsData){
        $out=[];

        foreach($rowsData as $row){

            $actors = [];
            foreach($row->actors as $actor){
                array_push($actors, new cls_actors(
                    $actor->id,
                    $actor->name,
                    $actor->birth,
                    $actor->country
                ));
            }

            array_push($out, new cls_movies(
                $row->id,
                $row->title,
                $row->genre,
                $row->year,
                $row->rating,
                $actors,
                $row->tmdb_id
            ));
        }
        return $out;
    }

    public function modelo_para_entidade($rowData){
        return new cls_movies(
            id:$rowData->id,
            title:$rowData->title,
            genre:$rowData->genre,
            year:$rowData->year,
            rating:$rowData->rating,
            tmdb_id:$rowData->tmdb_id
        );
    }

    public function list(array $filter=[]):array{
        $rowsData = $this->model->orderBy('id')->get(); //SELECT * FROM movies ORDER BY id
        return $this->modelo_para_entidades($rowsData);
    }

    public function find($id): ?int_entidade {
        $rowData = $this->model->find($id);
        // $rowData = $this->model->where('id', $id)->first();

        return $this->modelo_para_entidade($rowData);
    }

    public function create(int_entidade $entidade): ?int_entidade {
        $newMovie = $this->model->create([
                                            'title' => $entidade->title(),
                                            'genre' => $entidade->genre(),
                                            'year' => $entidade->year(),
                                            'rating' => $entidade->rating()
        ]);
        return $this->modelo_para_entidade($newMovie);
    }

    public function edit(int_entidade $entidade): ?int_entidade {
        $this->model->find($entidade->id())->update([
            'title' => $entidade->title(),
            'genre' => $entidade->genre(),
            'year' => $entidade->year(),
            'rating' => $entidade->rating()
        ]);

        if ($entidade->actors()) {
            $this->model->find($entidade->id())->actors()->sync($entidade->actors());
        }

        return $entidade;
    }

    public function remove($id): bool {
        return $this->model->destroy($id);
    }
}
