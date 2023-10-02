<?php
include "functions.php";

// ---------------- Hapus Data Pengumpulan ----------------
$id_mustahikwarga = $_GET["id_mustahikwarga"];

if (hapus_warga($id_mustahikwarga) > 0) {
    echo "
<script>
    alert('Data berhasil dihapus!');
    document.location.href = 'distribusi_warga.php';
</script>
";
} else {
    echo "
<script>
    alert('Data gagal dihapus!');
    document.location.href = 'distribusi_warga.php';
</script>
";
}
