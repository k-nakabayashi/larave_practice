<?php

declare(strict_types=1);
namespace App\Domain\Service\Composite;
use Log;
class Main {
    public static function excute()
    { 
        Log::debug("Making Root Entry...");

        $rootdir = new Directory('root');
        $bindir = new Directory('bin');
        $tmpdir = new Directory('tmp');
        $usrdir = new Directory('usr');
        
        $rootdir->add($bindir);
        $rootdir->add($tmpdir);
        $rootdir->add($usrdir);
        
        $bindir->add(new File('vi', 1000));
        $bindir->add(new File('latex', 20000));

        $rootdir->printList();

        Log::debug("");
        Log::debug("Making user entries");

        $yuki = new Directory('yuki');
        $hanako = new Directory('hanako');
        $tomura = new Directory('tomura');

        $usrdir->add($yuki);
        $usrdir->add($hanako);
        $usrdir->add($tomura);

        $yuki->add(new File('yuki-diary.html', 100));
        $yuki->add(new File('yuki-composite.java', 1000));

        $hanako->add(new File('hanako-diary.html', 100));
        $hanako->add(new File('hanako-composite.java', 1000));

        $tomura->add(new File('tomura-diary.html', 100));
        $tomura->add(new File('tomura-composite.java', 1000));

        $rootdir->printList();

    }
}