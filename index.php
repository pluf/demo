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

require 'Pluf.php';
Pluf::start ('config.php' );
Pluf_Dispatcher::loadControllers ( 'urls.php' );
Pluf_Dispatcher::dispatch ( Pluf_HTTP_URL::getAction () );
