<?php

declare(strict_types=1);
namespace App\Domain\Service\Iterator;

class BookShelf {
    private $books = [];
    private $last = 0;

    public function __construct(int $maxsize)
    {
        
    }

    public function getBookAt(int $index)
    {
        return $this->books[$index];
    }

    public function appendBook(Book $book)
    {
        $this->books[$this->last] = $book;
        $this->last ++;
    }

    public function getLength()
    {
        return $this->last;
    }

    public function iterator()
    {
        return new BookShelfIterator($this);
    }

}