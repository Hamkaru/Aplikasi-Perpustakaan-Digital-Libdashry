<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <?php
                    $id = $_GET['id'];
                    if(isset($_POST['submit'])) {
                        $bukuID = $_POST['bukuID'];
                        $userID = $_SESSION['user']['userID'];
                        $jumlah = $_POST['jumlah'];
                        $tgl_peminjaman = $_POST['tgl_peminjaman'];
                        $tgl_pengembalian = $_POST['tgl_pengembalian'];
                        $statusPeminjaman = $_POST['statusPeminjaman'];
                        $query = mysqli_query($koneksi, "UPDATE t_peminjaman set bukuID='$bukuID', jumlah='$jumlah', tgl_peminjaman='$tgl_peminjaman', tgl_pengembalian='$tgl_pengembalian', statusPeminjaman='$statusPeminjaman' WHERE peminjamanID=$id");

                        if($query) {
                            echo'<script>alert("Detail peminjaman buku berhasil diubah.");</script>';
                        }else{
                            echo'<script>alert("Detail peminjaman buku gagal diubah.");</script>';
                        }
                    }
                    $query = mysqli_query($koneksi, "SELECT*FROM t_peminjaman WHERE peminjamanID=$id");
                    $data = mysqli_fetch_array($query);
                ?>
                <div class="row mb-3">
                    <div class="col-md-2">Judul</div>
                    <div class="col-md-8">
                        <select name="bukuID" class="form-control">
                            <?php
                                $buk = mysqli_query($koneksi, "SELECT*FROM t_buku");
                                while($buku = mysqli_fetch_array($buk)){
                                    ?>
                                    <option <?php if($buku['bukuID'] == $data['bukuID']) echo 'selected'; ?> value="<?php echo $buku['bukuID']; ?>"><?php echo $buku['judul']; ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Jumlah</div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" value="<?php echo $data['jumlah']; ?>" name="jumlah">
                    </div>
                </div>
                <?php
                    if($_SESSION['user']['level'] !='peminjam'){
                ?>
                <div class="row mb-3">
                    <div class="col-md-2">Tanggal Peminjaman</div>
                    <div class="col-md-8">
                        <input type="date" class="form-control" value="<?php echo $data['tgl_peminjaman']; ?>" name="tgl_peminjaman">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Tanggal Pengembalian</div>
                    <div class="col-md-8">
                        <input type="date" class="form-control" value="<?php echo $data['tgl_pengembalian']; ?>" name="tgl_pengembalian">
                    </div>
                </div>
                <?php
                    }else{
                ?>
                <div>
                    <input type="hidden" class="form-control" value="<?php echo $data['tgl_peminjaman']; ?>" name="tgl_peminjaman">
                </div>
                <div>
                    <input type="hidden" class="form-control" value="<?php echo $data['tgl_pengembalian']; ?>" name="tgl_pengembalian">
                </div>
                <?php
                    }
                ?>
                <div class="row mb-3">
                    <div class="col-md-2">Status Peminjaman</div>
                    <div class="col-md-8">
                        <select name="statusPeminjaman" class="form-control">
                            <option value="dipinjam" <?php if($data['statusPeminjaman'] == 'dipinjam') echo 'selected'; ?>>Pinjam</option>
                            <?php
                                if($_SESSION['user']['level'] !='peminjam'){
                            ?>
                            <option value="dikembalikan"  <?php if($data['statusPeminjaman'] == 'dikembalikan') echo 'selected'; ?>>Kembalikan</option>
                            <?php
                                }
                            ?>
                            <option value="dibatalkan"  <?php if($data['statusPeminjaman'] == 'dibatalkan') echo 'selected'; ?>>Batal</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">  
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <?php
                            if($_SESSION['user']['level'] !='peminjam'){
                        ?>
                        <a href="?page=laporan" class="btn btn-danger">Kembali</a>
                        <?php
                            }else{
                        ?>
                        <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>