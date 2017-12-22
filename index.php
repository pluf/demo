<?php
require 'vendor/autoload.php';
require 'Pluf.php';
Pluf::start ('config.php' );

// // Uncomment to install
ini_set('display_errors', 'on');
error_reporting(E_ALL);
header('Content-Type: text/plain');
try {
    $m = new Pluf_Migration(Pluf::f('installed_apps'));
    $m->install();
    
    $view = new SuperTenant_Views();
    $request = new Pluf_HTTP_Request('/');
    $view->create($request, array());
} catch (Exception $e) {
    var_export($e);
}

Pluf_Dispatcher::dispatch ( Pluf_HTTP_URL::getAction (), 'urls.php');
