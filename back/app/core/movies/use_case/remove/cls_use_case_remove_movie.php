<?php

namespace App\core\movies\use_case\remove;

use App\core\movies\resource\interface\int_resource_movies;

class cls_use_case_remove_movie
{
    public function __construct(private int_resource_movies $resource)
    {
    }

    public function execute(int $id): void
    {
        $this->resource->remove($id);
    }
}
