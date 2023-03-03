<?php

//error_reporting(1);

$servername = "dbPHDmelas";
$username = "melas";
$password = "melas";
$dbname = "scap";
$port = 3306; // replace with your MySQL port number if necessary

define('DB_HOST', 'dbPHDmelas');
define('DB_NAME', 'scap');
define('DB_USER', 'melas');
define('DB_PASSWORD', 'melas');

// Create connection
//$con = mysqli_connect($servername, $username, $password, $dbname, $port);
//$con=mysqli_connect("dbPHDmelas:3306","melas","melas","scap");
//$con=mysqli_connect("http:\/\/195.251.210.147:3336","melas","melas","scap");
//$con=mysqli_connect("dbPHDmelas:3306","melas","melas","scap");
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 3306);

// Check connection
//if (!$conn) {
 //echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully";

// $con = mysqli_connect("https://scqap.se.uom.gr:3336","melas","melas", "scap");


if (isset($_GET["adr"])){

	$adr = mysqli_real_escape_string($con, $_GET["adr"]);

	if($adr==0){
			$query_adr = "SELECT * FROM solmetrics";
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

if (isset($_GET["lloc"])){

	$lloc = mysqli_real_escape_string($con, $_GET["lloc"]);
			$query_adr = "SELECT * FROM solmetrics WHERE LLOC >= $lloc";
			$dbquery = mysqli_query($con, $query_adr);
			$arr = array();
		$result = mysqli_num_rows($dbquery);
		if($result){
			while($row =  mysqli_fetch_assoc($dbquery))
				{
					// $arr[] = array ('GAS'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'NL'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
					$arr[] = $row;
					//echo json_encode($arr);
				}	

				echo json_encode($arr);
				
	}else{
			$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"A Smart Contract with these characteristics was not found in our database");
			echo utf8_encode(json_encode($arr));
			mysqli_free_result($dbquery);
		}
	}

if (isset($_GET["nf"])){

		$nf = mysqli_real_escape_string($con, $_GET["nf"]);
				$query_adr = "SELECT * FROM solmetrics WHERE NF >= $nf";
				$dbquery = mysqli_query($con, $query_adr);
				$arr = array();
			$result = mysqli_num_rows($dbquery);
			if($result){
				while($row =  mysqli_fetch_assoc($dbquery))
					{
						// $arr[] = array ('GAS'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'NL'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
						$arr[] = $row;
						//echo json_encode($arr);
					}	
	
					echo json_encode($arr);
					
		}else{
				$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"A Smart Contract with these characteristics was not found in our database");
				echo utf8_encode(json_encode($arr));
				mysqli_free_result($dbquery);
			}
		}	
if (isset($_GET["gas"])){

			$gas = mysqli_real_escape_string($con, $_GET["gas"]);
					$query_adr = "SELECT * FROM solmetrics WHERE GAS >= $gas";
					$dbquery = mysqli_query($con, $query_adr);
					$arr = array();
				$result = mysqli_num_rows($dbquery);
				if($result){
					while($row =  mysqli_fetch_assoc($dbquery))
						{
							// $arr[] = array ('GAS'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'NL'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
							$arr[] = $row;
							//echo json_encode($arr);
						}	
		
						echo json_encode($arr);
						
			}else{
					$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"A Smart Contract with these characteristics was not found in our database");
					echo utf8_encode(json_encode($arr));
					mysqli_free_result($dbquery);
				}
			}		
if (isset($_GET["wmc"])){

				$wmc = mysqli_real_escape_string($con, $_GET["wmc"]);
						$query_adr = "SELECT * FROM solmetrics WHERE WMC >= $wmc";
						$dbquery = mysqli_query($con, $query_adr);
						$arr = array();
					$result = mysqli_num_rows($dbquery);
					if($result){
						while($row =  mysqli_fetch_assoc($dbquery))
							{
								// $arr[] = array ('wmc'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'NL'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
								$arr[] = $row;
								//echo json_encode($arr);
							}	
			
							echo json_encode($arr);
							
				}else{
						$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"A Smart Contract with these characteristics was not found in our database");
						echo utf8_encode(json_encode($arr));
						mysqli_free_result($dbquery);
					}
				}	
if (isset($_GET["nl"])){

					$nl = mysqli_real_escape_string($con, $_GET["nl"]);
							$query_adr = "SELECT * FROM solmetrics WHERE NL >= $nl";
							$dbquery = mysqli_query($con, $query_adr);
							$arr = array();
						$result = mysqli_num_rows($dbquery);
						if($result){
							while($row =  mysqli_fetch_assoc($dbquery))
								{
									// $arr[] = array ('wmc'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'NL'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
									$arr[] = $row;
									//echo json_encode($arr);
								}	
				
								echo json_encode($arr);
								
					}else{
							$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"A Smart Contract with these characteristics was not found in our database");
							echo utf8_encode(json_encode($arr));
							mysqli_free_result($dbquery);
						}
					}							
if (isset($_GET["numpar"])){

						$numpar = mysqli_real_escape_string($con, $_GET["numpar"]);
								$query_adr = "SELECT * FROM solmetrics WHERE NUMPAR >= $numpar";
								$dbquery = mysqli_query($con, $query_adr);
								$arr = array();
							$result = mysqli_num_rows($dbquery);
							if($result){
								while($row =  mysqli_fetch_assoc($dbquery))
									{
										// $arr[] = array ('wmc'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'numpar'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
										$arr[] = $row;
										//echo json_encode($arr);
									}	
					
									echo json_encode($arr);
									
						}else{
								$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"A Smart Contract with these characteristics was not found in our database");
								echo utf8_encode(json_encode($arr));
								mysqli_free_result($dbquery);
							}
						}		
if (isset($_GET["nos"])){

							$nos = mysqli_real_escape_string($con, $_GET["nos"]);
									$query_adr = "SELECT * FROM solmetrics WHERE NOS >= $nos";
									$dbquery = mysqli_query($con, $query_adr);
									$arr = array();
								$result = mysqli_num_rows($dbquery);
								if($result){
									while($row =  mysqli_fetch_assoc($dbquery))
										{
											// $arr[] = array ('wmc'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'nos'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
											$arr[] = $row;
											//echo json_encode($arr);
										}	
						
										echo json_encode($arr);
										
							}else{
									$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"A Smart Contract with these characteristics was not found in our database");
									echo utf8_encode(json_encode($arr));
									mysqli_free_result($dbquery);
								}
							}	
if (isset($_GET["dit"])){

								$dit = mysqli_real_escape_string($con, $_GET["dit"]);
										$query_adr = "SELECT * FROM solmetrics WHERE DIT >= $dit";
										$dbquery = mysqli_query($con, $query_adr);
										$arr = array();
									$result = mysqli_num_rows($dbquery);
									if($result){
										while($row =  mysqli_fetch_assoc($dbquery))
											{
												// $arr[] = array ('wmc'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'nos'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
												$arr[] = $row;
												//echo json_encode($arr);
											}	
							
											echo json_encode($arr);
											
								}else{
										$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"A Smart Contract with these characteristics was not found in our database");
										echo utf8_encode(json_encode($arr));
										mysqli_free_result($dbquery);
									}
								}	
if (isset($_GET["noa"])){

									$noa = mysqli_real_escape_string($con, $_GET["noa"]);
											$query_adr = "SELECT * FROM solmetrics WHERE NOA >= $noa";
											$dbquery = mysqli_query($con, $query_adr);
											$arr = array();
										$result = mysqli_num_rows($dbquery);
										if($result){
											while($row =  mysqli_fetch_assoc($dbquery))
												{
													// $arr[] = array ('wmc'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'nos'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
													$arr[] = $row;
													//echo json_encode($arr);
												}	
								
												echo json_encode($arr);
												
									}else{
											$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"A Smart Contract with these characteristics was not found in our database");
											echo utf8_encode(json_encode($arr));
											mysqli_free_result($dbquery);
										}
									}	
if (isset($_GET["nod"])){

										$nod = mysqli_real_escape_string($con, $_GET["nod"]);
												$query_adr = "SELECT * FROM solmetrics WHERE NOD >= $nod";
												$dbquery = mysqli_query($con, $query_adr);
												$arr = array();
											$result = mysqli_num_rows($dbquery);
											if($result){
												while($row =  mysqli_fetch_assoc($dbquery))
													{
														// $arr[] = array ('wmc'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'nos'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
														$arr[] = $row;
														//echo json_encode($arr);
													}	
									
													echo json_encode($arr);
													
										}else{
												$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"A Smart Contract with these characteristics was not found in our database");
												echo utf8_encode(json_encode($arr));
												mysqli_free_result($dbquery);
											}
										}	
if (isset($_GET["cbo"])){

											$cbo = mysqli_real_escape_string($con, $_GET["cbo"]);
													$query_adr = "SELECT * FROM solmetrics WHERE CBO >= $cbo";
													$dbquery = mysqli_query($con, $query_adr);
													$arr = array();
												$result = mysqli_num_rows($dbquery);
												if($result){
													while($row =  mysqli_fetch_assoc($dbquery))
														{
															// $arr[] = array ('wmc'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'nos'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
															$arr[] = $row;
															//echo json_encode($arr);
														}	
										
														echo json_encode($arr);
														
											}else{
													$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"A Smart Contract with these characteristics was not found in our database");
													echo utf8_encode(json_encode($arr));
													mysqli_free_result($dbquery);
												}
											}		
if (isset($_GET["na"])){

												$na = mysqli_real_escape_string($con, $_GET["na"]);
														$query_adr = "SELECT * FROM solmetrics WHERE NA >= $na";
														$dbquery = mysqli_query($con, $query_adr);
														$arr = array();
													$result = mysqli_num_rows($dbquery);
													if($result){
														while($row =  mysqli_fetch_assoc($dbquery))
															{
																// $arr[] = array ('wmc'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'nos'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
																$arr[] = $row;
																//echo json_encode($arr);
															}	
											
															echo json_encode($arr);
															
												}else{
														$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"A Smart Contract with these characteristics was not found in our database");
														echo utf8_encode(json_encode($arr));
														mysqli_free_result($dbquery);
													}
												}	
if (isset($_GET["noi"])){

													$noi = mysqli_real_escape_string($con, $_GET["noi"]);
															$query_adr = "SELECT * FROM solmetrics WHERE NOI >= $noi";
															$dbquery = mysqli_query($con, $query_adr);
															$arr = array();
														$result = mysqli_num_rows($dbquery);
														if($result){
															while($row =  mysqli_fetch_assoc($dbquery))
																{
																	// $arr[] = array ('wmc'=>$row['GAS'], 'SLOC'=>$row['SLOC'], 'LLOC'=>$row['LLOC'], 'CLOC'=>$row['CLOC'], 'NF'=>$row['NF'], 'WMC'=>$row['WMC'], 'nos'=>$row['NL'], 'NLE'=>$row['NLE'], 'NUMPAR'=>$row['NUMPAR'], 'NOS'=>$row['NOS'], 'DIT'=>$row['DIT'], 'NOA'=>$row['NOA'], 'NOD'=>$row['NOD'], 'CBO'=>$row['CBO'], 'NA'=>$row['NA'], 'NOI'=>$row['NOI'], 'ADR'=>$row['ADR']);
																	$arr[] = $row;
																	//echo json_encode($arr);
																}	
												
																echo json_encode($arr);
																
													}else{
															$arr['solmetrics: '][] = array ('adr'=>0, 'msg'=>"A Smart Contract with these characteristics was not found in our database");
															echo utf8_encode(json_encode($arr));
															mysqli_free_result($dbquery);
														}
													}																																									
			
 mysqli_close($con);

