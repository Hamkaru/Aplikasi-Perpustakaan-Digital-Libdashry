<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form method="post" enctype="multipart/form-data">
                <?php
                    if(isset($_POST['submit'])) {
                        $kategoriID = $_POST['kategoriID'];
                        $judul = $_POST['judul'];
                        $penulis = $_POST['penulis'];
                        $penerbit = $_POST['penerbit'];
                        $tahunTerbit = $_POST['tahunTerbit'];
                        $deskripsi = $_POST['deskripsi'];
                        $stok = $_POST['stok'];

                        $nama_foto = $_FILES['gambar_buku']['name'];
                        $ukuran_foto = $_FILES['gambar_buku']['size'];
                        $tipe_foto = $_FILES['gambar_buku']['type'];
                        $tmp = $_FILES['gambar_buku']['tmp_name'];

                        $acc = ['image/png','image/jpeg','image/jpg'];
                        if (!in_array($tipe_foto, $acc)){
                            echo '<script>alert("Hanya file PNG, JPG, dan JPEG yang diperbolehkan."); window.history.back(); </script>';
                            die();
                        }
                        $size = 2*1024*1024;
                        if($ukuran_foto > $size){
                            echo '<script>alert("Maaf ukuran file anda terlalu besar."); window.history.back();</script>';
                            die();
                        }

                        $lokasi_foto = 'assets/img/' . $nama_foto;
                        move_uploaded_file($tmp, $lokasi_foto);

                        $query = mysqli_query($koneksi, "INSERT INTO t_buku(kategoriID,gambar_buku,judul,penulis,penerbit,tahunTerbit,deskripsi, stok) values('$kategoriID','$lokasi_foto','$judul','$penulis','$penerbit','$tahunTerbit','$deskripsi', '$stok')");

                        if($query) {
                            echo'<script>alert("Data buku berhasil ditambahkan.");</script>';
                        }else{
                            echo'<script>alert("Data buku gagal ditambahkan.");</script>';
                        }
                    }
                ?>
                <div class="row mb-3">
                    <div class="col-md-2">Kategori</div>
                    <div class="col-md-8">
                        <select name="kategoriID" class="form-control">
                            <?php
                                $kat = mysqli_query($koneksi, "SELECT*FROM t_kategoribuku");
                                while($kategori = mysqli_fetch_array($kat)){
                                    ?>
                                    <option value="<?php echo $kategori['kategoriID']; ?>"><?php echo $kategori['namaKategori']; ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Gambar Buku</div>
                    <div class="col-md-8"><input type="file" class="form-control" required name="gambar_buku"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Judul</div>
                    <div class="col-md-8"><input type="text" class="form-control" required name="judul"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Penulis</div>
                    <div class="col-md-8"><input type="text" class="form-control" required name="penulis"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Penerbit</div>
                    <div class="col-md-8"><input type="text" class="form-control" required name="penerbit"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Tahun Terbit</div>
                    <div class="col-md-8"><input type="number" class="form-control" required name="tahunTerbit"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Deskripsi</div>
                    <div class="col-md-8">
                        <textarea required name="deskripsi" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Stok</div>
                    <div class="col-md-8"><input type="number" class="form-control" required name="stok"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">  
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=buku" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>