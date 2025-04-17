<?php 

$host = $_SERVER['HTTP_HOST'];
$root = $_SERVER['DOCUMENT_ROOT'];

define('HOST', $host);
define('ROOT', $root);
define('CONTROLLER', $root.'/Controller');
define('MODEL', $root.'/Model');
define('VIEW', $root.'/View');
define('CONFIG', $root.'/config');
define('SRC', "http://".$host.'/src');
define('ASSETS', "http://".$host.'/assets');
define('PIC', $root .'/assets');
define('JS', $root .'/js');