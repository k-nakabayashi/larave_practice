<?php
//Design : Composite
//Design Roll: Component
declare(strict_types=1);
namespace App\Domain\Service\Composite;
use Log;
abstract class Entry {

    public abstract function getName() : String;
    public abstract function getSize() : int;

    public function add(Entry $enty) : Entry
    {
        return $enty;
    }

    protected abstract function printList(String $prefix);
    
    public function __String()
    {
        Log::debug("");
    }

    public function __call($test1=0, $test2=0)
    {
        return $this->getName() . " (" . $this->getSize() . ")";
    }
}