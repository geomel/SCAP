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

$page_title = "Complexity Metrics";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["sm"]["sub"]["complexity"]["active"] = true;
include("inc/nav.php");
?>

<div id="main" role="main"> 
<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		$breadcrumbs["Software Metrics"] = "";
		include("inc/ribbon.php");
	?>

    <!-- MAIN CONTENT -->
    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Complexity Metrics </h1>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                <ul id="sparks" class="">
              
                    <li class="sparks-info">
                        <h5> Contracts Loaded <span class="txt-color-blue"><i class="fa fa-cloud-download" data-rel="bootstrap-tooltip" title="Versions"></i>&nbsp;&nbsp<?php echo count($_SESSION["adr"]); ?></span></h5>
                    </li>
                  <li class="sparks-info">
                        <h5> Total Contracts Analyzed <span class="txt-color-blue"><i class="fa fa-database" data-rel="bootstrap-tooltip" title="Versions"></i>&nbsp;&nbsp<?php echo "90320"; ?></span></h5>
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
			<div class="col-sm-12">
				
				<div class="well">
					
					<h1><span class="semi-bold">SCAP</span> <i class="ultra-light"></i> (Smart Contracts Analysis Platform) <sup class="badge bg-color-red bounceIn animated">v 1.0</sup> <br>
						<small class="text-danger slideInRight fast animated"><strong><a href="https://se.uom.gr" target="_blank">By the Software Engineering Group</a>  <a href="www.uom.gr" target="_blank"> @ UoM</a></strong></small></h1>
					
					<p>SCAP was created to facilitate the analysis of Smart Contracts from a software quality and gas efficiency perspective.
                        We have implemented a public repository of Solidity SC metrics accessible via a public REST API along with a web based client,
                        where researchers can easily examine a massive number of smart contracts metrics with various charts and correlation diagrams.
                    <p>
                        Smart Contracts are computer programs that run on blockchains and can be executed automatically in a deterministic way when predetermined conditions are met.
                        Ethereum which today is the biggest blockchain network with thousands of Solidity based smart contracts <a href="https://dune.com/embeds/329/515/RqqCse8wDeW3MZKeZFOab2Ju8QA5Q8Itnr1cbLgk" target="_blank" class="semi-bold" rel="popover-hover" data-placement="bottom" data-content="https://dune.com/embeds/329/515/RqqCse8wDeW3MZKeZFOab2Ju8QA5Q8Itnr1cbLgk"> deployed every month</a>, uses a system of Gas to evaluate
                         the limited space on each new block of Ethereum. A Gas cost is assigned to each calculation operation that alters the blockchains’ state based on its size and complexity. 
				</div>

				
			</div>
	</div>



        <div class="row">
            
        </div>

        
        <!-- row -->
        <div class="row">
            <article class="col-sm-12">
                <!-- new widget -->
                <div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
                    <section id="widget-grid" class="">
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	
                            <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-2999" data-widget-editbutton="false">
                                <header style="margin-bottom:0px; margin-right:0px">
                                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                    <h2>Complexity Metrics</h2>
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
                                                <h5> NOI </h5>
                                                <div class="sparkline txt-color-green" data-sparkline-type="line" data-sparkline-width="180px" data-fill-color="" data-sparkline-spotradius="3" data-sparkline-height="40px">
<?php echo join(', ', $_SESSION["noi"]); ?>
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
							<h2>Complexity Metrics</h2>

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
 include ("_/php/dataclasses/_complexityMetrics.php");
?>
                                        </div>
                                    </div>
                                </div>	
                            </article>

                    </section>



  <!-- row -->

  			<div class="row">
			
				<div id="charts_area">
				
				</div>
				
			</div>		


    </div>	


<?php
//include required scripts 
include("inc/scripts.php");
?>


<script src="_/js/_loadDataset.js"></script>

<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.resize.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.fillbetween.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.orderBar.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.pie.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.tooltip.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.categories.js"></script>

<script type="text/javascript">

// PAGE RELATED SCRIPTS

	/* chart colors default */
	var $chrt_border_color = "#efefef";
	var $chrt_grid_color = "#DDD"
	var $chrt_main = "#E24913";
	/* red       */
	var $chrt_second = "#6595b4";
	/* blue      */
	var $chrt_third = "#FF9F01";
	/* orange    */
	var $chrt_fourth = "#7e9d3a";
	/* green     */
	var $chrt_fifth = "#BD362F";
	/* dark red  */
	var $chrt_mono = "#000";
	
	
	//php to Javascript array Variables
		//var versionsArray = new Array();
		var	nodesArray = new Array();
		var	edgesArray = new Array();
		var	diameterArray = new Array();
		var	ccArray = new Array();
		var	versionsArray = new Array();
		var edgesToNew = new Array();
		var edgesBtwnExisting = new Array();
		var edgesBtwnNew = new Array();
		var deletedEdges = new Array();
		var edgesToExisting = new Array();

 function php2Js(){
	<?php
			
			foreach($_SESSION['wmc'] as $key=>$value){
				echo "wmcArray[".$key."]=".$value.";";
			}
			foreach($_SESSION['nl'] as $key=>$value){
				echo "nlArray[".$key."]=".$value.";";
			}
			foreach($_SESSION['nle'] as $key=>$value){
				echo "nleArray[".$key."]=".$value.";";
			}
			foreach($_SESSION['noi'] as $key=>$value){
				echo "noiArray[".$key."]=".$value.";";
			}
		/*	
			foreach($_SESSION['edgesToNew'] as $key=>$value){
				echo "edgesToNew[".$key."]=".$value.";";
			}
			foreach($_SESSION['edgesBtwnExisting'] as $key=>$value){
				echo "edgesBtwnExisting[".$key."]=".$value.";";
			}
			foreach($_SESSION['edgesBtwnNew'] as $key=>$value){
				echo "edgesBtwnNew[".$key."]=".$value.";";
			}
			foreach($_SESSION['deletedEdges'] as $key=>$value){
				echo "deletedEdges[".$key."]=".$value.";";
			}			
			foreach($_SESSION['edgesToExisting'] as $key=>$value){
				echo "edgesToExisting[".$key."]=".$value.";";
			}
		*/	
			$js_array = $_SESSION['adr'];
			echo "versions_array = ". $js_array . ";\n";
			
	?>
 }


 function createJSTableDataForGraphs(networkData){
		var j = 0;
		csvData ="";
	tableData = new Array(<?php echo count($_SESSION["versions_array"]) ?>);
	for (i = 0; i < tableData.length; ++i)
		tableData [i] = new Array(2);
	for(i=0; i<tableData.length;i++){
			tableData[j][0] = versions_array[i];
			tableData[j][1] = networkData[i];
			csvData += tableData[j][0] + "," + tableData[j][1] + "\n";
			j++;
	}	
		// networkPropertiesOverTime();
 }
 
 function addCharts(chartid, title, drawgraphid){

		var content = " <article class='col-xs-12 col-sm-12 col-md-12 col-lg-12'> " +
					  "	<div class='jarviswidget' id='wid-id-"+chartid+"' data-widget-editbutton='false'> " +
					  "	<header>" +
					  "		<span class='widget-icon'> <i class='fa fa-bar-chart-o'></i> </span>" +
					  "		<h2>"+title+"</h2> " +
					  "	</header> " +
					  "	<div> " +
					  "		<div class='jarviswidget-editbox'> " +
					  "		</div> " +
					  "		<div class='widget-body no-padding'> " +
					  "			<div id='"+drawgraphid+"' class='chart'></div> " +
					  "		</div> " +
					  "	</div> " +
					  "	</div> " +
					  "	</article>	";
			$( "#charts_area" ).append(content);		  

	}	

	function drawLinePlot(flag, ydata){
			// var d=tableData
			
			var options = {
				xaxis : {
					mode : "categories",
					tickLength : 10
				},
				series : {
					lines : {
						show : true,
						lineWidth : 2,
						fill : true,
						fillColor : {
							colors : [{
								opacity : 0.2
							}, {
								opacity : 0.15
							}]
						}
					},
					points: { show: true },
					shadowSize : 2
				},
				selection : {
					mode : "x"
				},
				grid : {
					hoverable : true,
					clickable : true,
					tickColor : $chrt_border_color,
					borderWidth : 0,
					borderColor : $chrt_border_color,
				},
				tooltip : true,
				tooltipOpts : {
					content : "<span>%y</span> "+ydata,
					
					defaultTheme : false
				},
				colors : [$chrt_second],

			};
				switch(flag) {
						case "1":
							var nodes_plot = $.plot($("#nodeschart"), [tableData], options);
							break;
						case "2":
							var edges_plot = $.plot($("#edgeschart"), [tableData], options);
							break;
						case "3":
							var diameter_plot = $.plot($("#diameterchart"), [tableData], options);
							break;	
						case "4":
							var cc_plot = $.plot($("#ccchart"), [tableData], options);
							break;
						case "5":
							var e2n_plot = $.plot($("#edgesToNewchart"), [tableData], options);
							break;
						case "6":
							var ebtwne_plot = $.plot($("#edgesBtwnExistingchart"), [tableData], options);
							break;
						case "7":
							var ebtwnn_plot = $.plot($("#edgesBtwnNewchart"), [tableData], options);
							break;	
						case "8":
							var e2e_plot = $.plot($("#edgesToExistingchart"), [tableData], options);
							break;		
						case "9":
							var del_plot = $.plot($("#deletedEdgeschart"), [tableData], options);
							break;
				}
			
			
			
		
 }

$(document).ready(function () {
	
	createJSTableDataForGraphs(nodesArray);
		addCharts("001","Nodes Over Time", "nodeschart");
		drawLinePlot("1", "nodes");
		createJSTableDataForGraphs(edgesArray);
		addCharts("002","Edges Over Time", "edgeschart");
		drawLinePlot("2", "edges");
		createJSTableDataForGraphs(diameterArray);
		addCharts("003","Diameter Over TIme", "diameterchart");
		drawLinePlot("3", "diameter");
		createJSTableDataForGraphs(ccArray);
		addCharts("004","Clustering Coefficient Over TIme", "ccchart");
		drawLinePlot("4", "cc");

// end of init
 })


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