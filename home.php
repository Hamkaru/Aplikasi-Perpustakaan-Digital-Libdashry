<h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <?php
            if($_SESSION['user']['level'] !='peminjam'){
        ?>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM t_kategoribuku"));
                ?>
                Total Kategori</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=kategori">Lihat Daftar Kategori</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM t_buku"));
                ?>
                Total Buku</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=buku">Lihat Daftar Buku</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM t_ulasanbuku"));
                ?>
                Total Ulasan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=ulasan">Lihat Daftar Ulasan</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <?php
            if($_SESSION['user']['level'] !='petugas'){
        ?>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM t_user"));
                ?>
                Total User</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=user">Lihat Daftar User</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
        <?php
            }
        ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td width="200">Nama</td>
                    <td width="1">:</td>
                    <td><?php echo $_SESSION['user']['nama_lengkap']; ?></td>
                </tr>
                <tr>
                    <td width="200">Level User</td>
                    <td width="1">:</td>
                    <td><?php echo $_SESSION['user']['level']; ?></td>
                </tr>
                <tr>
                    <td width="200">Tanggal Login</td>
                    <td width="1">:</td>
                    <td><?php echo date('d-m-Y'); ?></td>
                </tr>
            </table>
        </div>
    </div>