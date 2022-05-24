<?php
session_start();

$json_solmetrics = file_get_contents('http://195.251.210.147:8065/rest/loadContracts.php?adr=0'); // load metrics	
$json_decoded = json_decode($json_solmetrics);

//echo var_dump($json_decoded);

foreach($json_decoded as $metric){
    $gas_array[]=$metric->GAS;
    $sloc_array[]=$metric->SLOC;
    $lloc_array[]=$metric->LLOC;
    $cloc_array[]=$metric->CLOC;
    $nf_array[]=$metric->NF;
    $wmc_array[]=$metric->WMC;
    $nl_array[]=$metric->NL;
    $nle_array[]=$metric->NLE;
    $numpar_array[]=$metric->NUMPAR;
    $nos_array[]=$metric->NOS;
    $dit_array[]=$metric->DIT;
    $noa_array[]=$metric->NOA;
    $cbo_array[]=$metric->CBO;
    $na_array[]=$metric->NA;
    $noi_array[]=$metric->NOI;
    $adr_array[]=$metric->ADR;
    $nod_array[]=$metric->NOD;
}

        $_SESSION["gas"] = $gas_array;
		$_SESSION["sloc"] = $sloc_array;
		$_SESSION["lloc"] = $lloc_array;
		$_SESSION["cloc"] = $cloc_array;
		$_SESSION["nf"] = $nf_array;
		$_SESSION["wmc"] = $wmc_array;
		$_SESSION["nl"] = $nl_array;
		$_SESSION["nle"] = $nle_array;
		$_SESSION["numpar"] = $numpar_array;
		$_SESSION["nos"] = $nos_array;
		$_SESSION["dit"] = $dit_array;
		$_SESSION["noa"] = $noa_array;
		$_SESSION["cbo"] = $cbo_array;
		$_SESSION["na"] = $na_array;
		$_SESSION["noi"] = $noi_array;
		$_SESSION["adr"] = $adr_array;
        $_SESSION["nod"] = $nod_array;
      //  $_SESSION['gas500']=array_slice($_SESSION["gas"], 0,20);

     //   header('Location: ../../index.php');

     header("Refresh:0");
?>