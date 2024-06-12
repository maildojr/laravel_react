<?php

namespace App\core\base\interface\ext_resource;

use App\core\base\interface\int_entidade;

interface int_resource_edit {
    public function edit(int_entidade $entidade):?int_entidade;
}
