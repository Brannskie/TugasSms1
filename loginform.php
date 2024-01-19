<?php
include 'connect.php';
session_start();
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username!="" && $password!=""){
        $mysql = mysqli_query($koneksi,"SELECT * FROM konsumen WHERE username='$username' and password='$password'");
        if($data = mysqli_fetch_array($mysql)){
            $_SESSION['username']=$data['username'];
            $_SESSION['password']=$data['password'];
            header('location:index.php');
        }else{

        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">

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
                            <input type="password" placeholder="Password" name="password" >
                        </p>
                        <p>
                            <input type="submit" name="login" value="Sign In">
                        </p>
                         <p>
                            <a href="Sign.php">Dont Have Account?</a> 
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>