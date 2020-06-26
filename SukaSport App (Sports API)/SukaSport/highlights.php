<?php
// header("Content-Type: application/json; charset=UTF-8");
session_start();
?>


<!DOCTYPE HTML>

<html>
	<head>
	<style>
* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
  padding: 10px;
  height: 185px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
		<title>Highlights</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrollgress.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.slidertron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
		<header id="header" class="alt skel-layers-fixed">
				<nav id="nav" style="color: black;">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li>
							<a href="" class="icon fa-angle-down">Features</a>
							<ul>
								<li><a href="fixtures.php">Fixtures</a></li>
								<li><a href="standings.php">Season Standings</a></li>
								<li><a href="#">Highlights</a></li>
								<li><a href="team.php">Teams</a></li>
								<li><a href="players.php">Players</a></li>
								<?php
								if(isset($_SESSION['username'])){ 
                                    if($_SESSION['username'] == "Admin"){
                                        echo '<li><a href="admin.php">Admin Page</a></li>';
                                    }else{
                                        echo '<li><a href="tickets.php">Purchase Tickets</a></li>';
									}
								}else{
									echo '<li><a href="tickets.php">Purchase Tickets</a></li>';
								}
                                ?>
							</ul>
						</li>
						<?php

							if(isset($_SESSION['username'])){ //cek apakah dia sudah login sebelumnya
								if($_SESSION['username'] == "Admin"){
									echo '
									<li>
										<a class="icon fa-angle-down">'.$_SESSION['username'].'</a>
										<ul>
											<li><a href="admin.php">Admin Page</a></li>
											<li><a href="logout.php">Logout</a></li>
										</ul>
									</li>
									';
								}else{
									echo '
									<li>
										<a class="icon fa-angle-down">'.$_SESSION['username'].'</a>
										<ul>
											<li><a href="tickets.php">Purchase Tickets</a></li>
											<li><a href="status.php">Ticket Status</a></li>
											<li><a href="logout.php">Logout</a></li>
										</ul>
									</li>
									';
								}

							}else{
								echo '<li><a href="login/login.php">Sign In</a></li>';
							}
						?>
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>Highlights</h2>
					<p>See all the player highlights within the season.</p>
				</header>
				<div class="container">
					<div class="row 200%">
						<?php
						$someArray = "";
						$curl = curl_init();
						curl_setopt_array($curl, array(
							CURLOPT_URL => "https://server1.api-football.com/topscorers/524",
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_FOLLOWLOCATION => true,
							CURLOPT_ENCODING => "",
							// CURLOPT_MAXREDIRS => 10,
							// CURLOPT_TIMEOUT => 30,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "GET",
							CURLOPT_HTTPHEADER => array(
								"x-rapidapi-key: 4ea5a8783ac70c50f59c9139a5a205d0"
							),
						));

						$response = curl_exec($curl);
						$err = curl_error($curl);

						curl_close($curl);

						if ($err) {
							echo "cURL Error #:" . $err;
						} else {
							$someArray = json_decode($response,true);
						}
                            for ($x = 0; $x <$someArray["api"]["results"]; $x++) {
								
								$nama = $someArray["api"]["topscorers"][$x]["player_name"];
								$team = $someArray["api"]["topscorers"][$x]["team_name"];

								$app = $someArray["api"]["topscorers"][$x]["games"]["appearences"];
								$min = $someArray["api"]["topscorers"][$x]["games"]["minutes_played"];

								$gt = $someArray["api"]["topscorers"][$x]["goals"]["total"];
								$ga = $someArray["api"]["topscorers"][$x]["goals"]["assists"];
								$gc = $someArray["api"]["topscorers"][$x]["goals"]["conceded"];

								$st = $someArray["api"]["topscorers"][$x]["shots"]["total"];
								$so = $someArray["api"]["topscorers"][$x]["shots"]["on"];

								$ps = $someArray["api"]["topscorers"][$x]["penalty"]["success"];
								$pm = $someArray["api"]["topscorers"][$x]["penalty"]["missed"];
								$pd = $someArray["api"]["topscorers"][$x]["penalty"]["saved"];

								$pm = $someArray["api"]["topscorers"][$x]["penalty"]["missed"];
								$pd = $someArray["api"]["topscorers"][$x]["penalty"]["saved"];

								$cy = $someArray["api"]["topscorers"][$x]["cards"]["yellow"];
								$cs = $someArray["api"]["topscorers"][$x]["cards"]["second_yellow"];
								$cr = $someArray["api"]["topscorers"][$x]["cards"]["red"];

								
								$pieces = explode(' ', $nama);
								$last_nama = array_pop($pieces);
								$pieces = explode(' ', $team);
								$last_team = array_pop($pieces);

								$curl = curl_init();
								curl_setopt_array($curl, array(
									CURLOPT_URL => "https://www.thesportsdb.com/api/v1/json/1/searchplayers.php?t=".$last_team."&p=".$last_nama,
									CURLOPT_RETURNTRANSFER => true,
									CURLOPT_FOLLOWLOCATION => true,
									CURLOPT_ENCODING => "",
									// CURLOPT_MAXREDIRS => 10,
									// CURLOPT_TIMEOUT => 30,
									CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
									CURLOPT_CUSTOMREQUEST => "GET"
									// CURLOPT_HTTPHEADER => array(
									// 	"x-rapidapi-key: 4ea5a8783ac70c50f59c9139a5a205d0"
									// ),
								));

								$response = curl_exec($curl);
								$err = curl_error($curl);

								curl_close($curl);

								if ($err) {
									echo "cURL Error #:" . $err;
								} else {
									$someArray1 = json_decode($response,true);
								}

								echo '
								<section id="content">
								<h3>'.($x+1).'. '.$nama.' - '.$team.'</h3>';
								if(($x%2)==0){
									echo '<p><span class="image left"><img src="'.$someArray1['player'][0]['strThumb'].'" alt="" /></span>'.$someArray1['player'][0]['strDescriptionEN'].'</p>';
								}else{
									echo '<p><span class="image right"><img src="'.$someArray1['player'][0]['strThumb'].'" alt="" /></span>'.$someArray1['player'][0]['strDescriptionEN'].'</p>';
								}
								echo '
								 <p>Appearences : '.$app.', Minutes Played : '.$min.'. <b style="visibility: hidden">Aliquam massa urna, imperdiet sit amet mi non, bibendum euismod est. Curabitur mi justo, tinci.</b></p>
								 <div class="row" style="margin-left: 100px">
									 <div class="column">
										 <h2>Goals</h2>
										 <ul>
											 <li>Totals 	: '.$gt.'</li>
											 <li>Assists 	: '.$ga.'</li>
											 <li>Conceded 	: '.$gc.'</li>
										 </ul>
									 </div>
									 <div class="column">
										 <h2>Shots</h2>
										 <ul>
											 <li>Total 	: '.$st.'</li>
											 <li>On 	: '.$so.'</li>
										 </ul>
									 </div>
									 <div class="column">
										 <h2>Penalty</h2>
										 <ul>
											 <li>Success 	: '.$ps.'</li>
											 <li>Missed 	: '.$pm.'</li>
											 <li>Saved 		: '.$pd.'</li>
										 </ul>
									 </div>
									 <div class="column">
										 <h2>Cards</h2>
										 <ul>
											 <li>Yellow 		: '.$cy.'</li>
											 <li>Second Yellow 	: '.$cs.'</li>
											 <li>Red 			: '.$cr.'</li>
										 </ul>
									 </div>
								 </div>
								 <hr style="background-color: black;">
							 </section>
								';
                            } 
                        ?>
					</div>
				</div>
			</section>
			
		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
					<li><a href="#" class="icon fa-envelope"><span class="label">Envelope</span></a></li>
				</ul>
				<ul class="menu">
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Terms of Use</a></li>
					<li><a href="#">Privacy</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<span class="copyright">
						<!-- &copy; Copyright. All rights reserved. Design by <a href="http://www.html5webtemplates.co.uk">Responsive Web Templates</a> -->
				</span>
			</footer>

	</body>
</html>
