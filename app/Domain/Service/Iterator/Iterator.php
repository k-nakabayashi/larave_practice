<?php

declare(strict_types=1);
namespace App\Domain\Service\Iterator;

interface Iterator {
    public function hasNext() : bool;
    public function next(); //:Object
}