<?php
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM t_peminjaman WHERE peminjamanID=$id");
?>
<script>
    alert('Data peminjaman berhasil dihapus');
    location.href = "index.php?page=laporan";
</script>