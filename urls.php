<?php
$base = '';

/*
 * General apis
 */
$api = array(
    array(
        'app' => 'User',
        'regex' => '#^/api/user#',
        'base' => $base,
        'sub' => include 'User/urls.php'
    ),
    array(
        'app' => 'Group',
        'regex' => '#^/api/group#',
        'base' => $base,
        'sub' => include 'Group/urls.php'
    ),
    array(
        'app' => 'Role',
        'regex' => '#^/api/role#',
        'base' => $base,
        'sub' => include 'Role/urls.php'
    ),
    array( // CMS : Content Management System
        'app' => 'CMS',
        'regex' => '#^/api/cms#',
        'base' => $base,
        'sub' => include 'CMS/urls.php'
    ),
    array(
        'app' => 'Spa',
        'regex' => '#^/api/spa#',
        'base' => $base,
        'sub' => include 'Spa/urls.php'
    ),
    array(
        'app' => 'Spa',
        'regex' => '#^/api/repository#',
        'base' => $base,
        'sub' => include 'Spa/urls-repository.php'
    ),
    array(
        'app' => 'Message',
        'regex' => '#^/api/message#',
        'base' => $base,
        'sub' => include 'Message/urls.php'
    ),
//     array( // NOTE: this will remove in next version
//         'app' => 'Tenant',
//         'regex' => '#^/api/setting#',
//         'base' => $base,
//         'sub' => include 'Tenant/urls-setting-legacy.php'
//     ),
    array( // Seo
        'app' => 'Seo',
        'regex' => '#^/api/seo#',
        'base' => $base,
        'sub' => include 'Seo/urls-seen-v1.php'
    ),
    array(
        'app' => 'Assort',
        'regex' => '#^/api/assort#',
        'base' => $base,
        'sub' => include 'Assort/urls.php'
    ),
    array(
        'app' => 'Monitor',
        'regex' => '#^/api/monitor#',
        'base' => $base,
        'sub' => include 'Monitor/urls.php'
    ),
    
    // Note: Hadi, 1397-03-07: Modules are added as basic
    
    array(
        'app' => 'SDP',
        'regex' => '#^/api/sdp#',
        'base' => $base,
        'sub' => include 'SDP/urls.php'
    ),
    array( // Bank
        'app' => 'Bank',
        'regex' => '#^/api/bank#',
        'base' => $base,
        'sub' => include 'Bank/urls.php'
    ),
    array(
        'app' => 'Collection',
        'regex' => '#^/api/collection#',
        'base' => $base,
        'sub' => include 'Collection/urls.php'
    ),
    array( // Discount
        'app' => 'Discount',
        'regex' => '#^/api/discount#',
        'base' => $base,
        'sub' => include 'Discount/urls.php'
    ),
);


/*
 * General APIs V2
 */
array_push($api, array (
    'app' => 'User',
    'regex' => '#^/api/v2/user#',
    'base' => $base,
    'sub' => include 'User/urls-v2.php'
));

/*
 * Special apis
 */
$spec = array(
//     array(
//         'app' => 'Book',
//         'regex' => '#^/api/wiki#',
//         'base' => $base,
//         'sub' => include 'Book/urls.php'
//     ),
//     array(
//         'app' => 'SaaSDM',
//         'regex' => '#^/api/dm#',
//         'base' => $base,
//         'sub' => include 'SaaSDM/urls.php'
//     ),

//     array( // Tenant configuration
//         'app' => 'Config',
//         'regex' => '#^/api/config#',
//         'base' => $base,
//         'sub' => include 'Config/urls.php'
//     ),

//     array( // Book
//         'app' => 'Book',
//         'regex' => '#^/api/book#',
//         'base' => $base,
//         'sub' => include 'Book/urls.php'
//     ),
//     array( // Calender
//         'app' => 'Calendar',
//         'regex' => '#^/api/calendar#',
//         'base' => $base,
//         'sub' => include 'Calendar/urls.php'
//     ),
//     array( // Backup
//         'app' => 'Backup',
//         'regex' => '#^/api/backup#',
//         'base' => $base,
//         'sub' => include 'Backup/urls.php'
//     ),
   
//     array(
//         'app' => 'Marketplace',
//         'regex' => '#^/api/marketplace#',
//         'base' => $base,
//         'sub' => include 'Marketplace/urls.php'
//     ),
   
    array ( // ELearn
        'app' => 'ELearn',
        'regex' => '#^/api/elearn#',
        'base' => $base,
        'sub' => include 'ELearn/urls.php'
    ),
    array ( // Shop
        'app' => 'Shop',
        'regex' => '#^/api/shop#',
        'base' => $base,
        'sub' => include 'Shop/urls.php'
    ),
    array ( // Mall
        'app' => 'Mall',
        'regex' => '#^/api/mall#',
        'base' => $base,
        'sub' => include 'Mall/urls.php'
    ),
);

foreach ($spec as $moduleApi) {
    if (SuperTenant_ConfigService::get('module.' . $moduleApi['app'] . '.enable', FALSE)) {
        array_push($api, $moduleApi);
    }
}

/*
 * To add tenant api (in super mode or basic mode)
 */
if (SuperTenant_ConfigService::get('module.SuperTenant.enable', FALSE)) {
	array_push($api, array ( // Super Tenant
		'app' => 'SuperTenant',
		'regex' => '#^/api/saas#',
		'base' => $base,
		'sub' => include 'SuperTenant/urls.php'
	));
} else {
	array_push($api, array ( // Tenant
		'app' => 'Tenant',
		'regex' => '#^/api/saas#',
		'base' => $base,
		'sub' => include 'Tenant/urls.php'
	));
}


array_push($api, array(
    'app' => 'Spa',
    'regex' => '#^#',
    'base' => $base,
    'sub' => include 'Spa/urls-app2.php'
));


return $api;


