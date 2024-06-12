<?php

namespace App\core\infra\laravel\resources;

use App\core\base\interface\int_entidade;
use App\core\movies\entity\cls_movies;
use App\core\movies\resource\interface\int_resource_movies;
use App\Models\Movies;

class cls_resource_movies implements int_resource_movies{
    public function __construct(private Movies $model){
    }

    public function modelo_para_entidades($rowsData){
        $out=[];

        foreach($rowsData as $row){
            array_push($out, new cls_movies(
                $row->id,
                $row->title,
                $row->genre,
                $row->year,
                $row->rating
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
            rating:$rowData->rating
        );
    }

    public function list(array $filter=[]):array{
        $rowsData = $this->model->orderBy('id')->get();
        return $this->modelo_para_entidades($rowsData);
    }

    public function find($id): ?int_entidade {
        $rowData = $this->model->find($id);
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
        return $entidade;
    }

    public function remove($id): bool {
        return $this->model->destroy($id);
    }
}
