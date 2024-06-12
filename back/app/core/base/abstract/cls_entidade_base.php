<?php namespace App\core\base\abstract;

use App\core\base\abstract\traits\trait_validacoes;
use App\core\base\interface\int_entidade;
use App\core\base\value_object\Uuid;
use App\core\base\infra\notification\cls_notification;
use App\core\base\infra\notification\exception\cls_exception_base;

abstract class cls_entidade_base implements int_entidade{
    use trait_validacoes;

    abstract protected function validar();
    protected $notification;

    public function  __construct(protected Uuid|string $id=''){
       $this->id=$this->id? new Uuid($this->id):Uuid::random();
       $this->iniciar_objetos();
       $this->validar_principal();
    }

    protected function iniciar_objetos(){
        $this->notification=new cls_notification();
    }

    protected function disparar_error_se_tiver():bool{
        /*Se não estiver instanciado, e pq esta sendo chamado pelo construtor, os objetos ainda serão inicializados e verificados pela validação */
        if(isset($this->notification)){
            if($this->notification->hasErrors()){
                throw new cls_exception_base($this->notification);
            }else{
                return true;
            }
        }else{
            return true;
        }
    }
    protected function validar_principal(){
       if(!$this->campo_obrigatorio($this->id())){
            $classNome=get_class($this);
            $this->notification->AddError($classNome,'O Id "'. $this->id(). '" informado para a entidade '.$classNome.' não é valido');
        }
        $this->validar();
        $this->disparar_error_se_tiver();
    }

    public function id(){
        return $this->id;
    }

}
