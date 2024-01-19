<?php
    if(isset($_POST["login"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($koneksi,"select * from konsumen where username='$username' and password='$password'");
    if(mysqli_num_rows($query)>0){
        header("Location: admin.php");
    }else{
        header("Location: daftar.php");
    }
}  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
        <p>
            <label>Username/Email address<span>*</span></label>
             <input type="text" placeholder="Username or Email" name="username" >
      </p>

     <p>    <label>Password<span>*</span></label>
              <input type="password" placeholder="Password" name="password">
     </p>
     <p>
     <input type="submit" name="login" value="Sign In">
        </p>
</form>   
</body>
</html>