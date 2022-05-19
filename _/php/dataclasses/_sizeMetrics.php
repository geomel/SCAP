<?php
/*
$pid=$_SESSION["pid"];

$sql = "SELECT * FROM project,version, graph WHERE project.pid='$pid' AND project.pid=version.pid AND version.vid = graph.vid ORDER BY version.date ASC";

$rs=$conn->query($sql);
 
if($rs === false) {
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
} else {
  $rows_returned = $rs->num_rows;
}
$rs->data_seek(0);
*/
echo "<table id='datatable_tabletools' class='table table-striped table-bordered table-hover' width='100%'>
			<thead>
				<tr>
					<th><a href='#' data-toggle='tooltip' title='Smartt Contract Address'>Address</a></th>
					<th><a href='#' data-toggle='tooltip' title='Gas used for Smart Contract' Deployment>GAS</a></th>
					<th><a href='#' data-toggle='tooltip' title='Number of source code lines'>SLOC</a></th>
					<th><a href='#' data-toggle='tooltip' title='Number of logical code lines (lines without empty and comment lines)'>LLOC</a></th>
					<th><a href='#' data-toggle='tooltip' title='Number of comment lines'>CLOC</a></th>
					<th><a href='#' data-toggle='tooltip' title='Number of functions'>NF</a></th>
					<th><a href='#' data-toggle='tooltip' title='Number of statements'>NOS</a></th>
					<th><a href='#' data-toggle='tooltip' title='number of parameters'>NUMPAR</a></th>
				</tr>
			</thead>
		<tbody>";	  
	 foreach($_SESSION["adr"] as $key => $value) {
		  echo "<tr>";
		  echo "<td><a href='https://etherscan.io/address/0x".strtok($_SESSION["adr"][$key], '_')."' target='_blank'>" . $_SESSION["adr"][$key] . "</a></td>";
		  echo "<td>" . $_SESSION["gas"][$key] . "</td>";
		  echo "<td>" . $_SESSION["sloc"][$key] . "</td>";
		  echo "<td>" . $_SESSION["lloc"][$key] . "</td>";
		  echo "<td>" . round($_SESSION["cloc"][$key],3) . "</td>";
		  echo "<td>" . round($_SESSION["nf"][$key], 3) . "</td>";
		  echo "<td>" . round($_SESSION["nos"][$key], 3) . "</td>";
		  echo "<td>" . round($_SESSION["numpar"][$key], 3) . "</td>";
		  echo "</tr>";
		}  	  
echo "</tbody>
	  </table>";
 
?>
