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

    <!-- MAIN CONTENT -->
    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> SC Dashboard </h1>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                <ul id="sparks" class="">
                    <li class="sparks-info">
                        <h5> Total Contracts Loaded <span class="txt-color-blue"><i class="fa fa-cloud-download" data-rel="bootstrap-tooltip" title="Versions"></i>&nbsp;&nbsp<?php echo count($_SESSION["adr"]); ?></span></h5>
                    </li>
                  <li class="sparks-info">
                        <h5> Total Contracts Analyzed <span class="txt-color-blue"><i class="fa fa-database" data-rel="bootstrap-tooltip" title="Versions"></i>&nbsp;&nbsp<?php echo "103251"; ?></span></h5>
                    </li>
                 <!--     
                    <li class="sparks-info">
                        <h5> Git path <span class="txt-color-purple"><i class="fa fa-code" data-rel="bootstrap-tooltip" title="Git Path"></i>&nbsp&nbsp<?php echo "<a href='" . $_SESSION["githubpath"] . "' target='_blank'>" . $_SESSION["githubpath"] . "</a>"; ?></span></h5>
                    </li>
                -->
                </ul>
            </div>
        </div>

        <div class="row">
            <article class="col-sm-12">
            <div class="well well-sm well-light padding-10">
								<h4 class="txt-color-green">Deployment GAS vs <span class="semi-bold">LOC</span> <a href="javascript:void(0);" class="pull-right txt-color-green"><i class="fa fa-refresh"></i></a></h4>  
                <div class="sparkline" 
                    data-sparkline-type="compositeline" 
                    data-sparkline-spotradius-top="5" 
                    data-sparkline-color-top="#3a6965" 
                    data-sparkline-line-width-top="3" 
                    data-sparkline-color-bottom="#2b5c59" 
                    data-sparkline-spot-color="#2b5c59" 
                    data-sparkline-minspot-color-top="#97bfbf" 
                    data-sparkline-maxspot-color-top="#c2cccc" 
                    data-sparkline-highlightline-color-top="#cce8e4" 
                    data-sparkline-highlightspot-color-top="#9dbdb9" 
                    data-sparkline-width="96%" 
                    data-sparkline-height="78px" 
                    data-sparkline-line-val="[<?php echo join(', ', $_SESSION["gas"]); ?>]" 
                    data-sparkline-bar-val="[<?php echo join(', ', $_SESSION["lloc"]); ?>]">
				</div> 	
</div>
            </article>
        </div>

             <!-- row -->
             <div class="row">
            <article class="col-sm-12">
                <!-- new widget -->
                <div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
                    <h2 style="margin-top:20px; margin-left:20px;"><span class="widget-icon"> <i class="fa fa-terminal"></i> </span>Size Metrics:</h2>	
                    <section id="widget-grid" class="">
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	
                            <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-2999" data-widget-editbutton="false">
                                <header style="margin-bottom:0px; margin-right:0px">
                                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                    <h2>Size Metrics</h2>
                                </header>
                                <div class="show-stat-microcharts" style="margin-bottom:0px">
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <ul id="sparks" class="">
                                            <li class="sparks-info">
                                                <h5> GAS </h5>
                                                <div class="sparkline txt-color-green" data-sparkline-type="line" data-sparkline-width="180px" data-fill-color="" data-sparkline-spotradius="3" data-sparkline-height="40px">
<?php echo join(', ', $_SESSION["gas"]); ?>
                                                </div>
                                            </li>
                                        </ul>	
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <ul id="sparks" class="">
                                            <li class="sparks-info">
                                                <h5> SLOC </h5>
                                                <div class="sparkline txt-color-green" data-sparkline-type="line" data-sparkline-width="180px" data-fill-color="" data-sparkline-spotradius="3" data-sparkline-height="40px">
<?php echo join(', ', $_SESSION["sloc"]); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <ul id="sparks" class="">
                                            <li class="sparks-info">
                                                <h5> LLOC </h5>
                                                <div class="sparkline txt-color-green" data-sparkline-type="line" data-sparkline-width="180px" data-fill-color="" data-sparkline-spotradius="3" data-sparkline-height="40px">
<?php echo join(', ', $_SESSION["lloc"]); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <ul id="sparks" class="">
                                            <li class="sparks-info">
                                                <h5> NF </h5>
                                                <div class="sparkline txt-color-green" data-sparkline-type="line" data-sparkline-width="180px" data-fill-color="" data-sparkline-spotradius="3" data-sparkline-height="40px">
<?php echo join(', ', $_SESSION["nf"]); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>									
                                </div>								
                            </div>
        </article>	

                        <div class="row">
                            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	

                            <!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-editbutton="false">
						<!-- widget options:
						usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

						data-widget-colorbutton="false"
						data-widget-editbutton="false"
						data-widget-togglebutton="false"
						data-widget-deletebutton="false"
						data-widget-fullscreenbutton="false"
						data-widget-custombutton="false"
						data-widget-collapsed="true"
						data-widget-sortable="false"

						-->
						<header>
							<span class="widget-icon"> <i class="fa fa-table"></i> </span>
							<h2>Size Metrics</h2>

						</header>

						<!-- widget div-->
						<div>

							<!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->

							</div>
							<!-- end widget edit box -->

							<!-- widget content -->
							<div class="widget-body no-padding">
<?php
 include ("_/php/dataclasses/_generalMetrics.php");
?>
                                        </div>
                                    </div>
                                </div>	
                            </article>

                    </section>
