<?php
declare(strict_types=1);
namespace App\Http\Responder;

use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory as ViewFactory;
use App\Post as PostModel;

class PostResponder extends Responder
{

    public function response($post)
    {  
        $response = $this->getResponse();

        if (!$post->id) {
            $response->setStatusCode(Response::HTTP_NOT_FOUND);
        }
        
        $response->setContent(
            $this->view->make('post', ['post'=>$post])
        );
        return $this->response;
    }
}
