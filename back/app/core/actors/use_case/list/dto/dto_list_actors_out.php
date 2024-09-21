<?php

namespace App\core\actors\use_case\list\dto;

use Illuminate\Support\Facades\Date;

class dto_list_actors_out {
    public function __construct( public int $id,
                                public string $name,
                                public string $birth,
                                public string $country){}
}
