<?php

declare(strict_types=1);
namespace App\Domain\Service\Iterator;

class Book {
    private $name = "";
    public function __construct(String $name)
    {
        $this->name = $name;
    }

    public function getName() : String
    {
        return $this->name;
    }

    public static function cast($obj): self
    {
        $checkEqeual = $obj instanceof self;
        
        if (!($obj instanceof self)) {
            return null;
        }
        return $obj;
    }
}