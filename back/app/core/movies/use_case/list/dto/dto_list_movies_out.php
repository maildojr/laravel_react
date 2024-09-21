<?php

namespace App\core\movies\use_case\list\dto;

class dto_list_movies_out {
    public function __construct(
        public int $id,
        public string $title,
        public string $genre,
        public string $year,
        public string $rating,
        public string $poster_url,
        public array $actors=[],
        ){}
}
