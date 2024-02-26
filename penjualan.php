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
                        <h1 class="mt-4">Data penjualan</h1>
                        <br>    
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Penjualan ID</th>
                                            <th>Tangggal Penjualan</th>
                                            <th>Total_Harga</th>
                                            <th>Aksi</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Penjualan ID</th>
                                            <th>Tangggal Penjualan</th>
                                            <th>Total_Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $showdatap = mysqli_query($koneksi,"SELECT * FROM penjualan");
                                    while($data=mysqli_fetch_array($showdatap)){
                                    $penjualanid = $data['PenjualanID'];
                                    $tanggal_penjualan = $data['Tanggal_Penjualan'];
                                    $total_harga = $data['Total_Harga'];
                                    ?>
                                        <tr>
                                            <td><?=$penjualanid; ?></td>
                                            <td><?=$tanggal_penjualan; ?></td>
                                            <td><?=$total_harga; ?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#edit<?=$penjualanid;?>">Edit</button>
                                            <input type="hidden" name="habusdp" value="<?=$penjualanid;?>"/>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$penjualanid;?>">Delete</button>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?=$penjualanid;?>">
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
                                            <input type="text" name="PenjualanID" value="<?=$penjualanid;?>"  class="form-control" readonly/>
                                            <br>
                                            <input type="date" name="Tanggal_Penjualan" value="<?=$tanggal_penjualan;?>"  class="form-control"/>
                                            <br>
                                            <input type="text" name="Total_Harga" value="<?=$total_harga;?>"  class="form-control" />
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="updatepenjualan">Ubah</button>
                                            </div>
                                            </form>

                                            </div>
                                        </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="delete<?=$penjualanid;?>">
                                        <div class="modal-dialog modal-sl">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <form method="post">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Menghapus Data</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                            Apakah anda yakin ingin menghapus ID <?=$penjualanid;?> ?
                                            <input type="hidden" name="PenjualanID" value="<?=$penjualanid;?>"/>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="deletepenjualan">Hapus</button>
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
</html>