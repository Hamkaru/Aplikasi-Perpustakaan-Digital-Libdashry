<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <a href="?page=buku_tambah" class="btn btn-primary">+ Tambah Data Buku</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Gambar Buku</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM t_buku LEFT JOIN t_kategoribuku on t_buku.kategoriID = t_kategoribuku.KategoriID");
                    while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['namaKategori']; ?></td>
                            <td><img src="<?php echo $data['gambar_buku']; ?>" width="80px"></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['penulis']; ?></td>
                            <td><?php echo $data['penerbit']; ?></td>
                            <td><?php echo $data['tahunTerbit']; ?></td>
                            <td><?php echo $data['deskripsi']; ?></td>
                            <td><?php echo $data['stok']; ?></td>
                            <td>
                                <a href="?page=buku_ubah&&id=<?php echo $data['bukuID']; ?>" class="btn btn-info">Ubah</a>
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data buku ini? (TINDAKAN INI HARUS DILAKUKAN DENGAN PERSETUJUAN DARI ADMIN!!!)');" href="?page=buku_hapus&&id=<?php echo $data['bukuID']; ?>" class="btn btn-danger">Hapus</a>
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