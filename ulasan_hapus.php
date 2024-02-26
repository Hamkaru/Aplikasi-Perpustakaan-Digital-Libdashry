<?php
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM t_ulasanbuku WHERE ulasanID=$id");
?>
<script>
    alert('Ulasan berhasil dihapus.');
    location.href = "index.php?page=ulasan";
</script>