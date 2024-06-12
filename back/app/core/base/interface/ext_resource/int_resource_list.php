<?php

namespace App\core\base\interface\ext_resource;

interface int_resource_list {
    public function list(array $filter=[]):array;
}
