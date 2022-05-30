<?php

// if (!session_id()) session_start();

require_once 'init.php';

//CONFIGURATION for SmartAdmin UI

//ribbon breadcrumbs config
//array("Display Name" => "URL");
$breadcrumbs = array(
    "Home" => APP_URL
);

/*navigation array config

ex:
"dashboard" => array(
    "title" => "Display Title",
    "url" => "http://yoururl.com",
    "url_target" => "_self",
    "icon" => "fa-home",
    "label_htm" => "<span>Add your custom label/badge html here</span>",
    "sub" => array() //contains array of sub items with the same format as the parent
)

*/
$page_nav = array(
    "home" => array(
        "title" => "Home",
        "url" => APP_URL."/index.php",
        "icon" => "fa-home"
    ),
    "sm" => array(
        "title" => "Software Metrics",
        "icon" => "fa-code",
        "sub" => array(
            "size" => array(
                "title" => "Size Metrics",
                "url" => APP_URL."/size-metrics.php"
            ),
            "complexity" => array(
                "title" => "Complexity Metrics",
                "url" => APP_URL."/complexity-metrics.php"
            ),
            "oo" => array(
                "title" => "Object Oriented Metrics",
                "url" => APP_URL."/oo-metrics.php"
            )
        )
    ),
    "ca" => array(
        "title" => "Correlation Analysis",
        "url" => APP_URL."/cgraphs.php",
        "icon" => "fa-random"
    ),
    "sa" => array(
        "title" => "Search",
        "url" => APP_URL."/search.php",
        "icon" => "fa-search"
    ),
    "Documentation" => array(
        "title" => "Documentation",
        "url" => APP_URL."/Documentation",
        "icon" => "fa-pencil-square-o (alias)"
    ),
    "About" => array(
        "title" => "About",
        "url" => APP_URL."/about.php",
        "icon" => "fa-institution (alias)"
    )
);

//configuration variables
$page_title = "";
$page_css = array();
$no_main_header = false; //set true for lock.php and login.php
$page_body_prop = array(); //optional properties for <body>
$page_html_prop = array(); //optional properties for <html>
?>