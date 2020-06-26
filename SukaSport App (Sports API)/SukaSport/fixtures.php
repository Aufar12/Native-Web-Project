<!DOCTYPE HTML>
<?php
	session_start();
?>
<html>
	<head>
		<title>Fixtures</title>
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
								<li><a href="#">Fixtures</a></li>
								<li><a href="standings.php">Season Standings</a></li>
								<li><a href="highlights.php">Highlights</a></li>
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
					<h2>Fixtures</h2>
					<p>Get all the available fixtures on English Premiere League this season.</p>
				</header>
				<div class="container">
					<!-- Content -->
						<section id="content">
							<a href="#" class="image fit"><img id="banners" src="images/epl.jpg" alt=""/></a>
							<h4>Upcoming Matches</h4>
									<div class="table-wrapper">
										<table id="ev1" style="text-align: center; 
    vertical-align: middle;">
										</table>
									</div>
                                    <h4>Previous Matches</h4>
									<div class="table-wrapper" style="text-align: center; 
    vertical-align: middle;">
										<table id="ev2">
										</table>
									</div>
                            
						</section>
								
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
			<!-- &copy; Copyright. All rights reserved. Design by <a href="http://www.html5webtemplates.co.uk">Responsive Web Templates</a>	 -->
				</span>
			</footer>

	</body>
</html>

<script>

    fetch('https://www.thesportsdb.com/api/v1/json/1/eventsnextleague.php?id=4328', {
  	"method": "GET"
  	}).then(function(response) {
	   return response.json();
	 })
	 .then(function(myJson) {
		console.log(JSON.stringify(myJson, null, "\t"));
        for (var i = myJson["events"].length - 1; i >= 0; i--) {
            var table = document.getElementById("ev1");
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell5 = row.insertCell(2);
            var cell6 = row.insertCell(3);
            cell1.innerHTML = myJson["events"][i]['dateEvent'];
            cell2.innerHTML = myJson["events"][i]['strHomeTeam'];
            cell5.innerHTML =  myJson["events"][i]['strAwayTeam'];
            cell6.innerHTML =  myJson["events"][i]['strTime'];
        }

        var table = document.getElementById("ev1");
        var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell5 = row.insertCell(2);
        var cell6 = row.insertCell(3);
        cell1.innerHTML = "<b>Date</b>";
        cell2.innerHTML = "<b>Home Team</b>";
        cell5.innerHTML = "<b>Away Team</b>";
        cell6.innerHTML =  "<b>Time</b>";
        
     });
     
    fetch('https://www.thesportsdb.com/api/v1/json/1/eventspastleague.php?id=4328', {
  	"method": "GET"
  	}).then(function(response) {
	   return response.json();
	 })
	 .then(function(myJson) {
		console.log(JSON.stringify(myJson, null, "\t"));
        for (var i = myJson["events"].length - 1; i >= 0; i--) {
            var table = document.getElementById("ev2");
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            cell1.innerHTML = myJson["events"][i]['dateEvent'];
            cell2.innerHTML = myJson["events"][i]['strHomeTeam'];
            cell3.innerHTML = myJson["events"][i]['intHomeScore'];
            cell4.innerHTML = myJson["events"][i]['intAwayScore'];
            cell5.innerHTML =  myJson["events"][i]['strAwayTeam'];
            cell6.innerHTML =  myJson["events"][i]['strTime'];
        }

        var table = document.getElementById("ev2");
        var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        cell1.innerHTML = "<b>Date</b>";
        cell2.innerHTML = "<b>Home Team</b>";
        cell3.innerHTML = "<b>Home Score</b>";
        cell4.innerHTML = "<b>Away Score</b>";
        cell5.innerHTML = "<b>Away Team</b>";
        cell6.innerHTML =  "<b>Time</b>";
        
	 });
</script>