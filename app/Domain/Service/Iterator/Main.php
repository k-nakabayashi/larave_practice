<?php

declare(strict_types=1);
namespace App\Domain\Service\Iterator;

class Main {
    public static function excute()
    { 
        $bookshelf = new BookShelf(4);  
        $bookshelf->appendBook(new Book("AAA"));
        $bookshelf->appendBook(new Book("BBB"));
        $bookshelf->appendBook(new Book("CCC"));
        $bookshelf->appendBook(new Book("DDD"));
        $iterator = $bookshelf->iterator();

        while ($iterator->hasNext()) {
            $book = $iterator->next();
            var_dump($book->getName());
        }
    }
}