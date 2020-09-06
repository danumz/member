<style>
	th {
		text-align: center;
	}

	.gambar {
		display: block;
		margin-left: 20%;
		margin-right: auto;
		width: 55%;
	}
</style>
<?php
if ($_GET[page] == 'kelolaberanda') {
	if ($_SESSION[id_admin] == '') {
		header('Location: index.php');
	}
	$r = mysql_fetch_array(mysql_query("SELECT * FROM halaman where id_halaman='1'"));
	echo "<article>
				<h1>Kelola Beranda</h1>
				<form action='index.php?page=aksihalaman' method='POST'>
					<input type='hidden' name='id' value='$r[id_halaman]'>
					<label for='a'>Judul Beranda</label>
					<input name='a' type='text'  value='$r[judul]'>
					<label for='a'>Isi Beranda</label>
					<textarea style='width:100%; height:250px' name='b'>$r[isi]</textarea><br/><br>
					<input class='btn green' type='submit' value='Perbarui'>
				</table>
				</form>
			  </article>";
} elseif ($_GET[page] == 'kelolatentangkami') {
	if ($_SESSION[id_admin] == '') {
		header('Location: index.php');
	}
	$r = mysql_fetch_array(mysql_query("SELECT * FROM halaman where id_halaman='2'"));
	echo "<article>
				<h1>Kelola Tentang Kami</h1>
				<form action='index.php?page=aksihalaman' method='POST'>
					<input type='hidden' name='id' value='$r[id_halaman]'>
					<label >Judul Tentang Kami</label>
					<input name='a' type='text'  value='$r[judul]'><br>
					<label >Isi Tentang Kami</label>
					<textarea style='width:100%; height:250px' name='b'>$r[isi]</textarea><br><br>
					<input class='btn grreen' type='submit' value='Perbarui'>
				</form>
			  </article>";
} elseif ($_GET[page] == 'aksihalaman') {
	if ($_SESSION[id_admin] == '') {
		header('Location: index.php');
	}
	mysql_query("UPDATE halaman SET judul = '$_POST[a]',
										isi   = '$_POST[b]' where id_halaman='$_POST[id]'");
	if ($_POST[id] == '1') {
		echo "<script>window.alert('Sukses Update Data Halaman Beranda.');
					window.location='index.php?page=kelolaberanda'</script>";
	} else {
		echo "<script>window.alert('Sukses Update Data Halaman Tentang Kami.');
					window.location='index.php?page=kelolatentangkami'</script>";
	}
} elseif ($_GET[page] == 'kelolamember') {

	if ($_GET[edit] != '') {
		include "editpage.php";
	} else {
		if ($_SESSION[id_admin] == '') {
			header('Location: index.php');
		}
		echo "<article style='margin-left:-20%'>
				  <h1>Semua Data Member (Telah Disetujui) 
				  <a class='btn btn-primary' href='export.php'><i class='fa fa-print'></i> Print</a></h1>
				  
				  <table width='50%' border=1>
					  <tr class='red white-text'>
						  <th>No</th>
						  <th>Nama Lengkap</th>
						  <th>Nopol</th>
						<th>jenis kendaraan</th>
						<th width=10%>Email</th>
						  <th>Umur</th>
						  <th>Golongan</th>
						  <th>Diaktifkan</th>
						  <th>Masa berakhir</th>
						  <th>Opsi</th>
					  </tr>";
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
								<td  style='width:20% !important;margin:auto' align=center>
									<a  href='index.php?page=kelolamember&aksi=aktif&id=$r[id_member]'><img src='http://localhost/membership/icon/icons8-xbox-x-24.png' /></a>
									<a href='index.php?page=kelolamember&delete=$r[id_user_member]'><img src='http://localhost/membership/icon/icons8-trash-24.png' /></a>
									<a href='index.php?page=kelolamember&edit=$r[id_member]'><img src='http://localhost/membership/icon/icons8-edit-24.png' /></a>
									
								</td>
						  </tr>";
			$no++;
		}

		if ($_GET[aksi] == 'aktif') {
			if ($_SESSION[id_admin] == '') {
				header('Location: index.php');
			}
			mysql_query("UPDATE tb_member SET status='tidak aktif' where id_member='$_GET[id]'");
			echo "<script>window.alert('Sukses Nonaktifkan User Member Terpilih.');
							window.location='index.php?page=kelolamember'</script>";
		}

		if ($_GET[delete] != '') {
			if ($_SESSION[id_admin] == '') {
				header('Location: index.php');
			}
			mysql_query("DELETE FROM tb_user where id_user_member='$_GET[delete]'");
			echo "<script>window.alert('Sukses Hapus User Member Terpilih.');
							window.location='index.php?page=kelolamember'</script>";
		}
		echo "</table></article>";
	}
} elseif ($_GET[page] == 'kelolacalonmember') {
	if ($_SESSION[id_admin] == '') {
		header('Location: index.php');
	}
	echo "<article>
			<h1>Semua Data Calon member (Belum Disetujui)</h1>
			  <table width=120% style='width:120% !important' border=1>
			  	<tr class='red white-text'>
			  		<th>No</th>
			  		<th>Nama Lengkap</th>
			  		<th>Nopol</th>
					<th>TLPN</th>
			  		<th>Umur</th>
			  		<th>Golongan</th>
			  		<th>Gambar</th>
			  		<th>Opsi</th>
			  	</tr>";
	$no = 1;
	$query = mysql_query("SELECT * FROM tb_user a 
								  INNER JOIN tb_member b ON a.id_user_member=b.id_user_member 
								  INNER JOIN golongan_member c ON b.id_golongan_member=c.id_golongan_member 
								  where b.status='tidak aktif'
								  ");
	while ($r = mysql_fetch_array($query)) {
		echo "<tr>
							<td>$no</td>
							<td>$r[nama_lengkap]</td>
							<td>$r[plat_nomor]</td>
							<td>$r[no_telpon]</td>
							<td>" . Umur($r[tanggal_lahir]) . "</td>
							<td align=center>$r[nama_golongan_member]</td>
							<td align=center width='25%'><a href='http://localhost/membership/bukti%20transfer/$r[file]' target='_blank'><img class='gambar' src='http://localhost/membership/bukti%20transfer/$r[file]'/></a></td>
							<td align=center>
								<a title='aktifkan' href='index.php?page=kelolacalonmember&aksi=aktif&id=$r[id_member]&golongan=$r[id_golongan_member]'><img width='40px' height='40px' src='http://localhost/membership/icon/icons8-attendance-50.png'/></a>
								<a style='display: none' href='index.php?page=kelolacalonmember&delete=$r[id_member]'>Hapus</a>

							</td>
					  </tr>";
		$no++;
	}

	if ($_GET[aksi] == 'aktif') {
		if ($_SESSION[id_admin] == '') {
			header('Location: index.php');
		}
		$tanggal_sekarang = date("Y-m-d");
		$golongan_mem = $_GET['golongan'];
		switch ($golongan_mem) {
			case 1:
				$tanggal_berakhir = null;
				break;
			case 2:
				$tanggal_berakhir = date('Y-m-d', strtotime('+14 days', strtotime($tanggal_sekarang)));
				break;
			case 3:
				$tanggal_berakhir = date('Y-m-d', strtotime('+30 days', strtotime($tanggal_sekarang)));
				break;
			case 4:
				$tanggal_berakhir = date('Y-m-d', strtotime('+30 days', strtotime($tanggal_sekarang)));
				break;

			default:
				// code...
				break;
		}
		$queryk = mysqL_query("SELECT * FROM tb_member WHERE id_member='$_GET[id]'");
		// echo $queryk;
		$r = mysql_fetch_array($queryk);
		// print_r($r);
		mysql_query("UPDATE tb_member SET status='aktif', tanggal_akhir='$tanggal_berakhir' where id_user_member='$_GET[id]'");
		// 		mysql_query("INSERT INTO tb_member (id_user_member, tanggal_awal, tanggal_akhir,id_golongan_member)
		// VALUES ($r[0], '$tanggal_sekarang', '$tanggal_berakhir',$r[9])");
		echo "<script>window.alert('Sukses Aktifkan User Member Terpilih.');
						window.location='index.php?page=kelolacalonmember'</script>";
	}

	if ($_GET[delete] != '') {
		if ($_SESSION[id_admin] == '') {
			header('Location: index.php');
		}
		mysql_query("DELETE FROM tb_member where id_member='$_GET[delete]'");
		echo "<script>window.alert('Sukses Hapus User Member Terpilih.');
						window.location='index.php?page=kelolacalonmember'</script>";
	}


	echo "</table></article>";
} elseif ($_GET[page] == 'kelolapesanmasuk') {
	if ($_SESSION[id_admin] == '') {
		header('Location: index.php');
	}
	echo "<article>
			<h1>Semua Pesan masuk</h1>
			  <table width=100% border=1>
			  	<tr class='red white-text'>
			  		<th>No</th>
			  		<th>Nama Lengkap</th>
			  		<th>Isi Pesan</th>
			  		<th>Opsi</th>
			  	</tr>";
	$no = 1;
	$query = mysql_query("SELECT * FROM hubungi_kami ORDER BY id_hubungi_kami");
	while ($r = mysql_fetch_array($query)) {
		echo "<tr>
							<td valign=top>$no</td>
							<td width='140px' align=center valign=top>$r[nama_lengkap]</td>
							<td>$r[isi_pesan]</td>
							<td valign=top><a class='btn red' href='index.php?page=kelolapesanmasuk&id=$r[id_hubungi_kami]'>Hapus</a></td>
					  </tr>";
		$no++;
	}
	echo "</table></article>";

	if ($_GET[id] != '') {
		if ($_SESSION[id_admin] == '') {
			header('Location: index.php');
		}
		mysql_query("DELETE FROM hubungi_kami where id_hubungi_kami='$_GET[id]'");
		echo "<script>window.alert('Sukses Hapus Pesan terpilih.');
					window.location='index.php?page=kelolapesanmasuk'</script>";
	}
} elseif ($_GET[page] == 'kelolaberita') {
	if ($_SESSION[id_admin] == '') {
		header('Location: index.php');
	}
	echo "<article>
			<h1>Semua Daftar Informasi/Berita</h1><br/>
			<a class='btn blue' href='index.php?page=tambahberita'>Tambah Berita</a><br/><br>
			  <table width=100% border=1>
			  	<tr class='red white-text'>
			  		<th>No</th>
			  		<th>Judul Info</th>
			  		<th>tanggal</th>
			  		<th></th>
			  	</tr>";
	$no = 1;
	$query = mysql_query("SELECT * FROM informasi ORDER BY id_informasi DESC");
	while ($r = mysql_fetch_array($query)) {
		echo "<tr>
							<td valign=top>$no</td>
							<td valign=top>$r[judul]</td>
							<td width='140px' >$r[tanggal]</td>
							<td valign=top><a class='btn red' href='index.php?page=kelolaberita&id=$r[id_informasi]'>Hapus</a></td>
					  </tr>";
		$no++;
	}
	echo "</table>

		</article>";

	if ($_GET[id] != '') {
		if ($_SESSION[id_admin] == '') {
			header('Location: index.php');
		}
		mysql_query("DELETE FROM informasi where id_informasi='$_GET[id]'");
		echo "<script>window.alert('Sukses Hapus Berita Terpilih.');
					window.location='index.php?page=kelolaberita'</script>";
	}
} elseif ($_GET[page] == 'tambahberita') {
	if ($_SESSION[id_admin] == '') {
		header('Location: index.php');
	}
	echo "<article>
				<h1>Tambah Berita</h1>
				<form action='index.php?page=tambahberita' method='POST'>
					<label>Judul Berita</label>
					<input name='a' type='text'>
					<textarea style='width:100%; height:250px' name='b' placeholder='Isi Berita......'></textarea>
					<input class='btn green' type='submit' name='tambah' value='Tambahkan'>
				</table>
				</form>
			  </article>";

	if (isset($_POST[tambah])) {
		if ($_SESSION[id_admin] == '') {
			header('Location: index.php');
		}
		$tanggal_sekarang = date("Y-m-d H:i:s");
		mysql_query("INSERT INTO informasi (id_admin, judul, isi, tanggal) VALUES ('$_SESSION[id_admin]','$_POST[a]','$_POST[b]','$tanggal_sekarang')");
		echo "<script>window.alert('Sukses Tambah Berita Baru.');
					window.location='index.php?page=kelolaberita'</script>";
	}
}
