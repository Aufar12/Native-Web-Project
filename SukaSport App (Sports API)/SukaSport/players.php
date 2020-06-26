<?php
	session_start();
?>

<html>
	<head>
		<title>Players</title>
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
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
								<li><a href="team.php">Teams</a></li>
								<li><a href="#">Players</a></li>
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
					<h2>Players</h2>
					<p>Get all your favorite player information from a team here.</p>
				</header>
				<div class="container">
                    <center>
                    <div class="6u 12u(3)">
                    <form method="post"> 
                        <h3>Please input the team name :</h3>
                        <input type="text" name="search" id="name" value="" placeholder="Ex: Arsenal" />
                        <br>
                        <button class="button special" name="klik">Search</button>
                    </form>
                    </div>
                    <br>
                    </center>
                    <?php
                        if(isset($_POST['klik']) and isset($_POST['search'])) { 
                              konten($_POST['search']);
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


<?php
    function konten($tim){

		$str = "";

		if ($tim == trim($tim) && strpos($tim, ' ') !== false) {
			$str = str_replace(' ', '_', $tim);
		}else{
			$str = $tim;
		}

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.thesportsdb.com/api/v1/json/1/searchplayers.php?t=".$str,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $someArray = json_decode($response,true);
        }

        if(isset($someArray["player"])) { 
			echo '<script>swal("Success!", "Players Found!", "success");</script>';
            $tim = $someArray["player"][0]["strTeam"];
            echo '
            <hr><center>
            <h2>'.$tim.'</h2></center>
            <hr>
            ';
            for ($x = 0; $x < count($someArray["player"])-1; $x++) {
                $nama = $someArray["player"][$x]["strPlayer"];
                $dp = $someArray["player"][$x]["strFanart1"];
                $desc = $someArray["player"][$x]["strDescriptionEN"];
                $tgl = $someArray["player"][$x]["strBirthLocation"];
                $nation = $someArray["player"][$x]["strNationality"];
                $pos = $someArray["player"][$x]["strPosition"];
                $nomor = $someArray["player"][$x]["strNumber"];
                $foot = $someArray["player"][$x]["strSide"];
                $gaji = $someArray["player"][$x]["strWage"];
                $ig = $someArray["player"][$x]["strInstagram"];
                    echo '
                    <section id="content">
                        <a href="#" class="image fit"><img src="" alt="" /></a>
                        <h3 id="tes1">'.$nama.'</h3>
                        <p><span class="image right"><img src="'.$dp.'" alt="--- Picture Null ---" /></span><span>'.$desc.'</span></p>
                        <h4>More about this player?</h4>
                        <ul>
                            <li>Born Location : '.$tgl.'</li>
                            <li>Nationality : '.$nation.'</li>
                            <li>Position : '.$pos.'</li>
                            <li>Jersey Number : '.$nomor.'</li>
                            <li>Dominant Foot : '.$foot.'</li>
                            <li>Wage : '.$gaji.'</li>
                            <li>Instagram : <a>'.$ig.'</a></li>
                        </ul>
                        <hr style="background-color:black;">
                    </section>
                    ';
            }   
        }else{
			echo '<script>swal("Oops!", "Team not found.", "error");</script>';
			echo '<p>Team not Found.</p>';
        }
    }
?>
