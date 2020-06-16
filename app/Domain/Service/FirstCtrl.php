<?php
namespace App\Domain\Service;

class FirstCtrl {

    private $sample;
    public function __construct(SmapleInterface $sample)
    {
        $this->sample = $sample;
    }
    public function getText() {

        return $this->sample->getText();
    } 
}