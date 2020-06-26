<!DOCTYPE HTML>

<?php
	session_start();
?>

<html>
	<head>
		<title>Teams</title>
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
								<li><a href="highlights.php">Highlights</a></li>
								<li><a href="#">Teams</a></li>
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
					<h2>Teams</h2>
					<p>Information of all the teams from English Premiere League.</p>
				</header>
				<div class="container">
                        <?php
    
                            $counter = 1;
                            for ($x = 1; $x <21; $x++) {
                                echo '
                                <section id="content">
                                    <a href="#" class="image fit"><img src="" alt="" /></a>
                                    <h3 id="tes1'.$counter.'">Team Name</h3>
                                    <p><span class="image left"><img id="tes2'.$counter.'" src="images/pic08.jpg" alt="" /></span><span id="tes3'.$counter.'"></span></p>
                                    <h4 id="tes4'.$counter.'">Home Stadium</h4>
                                    <p><span class="image right"><img id="tes5'.$counter.'" src="images/pic09.jpg" alt="" /></span><span id="tes6'.$counter.'"></span></p>
                                    <h4>Find us at : </h4>
                                    <ul>
                                        <li>Website : <a id="tes7'.$counter.'"></a></li>
                                        <li>Facebook : <a id="tes8'.$counter.'"></a></li>
                                        <li>Twitter : <a id="tes9'.$counter.'"></a></li>
                                        <li>Instagram : <a id="tes10'.$counter.'"></a></li>
                                    </ul>
                                    <hr style="background-color:black;">
                                </section>
                                ';
                            $counter++;
                            }
                        ?>		
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
     fetch('https://www.thesportsdb.com/api/v1/json/1/lookup_all_teams.php?id=4328', {
  	"method": "GET"
  	}).then(function(response) {
	   return response.json();
	 })
	 .then(function(myJson) {
		console.log(JSON.stringify(myJson, null, "\t"));

        var counter = 1;
        for (var i = 0; i <= myJson["teams"].length - 1; i++) {
            t1 = myJson["teams"][i]["strTeam"]
            t2 =  myJson["teams"][i]["strTeamFanart1"];
            t3 = myJson["teams"][i]["strDescriptionEN"];
            t4 = myJson["teams"][i]["strStadium"];
            t5 = myJson["teams"][i]["strStadiumThumb"];
            t6 = myJson["teams"][i]["strStadiumDescription"];
            t7 = myJson["teams"][i]["strWebsite"];
            t8 = myJson["teams"][i]["strFacebook"];
            t9 = myJson["teams"][i]["strTwitter"];
            t10 = myJson["teams"][i]["strInstagram"];

            document.getElementById('tes1'+counter).innerHTML = t1;
            document.getElementById('tes2'+counter).src = t2;
            document.getElementById('tes3'+counter).innerHTML = t3;
            document.getElementById('tes4'+counter).innerHTML = t4;
            document.getElementById('tes5'+counter).src = t5;
            document.getElementById('tes6'+counter).innerHTML = t6;
            document.getElementById('tes7'+counter).innerHTML = t7;
			document.getElementById('tes7'+counter).href = "https://" + t7;
            document.getElementById('tes8'+counter).innerHTML = t8;
			document.getElementById('tes8'+counter).href = "https://" + t8;
            document.getElementById('tes9'+counter).innerHTML = t9;
			document.getElementById('tes9'+counter).href = "https://" + t9;
            document.getElementById('tes10'+counter).innerHTML = t10;
			document.getElementById('tes10'+counter).href= "https://" + t10;

            counter++;
        }

	 });
</script>