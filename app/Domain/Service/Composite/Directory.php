<?php
declare(strict_types=1);
namespace App\Domain\Service\Composite;
use ArrayObject;
use Log;

class Directory extends Entry {

    private $name;
    private $directory = [];

    public function __construct(String $name)
    {
        $this->name = $name;
    }
    
    public function getName() : String
    {
        return $this->name;
    }

    public function getSize() : int
    {
        $size = 0;

        return $size;
    }

    public function add(Entry $entry) : Entry
    {
        array_push($this->directory, $entry);
        return $this;
    }

    protected function printList(String $prefix)
    {
        Log::debug($prefix . '/' . $this);

        $obj = new ArrayObject($this->directory);
        $iterator = $obj->getIterator();

        foreach ($iterator as $entry) {
            $entry->printList($prefix . '/' . $this->name);
        }
    
    }


}