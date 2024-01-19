<?php
    session_start();

include 'connect.php';
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
    <div class="h-80 w-80 bg-[#FBFBEB] justify-center mx-auto mt-12 rounded-lg shadow-lg pt-2">
        <h1 class="text-xl text-center font-serif text-[#A3A398]">Brann<span class="text-[#cb997e]">Coffee</span></h1>
        
        <div class="mt-4 px-1 py-1"> 
        <h5 class="ml-4 text-[#6d6875]">Nama Produk : <span class="font-semibold"><?=$_SESSION['barang']; ?> </span></h5>
        
        <h5 class=" ml-4 text-[#6d6875]"> Nama Penerima : <span class="font-semibold"> <?=$_SESSION['username']; ?> </span> </h5>
        <h5 class=" ml-4 text-[#6d6875]">Alamat Penerima : <span class="font-semibold"> <?=$_SESSION['rumah']; ?> </span> </h5>      
        <h5 class=" ml-4 text-[#6d6875]">Phone : <span class="font-semibold"><?=$_SESSION['phone']; ?></span></h5>
        <a href="" class=" ml-28 justify-center text-center flex mt-8 bg-sky-600 rounded-full shadow-sm w-16 h-8 hover:bg-sky-500 hover:text-slate-100" onclick="window.print()">Print</a>      
        </div>

        

        <h5></h5>
    </div>
</body>
</html> 