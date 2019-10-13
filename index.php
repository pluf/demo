<?php
require 'vendor/autoload.php';
require 'Pluf.php';
Pluf::start('config.php');

/*
 * Uncomment to install
 *
 * Init DB and create new tenant.
 */
ini_set('display_errors', 'on');
error_reporting(E_ALL);
// header('Content-Type: text/plain');
// try {
//     $m = new Pluf_Migration(Pluf::f('installed_apps'));
//     $m->install();
//     // Create default tenant
//     $tenant = new Pluf_Tenant(1);
//     $tenant->title = 'Main tenant';
//     $tenant->description = 'Description of the main tenant';
//     $tenant->domain = 'pluf.ir';
//     $tenant->subdomain = 'www';
//     $tenant->validate = true;
//     $tenant->create();
//     // Initiate default tenant
//     Tenant_Service::initiateTenant($tenant);
// } catch (Exception $e) {
//     var_export($e);
// }

Pluf_Dispatcher::dispatch(Pluf_HTTP_URL::getAction(), 'urls.php');

