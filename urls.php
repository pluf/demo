<?php
$base = '';

/*
 * General apis
 */
$api = array(
        array (
                'app' => 'User',
                'regex' => '#^/api/user#',
                'base' => $base,
                'sub' => include 'User/urls.php'
        ),
        array (
                'app' => 'Group',
                'regex' => '#^/api/group#',
                'base' => $base,
                'sub' => include 'Group/urls.php'
        ),
        array (
                'app' => 'Role',
                'regex' => '#^/api/role#',
                'base' => $base,
                'sub' => include 'Role/urls.php'
        ),
        array ( // CMS : Content Management System
                'app' => 'CMS',
                'regex' => '#^/api/cms#',
                'base' => $base,
                'sub' => include 'CMS/urls.php'
        ),
        array (
                'app' => 'Spa',
                'regex' => '#^/api/spa#',
                'base' => $base,
                'sub' => include 'Spa/urls.php'
        ),
        array (
                'app' => 'Message',
                'regex' => '#^/api/message#',
                'base' => $base,
                'sub' => include 'Message/urls.php'
        ),
        array ( // Tenant configuration
                'app' => 'Setting',
                'regex' => '#^/api/setting#',
                'base' => $base,
                'sub' => include 'Setting/urls.php'
        ),
        array ( // Seo
                'app' => 'Seo',
                'regex' => '#^/api/seo#',
                'base' => $base,
                'sub' => include 'Seo/urls-seen-v1.php'
        ),
        array (
                'app' => 'Assort',
                'regex' => '#^/api/assort#',
                'base' => $base,
                'sub' => include 'Assort/urls.php'
        ),
        
);

/*
 * Special apis
 */
$spec = array(
        array (
                'app' => 'Tenant',
                'regex' => '#^/api/tenant#',
                'base' => $base,
                'sub' => include 'Tenant/urls.php'
        ),
        array (
                'app' => 'Book',
                'regex' => '#^/api/wiki#',
                'base' => $base,
                'sub' => include 'Book/urls.php'
        ),
        array (
                'app' => 'Monitor',
                'regex' => '#^/api/monitor#',
                'base' => $base,
                'sub' => include 'Monitor/urls.php'
        ),
        array (
                'app' => 'SaaSDM',
                'regex' => '#^/api/dm#',
                'base' => $base,
                'sub' => include 'SaaSDM/urls.php'
        ),
        array (
                'app' => 'SDP',
                'regex' => '#^/api/sdp#',
                'base' => $base,
                'sub' => include 'SDP/urls.php'
        ),
        array ( // Tenant configuration
                'app' => 'Config',
                'regex' => '#^/api/config#',
                'base' => $base,
                'sub' => include 'Config/urls.php'
        ),
        array ( // Bank
                'app' => 'Bank',
                'regex' => '#^/api/bank#',
                'base' => $base,
                'sub' => include 'Bank/urls.php'
        ),
        array ( // Book
                'app' => 'Book',
                'regex' => '#^/api/book#',
                'base' => $base,
                'sub' => include 'Book/urls.php'
        ),
        array ( // Calender
                'app' => 'Calendar',
                'regex' => '#^/api/calendar#',
                'base' => $base,
                'sub' => include 'Calendar/urls.php'
        ),
        array ( // Backup
                'app' => 'Backup',
                'regex' => '#^/api/backup#',
                'base' => $base,
                'sub' => include 'Backup/urls.php'
        ),
        array (
                'app' => 'Collection',
                'regex' => '#^/api/collection#',
                'base' => $base,
                'sub' => include 'Collection/urls.php'
        ),
        array (
                'app' => 'Spa',
                'regex' => '#^#',
                'base' => $base,
                'sub' => include 'Spa/urls-app2.php'
        )
);

foreach ($spec as $moduleApi){
    if(Config_Service::get('module.'.$moduleApi['app'].'.enable', FALSE)){
        array_push($api, $moduleApi);
    }
}

return $api;


