<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

    <div class="main" style="padding-top:70px;">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/SignIn.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="your_name" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group" style="visibility: hidden;">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Sign in"/>
                                <a href="register.php"><input style="margin-left: 25px; background-color: gray" type="button" class="form-submit" value="Register"/></a>
                            </div>
                        </form>
                        <div class="social-login">
                        <a href="../index.php" class="signup-image-link">Back to homepage</a>
                            <!-- <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<?php
session_start();

if(isset($_SESSION['username'])){ //cek apakah dia sudah login sebelumnya
	echo "
		<script type='text/javascript'>
			 	swal({title: 'Done!', text: 'Anda sudah login sebelumnya!', icon: 
				'success'}).then(function(){ 
				   	window.location = '../index.php';
				   }
				);
		</script>
		";
}

    if(isset($_POST['signin'])) { 
        $nama = $_POST['name']; $pass = $_POST['pass'];
        $koneksi = mysqli_connect('localhost','root','','tubeseai');
        $sql = "SELECT idUser, email FROM users WHERE username = '$nama' and pass = '$pass'";
        $kueri = mysqli_query($koneksi, $sql);

        $count = mysqli_num_rows($kueri);

        if($count >= 1) {
            $_SESSION['username'] = $nama;

            while($row = $kueri->fetch_assoc()) {
                $_SESSION['id'] = $row['idUser'];
                $_SESSION['email'] = $row['email'];
            }

            if($nama == "Admin"){
                echo '
                <script>
                swal("Success!", "Sign In Successful!", "success").then((value) => {
                    window.location.href="../admin.php";
                 });
                </script>';
            }else{
                echo '
                <script>
                swal("Success!", "Sign In Successful!", "success").then((value) => {
                    window.location.href="../index.php";
                 });
                </script>';
            }
         }else {
            echo '<script>swal("Failed.", "Username or Password Incorrect.", "error")</script>';
        } 
    }
?>