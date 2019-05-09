<?php
// PHP Runtime Error
error_reporting(E_ALL);
set_error_handler(function ($severity, $message, $file, $line) {
    if (!(error_reporting() & $severity)) {
        return;
    }
    throw new \ErrorException($message, 0, $severity, $file, $line);
});

// CLI Server
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) return false;
}

// Load external classes
require dirname(__DIR__).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

// Load config
require dirname(__DIR__).DIRECTORY_SEPARATOR.'config.php';

// Load internal classes
spl_autoload_register(function ($classname) {
    require (realpath(__DIR__ . '/..').DIRECTORY_SEPARATOR.str_replace('\\', DIRECTORY_SEPARATOR, $classname) . '.php');
});

// Set time zone
date_default_timezone_set($config['app']['timezone']);

session_start();

require 'app.php';
