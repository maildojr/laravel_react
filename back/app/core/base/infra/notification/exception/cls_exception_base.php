<?php namespace App\core\base\infra\notification\exception;

use Exception;
use App\core\base\infra\notification\interface\exception\int_exception;
use App\core\base\infra\notification\cls_notification;
use Illuminate\Support\Facades\Log;
use Serializable;

class cls_exception_base extends Exception implements int_exception
{
    protected $get_titulo_principal="Foram informados dados invalidos.";

    protected function gravar_log(){
        Log::error('Uma exceção ocorreu', ['ip'=>$_SERVER['REMOTE_ADDR'],
                                            'exception' => $this]);
    }

    public function __construct (private cls_notification $notification,private int $http_status_code=400){
        parent::__construct($notification->messages());
    }

    public function get_erros(){
        return $this->notification->get_erros();
    }

    public function get_http_status_code(): int{
        return $this->http_status_code;
    }
    public function get_titulo_principal():string{
        return $this->get_titulo_principal;
    }
}
