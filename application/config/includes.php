<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| DEFAULT INCLUDES
| -------------------------------------------------------------------------
| This file lists the css and javascript files that should be included by
| default in your views' header. Scripts in here will be loaded at your
| pages'header, not at the end of the body. Only put scripts in here if
| they are safe and essential.
|
*/
$config['cssIncludes'] = array(
    '../bootstrap-3.3.2-dist/css/bootstrap.min',
    '../font-awesome/font-awesome',
    'style',
    'profile',
    'chart'
);
$config['cssIncludesPrint'] = array(
    'style.print'
);
$config['jsIncludes'] = array(
    'jquery-1.11.2.min',
    '../bootstrap-3.3.2-dist/js/bootstrap.min',
    'gitAPI',
    'firebug',
    'trello'
);
?>
