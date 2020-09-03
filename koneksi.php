<?php
$server     = 'localhost';
$username   = 'root';
$password   = '';
$database   = 'db_member';

mysql_connect($server, $username, $password) or die();
mysql_select_db($database) or die();

function Umur($tgl)
{
	$hitunghari['awal'] = $tgl;
	$hitunghari['akhir'] = date('Y-m-d');
	$lahir = $hitunghari['awal'];
	$selisih = time() - strtotime($lahir);
	$tahun = floor($selisih / 31536000);
	$bulan = floor(($selisih % 31536000) / 2592000);
	foreach ($hitunghari as $key => $val) {
		$hitunghari[$key] = strtotime($val);
	}
	$hitunghari['selisih'] = $hitunghari['akhir'] - $hitunghari['awal'];
	$hitunghari['selisih'] = number_format($hitunghari['selisih'] / 86400, 2) . 'hari';

	return $tahun . ' Tahun';
}
