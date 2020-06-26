<!DOCTYPE HTML>
<?php
session_start();
?>

<html>
	<head>
		<title>Confirmation</title>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
        
        <style>

            input[type=number], select {
            width: 100%;
            padding: 8px 20px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            background: rgba(144, 144, 144, 0.075);
            border: solid 1px rgba(144, 144, 144, 0.25);
            }

            * {
            box-sizing: border-box;
            }

            /* Create three equal columns that floats next to each other */
            .column {
            width: 33.33%;
            }

            /* Clear floats after the columns */
            .row:after {
            content: "";
            display: table;
            clear: both;
            }
            </style>
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
								<li><a href="#">Season Standings</a></li>
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
                        <h3>Confirmation Form</h3>
                        <br><br>
                        <div class="row" style="margin-left:5px;text-align: center; vertical-align: middle">

                        <?php

                            $tgl = "";
                            $home = "";
                            $away = "";
                            $time = "";

                                if(isset($_GET['klik'])){
                                    $tgl = $_GET['tgl'];
                                    $home1 = $_GET['home'];
                                    $away1 = $_GET['away'];
                                    $time = $_GET['time'];

                                

                                    if ($home1 == trim($home1) && strpos($home1, ' ') !== false) {
                                        $home = str_replace(' ', '_', $home1);
                                    }else{
                                        $home = $home1;
                                    }

                                    if ($away1 == trim($away1) && strpos($away1, ' ') !== false) {
                                        $away = str_replace(' ', '_', $away1);
                                    }else{
                                        $away = $away1;
                                    }
                                } 
                                
                            if($home == "Man_City"){
                                $home = "Manchester_City";
                            }else if($home == "Man_United"){
                                $home = "Manchester_United";
                            }else if($home == "Sheffield_United"){
                                $home = "Sheffield";
                            }

                            if($away == "Man_City"){
                                $away = "Manchester_City";
                            }else if($away == "Man_United"){
                                $away = "Manchester_United";
                            }else if($away == "Sheffield_United"){
                                $away = "Sheffield";
                            }

                            $curl = curl_init();
						    curl_setopt_array($curl, array(
							CURLOPT_URL => "https://server1.api-football.com/teams/search/".$home,
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


							$curl = curl_init();
						    curl_setopt_array($curl, array(
							CURLOPT_URL => "https://server1.api-football.com/teams/search/".$away,
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
								$someArray1 = json_decode($response,true);
							}
                            
                            echo '
                            <br>
                            <div class="column">
                                <span class="image fit"><img src="'.$someArray["api"]["teams"][0]["logo"].'" alt="" style="width: 70%; height: 70%; display: block; margin-left: auto; margin-right: auto;"/></span>
                            <!-- <span class="image left"><img src="images/pic08.jpg" alt="" /></span> -->
                            </div>
                            <div class="column">
                                <span>'.$tgl.' , '.$time.'</span>
                                <span><br><h2>'.$someArray["api"]["teams"][0]["name"].' <br>vs<br> '.$someArray1["api"]["teams"][0]["name"].'</h2></span>
                                <span>'.$someArray["api"]["teams"][0]["venue_name"].' - </span>
                                <span>'.$someArray["api"]["teams"][0]["venue_address"].' , '.$someArray["api"]["teams"][0]["venue_city"].'</span>
                            </div>
                            <div class="column">
                                <span class="image fit"><img src="'.$someArray1["api"]["teams"][0]["logo"].'" alt="" style="width: 70%; height: 70%; display: block; margin-left: auto; margin-right: auto;"/></span>
                            </div>
                            ';
                            ?>
                        </div>
                        <form method="post" id="myForm">
                            <div class="row uniform">
								<div class="12u">
                                    <h5>Your Name :</h5>
                                    <input type="text" name="name" id="name" value="<?php echo $_SESSION['username']; ?>" placeholder="Name" required/>
								</div>
								<div class="6u 12u(3)">
                                    <h5>Phone Number :</h5>
									<input type="text" name="phone" id="phone" placeholder="Phone Number" required/>
								</div>
								<div class="6u 12u(3)">
                                    <h5>Email :</h5>
									<input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Email" required/>
								</div>		
								<div class="4u 12u(2)">
                                    <h5>Seats Class :</h5>
									<input type="radio" id="priority-low" name="priority" checked value="VIP" required>
                                    <label for="priority-low">VIP</label>
                                    <input type="radio" id="priority-normal" name="priority" value="Festival" required>
									<label for="priority-normal">Festival</label>
                                    <input type="radio" id="priority-high" name="priority" value="Tribunes" required>
									<label for="priority-high">Tribunes</label>
								</div>
								<div class="4u 12u(2)">
                                    <h5>Tickets Amount :</h5>
                                    <input type="number" name="jumlah" id="jumlah" min="1" max="15" style="width:65%; height:80%" value="1"><span>&nbsp;&nbsp;x &nbsp;$120</span>
                                </div>
                                <div class="4u 12u(2)">
                                    <h5>Total Price :</h5>
                                    <input type="text" name="total" id="total" readonly="true" style="width:65%; display:inline; margin-right:15px" required>
                                    <button type="button" class="button special small" onclick="cekHarga()">Check</button>
                                </div>
                                <div class="12u">
                                    <h4>Notes :</h4>
										<ul>
											<li>VIP seats costs extra $100.</li>
											<li>Festival seats costs extra $60.</li>
                                            <li>Tribunes seats costs extra $30.</li>
                                            <li>Maximum tickets purchased is 15.</li>
										</ul>
								</div>
                                <div class="6u 12u(3)" style="margin-top: 40px">
                                   <a href="tickets.php"><button type="button" class="button special small">Back</button></a>
								</div>	
                                <div class="6u 12u(3)"  style="margin-top: 40px">
                                    <ul class="actions" style="float: right;">
                                        <li><input type="reset" value="Reset" class="alt"/></li>
                                        <li> <button type="button" class="button special small" onclick="validate()">Checkout</button></li>
									</ul>
									<input type="submit" value="Submit" class="alt" style="display: none;" id="submit"/>
                                </div>
                            </div>
                        </form>
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
    function cekHarga(){
        var hRadio = "";
        var jTiket = document.getElementById('jumlah').value;
        var radios = document.getElementsByName('priority');

        if (isNaN(jTiket) || jTiket < 1 || jTiket > 15) {
            swal("Oops!", "Please input the ticket amount correctly.", "error");
        } else {
            var hTiket = jTiket * 120;
        
            for (var i = 0, length = radios.length; i < length; i++){
                if (radios[i].checked){
                    if(radios[i].value == "VIP"){
                        hRadio = 100;
                    }else if(radios[i].value == "Festival"){
                        hRadio = 60;
                    }else{
                        hRadio = 30;
                    }
                    break;
                }
            }

            hTiket = hTiket + hRadio;
            document.getElementById('total').value = "$" + hTiket;
        }

     }

	 function validate(){

		var isValid = true;
		$("input").each(function() {
			var element = $(this);
				if (element.val() == "") {
					isValid = false;
				}
		});	

		if(isValid){
			swal({
				title: "Are you sure?",
				text: "After checkout you wont be able to refund anymore.",
				icon: "warning",
				buttons: true
				})
				.then((willDelete) => {
				if (willDelete) {
					swal("Success!", "Checkout Successful!", "success").then((value) => {
						document.getElementById("submit").click(); 
					});
					
				} else {
	
				}
			});
		}else{
			swal("Failed!", "Some fields are not filled yet.", "error");
		}

	 }

</script>

<?php

function generateRandomString() {
	$length = 10;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$idTiket= strtoupper(generateRandomString());
	$match = $someArray["api"]["teams"][0]["name"]." vs ".$someArray1["api"]["teams"][0]["name"];
	$stadium = $someArray["api"]["teams"][0]["venue_name"];
	$alamat = $someArray["api"]["teams"][0]["venue_address"]." , ".$someArray["api"]["teams"][0]["venue_city"];
	$kelas= $_POST['priority'];
	$nama = $_POST['name']; 
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$jumlah = $_POST['jumlah']; 
	$hasil = $_POST['total'];
	$idUs = $_SESSION['id'];
	$kodeBooking = strtoupper(generateRandomString());

	$koneksi = mysqli_connect('localhost','root','','tubeseai');

	$sql = "INSERT INTO tiket VALUES ('".$idTiket."', '".$match."', 
	'".$stadium."', '".$alamat."', '".$tgl."', '".$time."');";
	$kueri = mysqli_query($koneksi, $sql);


	$sql = "INSERT INTO pembeliantiket VALUES ('".$kodeBooking."', '".$idTiket."', '".$idUs."', 
	'".$phone."', '".$kelas."', '".$jumlah."', '".$hasil."', '', 'Not Yet Uploaded');";
	$kueri = mysqli_query($koneksi, $sql);

	if($kueri){
		echo '
		<script>
			window.location.href="status.php";
		</script>';
	}else{
		echo 'Error';
	}

}else{
	echo 'Unvalued';
}

?>