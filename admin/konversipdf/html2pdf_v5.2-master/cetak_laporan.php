<?php
$content = "
	<html>
	<body>
		<h1>HTML2PDF WORK !</h1>
		<tr>
            <th>Name</th>
            <th>Age</th>
            <th>City</th>
        </tr>
	</body>
	</html>
	";

require __DIR__ . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(15, 15, 15, 15), false);
$html2pdf->writeHTML($content);
$html2pdf->output();
