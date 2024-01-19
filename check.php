<?php
    session_start();
include "connect.php"
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Chechout page is one of the main page in ecommerce website, And it's necessary for all shopping and bussiness website"
    />
    <meta name="keywords" content="Checkout page" />
    <meta name="author" content="Su Myat Aung" />

    <!-- Css link  -->
    <link rel="stylesheet" href="checkstyle.css" />
    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- font awesome icon kit -->
    <script
      src="https://kit.fontawesome.com/9f5c644af7.js"
      crossorigin="anonymous"
    ></script>
    <!-- fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap"
      rel="stylesheet"
    />
    <!-- title -->
    <title>Checkout</title>
  </head>

  <body>
    <?php
    if(!isset($_SESSION['username'])){
      header('location:loginform.php');
    }
    $query = "SELECT * FROM menu where id_menu='$_GET[id]'";
    $result = mysqli_query($koneksi,$query);
    $data= mysqli_fetch_array($result);

    $user = mysqli_query($koneksi,"SELECT * FROM konsumen where username='$_SESSION[username]'");
    $person = mysqli_fetch_assoc($user);
    

    if(isset($_POST["checkout"])){
        $email =$_POST['email'];
        $phone =$_POST['phone'];
        $username =$_POST['name'];
        $alamat =$_POST['alamat'];
        $nama_menu =$_POST['nama_menu'];
        $konsumen =$_POST['id_konsumen'];
        
        $_SESSION['barang'] = $nama_menu;
        $_SESSION['phone'] = $phone;
        $_SESSION['rumah'] = $alamat;
        $_SESSION['username'] = $username;
        




        
        $query = mysqli_query($koneksi,"INSERT INTO transaksi VALUES('' ,'$konsumen','$email ' , '$phone', '$username ', '$alamat', '$nama_menu ')");
        echo "<script>
            alert('pembelian telah berhasil');
            window.location ='struk.php';
        </script>";
    }
?>
    <form action="" method="POST">
    <div class="con">
      <div class="box1">
        <h2 class="title">Checkout</h2>
        <!-- info  -->
        <div class="info">
          <h3>Contact information</h3>

          <p class="label">E-mail</p>

          <div class="input-box">
            <input
              type="text"
              name="email"
              placeholder="Enter Your Email .. "
            />
            <i class="fa-solid fa-envelope"></i>
          </div>

          <div class="input-box">
            <input type="hidden" name="id_konsumen" value="<?=$person['id_konsumen']?>"/>
            <input type="hidden" name="nama_menu" value="<?=$data['nama_menu']?>"/>

            <i class="fa-solid fa-envelope"></i>
          </div>

          <p class="label">Phone</p>

          <div class="input-box">
            <input
              type="text"
              name="phone"
              placeholder="Enter Your Phone .. "
            />
            <i class="fa-solid fa-phone"></i>
          </div>
        </div>
        <!-- end of  info  -->

        <!-- shipping  -->
        <div class="shipping">
          <h3>Shipping address</h3>

          <p class="label">Username</p>

          <div class="input-box">
            <input
              type="text"
              name="name"
              placeholder=""
              value=""
            />
            <i class="fa-solid fa-user"></i>
          </div>

          

          <!-- last  -->

          <div class="last">
            <div class="separate s1">
              <p class="label">Alamat</p>
              <div class="input-box">
                <input
                  type="text"
                  name="alamat"
                  placeholder="Your Country .. "
                />
                <i class="fa-solid fa-earth-americas"></i>
              </div>
            </div>

            
          </div>

          <!-- end of  last  -->

          <input type="checkbox" name="check" id="check" />
          <label for="check"> Save this information for next time</label>
        </div>
        <!--end of  shipping  -->
      </div>
      <!-- end of box-1 -->

      <!-- box-2 -->
      <div class="box2">
        <div class="card">
          <div class="item">
            <img src="kopiii/img/<?=$data['foto_menu']?>" alt="bag" />
            <div class="count">
              <p class="item-name"><?=$data['nama_menu']?></p>
              <h6 class="price">Rp.<?=$data['harga_menu']?></h6>
              
            </div>
          </div>
          
          <div class="end">
            <hr />
            <div class="total">
              <p>Shipping</p>
              <p>$19</p>
            </div>
            <hr />

            <div class="total">
              <p>Total</p>
              <p>Rp.<?=$data['harga_menu']?></p>
            </div>
          </div>
        </div>
        <input type="submit" class="btn" name="checkout" value="submit">
      </div>
      <!-- end of box-2 -->
    </div>
      </form>
    <!-- js link  -->
    <script src="script.js"></script>
  </body>
</html>
