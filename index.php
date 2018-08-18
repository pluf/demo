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
//     $view = new SuperTenant_Views();
//     $request = new Pluf_HTTP_Request('/');
//     $request->tenant = new Pluf_Tenant(1);
//     $request->REQUEST = array(
//         'title' => 'Main tenant',
//         'description' => 'Description of the main tenant',
//         'domain' => 'pluf.ir',
//         'subdomain' => 'www',
//         'validate' => true
//     );
//     $view->create($request, array());

//     $admin = User_Account::getUser('admin');
//     $credit = new User_Credential();
//     $credit->setFromFormData(array(
//         'account_id' => $admin->id
//     ));
//     $credit->setPassword('admin');
//     $credit->create();
// } catch (Exception $e) {
//     var_export($e);
// }

Pluf_Dispatcher::dispatch(Pluf_HTTP_URL::getAction(), 'urls.php');

