<?php
return array(
    'debug' => false,

    'general_domain' => 'viraweb123.ir',
    'general_admin_email' => array(
        'info@viraweb123.ir'
    ),

    'installed_apps' => array(
        'Pluf',
        'User',
        'Group',
        'Role',
        'Message',
        'Monitor',
        'Tenant',
        'SuperTenant',
        'Bank',
        'CMS',
        'Seo',
        'RestLog',
        'Shop',
        'SDP',
        'Exchange'
    ),
    'spas'=> array('amh-shop', 'my-dashboard'),
    'middleware_classes' => array(
        // find tenant
        'Pluf_Middleware_TenantEmpty',
        //'Pluf_Middleware_TenantFromHeader',// It is only for development and test phases
        'Pluf_Middleware_TenantFromDomain',
        'Pluf_Middleware_TenantFromSubDomain', // It should be used only in multitenant state
        'Pluf_Middleware_TenantFromConfig',
        //'Pluf_Middleware_TenantRedirect', // It redirects to main tenant if request tenant is not valid
        // Load user and session
        'Pluf_Middleware_Session',
        'User_Middleware_BasicAuth',
        'User_Middleware_Session',
        'Pluf_Middleware_Translation',
        'Captcha_Middleware_Verifier', // Must be affter session and tenant
        'Seo_Middleware_Render',
        'Cache_Middleware_RFC7234',
        'User_Middleware_Space', // It should be one of lastest middlewares
        'RestLog_Middleware_Audit'
    ),

    'mimetypes_db' =>  '/var/www/etc/mime.types',
    'languages' => array(
        'fa',
        'en'
    ),
    'tmp_folder' =>  '/tmp',
    'template_folders' => array(
        '/var/www/storage/templates',
        '/var/www/vendor/pluf/seo/src/Seo/templates',
        '/var/www/vendor/pluf/bank/src/Bank/templates'
    ),
    'template_tags' => array(
        'now' => 'Pluf_Template_Tag_Now',
        'cfg' => 'Pluf_Template_Tag_Cfg',
        'tenant' => 'Pluf_Template_Tag_Tenant',
        'setting' => 'Tenant_Template_Tag_Setting'
    ),
    'upload_path' =>  '/var/www/storage',
    'upload_max_size' => 524288000,
    'time_zone' => 'Asia/Tehran',
    'encoding' => 'UTF-8',

    'secret_key' => '5a8d7e0f2aad8bdab8f6eef725412850',
    'user_account_auto_activate' => true,
    'user_avatra_max_size' => 2097152,
    'log_delayed' => true,
    'log_handler' => 'Pluf_Log_File',
    'log_level' => Pluf_Log::ERROR,
    'pluf_log_file' => '/var/www/logs/pluf.log',

    'db_engine' => 'MySQL',
    'db_version' => '5.5.33',
    'db_login' => 'pluf',
    'db_password' => 'password',
    'db_server' => 'mysql',
    'db_database' => 'plufdb',
    'db_table_prefix' => '',

    'mail_backend' => 'mail',

    'user_profile_class' => 'User_Profile',

    'subdomain_min_length' => 5,
    'reserved_subdomains' => array(
        'www',
        'blog',
        'developer',
        'developers',
        'market',
        'marketplace'
    ),
    'tenant_default' => 'www',
    'multitenant' => true,
    'bank_debug' => false,
    'migrate_allow_web' => false,

    'orm.typecasts' => array(
        'Geo_DB_Field_Polygon' => array(
            'Geo_DB_GeometryFromDb',
            'Geo_DB_PolygonToDb'
        ),
        'Geo_DB_Field_Geometry' => array(
            'Geo_DB_GeometryFromDb',
            'Geo_DB_GeometryToDb'
        ),
        'Geo_DB_Field_Point' => array(
            'Geo_DB_GeometryFromDb',
            'Geo_DB_PointToDb'
        )
    ),

    'marketplace.backend' => 'http://marketplace.viraweb123.ir',

    // -------------------------------------------------------------
    // SEO
    // -------------------------------------------------------------
    'seo.prerender.global.url' => 'http://prerender:3000',
    'seo.prerender.global.token' => 'no-need',

    'seo.prerender.default.enable' => true,
    'seo.prerender.default.engine' => 'global',
    'seo.prerender.default.period' => '+7 days',
    'seo.prerender.default.pattern' => '.*',
);

