<?php
session_start();

$koneksi = mysqli_connect("localhost","root","","kasir");


//insert data produk
if(isset($_POST['insertproduk'])){
    $produkid = $_POST['ProdukID'];
    $nama_produk = $_POST['Nama_Produk'];
    $harga = $_POST['Harga'];
    $stok = $_POST['Stok'];

    $tpro = mysqli_query($koneksi,"insert into produk (ProdukID, Nama_Produk, Harga, Stok) values ('$produkid','$nama_produk','$harga','$stok')");
    if($tpro){
        header('location:produk.php');
    } else {
        echo 'gagal';
        header('location:produk.php');
    }
}

//Update Data Produk
if(isset($_POST['updateproduk'])){
    $produkid = $_POST['ProdukID'];
    $nama_produk = $_POST['Nama_Produk'];
    $harga = $_POST['Harga'];
    $stok = $_POST['Stok'];

    $updatepro   = mysqli_query($koneksi, "update produk set Nama_Produk='$nama_produk', Harga='$harga', Stok='$stok' where ProdukID='$produkid'");
    if($updatepro){
        header('location:produk.php');
    } else {
        echo 'gagal';
        header('location:produk.php');
    }   
}

//Delete Data Produk
if(isset($_POST['deleteproduk'])){
    $produkid = $_POST['ProdukID'];

    $deletepro   = mysqli_query($koneksi, "delete from produk where ProdukID='$produkid'");
    if($deletepro){
        header('location:produk.php');
    } else {
        echo 'gagal';
        header('location:produk.php');
    }   
}

//Update Data Penjualan
if(isset($_POST['updatepenjualan'])){
    $penjualanid = $_POST['PenjualanID'];
    $tanggal_penjualan = $_POST['Tanggal_Penjualan'];
    $total_harga = $_POST ['Total_Harga'];

    $updatepen = mysqli_query($koneksi, "update penjualan set Tanggal_Penjualan='$tanggal_penjualan', Total_Harga='$total_harga' where PenjualanID='$penjualanid'");
    if($updatepen){
        header('location:penjualan.php');
    } else {
        echo 'gagal';
        header('location:penjualan.php');
    }   
}

//Delete Data Penjualan
if(isset($_POST['deletepenjualan'])){
    $penjualanid = $_POST['PenjualanID'];

    $deletepen = mysqli_query($koneksi, "delete from penjualan where PenjualanID='$penjualanid'");
    if($deletepen){
        header('location:penjualan.php');
    } else {
        echo 'gagal';
        header('location:penjualan.php');
    }   
}

//Update Detail Penjualan
if(isset($_POST['updatedpenjualan'])){
    $detailid = $_POST['DetailID'];
    $penjualanid = $_POST['PenjualanID'];
    $produkid = $_POST['ProdukID'];
    $jproduk = $_POST['Jumlah_Produk'];
    $subtotal = $_POST['Subtotal'];

    $updatedpen = mysqli_query($koneksi, "update detail_penjualan set PenjualanID='$penjualanid', ProdukID='$produkid', Jumlah_Produk='$jproduk', Subtotal='$subtotal' where DetailID='$detailid'");
    if($updatedpen){
        header('location:dpenjualan.php');
    } else {
        echo 'gagal';
        header('location:dpenjualan.php');
    }   
}

//Delete Detail Penjualan
if(isset($_POST['deletedpenjualan'])){
    $detailid = $_POST['DetailID'];

    $deletepen = mysqli_query($koneksi, "delete from detail_penjualan where DetailID='$detailid'");
    if($deletepen){
        header('location:dpenjualan.php');
    } else {
        echo 'gagal';
        header('location:dpenjualan.php');
    }   
}
?>