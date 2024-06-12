<?php namespace App\core\base\value_object;

use Ramsey\Uuid\Uuid as Ramsey;

class Uuid{

    public function __construct(
        private string $value
    ){
        $this->isValid($value);
    }

    public static function random():self {
        return new self(Ramsey::uuid4()->toString());
    }

    public function __toString():string{
        return $this->value;
    }

    private function isValid($value){
        if(!Ramsey::isValid($value)){
            throw new \Exception('ID informado para a classe invalido');
        }
    }
}
