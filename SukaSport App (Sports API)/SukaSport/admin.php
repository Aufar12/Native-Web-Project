<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin Page</title>
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
                                    if($_SESSION['username'] == "Admin"){
                                        echo '<li><a href="admin.php">Admin Page</a></li>';
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
					<h2>Admin Page</h2>
					<p>All tickets for Payment Verification are processed here.</p>
				</header>
				<div class="container">
                    <!-- Content -->
                    
						<section id="content">
                            <h3>Users Tickets</h3>
                            <center>
                            <div class="6u 12u(3)" style="width:750px">
                                <h4>Search Users Tickets:</h4>
                                <input style="width:750px"type="text" name="search" id="name" value="" placeholder="Ex: Everton"/>
                                <br><br><br><br>
                            </div>
                           
									<div class="table-wrapper">
										<table style="text-align: center; vertical-align: middle" id="ev1">
											<thead>
												<tr>
													<td><b>Booking Code</b></td>
													<td><b>Match</b></td>
                                                    <td><b>Seats Class</b></td>
                                                    <td><b>Ticket Amount</b></td>
                                                    <td><b>Price</b></td>
                                                    <td><b>Proof of Payment</b></td>
                                                    <td><b>Status</b></td>
                                                    <td><b>Change Status</b></td>
												</tr>
											</thead>
											<tbody>
                                            <?php

                                $koneksi = mysqli_connect('localhost','root','','tubeseai');
                                $nama = $_SESSION['id'];

                                $sql = "SELECT kodeBooking, idTiket, kelas, jumlah, harga, buktiBayar, status1  
                                FROM pembeliantiket";

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

                                        if($row["buktiBayar"] == ""){
                                            echo "<td>-</td>";
                                        }else{
                                            echo "<td><a href='buktiBayar/". $row["buktiBayar"]. "' target='_blank'>". $row["buktiBayar"]. "</a></td>";
                                        }

                                        echo "<td class='status1'>". $row["status1"]. "</td>";
                                        echo '<td class="status2" style="display: none"><br>
                                            <input type="text" list="cars" class="status8"/>
                                                <datalist id="cars">
                                                    <option value="Payment Verified">Payment Verified</option>
                                                    <option value="Re-Upload">Re-Upload</option>
                                                    <option value="On Verification">On Verification</option>
                                                </datalist>
                                        </td>';
                                        echo "<td class='status5'><input type='button' value='Change Status' class='button small' name='status3' id='change' src='".$counter."'></td>";                                        
                                        echo "<td class='status4' style='display: none'>
                                        <input type='button' value='Submit' class='button small special' name='status6' id='change' src='".$counter."'><br><br>
                                        <input type='button' value='Cancel' class='button small' name='status7' id='change' src='".$counter."'>
                                        </td>";
                                        
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
            
            <form method="post" style="display: none" id="form">
                <input type="text" name="statoes" id="statoes">
                <input type="text" name="statoes1" id="statoes1">
            </form>
			
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

var s = document.getElementsByClassName("status1");
var t = document.getElementsByClassName("status2");
var u = document.getElementsByName("status3");
var v = document.getElementsByClassName("status4");

var x = document.getElementsByClassName("status5");
var r = document.getElementsByName("status6");
var q = document.getElementsByName("status7");
var o = document.getElementsByClassName("status8");
var y = document.getElementsByClassName("codeT");
var z = document.getElementsByClassName("codeB");

for (var i = 0; i < u.length; i++) {

    u[i].addEventListener("click", function(){

        var counter = this.src.replace(/^.*[\\\/]/, '');
        s[counter].style.display = "none";
        t[counter].style.display = "";
        x[counter].style.display = "none";
        v[counter].style.display = "";

    });

    q[i].addEventListener("click", function(){

        var counter = this.src.replace(/^.*[\\\/]/, '');
        s[counter].style.display = "";
        t[counter].style.display = "none";
        x[counter].style.display = "";
        v[counter].style.display = "none";

    });

    r[i].addEventListener("click", function(){

        swal({
				title: "Admin, are you sure to verify?",
				text: "Be sure to check once more before verifying.",
				icon: "warning",
				buttons: true
				})
				.then((value) => {
				if (value) {

                    var counter = this.src.replace(/^.*[\\\/]/, '');
                    document.getElementById("statoes").value = o[counter].value;
                    document.getElementById("statoes1").value = z[counter].innerHTML;
           
					swal("Success!", "Verify Successful!", "success").then((value) => {
                        document.getElementById("form").submit();
					});
					
				} else {
	
				}
			});
        });

}

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
</script>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $db = mysqli_connect("localhost", "root", "", "tubeseai");

    $counted = $_POST['statoes'];
    $counted1 = $_POST['statoes1'];
      
    $sql = "UPDATE pembeliantiket SET status1='$counted' WHERE kodeBooking='$counted1';";
  	// execute query
    $kueri = mysqli_query($db, $sql);

    echo '
        <script>
			window.location.href="admin.php";
		</script>';
}

?>