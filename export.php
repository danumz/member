<?php
error_reporting(0);
include "koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
</head>

<body>
	<style type="text/css">
		body {
			font-family: sans-serif;
		}

		table {
			margin: 20px auto;
			border-collapse: collapse;
		}

		table th,
		table td {
			border: 1px solid #3c3c3c;
			padding: 3px 8px;

		}

		a {
			background: blue;
			color: #fff;
			padding: 8px 10px;
			text-decoration: none;
			border-radius: 2px;
		}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Member.xls");
	?>

	<center>

	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Nama Lengkap</th>
			<th>Nopol</th>
			<th>jenis kendaraan</th>
			<th width=10%>Email</th>
			<th>Umur</th>
			<th>Golongan</th>
			<th>Diaktifkan</th>
			<th>Masa berakhir</th>
		</tr>

		<?php
		$no = 1;
		$query = mysql_query("SELECT * FROM tb_user a 
		INNER JOIN tb_member b ON a.id_user_member=b.id_user_member 
		INNER JOIN golongan_member c ON b.id_golongan_member=c.id_golongan_member 
		INNER JOIN kendaraan d ON b.jenis_kendaraan=d.id 
		where b.status='aktif'");
		// $query = mysql_query("SELECT * FROM tb_user a
		// 						JOIN golongan_member b ON a.id_golongan_member=b.id_golongan_member
		// 						where a.status_user='aktif'");
		while ($r = mysql_fetch_array($query)) {
			if ($r['tanggal_akhir'] == null) {
				$tanggalnya = "selamanya";
			} else {
				$tanggalnya = $r['tanggal_akhir'];
			}
			echo "<tr>
								<td>$no</td>
								<td>$r[nama_lengkap]</td>
								<td>$r[plat_nomor]</td>
								<td>$r[jenis_kendaraan]</td>
								<td>$r[email]</td>
								<td>" . umur($r[tanggal_lahir]) . "</td>
								<td align=center>$r[nama_golongan_member]</td>
								<td align=center>$r[tanggal_awal]</td>
								<td align=center>$tanggalnya</td>
						  </tr>";
			$no++;
		}
		?>

	</table>
</body>

</html>