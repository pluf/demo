<?php

// TODO: Hadi - 1396-04-23: This code should be move to an appropriate place.
Pluf::loadFunction('Geo_DB_PointToDB');
return array(
    'general_domain' => 'digidoki.com',
    'general_admin_email' => array(
        'info@digidoki.com'
    ),
    'general_from_email' => 'info@digidoki.com',
    'general_new_request_mail_title' => 'DigiDoki Request',
    'installed_apps' => array(
        'Pluf',
        'User',
        'Group',
        'Role',
        'Tenant',
        'CMS',
        'Bank',
        'Config',
        'Setting',
        'Spa',
        'Calendar',
        'Monitor',
        'SDP',
        'Message',
        'Book',
        'Backup',
        'Seo',
        'Collection',
        'Assort',
        'RestLog',
        'Shop',
        'Marketplace'
    ),
    'middleware_classes' => array(
        'Pluf_Middleware_Session',
        'Pluf_Middleware_BasicAuth',
        'Pluf_Middleware_Translation',
        'Pluf_Middleware_TenantEmpty',
        'Pluf_Middleware_TenantFromHeader',
        'Pluf_Middleware_TenantFromDomain',
        	'Pluf_Middleware_TenantFromSubDomain', // It should be used only in multitenant state
        'Pluf_Middleware_TenantFromConfig',
        'Seo_Middleware_Render',
        'Cache_Middleware_RFC7234',
        'RestLog_Middleware_Audit'
    ),
    'debug' => true,
    
    'mimetypes_db' => SRC_BASE . '/etc/mime.types',
    'languages' => array(
        'fa',
        'en'
    ),
    'tmp_folder' => SRC_BASE . '/var/tmp',
    'template_folders' => array(
        SRC_BASE . '/templates',
        dirname(__FILE__) . '/vendor/pluf/seo/src/Seo/templates'
    ),
    'template_tags' => array(
        'now' => 'Pluf_Template_Tag_Now',
        'cfg' => 'Pluf_Template_Tag_Cfg'
    ),
    'upload_path' => SRC_BASE . '/tenant',
    'upload_max_size' => 52428800,
    'time_zone' => 'Asia/Tehran',
    'encoding' => 'UTF-8',
    
    'secret_key' => '5a8d7e0f2aad8bdab8f6eef725412850',
    'user_signup_active' => true,
    'user_avatar_default' => SRC_BASE . '/var/avatar.svg',
    'user_avatra_max_size' => 2097152,
    'auth_backends' => array(
        'Pluf_Auth_ModelBackend'
    ),
    'pluf_use_rowpermission' => true,
    'log_delayed' => true,
    'log_handler' => 'Pluf_Log_File',
    'log_level' => Pluf_Log::ERROR,
    'pluf_log_file' => SRC_BASE . '/var/logs/pluf.log',
    
    'db_engine' => 'MySQL',
    
    'db_version' => '5.5.33',
    'db_login' => 'root',
    'db_password' => '',
    'db_server' => 'localhost',
    'db_database' => 'test',
    'db_table_prefix' => '',
    
    'mail_backend' => 'mail',
    
    'user_profile_class' => 'User_Profile',
    
    'tenant_default' => 'www',
    'multitenant' => true,
    'bank_debug' => false,
    'migrate_allow_web' => true,
    
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
    )
);

