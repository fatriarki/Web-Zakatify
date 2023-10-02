<?php
include "functions.php";

// ---------------- Mustahik ----------------
$id_kategori = $_GET["id_kategori"];

if (hapus_mustahik($id_kategori) > 0) {
    echo "
    <script>
      alert('Data berhasil dihapus!');
      document.location.href = 'data_mustahik.php';
    </script>
    ";
} else {
    echo "
    <script>
      alert('Data gagal dihapus!');
      document.location.href = 'data_mustahik.php';
    </script>
    ";
}
