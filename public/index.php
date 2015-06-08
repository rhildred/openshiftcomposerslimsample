<?php

    ini_set('display_errors', 'On');
    error_reporting(E_ALL | E_STRICT);

    require '../vendor/autoload.php';

    $app = new \Slim\Slim(array(
        'view' => new \PHPView\PHPView(),
        'templates.path' => __DIR__ . "/../views"));
    $app->get('/hello/:name', function ($name) {
        echo "Hello, " . $name;
    });
    $app->get('/about', function() use($app) {
        $app->render("about.phtml", array("page" => "about"));
    });
    $app->get('/', $index = function () use($app) {
        $app->render("index.phtml", array("page" => "index"));
    });
    $app->get('/index', $index);
    $app->run();
    
?>
