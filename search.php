<?php

//initilize the page
require_once 'init.web.php';

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Search Repository";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["sa"]["active"] = true;
include("inc/nav.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		$breadcrumbs["Search"] = "";
		include("inc/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<div id="content">

		<!-- row -->
		
		<div class="row">
		
			<div class="col-sm-12">
		
				<ul id="myTab1" class="nav nav-tabs bordered">
					<li class="active">
						<a href="#s1" data-toggle="tab">Search All <i class="fa fa-caret-down"></i></a>
					</li>
					<li>
						<a href="#s2" data-toggle="tab">Upgreadable</a>
					</li>
					<li>
						<a href="#s3" data-toggle="tab">Search History</a>
					</li>
					<li class="pull-right hidden-mobile">
						<a href="javascript:void(0);"> <span class="note">1 results (0.15 seconds) </span> </a>
					</li>
				</ul>
		
				<div id="myTabContent1" class="tab-content bg-color-white padding-10">
					<div class="tab-pane fade in active" id="s1">
						<h1> Search <span class="semi-bold">Contracts Repository</span></h1>
						<br>
						<div class="input-group input-group-lg hidden-mobile">
							<div class="input-group-btn">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
									All <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li class="active">
										<a href="javascript:void(0)"><i class="fa fa-check"></i> All Dataset</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="javascript:void(0)">Upgreadable</a>
									</li>
									<li>
										<a href="javascript:void(0)">Dapp</a>
									</li>
									<li>
										<a href="javascript:void(0)">Github</a>
									</li>
								</ul>
							</div>
							<input class="form-control input-lg" type="text" placeholder="Type Smart Contract Address..." id="search-project">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default" id="search-button">
									&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-search fa-lg"></i>&nbsp;&nbsp;&nbsp;
								</button>
							</div>
						</div>
		
						<div id="search-res"></div>	
						<div id="contract-code"></div>	
						<!-- <textarea class="" id="sc_code" rows="10"></textarea> -->
                        <div id="status" class="muted text-center"></div>
						<hr>
						<div id="sc_metrics"></div>
						<div class="search-results clearfix smart-form">
		
						
		<!--
						<div class="text-center">
							<hr>
							<ul class="pagination no-margin">
								<li class="prev disabled">
									<a href="javascript:void(0);">Previous</a>
								</li>
								<li class="active">
									<a href="javascript:void(0);">1</a>
								</li>
								<li>
									<a href="javascript:void(0);">2</a>
								</li>
								<li>
									<a href="javascript:void(0);">3</a>
								</li>
								<li class="next">
									<a href="javascript:void(0);">Next</a>
								</li>
							</ul>
							<br>
							<br>
							<br>
						</div>
		
					</div>
-->

					<div class="tab-pane fade" id="s2">
						<h1> Search <span class="semi-bold">Contracts</span></h1>
						<br>
						<div class="input-group input-group-lg">
							<input class="form-control input-lg" type="text" placeholder="Search again..." id="search-user">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-fw fa-search fa-lg"></i>
								</button>
							</div>
						</div>
						<h1 class="font-md"> Search Results for <span class="semi-bold">Contract</span><small class="text-danger"> &nbsp;&nbsp;(181 results)</small></h1>
						<br>
						
						<div class="text-center">
							<hr>
							<ul class="pagination no-margin">
								<li class="prev disabled">
									<a href="javascript:void(0);">Previous</a>
								</li>
								<li class="active">
									<a href="javascript:void(0);">1</a>
								</li>
								<li>
									<a href="javascript:void(0);">2</a>
								</li>
								<li>
									<a href="javascript:void(0);">3</a>
								</li>
								<li>
									<a href="javascript:void(0);">4</a>
								</li>
								<li>
									<a href="javascript:void(0);">5</a>
								</li>
								<li class="next">
									<a href="javascript:void(0);">Next</a>
								</li>
							</ul>
							<br>
							<br>
							<br>
						</div>
					</div>
		
					<div class="tab-pane fade" id="s3">
						<h1> Search <span class="semi-bold">history</span></h1>
						<p class="alert alert-info">
							Your search history is turned off.
		
						</p>
		
						<span class="onoffswitch-title">Auto save Search History</span>
						<span class="onoffswitch">
							<input type="checkbox" name="save_history" class="onoffswitch-checkbox" id="save_history" checked="checked">
							<label class="onoffswitch-label" for="save_history"> <span class="onoffswitch-inner" data-swchon-text="ON" data-swchoff-text="OFF"></span> <span class="onoffswitch-switch"></span> </label> </span>
		
					</div>
				</div>
		
			</div>
		
		</div>
		
		<!-- end row -->

	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php
	// include page footer
	include("inc/footer.php");
?>

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

<script src="_/js/_index.js"></script>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

<script type="text/javascript">
	$(document).ready(function() {
		$("#search-project").focus();
	})

</script>

<?php 
	//include footer
	include("inc/google-analytics.php"); 
?>