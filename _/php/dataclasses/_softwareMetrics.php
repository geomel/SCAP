<?php
echo "<table id='datatable_col_reorder' class='table table-striped table-bordered table-hover' width='100%'>
			<thead>
				<tr>
					<th><a href='#' data-toggle='tooltip' title='SC Address'>Address</a></th>
					<th><a href='#' data-toggle='tooltip' title='Depth of Inheritance Tree'>DIT</a></th>
					<th><a href='#' data-toggle='tooltip' title='Number of Ancestors'>NOA</a></th>
					<th><a href='#' data-toggle='tooltip' title='Number of Descendants'>NOD</a></th>
					<th><a href='#' data-toggle='tooltip' title='Coupling Between Objects'>CBO</a></th>
					<th><a href='#' data-toggle='tooltip' title='Number of outgoing invocations (i.e. fan-out)'>NOI</a></th>
				</tr>
			</thead>
		<tbody>";
	foreach($_SESSION["adr"] as $key => $value) {	
		  {
		  echo "<tr>";
		  echo "<td><a href='https://etherscan.io/address/0x".strtok($_SESSION["adr"][$key], '_')."' target='_blank'>" . $_SESSION["adr"][$key] . "</a></td>";
		  echo "<td>" . $_SESSION["dit"][$key] . "</td>";
		  echo "<td>" . $_SESSION["noa"][$key] . "</td>";
		  echo "<td>" . $_SESSION["nod"][$key] . "</td>";
		  echo "<td>" . round($_SESSION["cbo"][$key],3) . "</td>";
		  echo "<td>" . round($_SESSION["noi"][$key],3) . "</td>";
		  echo "</tr>";
		  }
	}	  
echo "</tbody>
	  </table>";
	
?>

