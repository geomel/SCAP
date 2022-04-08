<?php


echo "<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%'>
			<thead>
				<tr>
					<th><a href='#' data-toggle='tooltip' title='Smart Contract Address'>Adrress</a></th>
					<th><a href='#' data-toggle='tooltip' title='Weighted sum of McCabe's style complexity over the functions of a contract'>WMC</a></th>
					<th><a href='#' data-toggle='tooltip' title='The deepest nesting level of control structures in functions summed for a contract'>NL</a></th>
					<th><a href='#' data-toggle='tooltip' title='Nesting level else-if'>NLE</a></th>
					<th><a href='#' data-toggle='tooltip' title='Number of Attributes (i.e. states)f'>NA</a></th>
				</tr>
			</thead>
		<tbody>";

    foreach($_SESSION["adr"] as $key => $value) {
		  echo "<tr>";
		  echo "<td><a href='https://etherscan.io/address/0x".strtok($_SESSION["adr"][$key], '_')."' target='_blank'>" . $_SESSION["adr"][$key] . "</a></td>";
		  echo "<td>" . $_SESSION["wmc"][$key] . "</td>";
		  echo "<td>" . $_SESSION["nl"][$key] . "</td>";
		  echo "<td>" . $_SESSION["nle"][$key] . "</td>";
		  echo "<td>" . $_SESSION["na"][$key] . "</td>";
		  echo "</tr>";
		}  
		  
echo "</tbody>
	  </table>";
	
?>
