<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Jumlah</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Peminjaman</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM t_peminjaman LEFT JOIN t_user on t_user.userID = t_peminjaman.userID LEFT JOIN t_buku on t_buku.bukuID = t_peminjaman.bukuID WHERE t_peminjaman.userID=" . $_SESSION['user']['userID']);
                    while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama_lengkap']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td><?php echo $data['tgl_peminjaman']; ?></td>
                            <td><?php echo $data['tgl_pengembalian']; ?></td>
                            <td><?php echo $data['statusPeminjaman']; ?></td>
                            <td>
                                <?php
                                    if($data['statusPeminjaman'] == 'dipinjam'){
                                ?>
                                <a href="?page=peminjaman_ubah&&id=<?php echo $data['peminjamanID']; ?>" class="btn btn-info">Ubah</a>
                            </td>
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