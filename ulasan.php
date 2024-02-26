<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
        <?php
            if($_SESSION['user']['level'] =='peminjam'){
        ?>
        <a href="?page=ulasan_tambah" class="btn btn-primary">+ Tambah Ulasan Baru</a>
        <?php
        }
        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Buku</th>
                <th>Ulasan</th>
                <th>Rating</th>
                <?php
                    if($_SESSION['user']['level'] !='peminjam'){
                ?>
                <th>Aksi</th>
                <?php
                }
                ?>
            </tr>
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT*FROM t_ulasanbuku LEFT JOIN t_user on t_user.userID = t_ulasanbuku.userID LEFT JOIN t_buku on t_buku.bukuID = t_ulasanbuku.bukuID");
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['ulasan']; ?></td>
                        <td><?php echo $data['rating']; ?></td>
                        <td>
                            <?php
                                if($_SESSION['user']['level'] !='peminjam'){
                            ?>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ulasan ini?');" href="?page=ulasan_hapus&&id=<?php echo $data['ulasanID']; ?>" class="btn btn-danger">Hapus</a>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
    </div>
</div>