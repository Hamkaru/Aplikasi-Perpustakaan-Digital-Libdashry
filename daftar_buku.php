<h1 class="mt-4">Daftar Buku</h1>
    <div class="row">
        <div class="col-md-12">
        <div class="row">
            <?php
            $query = mysqli_query($koneksi,"SELECT * FROM t_buku LEFT JOIN t_kategoribuku on t_buku.kategoriID = t_kategoribuku.kategoriID");
            while($data = mysqli_fetch_array($query)){
            ?>
            <div class="col-auto mb-3">
                <div class="card" style="width: 18rem; height:100%; margin:5px;">
                    <img src="<?php echo $data['gambar_buku']; ?>" class="card-img-top" alt="<?php echo $data['judul']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['judul']; ?></h5>
                        <p class="card-text"><textarea class="form-control py-3" style="border:none ;" readonly ><?php echo $data['deskripsi']; ?></textarea></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Kategori: <?php echo $data['namaKategori']; ?></li>
                            <li class="list-group-item">Penulis: <?php echo $data['penulis']; ?></li>
                            <li class="list-group-item">Penerbit: <?php echo $data['penerbit']; ?></li>
                            <li class="list-group-item">Tahun Terbit: <?php echo $data['tahunTerbit']; ?></li>
                            <li class="list-group-item">Stok: <?php echo $data['stok']; ?></li>
                        </ul>
                        <?php if($data['stok'] > 0){?>
                        <div class="mt-3">
                            <a href="?page=peminjaman_tambah&&id=<?php echo $data['bukuID'] ?>" onclick="return confirm('Apakah anda yakin ingin meminjam buku ini?');" class="btn btn-info">Pinjam</a>
                        </div>
                        <?php    
                        }else{
                            echo '<span style="color: red">Stok Habis!!!</span>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        </div>
    </div>