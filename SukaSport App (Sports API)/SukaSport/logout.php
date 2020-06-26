
<?php 
session_start();
session_destroy(); 
?>

<html>

	<head>
	<title>Logout</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	</head>

	<body>
		<script type="text/javascript">
			swal({title: "Success!", text: "Berhasil Logout!", icon: 
				"success"}).then(function(){ 
				   	window.location.href = "login/login.php";
				   }
				);
		</script>
	</body>

</html>
