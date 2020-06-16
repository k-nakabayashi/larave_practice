<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Domain\Service\SmapleInterface;
use App\Domain\Service\FirstSample;
use App\Domain\Service\SecondSample;

use App\Domain\Service\FirstCtrl;
use App\Domain\Service\SecondCtrl;
use App\Domain\Service\SampleAggregator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        //コンテキストによって契約を切り替える
        // $this->app->when(FirstCtrl::class)
        //     ->needs(SmapleInterface::class)
        //     ->give(FirstSample::class);

        // $this->app->when(SecondCtrl::class)
        //     ->needs(SmapleInterface::class)
        //     ->give(SecondSample::class);

        // $first = resolve(FirstCtrl::class);
        // $firstTxt = $first->getText();
 
        // $second = resolve(SecondCtrl::class);
        // $secondTxt = $second->getText();

        //Aggregate
        $this->app->singleton(FirstSample::class, function ($app){
            return new FirstSample ();
        });
        $this->app->singleton(SecondSample::class, function ($app){
            return new SecondSample ();
        });
        
        $this->app->tag([FirstSample::class, SecondSample::class], 'aggre');
            # code...
      
        $this->app->bind(SampleAggregator::class, function($app) {
            return new SampleAggregator($app->tagged('aggre'));
        });

        $aggre = resolve(SampleAggregator::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }


}
