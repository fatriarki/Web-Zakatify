<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "zakatfitrah");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// ---------------------- MUZAKKI ----------------------
function tambah_muzakki($data)
{
    global $conn;
    // ambil data dari form
    $nama = $data['nama'];
    $jumlah_tanggungan = $data['jumlah_tanggungan'];
    $keterangan = $data['keterangan'];

    // query insert data
    $query = "INSERT INTO muzakki VALUES
                ('', '$nama', '$jumlah_tanggungan', '$keterangan')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_muzakki($id_muzakki)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM muzakki WHERE id_muzakki = $id_muzakki");
    return mysqli_affected_rows($conn);
}

function edit_muzakki($data)
{
    global $conn;
    // ambil data dari form
    $id_muzakki = $data['id_muzakki'];
    $nama = $data['nama'];
    $jumlah_tanggungan = $data['jumlah_tanggungan'];
    $keterangan = $data['keterangan'];

    // query edit data
    $query = "UPDATE muzakki SET
                nama = '$nama',
                jumlah_tanggungan = '$jumlah_tanggungan',
                keterangan = '$keterangan'
                WHERE id_muzakki = $id_muzakki";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function distribusi_muzakki($data)
{
    global $conn;
    // ambil data dari form
    $nama = $data['nama'];
    $kategori = $data['kategori'];
    $hak = $data['hak'];

    // cek kategori dan pilih tabel yang sesuai
    if ($kategori == 'Fakir' || $kategori == 'Miskin' || $kategori == 'Mampu') {
        $tabel = 'mustahik_warga';
    } else if ($kategori == 'Amil' || $kategori == 'Fisabilillah' || $kategori == 'Ibnu Sabil' || $kategori == 'Muallaf') {
        $tabel = 'mustahik_lainnya';
    } else {
        // kategori tidak valid, bisa dihandle sesuai kebutuhan
        return false;
    }

    // query insert data
    $query = "INSERT INTO $tabel (nama, kategori, hak) VALUES ('$nama', '$kategori', '$hak')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



// ---------------------- MUSTAHIK ----------------------

function tambah_mustahik($data)
{
    global $conn;
    // ambil data dari form
    $nama_kategori = $data['nama_kategori'];
    $jumlah_hak = $data['jumlah_hak'];

    // query insert data
    $query = "INSERT INTO kategori_mustahik VALUES
                ('', '$nama_kategori', '$jumlah_hak')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_mustahik($id_kategori)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM kategori_mustahik WHERE id_kategori = $id_kategori");
    return mysqli_affected_rows($conn);
}

function edit_mustahik($data)
{
    global $conn;
    // ambil data dari form
    $id_kategori = $data['id_kategori'];
    $nama_kategori = $data['nama_kategori'];
    $jumlah_hak = $data['jumlah_hak'];

    // query edit data
    $query = "UPDATE kategori_mustahik SET
                nama_kategori = '$nama_kategori',
                jumlah_hak = '$jumlah_hak'
                WHERE id_kategori = $id_kategori";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// ---------------------- DATA PENGUMPULAN ----------------------
function bayar($data)
{
    global $conn;
    // ambil data dari form
    $id_zakat = $data['id_zakat'];
    $nama_KK = $data['nama_KK'];
    $jumlah_tanggungan = $data['jumlah_tanggungan'];
    $jenis_bayar = $data['jenis_bayar'];
    $jumlah_tanggunganyangdibayar = $data['jumlah_tanggunganyangdibayar'];

    if ($_POST['jenis_bayar'] == "Beras") {
        $bayar_beras = $_POST['jumlah_tanggunganyangdibayar'] * 2.5;
        $bayar_uang = 0;
    } else {
        $bayar_beras = 0;
        $bayar_uang = $_POST['jumlah_tanggunganyangdibayar'] * 35000;
    }

    // query insert data
    $query = "INSERT INTO bayarzakat VALUES
                ('$id_zakat', '$nama_KK', '$jumlah_tanggungan', '$jenis_bayar', '$jumlah_tanggunganyangdibayar', '$bayar_beras', '$bayar_uang')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_pengumpulan($id_zakat)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM bayarzakat WHERE id_zakat = $id_zakat");
    return mysqli_affected_rows($conn);
}

function edit_pengumpulan($data)
{
    global $conn;
    // ambil data dari form
    $id_zakat = $data['id_zakat'];
    $nama_KK = $data['nama_KK'];
    $jumlah_tanggungan = $data['jumlah_tanggungan'];
    $jenis_bayar = $data['jenis_bayar'];
    $jumlah_tanggunganyangdibayar = $data['jumlah_tanggunganyangdibayar'];

    if ($_POST['jenis_bayar'] == "Beras") {
        $bayar_beras = $_POST['jumlah_tanggunganyangdibayar'] * 2.5;
        $bayar_uang = 0;
    } else {
        $bayar_beras = 0;
        $bayar_uang = $_POST['jumlah_tanggunganyangdibayar'] * 35000;
    }

    // query edit data
    $query = "UPDATE bayarzakat SET
                nama_KK = '$nama_KK',
                jumlah_tanggungan = '$jumlah_tanggungan',
                jenis_bayar = '$jenis_bayar',
                jumlah_tanggunganyangdibayar = '$jumlah_tanggunganyangdibayar',
                bayar_beras = '$bayar_beras',
                bayar_uang = '$bayar_uang'
                WHERE id_zakat = $id_zakat";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// ---------------------- DISTRIBUSI WARGA ----------------------
function tambah_mustahikwarga($data)
{
    global $conn;
    // ambil data dari form
    $nama = $data['nama'];
    $kategori = $data['kategori'];
    $hak = $data['hak'];

    // query insert data
    $query = "INSERT INTO mustahik_warga VALUES
                ('', '$nama', '$kategori', '$hak')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_warga($id_mustahikwarga)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mustahik_warga WHERE id_mustahikwarga = $id_mustahikwarga");
    return mysqli_affected_rows($conn);
}

function edit_warga($data)
{
    global $conn;
    // ambil data dari form
    $id_mustahikwarga = $data['id_mustahikwarga'];
    $nama = $data['nama'];
    $kategori = $data['kategori'];
    $hak = $data['hak'];

    // query edit data
    $query = "UPDATE mustahik_warga SET
                nama = '$nama',
                kategori = '$kategori',
                hak = '$hak'
                WHERE id_mustahikwarga = $id_mustahikwarga";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// ---------------------- DISTRIBUSI LAINNYA ----------------------
function tambah_mustahiklainnya($data)
{
    global $conn;
    // ambil data dari form
    $nama = $data['nama'];
    $kategori = $data['kategori'];
    $hak = $data['hak'];

    // query insert data
    $query = "INSERT INTO mustahik_lainnya VALUES
                ('', '$nama', '$kategori', '$hak')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_lainnya($id_mustahiklainnya)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mustahik_lainnya WHERE id_mustahiklainnya = $id_mustahiklainnya");
    return mysqli_affected_rows($conn);
}

function edit_lainnya($data)
{
    global $conn;
    // ambil data dari form
    $id_mustahiklainnya = $data['id_mustahiklainnya'];
    $nama = $data['nama'];
    $kategori = $data['kategori'];
    $hak = $data['hak'];

    // query edit data
    $query = "UPDATE mustahik_lainnya SET
                nama = '$nama',
                kategori = '$kategori',
                hak = '$hak'
                WHERE id_mustahiklainnya = $id_mustahiklainnya";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
