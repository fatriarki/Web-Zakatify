<?php
include "functions.php";

// ---------------- Muzakki ----------------
$id = $_GET["id_muzakki"];

if (hapus_muzakki($id) > 0) {
  echo "
    <script>
      alert('Data berhasil dihapus!');
      document.location.href = 'data_muzakki.php';
    </script>
    ";
} else {
  echo "
    <script>
      alert('Data gagal dihapus!');
      document.location.href = 'data_muzakki.php';
    </script>
    ";
}
