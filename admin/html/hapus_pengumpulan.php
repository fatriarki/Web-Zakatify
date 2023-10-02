<?php
include "functions.php";

// ---------------- Hapus Data Pengumpulan ----------------
$id_zakat = $_GET["id_zakat"];

if (hapus_pengumpulan($id_zakat) > 0) {
    echo "
<script>
    alert('Data berhasil dihapus!');
    document.location.href = 'data_pengumpulan.php';
</script>
";
} else {
    echo "
<script>
    alert('Data gagal dihapus!');
    document.location.href = 'data_pengumpulan.php';
</script>
";
}
