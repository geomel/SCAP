<?php
session_start();

$json_solmetrics = file_get_contents('http://localhost/full/rest/contracts.php?adr=0'); //gets project metrics	
$json_decoded = json_decode($json_solmetrics);


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
}

?>