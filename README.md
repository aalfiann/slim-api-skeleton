# Slim-API-Skeleton

[![Version](https://img.shields.io/packagist/v/aalfiann/slim-api-skeleton.svg)](https://packagist.org/packages/aalfiann/slim-api-skeleton)
[![Downloads](https://img.shields.io/packagist/dt/aalfiann/slim-api-skeleton.svg)](https://packagist.org/packages/aalfiann/slim-api-skeleton)
[![License](https://img.shields.io/packagist/l/aalfiann/slim-api-skeleton.svg)](https://github.com/aalfiann/slim-api-skeleton/blob/HEAD/LICENSE.md)

This is a skeleton to built rest api with slim framework 3. 

## Dependencies
- Logger >> monolog/monolog
- HTTP Cache >> slim/http-cache
- ETag Middleware >> aalfiann/slim-etag-middleware

## Installation

Install this package via [Composer](https://getcomposer.org/).
```
composer create-project aalfiann/slim-api-skeleton [my-app-name]
```

## Getting Started

### How to create new application
- Go to modules directory
- Create new folder `my-app`
- To create routes, you should follow this pattern >> `*.router.php`
- Done

### Example
This is the `my-app.router.php` file
```php
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
```

**Note:**  
- Documentation about `Slim` is available on [slimframework.com](http://slimframework.com).
- This is a forked version from the original [slimphp/Slim-Skeleton](https://github.com/slimphp/Slim-Skeleton).