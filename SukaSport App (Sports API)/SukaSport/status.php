<!DOCTYPE HTML>
<html>
	<head>
		<title>Ticket Status</title>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

    <?php
	session_start();

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
					<h2>Ticket Status</h2>
					<p>All Information regarding purchased tickets can be seen here.</p>
				</header>
				<div class="container">
					<!-- Content -->
						<section id="content">
							<a href="#" class="image fit"><img id="banners" src="images/tiket.jpg" alt="" height="475"/></a>
                            <h4>Purchased Tickets</h4>
                            <center>
									<div class="table-wrapper">
										<table style="text-align: center; vertical-align: middle">
											<thead>
												<tr>
													<td><b>Booking Code</b></td>
													<td><b>Match</b></td>
                                                    <td><b>Seats Class</b></td>
                                                    <td><b>Ticket Amount</b></td>
                                                    <td><b>Price</b></td>
                                                    <td><b>Upload</b></td>
                                                    <td><b>Proof of Payment</b></td>
                                                    <td><b>Status</b></td>
												</tr>
											</thead>
											<tbody>
                                            <?php

                                $koneksi = mysqli_connect('localhost','root','','tubeseai');
                                $nama = $_SESSION['id'];

                                $sql = "SELECT kodeBooking, idTiket, kelas, jumlah, harga, buktiBayar, status1  
                                FROM pembeliantiket WHERE idUser = '$nama'";

                                $result = mysqli_query($koneksi, $sql);
                                $counter = 0;

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td class='codeB'>" . $row["kodeBooking"] . "</td>";
                                        echo "<td class='codeT' style='display:none'>" . $row["idTiket"] . "</td>";

                                        $tieck = $row["idTiket"];

                                        $sql1 = "SELECT match1, tgl, jam FROM tiket WHERE idTiket = '$tieck'";

                                        $result1 = mysqli_query($koneksi, $sql1);

                                        if ($result1->num_rows > 0) {
                                            // output data of each row
                                            while($row1 = $result1->fetch_assoc()) {
												echo "<td>".$row1["match1"].", <br>".$row1["jam"].
												",<br>".$row1["tgl"]."</td>";
                                            }

                                        } else {
                                            echo "0 results";
                                        }

                                        echo "<td>". $row["kelas"]. "</td>";
                                        echo "<td>". $row["jumlah"]. "</td>";
                                        echo "<td>". $row["harga"]. "</td>";

                                        echo '<form method="post" id="form" enctype="multipart/form-data">';
                                        echo "<td><input class='imagine' type='file' name='image".$counter."' id='file' src='".$counter."'>". $row["buktiBayar"]. "</td>";
                                        echo '<input type="text" name="upload" id="click" value="" style="display: none">';
                                        echo '<input type="text" name="upload1" id="click1" value="" style="display: none">';
                                        echo '<input type="text" name="upload2" id="click2" value="" style="display: none"></form>';
                                        echo "<td>". $row["buktiBayar"]. "</td>";

                                        echo "<td>". $row["status1"]. "</td>";
                                        
                                        echo "</tr>";
                                        $counter += 1;

                                    }

                                } else {
                                    echo "0 results";
                                }

                                ?>
											</tbody>
                                        </table>
                            </center>
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

var x = document.getElementsByClassName("imagine");
var y = document.getElementsByClassName("codeT");
var z = document.getElementsByClassName("codeB");

for (var i = 0; i < x.length; i++) {

    x[i].onchange = function(){


        swal({
				title: "Are you sure you want to upload?",
				text: "Our administrators will verify once you have uploaded.",
				icon: "warning",
				buttons: true
				})
				.then((value) => {
				if (value) {

                    var filename = this.value.replace(/^.*[\\\/]/, '');
                    var counter = this.src.replace(/^.*[\\\/]/, '');
                    

                    document.getElementById("click").value = filename;
                    document.getElementById("click1").value = y[counter].innerHTML;
                    document.getElementById("click2").value = z[counter].innerHTML;
           
					swal("Success!", "Upload Successful!", "success").then((value) => {
                        document.getElementById("form").submit();
					});
					
				} else {
	
				}
			});
    };

}
</script>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $db = mysqli_connect("localhost", "root", "", "tubeseai");

  // Initialize message variable
    $msg = "";

    // echo '<script>alert("'.$counter.'");</script>';
      // Get image name
      $counted = $_POST['upload'];
      $counted1 = $_POST['upload1'];
      $counted2 = $_POST['upload2'];
    //   $imager = $_FILES['image1']['name'];
    //   echo '<script>alert("'.$counted.'");</script>';
    //   echo '<script>alert("'.$counted1.'");</script>';
    // //   echo '<script>alert("'.$imager.'");</script>';
      

  	// image file directory
    $target = "buktiBayar/".basename($counted);

  	$sql = "UPDATE pembeliantiket SET buktiBayar='$counted' WHERE idTiket='$counted1';";
  	// execute query
      $kueri = mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
      }
      
      
      $sql = "UPDATE pembeliantiket SET status1='On Verification' WHERE kodeBooking='$counted2';";
  	// execute query
      $kueri = mysqli_query($db, $sql);
      echo '
        <script>
			window.location.href="status.php";
		</script>';
}

?>