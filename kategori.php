<h1 class="mt-4">Kategori Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <a href="?page=kategori_tambah" class="btn btn-primary">+ Tambah Data Kategori</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM t_kategoribuku");
                    while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['namaKategori']; ?></td>
                            <td>
                                <a href="?page=kategori_ubah&&id=<?php echo $data['kategoriID']; ?>" class="btn btn-info">Ubah</a>
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data kategori ini? (TINDAKAN INI HARUS DILAKUKAN DENGAN PERSETUJUAN DARI ADMIN!!!)');" href="?page=kategori_hapus&&id=<?php echo $data['kategoriID']; ?>" class="btn btn-danger">Hapus</a>
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