<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM t_user WHERE userID=$id");
?>
<script>
    alert('Data user berhasil dihapus');
    location.href = "index.php?page=user";
</script>