<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Domain\Service\Practice\FirstPractice;
use Log;

class FirstPracticeTest extends TestCase
{
    public static $firstPra;
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$firstPra = new FirstPractice();

    }
    public function 室温とチワワの反応 ():array {
        $chill = "寒い";
        $good = "快適";
        $hot = "暑い";

        return [  
            //寒い
            [$chill, 0.0],
            [$chill, 15.0], 
            [$chill, 23.9],

            //快適
            [$good, 24.0], 
            [$good, 25.0], 
            [$good, 25.9],

            //暑い
            [$hot, 26.0], 
            [$hot, 40.0], 
            [$hot, 50.0], 
        ];
    }

    /**
     *@test 
     *@dataProvider 室温とチワワの反応
    */
    public function チワワのために室温を確認する(String $expected, float $temp): void {
        $status = self::$firstPra->getTempertureStatus($temp);
        $this->assertSame($status, $expected);
    }

    
}
