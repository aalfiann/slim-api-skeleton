<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use aalfiann\Slim\Middleware\ETag;

    $app->get('/', function (Request $request, Response $response) {
        $data = [
            'welcome' => 'Hello World, here is the default index page.',
            'message' => 'This is a skeleton to built rest api with slim framework 3.',
            'author' => [
                'name' => 'M ABD AZIZ ALFIAN',
                'email' => 'aalfiann@gmail.com',
                'github' => 'https://github.com/aalfiann',
                'linkedin' => 'https://www.linkedin.com/in/azizalfian'
            ]
        ];
        // if you want to use etag
        $response = $this->cache->withEtag($response, $this['etag']('minute',5));
        // output response with json formatted
        return $response->withJson($data,200,JSON_PRETTY_PRINT);
    })->add(new ETag($container['etag']('minute',5)))
        ->setName("/");

    // Show detail info about routes
    $app->map(['GET','POST'],'/route/info', function(Request $request, Response $response) use($container) {
        $routes = $container->get('router')->getRoutes();
        foreach($routes as $route){
            $data[] = [
                'identifier' => $route->getIdentifier(),
                'name' => $route->getName(),
                'pattern' => $route->getPattern(),
                'methods' => $route->getMethods(),
                'middleware' => count($route->getMiddleware())
            ];
        }
        return $response->withJson($data,200,JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    });