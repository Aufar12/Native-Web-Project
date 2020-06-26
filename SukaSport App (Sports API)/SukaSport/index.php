<!DOCTYPE HTML>

<?php
session_start();
?>

<html>
	<head>
		<title>SukaSport</title>
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
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt skel-layers-fixed">
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="#three">Features</a>
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

		<!-- Banner -->
			<section id="banner" src="images/index.jpg" style="background-size: 1505px 740px; height: 780px;">
				<div class="inner">
					<h2>SukaSport</h2>
					<p>Easiest Ticket Ordering for England Premiere League Matches</p>
					<ul class="actions">
						<li><a href="#one" class="button big scrolly">Learn More</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1">
				<div class="container">
					<header class="major">
						<h2>What is SukaSport.com?</h2>
						<p>SukaSport.com is a website that provides information about sports, especially in English League football, such as match schedules, match standings, information highlights, Club profiles, player profiles, and purchase of match tickets online. On this website we focus on the Premier League which is the most popular league by soccer fans, and on this website we can get information about the world of soccer specifically in the English League and make transactions to purchase tickets for matches of the English League.</p>

					</header>
					<div class="slider" onclick="slider()"> 
						<!-- <span class="nav-previous"></span> -->
						<div class="viewer">
							<div class="reel">
								<div class="slide">
									<img id="slider1" src="" alt="" />
								</div>
								<div class="slide">
									<img id="slider2" src="" alt="" />
								</div>
								<div class="slide">
									<img id="slider3" src="" alt="" />
								</div>
							</div>
						</div>
						<!-- <span class="nav-next" onclick="slider()"></span> -->
					</div>
				</div>
			</section>
			
		<!-- Two -->
			<section id="two" class="wrapper style2">
				<div class="container">
					<header class="major">
						<h2 id="dashboardText"></h2>
						<p id="dashboardDescription"></p>
				</header>
			</div>
			</section>
			
		<!-- Three -->
			<section id="three" class="wrapper style1">
				<div class="container">
					<header class="major">
						<h2>Features</h2>
						<p>Our application supports 6 main features. All of them are using API's from several databases and fetched using Javascript.</p>
					</header>
					<div class="row">
						<div class="4u 6u(2) 12u$(3)">
							<article class="box post">
								<a href="fixtures.php" class="image fit"><img id="gfitur1" src="" alt="" /></a>
								<h3>Fixtures</h3>
								<p>Get all the available fixtures on English Premiere League this season.</p>
								<ul class="actions">
									<li><a href="fixtures.php" class="button">Learn More</a></li>
								</ul>
							</article>
						</div>
						<div class="4u 6u$(2) 12u$(3)">
							<article class="box post">
								<a href="standings.php" class="image fit"><img id="gfitur2" src="" alt="" /></a>
								<h3>Season Standings</h3>
								<p>What team is on top of the current season? Find out now!</p>
								<ul class="actions">
									<li><a href="standings.php" class="button">Learn More</a></li>
								</ul>
							</article>
						</div>
						<div class="4u$ 6u(2) 12u$(3)">
							<article class="box post">
								<a href="highlights.php" class="image fit"><img id="gfitur3" src="" alt="" /></a>
								<h3>Highlights</h3>
								<p>Great Players, Top Scorers, Penalties, and much more! </p>
								<ul class="actions">
									<li><a href="highlights.php" class="button">Learn More</a></li>
								</ul>
							</article>
						</div>
						<div class="4u 6u$(2) 12u$(3)">
							<article class="box post">
								<a href="team.php" class="image fit"><img id="gfitur4" src="" alt="" /></a>
								<h3>Teams</h3>
								<p>Information of all the teams from English Premiere League.</p>
								<ul class="actions">
									<li><a href="team.php" class="button">Learn More</a></li>
								</ul>
							</article>
						</div>
						<div class="4u 6u(2) 12u$(3)">
							<article class="box post">
								<a href="players.php" class="image fit"><img id="gfitur5" src="" alt="" /></a>
								<h3>Players</h3>
								<p>What are you waiting for? Get all your favorite player information here!</p>
								<ul class="actions">
									<li><a href="players.php" class="button">Learn More</a></li>
								</ul>
							</article>
						</div>
						<div class="4u$ 6u$(2) 12u$(3)">
							<article class="box post">

							<?php

						if(isset($_SESSION['username'])){ //cek apakah dia sudah login sebelumnya
							if($_SESSION['username'] == "Admin"){
								echo '
								<a href="admin.php" class="image fit"><img id="gfitur6" src="images/admin.jpg" alt="" height="213"/></a>
								<h3>Admin Page</h3>
								<p>Welcome Admin! Users tickets are waiting for your verification.</p>
								<ul class="actions">
									<li><a href="admin.php" class="button">Learn More</a></li>
								</ul>';
							}else{
								echo '
								<a href="tickets.php" class="image fit"><img id="gfitur6" src="images/tiket.jpg" alt="" height="213"/></a>
								<h3>Purchase Tickets</h3>
								<p>Enjoying EPL match so far? Buy our tickets at reasonable price!</p>
								<ul class="actions">
									<li><a href="tickets.php" class="button">Learn More</a></li>
								</ul>';
							}

						}else{
							echo '<a href="tickets.php" class="image fit"><img id="gfitur6" src="images/tiket.jpg" alt="" height="213"/></a>
							<h3>Purchase Tickets</h3>
							<p>Enjoying EPL match so far? Buy our tickets at reasonable price!</p>
							<ul class="actions">
								<li><a href="tickets.php" class="button">Learn More</a></li>
							</ul>';						}
							?>
	
							</article>
						</div>
					</div>
				</div>
			</section>
			
		<!-- CTA -->
			<section id="cta" class="wrapper style3">
				<h2>Don't have a SukaSport account yet?</h2>
				<ul class="actions">
					<li><a href="login/register.php" class="button big">Register</a></li>
				</ul>
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

<script type="text/javascript">
	fetch('https://www.thesportsdb.com/api/v1/json/1/lookupleague.php?id=4328', {
  	"method": "GET"
  	}).then(function(response) {
	   return response.json();
	 })
	 .then(function(myJson) {
		console.log(JSON.stringify(myJson, null, "\t"));
		 z = myJson["leagues"][0]["strFanart3"];
		//  document.getElementById("banner").style.backgroundImage = "url("+z+")";
		
		 document.getElementById("banner").style.backgroundImage = "url(images/index.jpg)";
		 y = myJson["leagues"][0]["strLeague"];
		 document.getElementById("dashboardText").innerHTML = y;
		 x = myJson["leagues"][0]["strDescriptionEN"];
		 document.getElementById("dashboardDescription").innerHTML = x;
		 slide1 = myJson["leagues"][0]["strFanart1"];
		 document.getElementById("slider1").src = slide1;
		 gf2 = myJson["leagues"][0]["strFanart2"];
		 document.getElementById("gfitur2").src = gf2;
		 gf3 = myJson["leagues"][0]["strFanart4"];
		 document.getElementById("gfitur3").src = gf3;
		//  gf6 = myJson["leagues"][0]["strBadge"];
		//  document.getElementById("gfitur6").src = gf6;
		 

	 });

	fetch('https://www.thesportsdb.com/api/v1/json/1/searchevents.php?e=City_vs_chelsea&s=1920', {
  	"method": "GET"
  	}).then(function(response) {
	   return response.json();
	 })
	 .then(function(myJson) {
		console.log(JSON.stringify(myJson, null, "\t"));
		 z = myJson["event"][0]["strThumb"];
		 document.getElementById("gfitur1").src = z;
	 });

	fetch('https://www.thesportsdb.com/api/v1/json/1/searchplayers.php?p=Danny%20Welbeck', {
  	"method": "GET"
  	}).then(function(response) {
	   return response.json();
	 })
	 .then(function(myJson) {
		console.log(JSON.stringify(myJson, null, "\t"));
		 z = myJson["player"][0]["strFanart2"];
		 document.getElementById("gfitur4").src = z;
	 });

	 fetch('https://www.thesportsdb.com/api/v1/json/1/searchplayers.php?p=vardy', {
  	"method": "GET"
  	}).then(function(response) {
	   return response.json();
	 })
	 .then(function(myJson) {
		console.log(JSON.stringify(myJson, null, "\t"));
		 z = myJson["player"][0]["strFanart1"];
		 document.getElementById("gfitur5").src = z;
	 });

   </script>