<?php

namespace App\core\movies\use_case\new\dto;

class dto_new_movie_out {
    public function __construct(public int $id,
                                public string $title,
                                public string $genre,
                                public string $year,
                                public string $rating){}
}
