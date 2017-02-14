<?php
define ( "PLUF_BASE", dirname ( __FILE__ ) . '/vendor/pluf/pluf/src' );
define ( "SRC_BASE", dirname ( __FILE__ ) . '/storage' );

require 'vendor/autoload.php';
require 'Pluf.php';

Pluf::start ('config.php' );
Pluf_Dispatcher::loadControllers ( 'urls.php' );
Pluf_Dispatcher::dispatch ( Pluf_HTTP_URL::getAction () );

