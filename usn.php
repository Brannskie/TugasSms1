<?php
include 'connect.php';
$query = mysqli_query($koneksi, "SELECT * FROM menu");


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
        header("Location: usn.php");
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    


<form action="" method="POST" enctype="multipart/form-data" class="mt-8">


 <h2 class="text-xl mb-4 ml-32 font-semibold">Form Insert&Edit</h2>


  <div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ml-12">Nama Product</label>
    <input type="text" name="nama" id="email" class=" ml-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="name@flowbite.com" required value=<?=@$nama?> >
  </div>


  <div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ml-12 ">Harga</label>
    <input type="text" name="harga" id="email" class=" ml-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required value=<?=@$pass?> >
  </div>
  
  <div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ml-12">Your foto</label>
    <input type="file" name="foto" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ml-12" placeholder="name@flowbite.com" value=<?=@$foto?> >
  </div>
  
  <div class="button ml-12 mb-4">
  <button name="submit" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

  </div>
  </form>

<div class="text-xl font-semibold text-slate-800 mx-auto ml-40 mb-6 underline underline-offset-8">Table Barang.</div>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg block">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama Produk
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga Menu
                </th>
                <th scope="col" class="px-6 py-3">
                    File Foto
                </th>
                <th scope="col" class="px-6 py-3">
                    Hapus
                </th>
                <th scope="col" class="px-6 py-3">
                    Tambah
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($apa = mysqli_fetch_array($query)){
            ?>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white hover:bg-violet-600">
                <?php echo $apa['nama_menu']; ?>
                </th>
                <td class="px-6 py-4">
                <?php echo $apa['harga_menu']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $apa['foto_menu']; ?>
                </td>
                
                
                <td class="px-6 py-4">
                    <a href="Usn.php?aksi=edit&id_menu=<?=$apa['id_menu']?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
                
                <td class="px-6 py-4">
                    <a href="Usn.php?aksi=hapus&id_menu=<?=$apa['id_menu']?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</a>
                </td>
            </tr>
            <?php }?>




        </tbody>
    </table>
</div>

<?php
    include 'connect.php';
    
    if(isset($_POST['submit'])){
        //Menyimpan Data yang diedit
        if($_GET['aksi']=="edit"){
            $id_konsumen = $_GET['id_menu'];
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $foto = $_FILES['foto']['name'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp,'img/'.$foto);
            $edit = mysqli_query($koneksi,"UPDATE menu
             SET nama_menu='$nama',harga_menu='$harga',foto_menu='$foto'
             WHERE id_menu='$id_konsumen'");

             if($edit > 0 ){
               echo "<script>
                    document.location.href= 'usn.php'
                </script>";
             }
        }else{
            //menyimpan data baru
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $foto = $_FILES['foto']['name'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp,'img/'.$foto);

            $result = mysqli_query($koneksi, "INSERT INTO menu(nama_menu,harga_menu,foto_menu) VALUES('$nama','$harga','$foto')");
        if($result>0){
            echo "<script>
                    document.location.href= 'usn.php'
                </script>";

            }
        }
     }
    
     ?>

</body>
</html>