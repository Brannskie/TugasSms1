<?php
require 'connect.php';
if(isset($_POST["register"])){
    $username =$_POST['username'];
    $password =$_POST['password'];
    $password2 =$_POST['password2'];
    $query = mysqli_query($koneksi,"INSERT INTO konsumen VALUES (' ' , '$username', '$password')");
    echo "<script>
        alert('user berhasil ditambahkan');
        window.location ='loginform.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="sign.css">
</head>
<body>
<div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text">
                    <h2>Welcome!</h2>
                    <p>Create Your Account<br>,For Free!</p>
                    <a href="" class="btn">Sign Up</a>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="" method="POST">
                        <p>
                            <label>Username/Email address<span>*</span></label>
                            <input type="text" placeholder="Username or Email" name="username" >
                        </p>

                        <p>
                            <label>Password<span>*</span></label>
                            <input type="password" placeholder="Password" name="password">
                        </p>
                        <p>
                            <label>Password<span>*</span></label>
                            <input type="password" placeholder="Password" name="password2">
                        </p>
                        <p>
                            <input type="submit" name="register" value="Sign In">
                        </p>
                         <p>
                            <a href="loginform.php">Already Have Account?Click Here!</a> 
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>