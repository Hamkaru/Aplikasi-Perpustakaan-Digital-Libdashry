<?php
    include "koneksi.php";
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Libdashry</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand" style="background-color: lightskyblue">
            <!-- Icon -->
            <img src="assets/img/Logo Libdashry.png" alt="logo" width="50" height="50" class="d-inline-block align-text-top">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3"  href="index.php" img src="assets/img/Logo Libdashry.png" alt="logo" width="30" height="30" class="d-inline-block align-text-top">Libdashry</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars" style="color: black"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" style="background-color: lightpink" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading" style="color: black">Core</div>
                            <a class="nav-link" href="?">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: black"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading" style="color: black">Navigasi</div>
                            <?php
                                if($_SESSION['user']['level'] !='peminjam'){
                            ?>
                            <a class="nav-link" href="?page=kategori">
                                <div class="sb-nav-link-icon"><i class="fas fa-table" style="color: black"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link" href="?page=buku">
                                <div class="sb-nav-link-icon"><i class="fas fa-book" style="color: black"></i></div>
                                Buku
                            </a>
                            </a>
                            <?php
                                if($_SESSION['user']['level'] =='admin'){
                            ?>
                            <a class="nav-link" href="?page=user">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user" style="color: black"></i></div>
                                User
                            </a>
                            <?php
                                }
                            ?>
                            <?php
                                }else{
                            ?>
                            <a class="nav-link" href="?page=daftar_buku">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-rectangle-list" style="color: black"></i></div>
                                Daftar Buku
                            </a>
                            <a class="nav-link" href="?page=peminjaman">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open" style="color: black"></i></div>
                                Peminjaman
                            </a>
                            <?php
                                }
                            ?>
                            <a class="nav-link" href="?page=ulasan">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-feather-pointed" fa- style="color: black"></i></div>
                                Ulasan
                            </a>
                            <?php
                                if($_SESSION['user']['level'] !='peminjam'){
                            ?>
                            <a class="nav-link" href="?page=laporan">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-scroll" style="color: black"></i></div>
                                Laporan Peminjaman
                            </a>
                            <?php
                                if($_SESSION['user']['level'] !='petugas'){ 
                            ?>
                            <a class="nav-link" href="?page=register_admin">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus" style="color: black"></i></div>
                                Register
                            </a>
                            <?php
                                }
                            ?>
                            <?php
                                }
                            ?>
                            <a class="nav-link" href="logout.php" onclick="return confirm('Apakah anda yakin ingin logout?');">
                                <div class="sb-nav-link-icon"><i class="fa fa-power-off" style="color: black"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer" style="background-color: lightskyblue">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['user']['nama_lengkap'];?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content" style="background-color: snow">
                <main>
                    <div class="container-fluid px-4">
                        <?php
                            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                            if(file_exists($page . '.php')){
                                include $page . '.php';
                            }else{
                                include '404.php';
                            }
                        ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Libdashry 2024</div>
                        </div>
                    </div>
                </footer>
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