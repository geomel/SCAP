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

$page_title = "Correlation Analysis";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["ca"]["active"] = true;
//$page_nav["graphs"]["flot"]["active"] = true;x
include("inc/nav.php");

?>

<?php

if (isset($_GET)) {

    $f = $_GET['plotoptions'];
    $rs = $_GET['rs'];
    $field1 = $_GET['field1'];
    $field2 = $_GET['field2'];
   // $var1[] = $_SESSION[$f[0]];
    $_SESSION["cor1"] = array_slice($_SESSION[$f[0]], 0, 500); 
  //  $var2[] = $_SESSION[$f[1]];
    $_SESSION["cor2"] = array_slice($_SESSION[$f[1]], 0, 500); 
    if( is_array($_SESSION[$f[0]]) ) {    
        $cmd = "Rscript -e 'x <- \"" . join(',', $_SESSION["cor1"]) . "\"; y <- \"" . join(',', $_SESSION["cor2"]) . "\"; source(\"spearman_cor.r\")'";
       // $cmd = "Rscript -e source(\"spearman_cor.r\")";
       // Rscript -e 'x <- "11,21,12,13"; y <- "33,32,34,36"; source("spearman_cor.r")
     
    // $cmd = "Rscript -e 'x <- \"" . join(',', $_SESSION[$f[0]]) . "\"; y <- \"" . join(',', $_SESSION[$f[1]]) . "\"; source(\"pearson_cor.r\")'";
    // $cmd = "Rscript -e 'x <- \"1,2,3,4,5\"; y <- \"7,8,9,10,11\"; source(\"pearson_cor.r\")'";
    $result = shell_exec($cmd);
    $pieces = explode(" ", $result);
    $r = round ($pieces[28],2);
    $pvalue = $pieces[12];
    unset($_SESSION["cor1"]);
    unset($_SESSION["cor2"]);
    
}
}

?>

<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
    <?php
    //configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
    //$breadcrumbs["New Crumb"] => "http://url.com"
    // $breadcrumbs["Composite Graphs"] = "";
    include("inc/ribbon.php");
    ?>

    <!-- MAIN CONTENT -->
    <div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark"><img src="<?php echo ASSETS_URL; ?>/img/SCQAP.png" width="50px" height="50px" alt="SCAP">&nbsp SCQAP - Correlation Analysis </h1>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                <ul id="sparks" class="">
                <li class="sparks-info">
                        <h5 style="margin-top: 5px"> Dataset Loaded <span class="txt-color-blue"><i class="fa fa-cloud-download" data-rel="bootstrap-tooltip" title="Versions"></i>&nbsp;&nbsp<?php echo count($_SESSION["adr"]); ?> Contracts</span></h5>
                    </li>
                  <li class="sparks-info">
                        <h5 style="margin-top: 5px"> Total Contracts Analyzed <span class="txt-color-blue"><i class="fa fa-database" data-rel="bootstrap-tooltip" title="Versions"></i>&nbsp;&nbsp<?php echo "91008"; ?></span></h5>
                    </li>
                </ul>
            </div>
        </div>
        <hr>

        <div class="row">
			<div class="col-sm-12">
				
				<div class="well">
					
					<h1><span class="semi-bold">Gas Mechanism</span> <i class="ultra-light"></i> <br></h1>
					
					<p>For the evaluation of the statistical dependence between the calculated metrics we have used the <strong>Spearman rank 
                        correlation coefficient (ρ)</strong> that measures the degree of similarity between two metrics with the use of the R statistical 
                        language (as the assumption for normal distribution does not always hold). 
                    <p>Correlation Coefficients are shown on 
                        the correlation Matrix for 90000 smart contracts, while the corresponding hypothesis tests whether there is a significant dependence
                         between some metrics with the actual units of GAS that were consumed during deployment. 
                    <p> All <code>ρ</code> values have a <code>p-value</code>
                         a lot smaller than 0,05 (α < 2.2*10^-16) and so we can safely assume that the obtained correlation coefficients are 
                         statistically significant Spearman’s correlation coeficient (cc) is constrained with a span of values as follows: 
                     <p>       
                        <code>-1 <= ρ <= 1</code>. Values closer to 1 indicate a stronger monotonic relation. We are adapting the following categorisation of cc values: 
                    <p>
                    <code>strong ρ >= 0.6-1 (green dots)<br>
                    moderate ρ >= 0.5-0.59 (orange dots)<br>
                    weak ρ >= 0-0.49 (red dots)<br></code>
                            <hr>
                    <p>In our study we are focusing on deployment Gas amounts. Smart Contractss are deployed once and live forever on the blockchain hence, 
                        developers are motivated to optimize Gas before deploying them. For our empirical study, we extracted from Etherscan.io 
                        the actual amount of gas that was eventually used for the deployment transaction of the SCs analyzed. 
                    <p>
				</div>
			</div>
	</div>



        <div id="select_error" class='col-xs-12 col-sm-8 col-md-3 col-lg-3'></div>
        <div class="row">
            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                <form id="plotoptions" method="GET" action="">
                    <h3>Deployment Metrics</h3>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="gas" name="plotoptions[]"> Deployment GAS
                    </label>
                <!--  
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox2" value="edges" name="plotoptions[]"> Edges
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="diameter" name="plotoptions[]"> Diameter
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="density" name="plotoptions[]"> Density
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="cc" name="plotoptions[]"> Clustering
                        Coeficient
                    </label>
                -->
                    <h3>Contract Size Metrics</h3>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="lloc" name="plotoptions[]"> LLOC
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox2" value="sloc" name="plotoptions[]"> SLOC
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="cloc" name="plotoptions[]"> CLOC
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="nf" name="plotoptions[]"> NF
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="nos" name="plotoptions[]"> NOS
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="numpar" name="plotoptions[]"> NUMPAR
                    </label>
                    
                    <h3>Contract Code & Quality Metrics</h3>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="wmc" name="plotoptions[]">
                        <a href='' data-toggle='tooltip' title="Weighted sum of McCabe's style complexity over the functions of a contract">WMC</a>
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="cbo" name="plotoptions[]">
                        <a href='#' data-toggle='tooltip' title='Coupling Between Objects'>CBO</a>
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox2" value="nl" name="plotoptions[]">
                        <a href='#' data-toggle='tooltip' title='The deepest nesting level of control structures in functions summed for a contract'>NL</a>
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="nle" name="plotoptions[]">
                        <a href='#' data-toggle='tooltip' title='Nesting level else-if'>NLE</a>
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="NA" name="plotoptions[]">
                        <a href='#' data-toggle='tooltip' title='Number of Attributes (i.e. states)'>NA</a>
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="dit" name="plotoptions[]">
                        <a href='#' data-toggle='tooltip' title='Depth of Inheritance Tree'>DIT</a>
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="noa" name="plotoptions[]">
                        <a href='#' data-toggle='tooltip' title='Number of Ancestors'>NOA</a>
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="nod" name="plotoptions[]">
                        <a href='#' data-toggle='tooltip' title='Number of Descendants'>NOD</a>
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="cbo" name="plotoptions[]">
                        <a href='#' data-toggle='tooltip' title='Coupling Between Objects'>CBO</a>
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="noi" name="plotoptions[]">
                        <a href='#' data-toggle='tooltip' title='Number of outgoing invocations (i.e. fan-out)'>NOI</a>
                    </label>
                    <p>
                        <input type="hidden" id="rsvalue" name="rs" value=""/>
                        <input type="hidden" id="field1" name="field1" value=""/>
                        <input type="hidden" id="field2" name="field2" value=""/>
                        <hr>
                        <h3 class="text-muted">Select two metrics and &nbsp&nbsp
                            <button type="submit" class="btn btn-labeled btn-success">
                                <span class="btn-label">
                                <i class="fa fa-bar-chart-o"></i>
                                </>Plot
                            </button>
                        </h3>
                </form>
            </div>
            

            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                <div class='well well-sm well-light padding-50'>
                    <h4 class='txt-color-green'><?php if (isset($f)) {
                            echo $field1 . " VS ";
                        } ?> <span> <?php echo $field2; ?></span> <a href='javascript:void(0);'
                                                                     class='pull-right txt-color-green'></a></h4>
                    <br>
                    <div id="rvalues"></div>
                    <div id="plots">
                <?php
                        if (isset($f)) {
                            echo "Results from the R statistical Language using Spearman rank correlation:<p><p>";
                            echo "Correlation Coefficient (ρ) = " . $r . "<br>";
                            echo "p-value = " . $pvalue;
                            //sort($f[0]);
                           // sort($f[1]);
                            if ($pvalue <= 0.05)
                                echo " <span class='text-muted'> (Correlation is significant at the 0.05 level)</span>";
                            else if ($pvalue <= 0.01)
                                echo " <span class='text-muted'> (Correlation is significant at the 0.01 level)</span>";
                            else
                                echo " <span class='text-muted'> (Correlation is not statistically significant)</span>";
                            // echo "<strong>".$f[0]. "</strong>: ".join(', ', $_SESSION[$f[0]]);
                            // echo "<p><strong>".$f[1]. "</strong>: ".join(', ', $_SESSION[$f[1]]);
                            echo "<p><div class='sparkline'
											data-sparkline-type='compositeline' 
											data-sparkline-spotradius-top='5' 
											data-sparkline-color-top='#3a6965' 
											data-sparkline-line-width-top='3' 
											data-sparkline-color-bottom='#c2cccc' 
											data-sparkline-spot-color='#2b5c59' 
											data-sparkline-minspot-color-top='#97bfbf' 
											data-sparkline-maxspot-color-top='#c2cccc' 
											data-sparkline-highlightline-color-top='#cce8e4' 
											data-sparkline-highlightspot-color-top='#9dbdb9' 
											data-sparkline-width='96%' 
											data-sparkline-height='78px' 
											data-sparkline-line-val='[" . join(', ', $_SESSION[$f[0]]) . "]'
											data-sparkline-bar-val='[" . join(', ', $_SESSION[$f[1]]) . "]'>
										</div> ";

                        }
                ?>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class='col-xs-12 col-sm-8 col-md-6 col-lg-8' style="margin-top: 50px; margin-left:10px;">
                    <?php
                    if (isset($f)) {
                        echo "<table id='datatable_tabletools' class='table table-striped table-bordered table-hover' width='100%'>
                                    <thead>
                                        <tr>
                                            <th>Address</th>
                                            <th>" . $f[1] . "</th>
                                            <th>" . $f[0] . "</th>
                                        </tr>
                                    </thead>
                                <tbody>";
                        foreach ($_SESSION[$f[1]] as $key => $value) {
                            echo "<tr>";
                            echo "<td><a href='https://etherscan.io/address/0x".strtok($_SESSION["adr"][$key], '_')."' target='_blank'>" . $_SESSION["adr"][$key] . "</a></td>";
                            echo "<td>" . $value . "</td>";
                            echo "<td>" . $_SESSION[$f[0]][$key] . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>
						</table>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN PANEL -->
    <!-- ==========================CONTENT ENDS HERE ========================== -->
    <?php
        //include required scripts
        include("inc/scripts.php");
        include("inc/footer.php");
    ?>
<script src="_/js/_loadDataset.js"></script>
<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.colVis.min.js"></script>
<!-- <script src="<?php // echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.tableTools.min.js"></script> -->
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
        

$(document).ready(function () {

    var responsiveHelper_datatable_tabletools = undefined;
    var breakpointDefinition = {
			tablet : 1024,
			phone : 480
            
		};

           
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

 });


        var gas = new Array();
        var lloc = new Array();
        var sloc = new Array();
        var cloc = new Array();
        var nf = new Array();
        var cc = new Array();
        var nos = new Array();
        var numpar = new Array();

        var wmc = new Array();
        var cbo = new Array();
        var nl = new Array();
        var nle = new Array();
        var na = new Array();
        var dit = new Array();
        var noa = new Array();
        var nod = new Array();
        var nof = new Array();
        var loc = new Array();
        var woc = new Array();
        var tcc = new Array();
        var nopa = new Array();
        var noam = new Array();
        var fieldArrays = new Array();

        $("#plotoptions").on('submit', function (e) {
            console.log("In...")
            var arr = [];
            var checkedBoxes = $("#plotoptions input:checked").each(function () {
                arr.push($(this).val());
            });
            console.log("Out...")
            if (checkedBoxes.length > 2) { // More than two options selected
                $('#select_error').show();
                $('#select_error').html("<div class='alert alert-error'>" +
                    "<a class='close' data-dismiss='alert'>x</a> <h4>More than two options Selected</h4>" +
                    "<p>Select two options and press Plot</p></div>");
                return false;
            } else if (checkedBoxes.length < 2) { // Less than two options selected
                $('#select_error').show();
                $('#select_error').html("<div class='alert alert-error'>" +
                    "<a class='close' data-dismiss='alert'>x</a> <h4>Less than two options Selected</h4>" +
                    "<p>Select two options and press Plot</p></div>");
                return false;
            } else {
                var rs = calculateR(arr[0], arr[1]);
                $("#field1").val(arr[1]);
                $("#field2").val(arr[0]);
                $("#rsvalue").val(rs);
                m1 = arr[0].toUpperCase();
                m2 = arr[1].toUpperCase();
                $("#correlation_graph").load("inc/correlation_graph.php?m1="+m1+"&m2="+m2);
            }
        });

        function calculateR(f1, f2) {
            fieldArrays = [];
            php2Js(f1);
            php2Js(f2);
            console.log(f1, f2, "-----");
            var correlationValue = mathUtils.getPearsonsCorrelation(fieldArrays[0], fieldArrays[1]);
            // var rsquaredValue = linearRegression(fieldArrays[0], fieldArrays[1]);
            return correlationValue.toFixed(4);
            
            	$("#plots").html("");
            	$("#plots").load("_/php/_combine_graphs.php?f1="+field1+"&f2="+field2);
               // $("#correlation_graph").load("inc/correlation_graph.php?m1="+field1+"&m2="+field2);
        }





        //php to Javascript array Variables


        function php2Js(flag) {

            switch (flag) {
                case "gas":
                <?php foreach ($_SESSION['gas'] as $key => $value) {
                    echo "gas[" . $key . "]=" . $value . ";";
                } ?>
                   // alert(gas);
                    fieldArrays.push(gas);
                    break;
                case "sloc":
                <?php foreach ($_SESSION['sloc'] as $key => $value) {
                    echo "sloc[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(sloc);
                    break;
                case "nf":
                <?php foreach ($_SESSION['lloc'] as $key => $value) {
                    echo "nf[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(nf);
                    break;
                case "cloc":
                <?php foreach ($_SESSION['cloc'] as $key => $value) {
                    echo "cloc[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(cloc);
                    break;
                case "cc":
                <?php foreach ($_SESSION['nf'] as $key => $value) {
                    echo "cc[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(cc);
                    break;
                case "lloc":
                <?php foreach ($_SESSION['lloc'] as $key => $value) {
                    echo "lloc[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(lloc);
                    break;
                case "nos":
                <?php foreach ($_SESSION['nos'] as $key => $value) {
                    echo "nos[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(nos);
                    break;
                case "numpar":
                <?php foreach ($_SESSION['numpar'] as $key => $value) {
                    echo "numpar[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(numpar);
                    break;
                case "noa":
                <?php foreach ($_SESSION['noa'] as $key => $value) {
                    echo "noa[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(noa);
                    break;
                case "cbo":
                <?php foreach ($_SESSION['cbo'] as $key => $value) {
                    echo "cbo[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(cbo);
                    break;
                case "nl":
                <?php foreach ($_SESSION['nl'] as $key => $value) {
                    echo "nl[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(nl);
                    break;
                case "nle":
                <?php foreach ($_SESSION['nle'] as $key => $value) {
                    echo "nle[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(nle);
                    break;
                case "na":
                <?php foreach ($_SESSION['na'] as $key => $value) {
                    echo "na[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(na);
                    break;
                case "dit":
                <?php foreach ($_SESSION['dit'] as $key => $value) {
                    echo "dit[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(dit);
                    break;
                case "wmc":
                <?php foreach ($_SESSION['wmc'] as $key => $value) {
                    echo "wmc[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(wmc);
                    break;
                case "nod":
                <?php foreach ($_SESSION['nod'] as $key => $value) {
                    echo "nod[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(nod);
                    break;
                case "noi":
                <?php foreach ($_SESSION['noi'] as $key => $value) {
                    echo "noi[" . $key . "]=" . $value . ";";
                } ?>
                    fieldArrays.push(noi);
                    break;
            }
        }

        var mathUtils = {};

        mathUtils.getPearsonsCorrelation = function (x, y) {
            var shortestArrayLength = 0;
            if (x.length == y.length) {
                shortestArrayLength = x.length;
            }
            else if (x.length > y.length) {
                shortestArrayLength = y.length;
                console.error('x has more items in it, the last ' + (x.length - shortestArrayLength) + ' item(s) will be ignored');
            }
            else {
                shortestArrayLength = x.length;
                console.error('y has more items in it, the last ' + (y.length - shortestArrayLength) + ' item(s) will be ignored');
            }

            var xy = [];
            var x2 = [];
            var y2 = [];

            for (var i = 0; i < shortestArrayLength; i++) {
                xy.push(x[i] * y[i]);
                x2.push(x[i] * x[i]);
                y2.push(y[i] * y[i]);
            }

            var sum_x = 0;
            var sum_y = 0;
            var sum_xy = 0;
            var sum_x2 = 0;
            var sum_y2 = 0;

            for (var i = 0; i < shortestArrayLength; i++) {
                sum_x += x[i];
                sum_y += y[i];
                sum_xy += xy[i];
                sum_x2 += x2[i];
                sum_y2 += y2[i];
            }

            var step1 = (shortestArrayLength * sum_xy) - (sum_x * sum_y);
            var step2 = (shortestArrayLength * sum_x2) - (sum_x * sum_x);
            var step3 = (shortestArrayLength * sum_y2) - (sum_y * sum_y);
            var step4 = Math.sqrt(step2 * step3);
            var answer = step1 / step4;

            return answer;
        }

        function linearRegression(y, x) {
            var lr = {};
            var n = y.length;
            var sum_x = 0;
            var sum_y = 0;
            var sum_xy = 0;
            var sum_xx = 0;
            var sum_yy = 0;

            for (var i = 0; i < y.length; i++) {

                sum_x += x[i];
                sum_y += y[i];
                sum_xy += (x[i] * y[i]);
                sum_xx += (x[i] * x[i]);
                sum_yy += (y[i] * y[i]);
            }

            lr['slope'] = (n * sum_xy - sum_x * sum_y) / (n * sum_xx - sum_x * sum_x);
            lr['intercept'] = (sum_y - lr.slope * sum_x) / n;
            lr['r2'] = Math.pow((n * sum_xy - sum_x * sum_y) / Math.sqrt((n * sum_xx - sum_x * sum_x) * (n * sum_yy - sum_y * sum_y)), 2);

            return lr;
        }

    </script>
