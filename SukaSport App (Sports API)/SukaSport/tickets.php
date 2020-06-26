<!DOCTYPE HTML>

<?php
	session_start();
?>

<html>
	<head>
		<title>Tickets</title>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->

	</head>
	<body>

	<?php
		if(isset($_SESSION['username'])){ //cek apakah dia sudah login sebelumnya

		}else{
			echo '
			<script>
			swal("Oops!", "This feature is for member only, please Sign In first.", "warning").then((value) => {
				window.location.href="login/login.php";
			 });
			</script>';
		}
	?>

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
					<h2>Tickets</h2>
					<p>Get all the available upcoming match tickets here.</p>
				</header>
				<div class="container">
					<!-- Content -->
						<section id="content">
							<a href="#" class="image fit"><img id="banners" src="images/epl.jpg" alt=""/></a>
							<h3>Available Tickets</h3>
							<center>
                    <div class="6u 12u(3)" style="width:750px">
                        <h3>Search Match Tickets :</h3>
                        <input style="width:750px"type="text" name="search" id="name" value="" placeholder="Ex: Everton" onkeyup="myFunction();"/>
                        <br>
						<button class="button small" name="klik" onclick="month('2019-12')">December</button>
						<button class="button small" name="klik" onclick="month('2020-01')">January</button>
						<button class="button small" name="klik" onclick="month('2020-02')">February</button>
						<button class="button small" name="klik" onclick="month('2020-03')">March</button>
						<button class="button small" name="klik" onclick="month('2020-04')">April</button>
						<button class="button small" name="klik" onclick="month('2020-05')">May</button> 
                    </div>
					<br><br><br><br>
					</center>
					<div class="table-wrapper">
						<table id="ev1" style="text-align: center; vertical-align: middle">
							<thead>
								<tr>
									<td><b>Date</b></td>
									<td><b>Home Team</b></td>
									<td><b>Away Team</b></td>
									<td><b>Time</b></td>
									<td><b></b></td>
								</tr>
							</thead>
							<tbody>
							<?php

								if(isset($_POST['klik'])){
									echo $_POST['tgl'];
									echo $_POST['home'];
									echo $_POST['away'];
									echo $_POST['time'];
								}
								$curl = curl_init();
								curl_setopt_array($curl, array(
									CURLOPT_URL => "https://www.thesportsdb.com/api/v1/json/1/eventsnextleague.php?id=4328",
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


								$curl = curl_init();
								curl_setopt_array($curl, array(
									CURLOPT_URL => "https://www.thesportsdb.com/api/v1/json/1/eventsseason.php?id=4328&s=1920",
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
									$someArray1 = json_decode($response,true);
								}

								$param =  $someArray["events"][0]['dateEvent'];

								for ($x = 0; $x < count($someArray1["events"])-1; $x++) { 
									if($someArray1["events"][$x]['dateEvent'] >= $param){
										echo '
										<tr>
											<td>'.$someArray1["events"][$x]['dateEvent'].'</td>
											<td>'.$someArray1["events"][$x]['strHomeTeam'].'</td>
											<td>'.$someArray1["events"][$x]['strAwayTeam'].'</td>
											<td>'.$someArray1["events"][$x]['strTime'].'</td>
											<form method="get" action="konfirmasi.php" onsubmit="return confirm("Are you sure you wish to delete?");"> 
											<input name="tgl" value="'.$someArray1["events"][$x]['dateEvent'].'" style="display: none" type="hidden"/>
											<input name="home" value="'.$someArray1["events"][$x]['strHomeTeam'].'" style="display: none" type="hidden"/>
											<input name="away" value="'.$someArray1["events"][$x]['strAwayTeam'].'" style="display: none" type="hidden"/>
											<input name="time" value="'.$someArray1["events"][$x]['strTime'].'" style="display: none" type="hidden"/>
											<td>
											<input type="submit" name="klik" class="button special small" value="Purchase">
											</form>
											</td>
										</tr>
										';
									}else{
									
									}

								}

?>
											</tbody>
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
	
$(document).ready(function(){
  $("#name").on("keyup", function() {
	var data = this.value.split(" ");
    // Get the table rows
    var rows = $("#ev1").find("tr");
    if (this.value == "") {
        rows.show();
        return;
    }
    
    // Hide all the rows initially
    rows.hide();
 
    // Filter the rows; check each term in data
    rows.filter(function (i, v) {
        for (var d = 0; d < data.length; ++d) {
            if ($(this).is(":contains('" + data[d] + "')")) {
                return true;
            }
        }
        return false;
    }).show();

  });
});



function month(x){
	document.getElementById('name').innerHTML = x;
	document.getElementById('name').value= x;
	
	$(document).ready(function(){
			var value = x;
			$("#ev1 tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
	});

}
</script>
