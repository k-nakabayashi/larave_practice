<?php
declare(strict_types=1);
namespace App\Domain\Service\Composite;
use Log;
class File extends Entry {

    private $name;
    private $size;
    
    public function __construct(String $name, int $size)
    {
        $this->name = $name;
        $this->size = $size;
    }
    
    public function getName() : String
    {
        return $this->name;
    }

    public function getSize() : int
    {
        return $this->size;
    }

    protected function printList(String $prefix)
    {
        Log::debug($prefix . '/' . $this);
    }
}