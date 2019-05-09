<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Route for /my-app
$app->group('/my-app', function($app) {

    // Show index page
    // Try to open browser to http://yourdomain.com/my-app/
    $app->get('/', function (Request $request, Response $response) {
        $data = [
            'welcome' => 'Hello World, this is my-app index page.',
            'message' => 'This is my first app rest api with slim-api-skeleton.'
        ];
        return $response->withJson($data,200,JSON_PRETTY_PRINT);
    })->setName("/");

});
