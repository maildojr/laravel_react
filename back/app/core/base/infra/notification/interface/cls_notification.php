<?php
namespace App\core\base\infra\notification;

class cls_notification{
    private $errors=[];

    public function get_erros(){
        return $this->errors;
    }

    public function AddError($context,$message,$atributo=""){
        array_push($this->errors,['context'=>$context,'message'=>$message,'atributo'=>$atributo]);
    }

    public function hasErrors(){
        return count($this->errors)>0;
    }

    public function messages($contexto=""){
        $messages='';
        foreach($this->errors  as $error){
            $messages.="{$error['context']}: {$error['message']}";
        }
        return $messages;
    }

}
