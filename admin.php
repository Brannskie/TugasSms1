<?php
include 'connect.php';



if(isset($_GET['aksi'])){
    if($_GET['aksi']=="edit"){
        $result = mysqli_query($koneksi,
    "SELECT * FROM menu WHERE id_menu='$_GET[id_menu]'");
    while ($sql = mysqli_fetch_array($result)){
        $nama= $sql['nama_menu'];
        $pass =$sql['harga_menu'];
        $foto =$sql['foto_menu'];
    }
    }else if($_GET['aksi']=="hapus"){
        $hapus = mysqli_query($koneksi,
    "DELETE FROM menu WHERE id_menu='$_GET[id_menu]'");
    if($hapus){
        header("Location: admin.php");
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
</head>
<body>
    <a href="login.php">Kembali Ke Login PHP</a>

    <form action="" method="POST" enctype="multipart/form-data">
        <table width="25%" border=0>
        <tr>
            <td>Nama Menu</td>
            <td><input type="text" name="username" required value=<?=@$nama?>></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="password" required value=<?=@$pass?>></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td><input type="file" name="foto" required value=<?=@$foto?>></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Tambah"></td>
        </tr>
        </table>
    </form>

    <table border='1'>
        
        <thead>
            <th>No.</th>
            <th>Nama Menu.</th>
            <th>Harga.</th>
            <th>foto</th>
            <th>Aksi.</th>
        </thead>
        <tbody>
            <?php
            include 'connect.php';
            $no=1;
            $query = mysqli_query($koneksi,"SELECT * FROM menu");
            while($sql=mysqli_fetch_array($query)){
                echo "<>";
                echo "<td>".$no; $no++."</td>";
                echo "<td>".$sql['nama_menu']."</td>";
                echo "<td>".$sql['harga_menu']."</td>";
                echo "<td><img src='img/".$sql['foto_menu']."'></td>";
            ?>
            <td> <a href="admin.php?aksi=edit&id_menu=<?=$sql['id_menu']?>">Edit</a>
            <a href="admin.php?aksi=hapus&id_menu=<?=$sql['id_menu']?>">hapus</a>
            </td>
        </tr>
        
        <?php } ?>
        </tbody>
    </table>
    <?php
    include 'connect.php';
    
    if(isset($_POST['submit'])){
        //Menyimpan Data yang diedit
        if($_GET['aksi']=="edit"){
            $id_konsumen = $_GET['id_menu'];
            $username = $_POST['nama_barang'];
            $password = $_POST['harga_barang'];
            $foto = $_FILES['foto_menu']['name'];
            $file_tmp = $_FILES['foto_menu']['tmp_name'];
            move_uploaded_file($file_tmp,'img/'.$foto);
            $edit = mysqli_query($koneksi,"UPDATE menu
             SET nama_menu='$username',harga_menu='$password',foto_menu='$foto'
             WHERE id_menu='$id_konsumen'");

             if($edit > 0 ){
                header("Location: admin.php");
             }
        }else{
            //menyimpan data baru
            $username = $_POST['nama_menu'];
            $password = $_POST['harga_menu'];
            $foto = $_FILES['foto_menu']['name'];
            $file_tmp = $_FILES['foto_menu']['tmp_name'];
            move_uploaded_file($file_tmp,'img/'.$foto);

            $result = mysqli_query($koneksi, "INSERT INTO menu(nama_menu,harga_menu,foto_menu) VALUES('$username','$password','$foto')");
        if($result>0){
            header("Location: admin.php");
            }
        }
     }
    
    ?>
</body>
</html>