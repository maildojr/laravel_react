<?php

namespace App\core\movies\use_case\edit\dto;

class dto_edit_movie_in {
    public function __construct(public string $id,
                                public string $title,
                                public string $genre,
                                public string $year,
                                public string $rating){}
}
