<?php
declare(strict_types=1);
namespace App\Http\Responder;

use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory as ViewFactory;


abstract class Responder 
{
    protected $response;
    protected $view;

    public function __construct(Response $response, ViewFactory $view)
    {
        $this->response = $response;
        $this->view = $view;
    }
    
    public function getResponse()
    {
        return $this->response;
    }
    public abstract function response($model);
}
