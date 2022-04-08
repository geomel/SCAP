<?php
session_start();

use \SmartUI\UI;
use \SmartUI\Util as SmartUtil;
use \Common\HTMLIndent;
// if (!isset($_SESSION['pname']))
   // header('Location: index.php');
require_once 'init.web.php';


$page_title = "Blank Page";

/* ---------------- END PHP Custom Scripts ------------- */


$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["dashboard"]["sub"]["social"]["active"] = true;
include("inc/nav.php");
?>