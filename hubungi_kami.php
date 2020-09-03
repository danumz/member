<?php
if (isset($_POST['submit'])) {
	$sekarang = date("Y-m-d H:i:s");
	mysql_query("INSERT INTO hubungi_kami (nama_lengkap, 
											 alamat_email,
											 isi_pesan,
											 tanggal_pesan)
									 VALUES ('$_POST[a]',
									 		 '$_POST[b]',
									 		 '$_POST[c]',
									 		 '$sekarang')");

	echo "<script>window.alert('Sukses Mengirimkan Pesan.');
				window.location='index.php?page=hubungikami'</script>";
}
?>
<?php
if ($_SESSION[id_user] != '') {
	echo "
	<style>
	section{
		margin: 0 !important
	}
	.aa{
		margin-top: -140%;
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
		margin-top: -120% !important;
	}
</style>
	";
}
?>
<article>
	<h1>Hubungi Kami</h1>
	<p>Hubungi kami jika ada kritik dan saran secara online melalui form dibawah ini </p>
	<form action='' method='POST'>
		<label for="nama">Nama Lengkap</label>
		<input type="text" name="a" id="nama" required>

		<label for="email">Alamat Email</label>
		<input type="text" name="b" id="email" required>

		<label for="isi">Isi Pesan</label>
		<input type="text" name="c" id="isi" required>
		<br>
		<input class="btn green" type="submit" name="submit" value="Kirim">
	</form>
</article>
<br><br>