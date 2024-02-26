<?php
require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kasir</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Kasir</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">DATA</div>
                            <a class="nav-link" href="dpenjualan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Detail Penjualan
                            </a>
                            <a class="nav-link" href="penjualan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Penjualan
                            </a>
                            <a class="nav-link" href="produk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Produk
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Detail Penjualan</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah Detail Penjualan
                            </button>
                            </div>

                            </div>
                            
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Detail ID</th>
                                            <th>Penjualan ID</th>
                                            <th>Produk ID</th>
                                            <th>Jumlah Produk</th>
                                            <th>Subtotal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Detail ID</th>
                                            <th>Penjualan ID</th>
                                            <th>Produk ID</th>
                                            <th>Jumlah Produk</th>
                                            <th>Subtotal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $showdatadp = mysqli_query($koneksi, "SELECT * FROM detail_penjualan");
                                    while($data=mysqli_fetch_array($showdatadp)){
                                    $detailid = $data['DetailID'];
                                    $penjualanid = $data['PenjualanID'];
                                    $produkid = $data['ProdukID'];
                                    $jproduk = $data['Jumlah_Produk'];
                                    $subtotal = $data['Subtotal'];
                                    ?>
                                        <tr>
                                            <td><?=$detailid; ?></td>
                                            <td><?=$penjualanid; ?></td>
                                            <td><?=$produkid; ?></td>
                                            <td><?=$jproduk; ?></td>
                                            <td><?=$subtotal; ?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#edit<?=$detailid;?>">Edit</button>
                                            <input type="hidden" name="habusdp" value="<?=$detailid;?>"/>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$detailid;?>">Delete</button>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?=$detailid;?>">
                                        <div class="modal-dialog modal-sl">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Data</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                            <input type="text" name="DetailID" value="<?=$detailid;?>" class="form-control" readonly/>
                                            <br>
                                            <input type="text" name="PenjualanID" value="<?=$penjualanid;?>"  class="form-control" readonly/>
                                            <br>
                                            <input type="text" name="ProdukID" value="<?=$produkid;?>" class="form-control" readonly/>
                                            <br>
                                            <input type="text" name="Jumlah_Produk" value="<?=$jproduk;?>"  class="form-control"/>
                                            <br>
                                            <input type="text" name="Subtotal" value="<?=$subtotal;?>"  class="form-control"/>
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="updatedpenjualan">Ubah</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="delete<?=$detailid;?>">
                                        <div class="modal-dialog modal-sl">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Mengahapus Data</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                            Apakah anda yakin ingin menghapus ID <?=$detailid;?>?
                                            <input type="hidden" name="DetailID" value="<?=$detailid;?>"/>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="deletedpenjualan">Hapus</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
   <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-sl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <input type="text" name="nama" placeholder="DetailID" class="form-control"/>
      <br>
      <input type="text" name="nama" placeholder="PenjualanID" class="form-control"/>
      <br>
      <input type="text" name="nama" placeholder="ProdukID" class="form-control"/>
      <br>
      <input type="text" name="nama" placeholder="Jumlah Produk" class="form-control"/>
      <br>
      <input type="text" name="nama" placeholder="Subtotal" class="form-control"/>
      


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
      </div>

    </div>
  </div>
</div>
</html>