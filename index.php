<?php
error_reporting(0);
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

$page_title = "SCQAP - Smart Contracts Quality Analysis Platform";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["home"]["active"] = true;
include("inc/nav.php");
?>

<div id="main" role="main"> 
<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		//$breadcrumbs["Home"] = "";
		//include("inc/ribbon.php");
	?>

    <!-- MAIN CONTENT -->
    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark"><img src="<?php echo ASSETS_URL; ?>/img/SCQAP.png" width="50px" height="50px" alt="SCAP">&nbsp SCQAP - Smart Contracts Quality Analysis Platform </h1>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                <ul id="sparks" class="">
                    <li class="sparks-info" style="margin-top: 5px">
                        <h5 style="margin-top: 5px"> Dataset Loaded <span class="txt-color-blue"><i class="fa fa-cloud-download" data-rel="bootstrap-tooltip" title="Versions"></i>&nbsp;&nbsp<?php echo count($_SESSION["adr"]); ?> Contracts</span></h5>
                    </li>
                  <li class="sparks-info">
                        <h5 style="margin-top: 5px"> Total Contracts Analyzed <span class="txt-color-blue"><i class="fa fa-database" data-rel="bootstrap-tooltip" title="Versions"></i>&nbsp;&nbsp<?php echo "91008"; ?></span></h5>
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
					
					<h1><span class="semi-bold">SCQAP</span> <i class="ultra-light"></i> <sup class="badge bg-color-red bounceIn animated">v 1.0</sup> <br>
						<small class="text-danger slideInRight fast animated"><strong><a href="https://se.uom.gr" target="_blank">By the Software Engineering Group</a>  <a href="www.uom.gr" target="_blank"> of UoM</a></strong></small></h1>
					
					<p>SCQAP was created to facilitate the analysis of Smart Contracts from a <b>Software Quality</b> and <b>Gas efficiency</b> perspective.
                        We have implemented a public repository of Solidity SC metrics accessible via a public <a href="https://scqap.se.uom.gr/Documentation/rest_calls.html">REST API</a> along with a web based client,
                        where researchers can easily examine a massive number of smart contracts metrics with various charts and correlation diagrams.
                    <p>
                        Smart Contracts are computer programs that run on blockchains and can be executed automatically in a deterministic way when predetermined conditions are met.
                        Ethereum which today is the biggest blockchain network with thousands of Solidity based smart contracts <a href="https://dune.com/embeds/329/515/RqqCse8wDeW3MZKeZFOab2Ju8QA5Q8Itnr1cbLgk" target="_blank" class="semi-bold" rel="popover-hover" data-placement="bottom" data-content="https://dune.com/embeds/329/515/RqqCse8wDeW3MZKeZFOab2Ju8QA5Q8Itnr1cbLgk"> deployed every month</a>, uses a system of Gas to evaluate
                         the limited space on each new block of Ethereum. A Gas cost is assigned to each calculation operation that alters the blockchains’ state based on its size and complexity. 
                    <p>
                        <div id="loadDataset" class="btn-header transparent"><span> <a href="javascript:void(0)" title="Load Dataset"><i class="fa fa-cloud-download"></i></a> </span></div>
				        Load a randomly chosen dataset of 10,000 Smart Contracts and start exploring various software quality metrics and the relationship 
                        between GAS consumption and them. You can Search for a specific Smart Contract from the search page.
                            <hr>
                    <p>Our dataset of SCs consists of a collection of verified SCs, meaning contracts that their code has been verified to match the compiled sourcecode with the deployed 
                    bytecode on the Ethereum blockchain. 
                    <p>
				</div>

				
			</div>
	</div>

    <div class="row">
			<div class="col-sm-12 col-md-12 col-lg-4">
                <img src="img/figures/gas_mechanism.png" width="500" height="400" style="margin-left:40px">
            </div>	
            <div class="col-sm-12 col-md-12 col-lg-8">
				<div class="well">
					
					<h1><span class="semi-bold">How does the</span> <i class="ultra-light"></i> Gas Mechanism Work? <sup class="badge bg-color-green bounceIn animated">Info</sup> <br></h1>
                        <p>The Ethereum blockchain uses a Gas system for the deployment and execution of Smart Contracts, to compensate the use of computing resources and 
                        protection against malicious activities such as computational wastage in code, as well as for pricing the limited space for each new 
                        block in the chain. 
                    <p> A gas cost is assigned to each calculation task based on its size and complexity. Computationally more intense 
                        operations require more Gas. According to the Ethereum Yellow Paper, the basic cost of every ‘create’ operation is 32,000 gas, 
                        and to this is added the basic cost of 21,000 gas for every new transaction (TX) in the next block created.
                     <p>   
                        Gas optimization is the generic approach of avoiding or decreasing what is expensive in terms of gas costs on EVM blockchains. Known expensive operations 
                        and practices that increase gas cost include the writing of state variables that are stored in contract storage, external contract calls and expensive operations on loops. 
                        There are two Gas units that developers need to be aware of, <b>deployment</b> and <b>runtime Gas</b> as shown in the left figure. Both of these are part of the bottleneck 
                        for massive Web3 adoption along with scalability and slow transaction times. 
                        
                       <p> In our study we are focusing on deployment Gas consumption. SCs are deployed once and live forever on the blockchain hence, developers are motivated to optimize Gas before deploying them. 
                           For our empirical study, we extracted from Etherscan.io the actual amount of Gas that was eventually used for the deployment transaction of the SCs analyzed.   
                    <p>
				</div>

				
			</div>
	</div>
 <!-- start row -->
 <div class="row">
        <div class="col-sm-12">

            <div class="row">

                <div class="col-sm-12 col-md-12 col-lg-6">

                    <!-- well -->
                    <div class="well">
                        <h3>Correlation Diagrams <code>
                            GAS vs Software Metrics</code></h3>
                        <p>
                                Metrics that show a high degree of statistical dependence with deployment <code>GAS</code> include  <code>
                                LLOC, NF, WMC, NUMPAR, NOS, NA and NOI. </code> 
                        </p>
                        <p> Correlation Coefficients are shown on the correlation Matrix bellow, for the corresponding hypothesis tests of
                        whether there is a significant dependence between some metrics with the actual units of GAS that were consumed during the deployment phase.</p>
                        <div id="myCarousel-2" class="carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel-2" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel-2" data-slide-to="1" class=""></li>
                                <li data-target="#myCarousel-2" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <!-- Slide 1 -->
                                <div class="item active">
                                    <img src="<?php echo ASSETS_URL; ?>/img/figures/multiple_diagrams.png" alt="">
                                    <div class="carousel-caption caption-right">
                                        <h4></h4>
                                        <p>
                                            
                                        </p>
                                        <br>
                                        <a href="javascript:void(0);" class="btn btn-info btn-sm">Read more</a>
                                    </div>
                                </div>
                                <!-- Slide 2 -->
                                <div class="item">
                                    <img src="<?php echo ASSETS_URL; ?>/img/figures/correlation_matrix_1.png" alt="">
                                    <div class="carousel-caption caption-left">
                                        <p>
                                            
                                        </p>
                                        <br>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm">Read more</a>
                                    </div>
                                </div>
                                <!-- Slide 3 -->
                                <div class="item">
                                    <img src="<?php echo ASSETS_URL; ?>/img/figures/correlation_matrix_2.png" alt="">
                                    <div class="carousel-caption">
                                        <h4></h4>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                            <a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
                        </div>

                    </div>
                    <!-- end well-->

                </div>

                <div class="col-sm-12 col-md-12 col-lg-6">

                    <!-- well -->
                    <div class="well">
                        <h3>Metrics Distribution</h3>
                        <p>
                       In the histogram plots bellow you can see the distribution of Smart Contract Variables for a set of 91008 contracts.  
                        </p>
                        <div id="myCarousel" class="carousel fade">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                                <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <!-- Slide 1 -->
                                <div class="item active">
                                    <img src="<?php echo ASSETS_URL; ?>/img/figures/histo_plots.jpg" alt="">
                                    <div class="carousel-caption caption-right">
                                        <br>
                                        <a href="javascript:void(0);" class="btn btn-info btn-sm">Read more</a>
                                    </div>
                                </div>
                                <!-- Slide 2 -->
                            
                                <!-- Slide 3 -->
                            </div>
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
                        </div>

                    </div>
                    <!-- end well -->

                </div>

            </div>

        </div>

    </div>
    <!-- end row -->
    
<!-- end row -->

<!-- row -->

<div class="row">

    <div class="col-sm-12">
        <div class="well">
            <h1>Solidity Metrics</h1>
            
            <div class="alert alert-info">
            For the elicitation of Smart Contract metrics, we used SolMet, a static analysis tool that can parse and compute a number of Solidity based structural and architectural object-oriented metrics (originally addressed by Chidamber and Kemerer) and can be seen in the table below 
            </div>
            
            <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td colspan="4">We categorize the above metrics as Structural, Complexity and Object Oriented metrics.</td>
                    </tr>
                        <tr>
                            <th style="width:25%">Metric</th>
                            <th style="width:15%">Example Value</th>
                            <th style="width:60%">Description</th>
                        </tr>                                            
                    </thead> 
                    <tbody>
                        <tr>
                            <td>ADDRESS</td>
                            <td><code>018b7f23490a23fe29a33d3c8f92fe445c1f7a5b</code></td>
                            <td>The Smart Contract address on the main Ethereum network.</td>
                        </tr>
                        <tr>
                            <td>GAS</td>
                            <td><code>1420898</code></td>
                            <td>The actual Gas units used for Smart Contract deployment. This value has been extracted from Etherscan.io</td>
                        </tr>
                        <tr>
                            <td>SLOC</td>
                            <td><code>798</code></td>
                            <td>Source Lines Of Code</td>
                        </tr>
                        <tr>
                            <td>LLOC</td>
                            <td><code>428</code></td>
                            <td>Logical Lines Of Code</td>
                        </tr>
                        <tr>
                            <td>CLOC</td>
                            <td><code>171</code></td>
                            <td>Comment Lines Of Code</td>
                        </tr>
                        <tr>
                            <td>NF</td>
                            <td><code>81</code></td>
                            <td>Number of Functions</td>
                        </tr> 
                        <tr>
                            <td>NOS</td>
                            <td><code>203</code></td>
                            <td>Number of Statements</td>
                        </tr> 
                        <tr>
                            <td>NUMPAR</td>
                            <td><code>151</code></td>
                            <td>Number of Parameters in a Function</td>
                        </tr> 
                        <tr>
                            <td>WMC</td>
                            <td><code>36</code></td>
                            <td>Weighted Complexity in Functions</td>
                        </tr> 
                        <tr>
                            <td>NL</td>
                            <td><code>12</code></td>
                            <td>The deepest nesting level of control structures in functions summed for a contract</td>
                        </tr> 
                        <tr>
                            <td>NLE</td>
                            <td><code>8</code></td>
                            <td>Nesting level without else-if statements</td>
                        </tr> 
                        <tr>
                            <td>NA</td>
                            <td><code>37</code></td>
                            <td>Number of attributes of Smart Contracts</td>
                        </tr> 
                        <tr>
                            <td>NOI</td>
                            <td><code>37</code></td>
                            <td>Number of outgoing invocations</td>
                        </tr> 
                        <tr>
                            <td>DIT</td>
                            <td><code>3</code></td>
                            <td>Depth of Inheritance Tree</td>
                        </tr> 
                        <tr>
                            <td>NOA</td>
                            <td><code>4</code></td>
                            <td>Number of Ascendants</td>
                        </tr> 
                        <tr>
                            <td>NOD</td>
                            <td><code>2</code></td>
                            <td>Number of Descendants</td>
                        </tr> 
                        <tr>
                            <td>CBO</td>
                            <td><code>1</code></td>
                            <td>Coupling Between Objects</td>
                        </tr> 
                    </tbody>    
                    <tfoot>
                         
                    </tfoot>  
                </table>
        
            
        </div>

    </div>

</div>

<!-- end row -->

</section>
<!-- end widget grid -->

</div>   

        
       
</div>
<?php
//include required scripts 
include("inc/scripts.php");
?>
<script src="_/js/_loadDataset.js"></script>
<script src="_/js/_index.js"></script>

    <script type="text/javascript">
$(document).ready(function () {
            refreshTimeLine();

// end of init
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