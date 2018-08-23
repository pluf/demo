<?php
$base = '';

/*
 * General apis
 */
$api = array(
    // array(
    // 'app' => 'User',
    // 'regex' => '#^/api/user#',
    // 'base' => $base,
    // 'sub' => include 'User/urls.php'
    // ),
    // array(
    // 'app' => 'Group',
    // 'regex' => '#^/api/group#',
    // 'base' => $base,
    // 'sub' => include 'Group/urls.php'
    // ),
    // array(
    // 'app' => 'Role',
    // 'regex' => '#^/api/role#',
    // 'base' => $base,
    // 'sub' => include 'Role/urls.php'
    // ),
    // array( // CMS : Content Management System
    // 'app' => 'CMS',
    // 'regex' => '#^/api/cms#',
    // 'base' => $base,
    // 'sub' => include 'CMS/urls.php'
    // ),
    // array(
    // 'app' => 'Message',
    // 'regex' => '#^/api/message#',
    // 'base' => $base,
    // 'sub' => include 'Message/urls.php'
    // ),
    // array(
    // 'app' => 'Monitor',
    // 'regex' => '#^/api/monitor#',
    // 'base' => $base,
    // 'sub' => include 'Monitor/urls.php'
    // ),

    // // Note: Hadi, 1397-03-07: Modules are added as basic

    // array( // Bank
    // 'app' => 'Bank',
    // 'regex' => '#^/api/bank#',
    // 'base' => $base,
    // 'sub' => include 'Bank/urls.php'
    // ),
    // array(
    // 'app' => 'Collection',
    // 'regex' => '#^/api/collection#',
    // 'base' => $base,
    // 'sub' => include 'Collection/urls.php'
    // ),
    // array( // Discount
    // 'app' => 'Discount',
    // 'regex' => '#^/api/discount#',
    // 'base' => $base,
    // 'sub' => include 'Discount/urls.php'
    // )
);

$api_v2 = array(
    array(
        'app' => 'Group',
        'regex' => '#^/api/v2/user/groups#',
        'base' => $base,
        'sub' => include 'Group/urls-v2.php'
    ),
    array(
        'app' => 'Role',
        'regex' => '#^/api/v2/user/roles#',
        'base' => $base,
        'sub' => include 'Role/urls-v2.php'
    ),
    array( // User Management System
        'app' => 'User',
        'regex' => '#^/api/v2/user#',
        'base' => $base,
        'sub' => include 'User/urls-v2.php'
    ),
    array( // CMS : Content Management System
        'app' => 'CMS',
        'regex' => '#^/api/v2/cms#',
        'base' => $base,
        'sub' => include 'CMS/urls-v2.php'
    )
);

/*
 * General APIs V2
 */
$api = array_merge($api, $api_v2);

/*
 * To add tenant api (in super mode or basic mode)
 */
if (SuperTenant_ConfigService::get('module.SuperTenant.enable', FALSE)) {
    array_push($api, array( // Super Tenant
        'app' => 'SuperTenant',
        'regex' => '#^/api/saas#',
        'base' => $base,
        'sub' => include 'SuperTenant/urls.php'
    ));
} else {
    array_push($api, array( // Tenant
        'app' => 'Tenant',
        'regex' => '#^/api/v2/tenant#',
        'base' => $base,
        'sub' => include 'Tenant/urls-v2.php'
    ));
}

array_push($api, array(
    'app' => 'Tenant',
    'regex' => '#^#',
    'base' => $base,
    'sub' => include 'Tenant/urls-app-v2.php'
));

return $api;


