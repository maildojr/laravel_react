<?php

namespace App\core\base\interface\ext_resource;

use App\core\base\interface\int_entidade;

interface int_resource_find {
    public function find($id):?int_entidade;
}
