<?php

namespace PHPView;

class Auth
{
    public function __invoke($route){
        $app = \Slim\Slim::getInstance();
        $app->halt(500, "error ... login required");
    }
}
