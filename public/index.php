<?php

// this is boilerplate debugging
    ini_set('display_errors', 'On');
    error_reporting(E_ALL | E_STRICT);

// allow CORS

    if(array_key_exists("HTTP_ORIGIN", $_SERVER)){
	    header("Access-Control-Allow-Origin: " . $_SERVER["HTTP_ORIGIN"]);
	    header("Access-Control-Allow-Headers: X-Requested-With, X-Authorization, Content-Type, X-HTTP-Method-Override");
	    header("Access-Control-Allow-Credentials: true");
	    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    }

// this is composer dependencies
    require '../vendor/autoload.php';

// make a new slim object with view Engine PHPView
    $app = new \Slim\Slim(array(
        'view' => new \PHPView\PHPView(),
        'templates.path' => __DIR__ . "/../views"));

// routes for the application
    $app->get('/hello/:name', function ($name) {
        echo "Hello, " . $name;
    });
    $app->get('/about', function() use($app) {
        $app->render("about.phtml", array("page" => "about"));
    });
    $app->get('/contact', function() use($app) {
        $app->render("contact.phtml", array("page" => "contact"));
    });
    $app->get('/', $index = function () use($app) {
        $app->render("index.phtml", array("page" => "index"));
    });
    $app->get('/index', $index);
    $app->post('/mailer', function() use($app){
        $form = json_decode($app->request->getBody());
        $mailer = new \Mailer();
        echo $mailer->mail("noreply@rhildred.github.io", $form->email, "message from " . $form->name, $form->message);
    });
    $app->run();
    
?>
