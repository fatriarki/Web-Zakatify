<?php
include "functions.php";

// ---------------- Hapus Data Pengumpulan ----------------
$id_mustahiklainnya = $_GET["id_mustahiklainnya"];

if (hapus_lainnya($id_mustahiklainnya) > 0) {
    echo "
<script>
    alert('Data berhasil dihapus!');
    document.location.href = 'distribusi_lainnya.php';
</script>
";
} else {
    echo "
<script>
    alert('Data gagal dihapus!');
    document.location.href = 'distribusi_lainnya.php';
</script>
";
}
