<!DOCTYPE html>
<html>

<head>
    <title>Autofill dengan Combobox Autoselected</title>
</head>

<body>
    <form method="post" action="">
        <label for="country">Negara:</label>
        <select name="country" id="country" onchange="this.form.submit()">
            <option value="">Pilih Negara</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Singapura">Singapura</option>
            <option value="Thailand">Thailand</option>
        </select>
        <br><br>
        <label for="city">Kota:</label>
        <select name="city" id="city">
            <?php
            // Array data kota
            $cities = array(
                'Indonesia' => array('Jakarta', 'Surabaya', 'Bandung'),
                'Malaysia' => array('Kuala Lumpur', 'Penang', 'Johor Bahru'),
                'Singapura' => array('Singapura'),
                'Thailand' => array('Bangkok', 'Phuket', 'Chiang Mai')
            );

            // Periksa apakah ada input negara yang dipilih
            if (isset($_POST['country'])) {
                $selectedCountry = $_POST['country'];

                // Periksa apakah negara terpilih ada dalam daftar
                if (array_key_exists($selectedCountry, $cities)) {
                    // Ambil daftar kota untuk negara terpilih
                    $selectedCities = $cities[$selectedCountry];

                    // Tampilkan opsi kota
                    foreach ($selectedCities as $city) {
                        echo "<option value=\"$city\">$city</option>";
                    }
                }
            }
            ?>
        </select>
    </form>
</body>

</html>