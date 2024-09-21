<?php

namespace App\core\actors\use_case\list;

use App\core\actors\resource\interface\int_resource_actors;
use App\core\actors\use_case\list\dto\dto_list_actors_out;

class cls_use_case_list_actors {
    public function __construct(private int_resource_actors $resource_actors)
    {
    }

    private function de_entidade_para_dto($entities): array
    {
        $out = [];
        foreach ($entities as $entity) {
            array_push($out, new dto_list_actors_out(
                $entity->id(),
                $entity->name(),
                $entity->birth(),
                $entity->country()
            ));
        }
        return $out;
    }

    public function execute(array $filter = [])
    {
        return $this->de_entidade_para_dto(
            $this->resource_actors->list($filter)
        );
    }
}
