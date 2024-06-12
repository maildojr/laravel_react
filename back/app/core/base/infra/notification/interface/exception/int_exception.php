<?php namespace App\core\base\infra\notification\interface\exception;

interface int_exception{

    public function get_erros();
    public function get_http_status_code():int;
    public function get_titulo_principal():string;
}
