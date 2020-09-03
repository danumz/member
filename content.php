<?php
//Beranda
if ($_GET[page] == '') {
	$r = mysql_fetch_array(mysql_query("SELECT * FROM halaman where id_halaman='1'"));
	if ($_SESSION[id_user] != '') {
		echo "
		<style>
		section{
			margin: 0 !important
		}
		.aa{
			margin-top: -90%;
		}
	</style>
		";
	} else {
		echo "
		<style>
		section{
			margin: 0 !important
		}
		#uu{
			margin-top: -80% !important;
		}
	</style>
		";
	}
	echo "
	<article>
			  	<h1>$r[judul]</h1
				<p >" . nl2br($r[isi]) . "</p>
			  </article>";
	//Tentang Kami
} elseif ($_GET[page] == 'tentangkami') {
	$r = mysql_fetch_array(mysql_query("SELECT * FROM halaman where id_halaman='2'"));
	if ($_SESSION[id_user] != '') {
		echo "
		<style>
		section{
			margin: 0 !important
		}
		.aa{
			margin-top: -200%;
		}
	</style>
		";
	} else {
		echo "
		<style>
		section{
			margin: 0 !important
		}
		#uu{
			margin-top: -200% !important;
		}
	</style>
		";
	}
	echo "
	
	<article>
			  	<h1>$r[judul]</h1>
				<p >" . nl2br($r[isi]) . "</p>
			  </article>";

	//Berita
} elseif ($_GET[page] == 'berita') {
	$query = mysql_query("SELECT i.judul, i.isi, i.id_informasi, i.tanggal, ad.nama_lengkap
				FROM informasi i JOIN admin ad
				WHERE i.id_admin = ad.id_admin
				ORDER BY id_informasi DESC LIMIT 20");
	while ($r = mysql_fetch_array($query)) {
		$isi_berita = (strip_tags($r[isi]));
		$isi = substr($isi_berita, 0, 300000);
		$isi = substr($isi_berita, 0, strrpos($isi, " "));
		if ($_SESSION[id_user] != '' || $_SESSION[admin] != '') {
			echo "
			<style>
			section{
				margin: 0 !important
			}
			.aa{
				margin-top: -840%;
			}
		</style>
			";
		} else {
			echo "
			<style>
			section{
				margin: 0 !important
			}
			#uu{
				margin-top: -830% !important;
			}
		</style>
			";
		}
		echo "	
		<article>
		<a href='index.php?page=detailberita&id=$r[id_informasi]'><h1 class='red-text'>$r[judul]</h1>
				<p class='black-text'>$isi,...</p> </a>
			  </article>";
	}
} elseif ($_GET[page] == 'detailberita') {
	$query = mysql_query("SELECT * FROM informasi WHERE id_informasi='$_GET[id]'");
	while ($r = mysql_fetch_array($query)) {
		echo "<article>
			  	<h1>$r[judul]</h1>
			  	<i>Pada $r[tanggal] WIB</i>
			  	<b>Oleh Administrator</b>
				<p >" . nl2br($r[isi]) . "</p>
			  </article>";
		$queryk = mysqL_query("SELECT k.komentar, k.time, us.nama_lengkap
			  						FROM komentar k JOIN tb_user us
			  						WHERE k.id_informasi='$_GET[id]' AND us.id_user_member = k.id_user_member");
		while ($r = mysql_fetch_array($queryk)) {
?>
			<div class="komentar">
				<?php
				echo "<i>Pada .$r[time]</i>
			  		 	  <b>$r[nama_lengkap]<br></b>
			  		 	  <p>Komentar : </p>" . $r[komentar]; ?>
			</div>
		<?php
		}
		$queryks = mysqL_query("SELECT us.status_user
			  						FROM tb_user us
			  						WHERE us.id_user_member='$_SESSION[id_user]'");
		$ks = mysql_fetch_array($queryks);
		if ($_SESSION[id_user] != '' && $ks[status_user] == 'aktif') {
		?>
			<div class="komen">
				<form action="" method="POST" accept-charset="utf-8">
					<textarea name="komentar" style='border-radius: 5px;margin-top: 10px;margin-bottom: 10px;width: 625px'></textarea>
					<input class="float-right btn green" type="submit" name="komentar-submit" value="Komentar">
				</form>
			</div>
<?php }
		if (isset($_POST['komentar-submit'])) {
			$tanggal_sekarang = date("Y-m-d H:i:s");
			mysql_query("INSERT INTO komentar (id_informasi, id_user_member, komentar, `time`)
			  		VALUES ('$_GET[id]', '$_SESSION[id_user]','$_POST[komentar]', '$tanggal_sekarang') ");
			header('location: ?page=detailberita&id=' . $_GET[id] . '');
		}
	}
} elseif ($_GET[page] == 'pendaftaran') {
	include "form_pendaftaran.php";
} elseif ($_GET[page] == 'member') {
	if ($_SESSION[id_user] != '') {
		echo "
		<style>
		#page{
			width: 1150px !important;
		}
		section{
			margin: 0 !important
		}
		.aa{
			margin-top: -50%;
		}
	</style>
		";
	} else {
		echo "
		<style>
		section{
			margin: 0 !important
		}
		#uu{
			margin-top: -200% !important;
		}
		td{
			text-align: center
		}
	</style>
		";
	}
	echo "<article>
			  <h1>Semua Data Member (Telah Disetujui)</h1>
			  <table width=100% border=1>
			  	<tr bgcolor=cf0b0b>
			  		<th>No</th>
			  		<th>Nama Lengkap</th>
			  		<th>Nopol</th>
					<th>Jenis</th>
					<th>Diaktifkan</th>
					<th>Masa Akhir</th>
			  		<th>Golongan</th>
			  	</tr>";
	$no = 1;
	$query = mysql_query("SELECT * FROM tb_user a 
	INNER JOIN tb_member b ON a.id_user_member=b.id_user_member 
	INNER JOIN kendaraan d ON b.jenis_kendaraan=d.id 
	INNER JOIN golongan_member c ON b.id_golongan_member=c.id_golongan_member 
	where b.status='aktif'
	");
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
		<td>" . Umur($r[tanggal_lahir]) . "</td>
		<td align=center>$r[tanggal_akhir]</td>
		<td align=center width='25%'>$r[nama_golongan_member]</td>
					  </tr>";
		$no++;
	}
	echo "</table></article>";
} elseif ($_GET[page] == 'calonmember') {
	if ($_SESSION[id_user] != '') {
		echo "
		<style>
		#page{
			width: 1150px !important;
		}
		section{
			margin: 0 !important
		}
		.aa{
			margin-top: -50%;
		}
	</style>
		";
	} else {
		echo "
		<style>
		section{
			margin: 0 !important
		}
		#uu{
			margin-top: -200% !important;
		}
	</style>
		";
	}
	echo "<article>
			<h1>Semua Data Calon Member (Belum Disetujui)</h1>
			  <table width=100% border=1>
			  	<tr bgcolor=cf0b0b>
				  <th>No</th>
				  <th>Nama Lengkap</th>
				  <th>Nopol</th>
				<th>TLPN</th>
				  <th>Umur</th>
				  <th>Golongan</th>
				  <th>Gambar</th>
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
					  </tr>";
		$no++;
	}
	echo "</table></article>";
} elseif ($_GET[page] == 'FAQ') {
	include "FAQ.php";
} elseif ($_GET[page] == 'hubungikami') {
	include "hubungi_kami.php";
} elseif ($_GET[page] == 'login') {
	include "login.php";
} elseif ($_GET[page] == 'opsilogin') {
	include "opsilogin.php";
} elseif ($_GET[page] == 'admin') {
	include "admin.php";
} elseif ($_GET[page] == 'bukti_transfer') {
	include "bukti_transfer.php";
} elseif ($_GET[page] == 'profil') {
	include "profil.php";
} elseif ($_GET[page] == 'tambah_member') {
	include "tambah_member.php";
}
?>