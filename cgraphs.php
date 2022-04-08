<?php

session_start();
use \SmartUI\UI;
use \SmartUI\Util as SmartUtil;
use \Common\HTMLIndent;
// if (!isset($_SESSION['pname']))
   // header('Location: index.php');
//initilize the page
//initilize the page
require_once 'init.web.php';

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Correlation Analysis";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["composite"]["active"] = true;
//$page_nav["graphs"]["flot"]["active"] = true;
include("inc/nav.php");

?>

<?php

if (isset($_GET)) {

    $f = $_GET['plotoptions'];
    $rs = $_GET['rs'];
    $field1 = $_GET['field1'];
    $field2 = $_GET['field2'];
    $cmd = "Rscript -e 'x <- \"" . join(', ', $_SESSION[$f[0]]) . "\"; y <- \"" . join(', ', $_SESSION[$f[1]]) . "\"; source(\"pearson_cor.r\")'";
    $pvalue = shell_exec($cmd);
    $pvalue = substr($pvalue, 3, strlen($pvalue));

}

?>