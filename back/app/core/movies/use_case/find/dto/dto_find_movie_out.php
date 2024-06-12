<?php

namespace App\core\movies\use_case\find\dto;

class dto_find_movies_out {
    public function __construct( public int $id,
                                public string $title,
                                public string $genre,
                                public string $year,
                                public string $rating){}
}
