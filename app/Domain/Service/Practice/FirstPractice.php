<?php
declare(strict_types=1);
namespace App\Domain\Service\Practice;
use Log;
class FirstPractice {

    public function getTempertureStatus(float $temp)
    {
        $message = "";
        if ( 24.0 <= $temp && $temp <= 25.9) {
            $message = "快適";
        } else if ( $temp < 24.0 ) {
            $message = "寒い";
        } else {
            $message = "暑い";
        }
        return $message;
    }

    
}