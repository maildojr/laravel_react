<?php

namespace App\core\infra\laravel\resources;

use App\core\actors\entity\cls_actors;
use App\core\actors\resource\interface\int_resource_actors;
use App\Models\Actors;

class cls_resource_actors implements int_resource_actors{
    public function __construct(private Actors $model){
    }

    public function modelo_para_entidades($rowsData){
        $out=[];

        foreach($rowsData as $row){
            array_push($out, new cls_actors(
                $row->id,
                $row->name,
                $row->birth,
                $row->country
            ));
        }
        return $out;
    }

    public function modelo_para_entidade($rowData){
        return new cls_actors(
            id:$rowData->id,
            name:$rowData->name,
            birth:$rowData->birth,
            country:$rowData->country
        );
    }

    public function list(array $filter=[]):array{
        $rowsData = $this->model->orderBy('id')->get(); //SELECT * FROM actors ORDER BY id
        return $this->modelo_para_entidades($rowsData);
    }

}
