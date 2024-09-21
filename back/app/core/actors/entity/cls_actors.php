<?php

namespace App\core\actors\entity;

use App\core\base\abstract\cls_entidade_base;

class cls_actors extends cls_entidade_base{

    public function __construct(
        ?string $id="",
        private string $name,
        private string $birth,
        private string $country
    ){
        $this->id=$id;
        parent::validar_principal();
    }

    public function id():?int{
        return $this->id;
    }
    public function name():string{
        return $this->name;
    }
    public function birth():string{
        return $this->birth;
    }
    public function country():string{
        return $this->country;
    }
    protected function validar(){
        if(!$this->campo_obrigatorio($this->name())){
            $className=get_class($this);
            $this->notification->AddError($className,'The name is required');
        }
        // .....
    }
}
