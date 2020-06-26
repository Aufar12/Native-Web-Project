<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"  required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                                <input type="reset" name="reset" id="reset" class="form-submit" value="Clear" style=" background-color: gray"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/Register.jpg" style="width:100%;height:100%;" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already a member</a>
                        <a href="../index.php" class="signup-image-link">Back to Homepage</a>
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

if(isset($_POST['signup'])) { 
    if(isset($_POST['agree-term'])){
        if($_POST['pass'] != $_POST['re_pass']){
            echo '<script>swal("Failed!", "Password not match.", "error");</script>';
        }else{
            $nama = $_POST['name']; $pass = $_POST['pass']; $email = $_POST['email'];
            $koneksi = mysqli_connect('localhost','root','','tubeseai');
            $sql = "INSERT INTO users VALUES ('', '".$nama."', '".$pass."', '".$email."');";
            $kueri = mysqli_query($koneksi, $sql);

            if($kueri){
                echo '
                <script>
                swal("Success!", "Register Successful!", "success").then((value) => {
                    window.location.href="login.php";
                 });
                </script>';
            }else{
                echo '<script>swal("Error.", "Please try again", "error");</script>';
            }
        }
    }else{
        echo '<script>swal("Warning!", "Please accept our terms and condition.", "warning");</script>';
    }
} 

?>