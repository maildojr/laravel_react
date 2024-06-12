<?php

namespace App\core\movies\entity;

use App\core\base\abstract\cls_entidade_base;

class cls_movies extends cls_entidade_base{

    public function __construct(
        ?string $id="",
        private string $title,
        private string $genre,
        private string $year,
        private string $rating
    ){
        $this->id=$id;
        parent::validar_principal();
    }

    public function id():?int{
        return $this->id;
    }
    public function title():string{
        return $this->title;
    }
    public function genre():string{
        return $this->genre;
    }
    public function year():string{
        return $this->year;
    }
    public function rating():string{
        return $this->rating;
    }
    protected function validar(){
        if(!$this->campo_obrigatorio($this->title())){
            $className=get_class($this);
            $this->notification->AddError($className,'The title of movie is required');
        }
    }
}
