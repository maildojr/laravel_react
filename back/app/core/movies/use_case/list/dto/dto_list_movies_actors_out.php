<?php

namespace App\core\movies\use_case\list\dto;

class dto_list_movies_actors_out {
    public function __construct( public int $id,
                                public string $name,
                                public string $birth,
                                public string $country){}
}
