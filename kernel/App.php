<?php

namespace App\Kernel;

use App\Kernel\Http\Request;
use App\Kernel\Router\Router;

class App
{
    private Router $router;
    private Request $request;
    public function __construct(
    )
    {
        $this->request = Request::createFromGlobals();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        $this->router->dispatch($this->request->uri(), $this->request->method());
    }
}