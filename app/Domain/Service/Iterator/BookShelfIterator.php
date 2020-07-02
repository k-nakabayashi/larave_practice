<?php

declare(strict_types=1);
namespace App\Domain\Service\Iterator;
use App\Domain\Service\Iterator\Iterator;

class BookShelfIterator implements Iterator {
    private $bookshelf;
    private $index;

    public function __construct(BookShelf $bookshelf)
    {
        $this->bookshelf = $bookshelf;
        $this->index = 0;
    }


    public function hasNext() : bool
    {
        $hasNextElement = $this->index < $this->bookshelf->getLength();
        if ($hasNextElement) {
            return true;
        } else {
            return false;
        }
    }

    public function next()
    {
        $book = $this->bookshelf->getBookAt($this->index);
        $this->index ++;
        return $book;
    }
}