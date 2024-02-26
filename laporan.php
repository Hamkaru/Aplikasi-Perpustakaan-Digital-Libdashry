<h1 class="mt-4">Laporan Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <a onclick="return confirm('Apakah anda yakin ingin mencetak laporan peminjaman ini?');" href="cetak.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Laporan</a>
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
                    $query = mysqli_query($koneksi, "SELECT*FROM t_peminjaman LEFT JOIN t_user on t_user.userID = t_peminjaman.userID LEFT JOIN t_buku on t_buku.bukuID = t_peminjaman.bukuID");
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
                                <a href="?page=peminjaman_ubah&&id=<?php echo $data['peminjamanID']; ?>" class="btn btn-info">Ubah</a>
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data peminjaman ini? (TINDAKAN INI HARUS DILAKUKAN DENGAN PERSETUJUAN DARI ADMIN!!!)');" href="?page=peminjaman_hapus&&id=<?php echo $data['peminjamanID']; ?>" class="btn btn-danger">Hapus</a>
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