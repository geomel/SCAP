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
                <h1 class="page-title txt-color-blueDark"><img src="<?php echo ASSETS_URL; ?>/img/SCQAP.png" width="50px" height="50px" alt="SCAP">&nbsp About SCQAP </h1>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                <ul id="sparks" class="">
                    <li class="sparks-info">
                        <h5> Dataset Loaded <span class="txt-color-blue"><i class="fa fa-cloud-download" data-rel="bootstrap-tooltip" title="Versions"></i>&nbsp;&nbsp<?php echo count($_SESSION["adr"]); ?> Contracts</span></h5>
                    </li>
                  <li class="sparks-info">
                        <h5> Total Contracts Analyzed <span class="txt-color-blue"><i class="fa fa-database" data-rel="bootstrap-tooltip" title="Versions"></i>&nbsp;&nbsp<?php echo "91008"; ?></span></h5>
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
					
					<h1><span class="semi-bold"><a href="https://se.uom.gr" target="_blank"> Software Engineering Group</span> <i class="ultra-light"></i> </a> <br>
						<small class="text-danger slideInRight fast animated"><strong><a href="www.uom.gr" target="_blank">University of Macedonia</a></strong></small></h1>
					
					<p>The Software Engineering group at the Department of Applied Informatics carries out research in the area of technical debt management, object-oriented design, 
						software maintenance, software evolution, under the umbrella of empirical software engineering.
                    <p>
                        Our research interests include the evaluation of Object-Oriented design quality, software evolution analysis, optimization of large systems, technical debt management,
						evaluation and optimization of blockchain based systems, SOA for cloud applications, design patterns & object-oriented refactorings.
                    <p>
						SCQAP was created to facilitate the analysis of Smart Contracts from a <b>Software Quality</b> and <b>Gas efficiency</b> perspective.
                        We have implemented a public repository of Solidity SC metrics accessible via a public REST API along with a web based client,
                        where researchers can easily examine a massive number of smart contracts metrics with various charts and correlation diagrams.
                            <hr>
							<blockquote>
                    <p>We are open for collaboration opportunities with the industry and/or research institutes. </blockquote>
					<address>
					<strong>Software and Data Engineering Laboratory</strong><br>
						Department of Applied Informatics, Building GD, Room 327<br>
						University of Macedonia<br>
						156 Egnatia St, GR54636, Thessaloniki, Greece<br>
						<abbr title="Phone">P:</abbr> (+30) 2310 891-706
					</address>
                    <p>
				</div>

				
			</div>
	</div>

	<div class="col-sm-12 col-md-12 col-lg-12">
        
                    <div class="well">
        
                        <h3>About</h3>
        
                        <ul class="media-list">
                            <li class="media">
                                <a class="pull-left" href="javascript:void(0);"> <img class="media-object" alt="Giorgos Melas" src="<?php echo ASSETS_URL; ?>/img/giorgos.jpg"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="http://geomel.github.io" target="_blank">Giorgos Melas</a></h4>
                                    <p>
                                        Giorgos Melas is a PhD candidate working at the Software Engineering group. His research interests are on the area of software design, quality, evolution analysis and maintenability.
                                    </p>
                            </li>
                            <li class="media">
                                        <a class="pull-left" href="javascript:void(0);"> <img class="media-object" alt="Alexander Chatzigeorgiou" src="<?php echo ASSETS_URL; ?>/img/alexander.jpg"> </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="https://users.uom.gr/~achat/" target="_blank">Alexandros Chatzigeorgiou</a></h4>
                                            Alexander Chatzigeorgiou, Ph.D., is a Professor of Software Engineering and Object-Oriented Design in the Department of Applied Informatics at the University of Macedonia, Thessaloniki, Greece.</br> From December 2017 he serves as Dean of the Faculty of Information Sciences.
                            </li>       
                            <li class="media">
                                                <a class="pull-left" href="javascript:void(0);"> <img class="media-object" alt="Apostolos Ampatzoglou" src="<?php echo ASSETS_URL; ?>/img/apostolos.jpg"> </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="https://users.uom.gr/~a.ampatzoglou/" target="_blank">Apostolos Ampatzoglou</a></h4>
                                                    Dr. Apostolos Ampatzoglou is an Assistant Professor in the Department of Computer Science of the University of Macedonia, where he carries out research and teaching in the area of software engineering. </br>
													In the period 2013-2016 he was an Assistant Professor at the Department of Computer Science in the University of Groningen (Netherlands). </p>
                            </li>                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </ul>
        
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
          
// end of init
 })

    </script>		


<?php
//include footer
include("inc/footer.php");
?>
	
<!-- PAGE RELATED PLUGIN(S) -->

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {


})

</script>