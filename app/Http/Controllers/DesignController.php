<?php

namespace App\Http\Controllers;

use App\Domain\Service\Iterator\Main as Iterator;
use App\Domain\Service\Composite\Main as Composite;
class DesignController extends Controller
{

    public function iterator()
    {   
        Iterator::excute();
        return view("welcome");
    }
    public function composite()
    {
        Composite::excute();
        return view("welcome");
    }
}
