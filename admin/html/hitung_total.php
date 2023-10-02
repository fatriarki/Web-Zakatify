<?php
include "functions.php";

// Mengambil total kartu keluarga dari tabel bayarzakat
$sql = "SELECT COUNT(*) as total FROM bayarzakat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_kartu_keluarga = $row['total'];
} else {
    $total_kartu_keluarga = 0;
}

// Mengambil total uang terkumpul dari tabel bayarzakat
$sql = "SELECT SUM(bayar_uang) as total_uang FROM bayarzakat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_uang_terkumpul = $row['total_uang'];
} else {
    $total_uang_terkumpul = 0;
}

// Mengambil total warga penerima beras dari tabel mustahik_warga
$sql = "SELECT COUNT(*) as total_warga FROM mustahik_warga";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_warga_penerima_beras = $row['total_warga'];
} else {
    $total_warga_penerima_beras = 0;
}

// Mengambil total mustahik penerima beras dari tabel mustahik_lainnya
$sql = "SELECT COUNT(*) as total_lainnya FROM mustahik_lainnya";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_mustahik_penerima_beras = $row['total_lainnya'];
} else {
    $total_warga_penerima_beras = 0;
}

// Menghitung total beras didistribusikan
$sql1 = "SELECT SUM(hak) as total_beras_warga FROM mustahik_warga";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$total_beras_warga = $row1['total_beras_warga'];

$sql2 = "SELECT SUM(hak) as total_beras_lainnya FROM mustahik_lainnya";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$total_beras_lainnya = $row2['total_beras_lainnya'];

$total_beras_didistribusikan = $total_beras_warga + $total_beras_lainnya;

// Mengambil total kategori mustahik dari database
$sql = "SELECT COUNT(*) as total FROM kategori_mustahik";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_kategori_mustahik = $row['total'];
} else {
    $total_kategori_mustahik = 0;
}

// total muzakki
$sql = "SELECT COUNT(*) as total FROM muzakki";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_muzakki = $row['total'];
} else {
    $total_muzakki = 0;
}

// Mengambil total beras terkumpul dari tabel bayarzakat
$sql = "SELECT SUM(bayar_beras) as total_beras FROM bayarzakat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_beras_terkumpul = $row['total_beras'];
} else {
    $total_beras_terkumpul = 0;
}
