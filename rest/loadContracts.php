<?php

// error_reporting(0);

$con = mysqli_connect("195.251.210.147:3336","melas","melas", "scap");


if (isset($_GET["adr"])){

	$adr = mysqli_real_escape_string($con, $_GET["adr"]);

	if($adr==0){
		
			$query_adr = "SELECT * FROM solmetrics ORDER BY RAND() LIMIT 10000";
			$dbquery = mysqli_query($con, $query_adr);
			$arr = array();
			//$result = mysqli_num_rows($dbquery);
		
			while($row =  mysqli_fetch_assoc($dbquery))
				{
					// $arr[] = array ('GAS'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'NL'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
					$arr[] = $row;
					//echo json_encode($arr);
				}	

				echo json_encode($arr);
				
	}else{
		$query_adr = "SELECT * FROM solmetrics WHERE ADR = '$adr'";
		$dbquery = mysqli_query($con, $query_adr);

		$result = mysqli_num_rows($dbquery);

		if($result > 0)
		{
			while($row =  mysqli_fetch_assoc($dbquery))
			{
				$arr[] = array ('GAS'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'NL'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
				
			}
			echo json_encode($arr);
			mysqli_free_result($dbquery);
		}
		else
		{
			$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"Smart Contract did not found in database");
			echo utf8_encode(json_encode($arr));
			mysqli_free_result($dbquery);
		}
	}
}
 
 mysqli_close($con);

