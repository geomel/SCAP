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

$page_title = "Blank Page";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["dashboard"]["sub"]["social"]["active"] = true;
include("inc/nav.php");
?>

<div id="main" role="main">
<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		$breadcrumbs["Misc"] = "";
		include("inc/ribbon.php");
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
 <!--
        <div class="well well-sm">
				<div class="input-group">
                
					<input class="form-control input-lg" type="text" id="fa-icon-search" placeholder="Search a Smart Contract Address...">
					<span class="input-group-addon"><i class="fa fa-fw fa-lg fa-search"></i></span>
             
             
				</div>
		</div>
   -->
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



  <!-- row -->
  <div class="row">
            <article class="col-sm-12">
                <!-- new widget -->
                <div class="jarviswidget" id="wid-id-1" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
                    <h2 style="margin-top:20px; margin-left:20px;"><span class="widget-icon"> <i class="fa fa-terminal"></i> </span>Code Metrics:</h2>	
                    <section id="widget-grid" class="">
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	
                            <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-2999" data-widget-editbutton="false">
                                <header style="margin-bottom:0px; margin-right:0px">
                                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                    <h2>Code Metrics</h2>
                                </header>
                                <div class="show-stat-microcharts" style="margin-bottom:0px">
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <ul id="sparks" class="">
                                            <li class="sparks-info">
                                                <h5>WMC</h5>
                                                <div class="sparkline txt-color-green" data-sparkline-type="line" data-sparkline-width="180px" data-fill-color="" data-sparkline-spotradius="3" data-sparkline-height="40px">
<?php echo join(', ', $_SESSION["wmc"]); ?>
                                                </div>
                                            </li>
                                        </ul>	
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <ul id="sparks" class="">
                                            <li class="sparks-info">
                                                <h5> NL </h5>
                                                <div class="sparkline txt-color-green" data-sparkline-type="line" data-sparkline-width="180px" data-fill-color="" data-sparkline-spotradius="3" data-sparkline-height="40px">
<?php echo join(', ', $_SESSION["nl"]); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <ul id="sparks" class="">
                                            <li class="sparks-info">
                                                <h5> NLE </h5>
                                                <div class="sparkline txt-color-green" data-sparkline-type="line" data-sparkline-width="180px" data-fill-color="" data-sparkline-spotradius="3" data-sparkline-height="40px">
<?php echo join(', ', $_SESSION["nle"]); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <ul id="sparks" class="">
                                            <li class="sparks-info">
                                                <h5> NA </h5>
                                                <div class="sparkline txt-color-green" data-sparkline-type="line" data-sparkline-width="180px" data-fill-color="" data-sparkline-spotradius="3" data-sparkline-height="40px">
<?php echo join(', ', $_SESSION["na"]); ?>
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
							<h2>Code Metrics</h2>

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
    include ("_/php/dataclasses/_codeMetrics.php");
?>
<?php
//include ("_/php/dataclasses/_graphBasedMetrics.php");
?>
                                </div>
                            </div>
                        </div>	
                    </article>
                    <div class="jarviswidget" id="wid-id-2" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
                    <h2 style="margin-top:20px; margin-left:20px;"><span class="widget-icon"> <i class="fa fa-terminal"></i> </span>Quality Metrics:</h2>	
                    <section id="widget-grid" class="">
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	
                            <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-2999" data-widget-editbutton="false">
                                <header style="margin-bottom:0px; margin-right:0px">
                                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                    <h2>Code Metrics</h2>
                                </header>
                                <div class="show-stat-microcharts" style="margin-bottom:0px">
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <ul id="sparks" class="">
                                            <li class="sparks-info">
                                                <h5>DIT</h5>
                                                <div class="sparkline txt-color-green" data-sparkline-type="line" data-sparkline-width="180px" data-fill-color="" data-sparkline-spotradius="3" data-sparkline-height="40px">
<?php echo join(', ', $_SESSION["dit"]); ?>
                                                </div>
                                            </li>
                                        </ul>	
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <ul id="sparks" class="">
                                            <li class="sparks-info">
                                                <h5> NOA </h5>
                                                <div class="sparkline txt-color-green" data-sparkline-type="line" data-sparkline-width="180px" data-fill-color="" data-sparkline-spotradius="3" data-sparkline-height="40px">
<?php echo join(', ', $_SESSION["noa"]); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <ul id="sparks" class="">
                                            <li class="sparks-info">
                                                <h5> NOD </h5>
                                                <div class="sparkline txt-color-green" data-sparkline-type="line" data-sparkline-width="180px" data-fill-color="" data-sparkline-spotradius="3" data-sparkline-height="40px">
<?php echo join(', ', $_SESSION["nod"]); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <ul id="sparks" class="">
                                            <li class="sparks-info">
                                                <h5> CBO </h5>
                                                <div class="sparkline txt-color-green" data-sparkline-type="line" data-sparkline-width="180px" data-fill-color="" data-sparkline-spotradius="3" data-sparkline-height="40px">
<?php echo join(', ', $_SESSION["cbo"]); ?>
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
							<h2>Code Metrics</h2>

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
include ("_/php/dataclasses/_softwareMetrics.php");
?>
                                            </div>
                                        </div>
                                    </div>	
                                </article>
                </div>
        </div>
        <!-- end row -->



    

        <div class='row'>
            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                <div class='well well-sm'>
                    <!-- Timeline Content -->
                    <div class='smart-timeline'>
                        <ul class='smart-timeline-list'>
<?php ?>
                        </ul>
                    </div>
                    <!-- END Timeline Content -->
                </div>		
            </div>		
        </div>


    </div>	

<?php
//include required scripts 
include("inc/scripts.php");
?>


    <script type="text/javascript">
        $(document).ready(function () {
            refreshTimeLine();
        

            /* END TABLE TOOLS */

        })

        function refreshTimeLine() {
            $('#ajax-timeline').load('_/php/_timeline.php', function () {
                // setTimeout(refreshTimeLine, 5000);
            });

        }
    </script>		


<?php
//include footer
include("inc/footer.php");
?>
	
<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.colVis.min.js"></script>
<!-- <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.tableTools.min.js"></script> -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {

	/* // DOM Position key index //

	l - Length changing (dropdown)
	f - Filtering input (search)
	t - The Table! (datatable)
	i - Information (records)
	p - Pagination (paging)
	r - pRocessing
	< and > - div elements
	<"#id" and > - div with an id
	<"class" and > - div with a class
	<"#id.class" and > - div with an id and class

	Also see: http://legacy.datatables.net/usage/features
	*/

	/* BASIC ;*/
		var responsiveHelper_dt_basic = undefined;
		var responsiveHelper_datatable_fixed_column = undefined;
		var responsiveHelper_datatable_col_reorder = undefined;
		var responsiveHelper_datatable_tabletools = undefined;

		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};

		$('#dt_basic').dataTable({
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
				"t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_basic) {
					responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_dt_basic.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_dt_basic.respond();
			}
		});

	/* END BASIC */

	/* COLUMN FILTER  */
    var otable = $('#datatable_fixed_column').DataTable({
    	//"bFilter": false,
    	//"bInfo": false,
    	//"bLengthChange": false
    	//"bAutoWidth": false,
    	//"bPaginate": false,
    	//"bStateSave": true // saves sort state using localStorage
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
				"t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		"autoWidth" : true,
		"preDrawCallback" : function() {
			// Initialize the responsive datatables helper once.
			if (!responsiveHelper_datatable_fixed_column) {
				responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
			}
		},
		"rowCallback" : function(nRow) {
			responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
		},
		"drawCallback" : function(oSettings) {
			responsiveHelper_datatable_fixed_column.respond();
		}

    });

    // custom toolbar
    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');

    // Apply the filter
    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {

        otable
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();

    } );
    /* END COLUMN FILTER */

	/* COLUMN SHOW - HIDE */
	$('#datatable_col_reorder').dataTable({
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
				"t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
		"autoWidth" : true,
		"preDrawCallback" : function() {
			// Initialize the responsive datatables helper once.
			if (!responsiveHelper_datatable_col_reorder) {
				responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
			}
		},
		"rowCallback" : function(nRow) {
			responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
		},
		"drawCallback" : function(oSettings) {
			responsiveHelper_datatable_col_reorder.respond();
		}
	});

	/* END COLUMN SHOW - HIDE */

	/* TABLETOOLS */
	$('#datatable_tabletools').dataTable({

		// Tabletools options:
		//   https://datatables.net/extensions/tabletools/button_options
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'B>r>"+
				"t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
	    "buttons": [
	        { extend: 'copy', className: 'btn btn-default' },
	        { extend: 'csv', className: 'btn btn-default' },
	        { extend: 'excel', className: 'btn btn-default' },
	        { extend: 'pdf', className: 'btn btn-default' },
	        { extend: 'print', className: 'btn btn-default' },
	    ],
		"autoWidth" : true,
		"preDrawCallback" : function() {
			// Initialize the responsive datatables helper once.
			if (!responsiveHelper_datatable_tabletools) {
				responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
			}
		},
		"rowCallback" : function(nRow) {
			responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
		},
		"drawCallback" : function(oSettings) {
			responsiveHelper_datatable_tabletools.respond();
		}
	});

	/* END TABLETOOLS */

})

</script>