<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Libdashry Register</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register Libdashry</h3></div>
                                    <div class="card-body">
                                        <?php
                                            if(isset($_POST['register'])) {
                                                $nama_lengkap = $_POST['nama_lengkap'];
                                                $email = $_POST['email'];
                                                $alamat = $_POST['alamat'];
                                                $no_telp = $_POST['no_telp'];
                                                $username = $_POST['username'];
                                                $level = $_POST['level'];
                                                $password = md5($_POST['password']);

                                                $insert = mysqli_query($koneksi, "INSERT INTO t_user(nama_lengkap, email, alamat, no_telp, username, password, level) VALUES('$nama_lengkap','$email','$alamat','$no_telp','$username','$password','$level')");

                                                if($insert){
                                                    echo '<script>alert("Selamat, register berhasil."); location.href="index.php?page=register_admin"</script>';
                                                }else{
                                                    echo '<script>alert("Register gagal, silahkan ulangi kembali.");</script>';
                                                }
                                            }
                                        ?>
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" required name="nama_lengkap" class="text-muted" placeholder="Nama Lengkap">
                                                <label class="text-muted">Nama Lengkap</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" required name="email" class="text-muted" placeholder="Email">
                                                <label class="text-muted">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" required name="no_telp" class="text-muted" placeholder="No. Telepon">
                                                <label class="text-muted">No. Telepon</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea name="alamat" rows="5" required class="form-control"></textarea>
                                                <label class="text-muted">Alamat</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputUsername" required name="username" type="username" class="text-muted" placeholder="Username">
                                                <label for="inputUsername" class="text-muted">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" required name="password" type="password" class="text-muted" placeholder="Password">
                                                <label for="inputPassword" class="text-muted">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select name="level" class="form-select form-control">
                                                    <option value="admin">Admin</option>
                                                    <option value="petugas">Petugas</option>
                                                    <option value="peminjam">Peminjam</option>
                                                </select>
                                                <label>Level</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">&copy; 2024 Libdashry</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>