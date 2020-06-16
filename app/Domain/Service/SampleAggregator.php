<?php
namespace App\Domain\Service;

class SampleAggregator {

    public $aggregate;

    public function __construct($aggregate)
    {
        $this->aggregate = $aggregate;
        // $this->sample2 = $sample2;
    }
    public function getText() {

        return "SampleAggregator";
    } 
}