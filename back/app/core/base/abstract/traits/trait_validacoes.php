<?php namespace App\core\base\abstract\traits;

trait trait_validacoes {

    protected function campo_obrigatorio($value){
        if(is_null($value) || trim($value)==='' ){
             return false;
         }
         return true;
     }

     protected function valor_maior_que($valor,$referencia){
         return $valor>$referencia;
     }

     protected function quantidade_minima_de_caractes($value,$min=3){
         if(!(is_null($value) || $value=='')){
             if(strlen($value)>=$min && trim($value)!=''){
                return true;
             }else{
                 return false;
             }
         }else{
             return true;
         }
     }

     protected function quantidade_maxima_de_caractes($value,$max=0){
        if(!is_null($value)){
            if(strlen($value)<=$max){
               return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }


    function sao_todos_da_um_tipo_de_classe(array $array,string  $className): bool {
        if (empty($array)) {
            return true;
        }
        $primeiro_elemento = $array[0]::class;
        if($className==$primeiro_elemento){
            return $this->sao_todos_da_mesma_classe($array);
        }else{
            return false;
        }

    }

    function sao_todos_da_mesma_classe(array $array): bool {
        if (empty($array)) {
            return true;
        }

        $primeiro_elemento = get_class($array[0]);

        foreach ($array as $elemento) {
            if (get_class($elemento) !== $primeiro_elemento) {
                return false;
            }
        }

        return true;
    }
}
