<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Data Detail Penjualan</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="text-center">
                <h1>Data Penjualan</h1>
                <form action="" method="post">
                    Cari berdasarkan
                    <select name="pilih">
                        <option value="DetailID">DetailID</option>
                        <option value="PenjualanID">PenjualanID</option>
                        <option value="ProdukID">ProdukID</option>
                        <option value="Jumlah_Produk">Jumlah Produk</option>
                        <option value="Subtotal">Subtotal</option>
                    </select>
                    <input type="text" name="tekscari" size="24">
                    <input type="submit" name="cari" value="Cari">
                    <input type="submit" name="semua" value="Tampilkan Semua">
                </form>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>DetailID</th>
                        <th>PenjualanID</th>
                        <th>Tanggal_Penjualan</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                include "koneksi.php";
                $tampil = "";
                if (isset($_POST['cari'])) {
                    $pilih = $_POST['pilih'];
                    $tekscari = $_POST['tekscari'];
                    $tampil = mysqli_query($koneksi, "select * from detail_penjualan where $pilih like '%$tekscari%'");
                } else {
                     $tampil = mysqli_query($koneksi, "select * from detail_penjualan");
                }
                foreach ($tampil as $row) {
                ?>
                    <tr>
                        <td><?php echo "$row[PenjualanID]"; ?></td>
                        <td><?php echo "$row[Tanggal_Penjualan]"; ?></td>
                        <td><?php echo "$row[Total_Harga]"; ?></td>
                        <td><?php echo "<a href='updatepenjualan.php?id=$row[PenjualanID]'>UPDATE</a> | <a href='deletepenjualan.php?id=$row[PenjualanID]'>DELETE</a>"; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <a class="btn btn-primary" href="tambahbarang.php">Tambahkan Data Penjualan</a>
            </div>
        </div>
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>
