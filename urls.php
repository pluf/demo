<?php
$base = '';

/*
 * Old APIs
 */
$api_old = array(
    
    // // Note: Hadi, 1397-03-07: Modules are added as basic

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

/*
 * Basic API-V2
 */
$api_v2 = array(
    array( // Tenant
        'app' => 'Tenant',
        'regex' => '#^/api/v2/tenant#',
        'base' => $base,
        'sub' => include 'Tenant/urls-v2.php'
    ),
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
    array(
        'app' => 'Message',
        'regex' => '#^/api/v2/user/messages#',
        'base' => $base,
        'sub' => include 'Message/urls-v2.php'
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
    ),
    array( // Monitors
        'app' => 'Monitor',
        'regex' => '#^/api/v2/monitor#',
        'base' => $base,
        'sub' => include 'Monitor/urls-v2.php'
    ),
    array( // Seo
        'app' => 'Seo',
        'regex' => '#^/api/v2/seo#',
        'base' => $base,
        'sub' => include 'Seo/urls-v2.php'
    ),
    array( // Bank
        'app' => 'Bank',
        'regex' => '#^/api/v2/bank#',
        'base' => $base,
        'sub' => include 'Bank/urls.php'
    ),
    array( // Shop
        'app' => 'Shop',
        'regex' => '#^/api/v2/shop#',
        'base' => $base,
        'sub' => include 'Shop/urls.php'
    ),
    array( // SDP
        'app' => 'SDP',
        'regex' => '#^/api/v2/sdp#',
        'base' => $base,
        'sub' => include 'SDP/urls.php'
    ),
    array( // Exchange
        'app' => 'Exchange',
        'regex' => '#^/api/v2/exchange#',
        'base' => $base,
        'sub' => include 'Exchange/urls.php'
    )
);

/*
 * Optional API-V2
 */
$api_v2_optional = array(
    array( // Marketplace
        'app' => 'Marketplace',
        'regex' => '#^/api/v2/marketplace#',
        'base' => $base,
        'sub' => include 'Marketplace/urls-v2.php'
    ),
    array( // Super Tenant
        'app' => 'SuperTenant',
        'regex' => '#^/api/v2/super-tenant#',
        'base' => $base,
        'sub' => include 'SuperTenant/urls-v2.php'
    ),
    array( // TMS
        'app' => 'TMS',
        'regex' => '#^/api/v2/tms#',
        'base' => $base,
        'sub' => include 'TMS/urls-v2.php'
    )
);

foreach ($api_v2_optional as $moduleApi) {
    if (SuperTenant_ConfigService::get('module.' . $moduleApi['app'] . '.enable', FALSE)) {
        array_push($api_v2, $moduleApi);
    }
}

/*
 * API to load SPAs. It should be last API.
 */
array_push($api_v2, array( // Loading SPAs
    'app' => 'Tenant',
    'regex' => '#^#',
    'base' => $base,
    'sub' => include 'Tenant/urls-app-v2.php'
));

/*
 * Merge old and new APIs.
 */
$api = array_merge($api_old, $api_v2);

return $api;


