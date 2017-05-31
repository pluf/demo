<?php
define ( "PLUF_BASE", dirname ( __FILE__ ) . '/vendor/pluf/core/src' );
define ( "SRC_BASE", dirname ( __FILE__ ) . '/storage' );

require 'vendor/autoload.php';

/*
 * NOTE: Remove if block in real installation.
 */
if (!file_exists('config.php')) {
    include dirname ( __FILE__ ) . '/vendor/pluf/installer/index.php';
    return;
}
// // Uncomment to install
// ini_set('display_errors', 'on');
// error_reporting(E_ALL);
// header('Content-Type: text/plain');
// try {
//     global $what;
//     $what = array(
//             'all' => true,
//             'app' => '',
//             'conf' => dirname(__FILE__) . '/config.php',
//             'version' => null,
//             'dry_run' => false,
//             'un-install' => false,
//             'install' => true,
//             'backup' => false,
//             'restore' => false,
//             'debug' => true
//     );
//     require 'migratew.php';
//     debug('# User and groups');
//     $user = new Pluf_User();
//     $user->login = 'admin';
//     $user->last_name = 'admin';
//     $user->email = 'admin@dpq.co.ir';
//     $user->setPassword('admin');
//     $user->administrator = true;
//     $user->staff = true;
//     $user->create();
//     debug('User is created');
//     debug('Login:admin');
//     debug('Password:admin');
//     debug('# Default tenant');
//     $tenant = new Pluf_Tenant();
//     $tenant->title = 'Default Tenant';
//     $tenant->description = 'Auto generated tenant';
//     $tenant->subdomain = Pluf::f('tenant_default', 'main');
//     $tenant->domain = Pluf::f('general_domain', 'donate.com');
//     $tenant->create();
// //     Pluf_RowPermission::add($user, $tenant, 'Pluf.owner');
// } catch (Exception $e) {
//     var_export($e);
// }

require 'Pluf.php';
Pluf::start ('config.php' );
if(!Pluf_Dispatcher::loadControllers ( 'urls.php' )){
    echo 'Controllers (urls.php) are not registerd!? ';
}
Pluf_Dispatcher::dispatch ( Pluf_HTTP_URL::getAction () );
