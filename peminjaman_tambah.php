<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <?php
                    if(isset($_POST['submit'])) {
                        $bukuID = $_POST['bukuID'];
                        $userID = $_SESSION['user']['userID'];
                        $jumlah = $_POST['jumlah'];
                        $tgl_peminjaman = $_POST['tgl_peminjaman'];
                        $tgl_pengembalian = $_POST['tgl_pengembalian'];
                        $statusPeminjaman = $_POST['statusPeminjaman'];
                        $stok = $_POST['stok'];
                        if($jumlah > $stok){
                            echo '<script>alert("Maaf, stok buku tidak tersedia");window.history.back();</script>';
                            die();
                        }
                        $query = mysqli_query($koneksi, "INSERT INTO t_peminjaman(bukuID,userID, jumlah, tgl_peminjaman,tgl_pengembalian,statusPeminjaman) values('$bukuID','$userID','$jumlah','$tgl_peminjaman','$tgl_pengembalian','$statusPeminjaman')");

                        if($query) {
                            echo'<script>alert("Peminjaman buku berhasil dilakukan.");</script>';
                        }else{
                            echo'<script>alert("Peminjaman buku gagal dilakukan.");</script>';
                        }
                    }
                ?>
                <?php
                    $id = $_GET['id'];
                    $qry = "SELECT * FROM t_buku WHERE bukuID='$id'";
                    $sql = mysqli_query($koneksi,$qry);
                    while($buku=mysqli_fetch_array($sql)){
                ?>
                <div class="row mb-3">
                    <center>
                    <div class="col-md-8"><img src="<?php echo $buku['gambar_buku']; ?>" width="200px"></div>
                    </center>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Judul</div>
                    <div class="col-md-8">
                        <input type="hidden" class="form-control" value="<?php echo $buku['bukuID']?>" name="bukuID">
                        <input type="text" class="form-control" value="<?php echo $buku['judul']?>" required name="judul">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Jumlah</div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" required name="jumlah">
                        <input type="hidden" class="form-control" value="<?php echo $buku['stok']?>" name="stok">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Tanggal Peminjaman</div>
                    <div class="col-md-8">
                        <input type="date" class="form-control" required name="tgl_peminjaman">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Tanggal Pengembalian</div>
                    <div class="col-md-8">
                        <input type="date" class="form-control" required name="tgl_pengembalian">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-8">
                        <input type="hidden" class="form-control" value="dipinjam" name="statusPeminjaman">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">  
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
                <?php
                }
                ?>
            </form>
        </div>
    </div>
    </div>
</div>