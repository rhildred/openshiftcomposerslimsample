<?php

namespace PHPView;

class Auth
{
    public function __invoke($route){
        $app = \Slim\Slim::getInstance();
        $app->flash('error', 'Login required');
        $app->redirect('/login');
    }
}
