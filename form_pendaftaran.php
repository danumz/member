<?php
if (isset($_POST['submit'])) {
	print_r($_POST['a']);
	$sekarang = date("Y-m-d");
	$pass = md5($_POST['pass']);
	$masuk_user = mysql_query("INSERT INTO tb_user (
									username,
									password,
									nama_lengkap, 
									tanggal_lahir, 
									no_telpon, 
									alamat_lengkap, 		 
									email)
									 VALUES ('$_POST[user]',
									 		 '$pass',
									 		 '$_POST[nama_lengkap]',
									 		 '$_POST[tgl_lahir]',
									 		 '$_POST[no_telp]',
									 		 '$_POST[alamat]',
											  '$_POST[email]')");
	$user = mysql_query("select MAX(id_user_member) from tb_user");
	$user_id = mysql_fetch_array($user)[0];
	$tanggal_sekarang = date("Y-m-d");
	$masuk_member = mysql_query("INSERT INTO `tb_member`(
		`id_user_member`, 
		`tanggal_awal`,
		`id_golongan_member`, 
		`jenis_kendaraan`, 
		`plat_nomor`, 
		`status`) 
		VALUES (
			$user_id,
			$tanggal_sekarang,
			'$_POST[golongan]',
			'$_POST[jenis_kendaraan]',
			'$_POST[nomor_kendaraan]',
			'tidak aktif'
		)");

	if ($masuk_user && $masuk_member) {
		echo "<script>window.alert('Sukses Terdaftar Sebagai Calon member.');
				window.location='index.php?page=opsilogin'</script>";
	} else {
		echo "<script>window.alert('Gagal mendaftar.');
				window.location='index.php?page=pendaftaran'</script>";
	}
}

?>

<style>
	section {
		margin: 0 !important
	}

	#uu {
		margin-top: -280%;
	}
</style>

<article>
	<h1>Form Pendaftaran</h1>
	<p>Silahkan mengisi form dibawah ini untuk menjadi member : </p>
	<form action='' method='POST'>
		<label for="user">Nama Pengguna</label>
		<input type="text" name="user" id="user" required>

		<label for="pass">Kata Sandi</label>
		<input type="password" name="pass" id="pass" required>

		<label for="a">Nama Lengkap</label>
		<input type="text" name="nama_lengkap" id="a" required>

		<label for="c">Tanggal Lahir</label>
		<input type="date" name="tgl_lahir" id="c" required>

		<label for="d">No Telepon</label>
		<input type="text" name="no_telp" id="d" required>

		<label for="h">Email</label>
		<input type="text" name="email" id="h" required>

		<label for="e">Alamat</label>
		<input type="text" name="alamat" id="e" required>

		<label for="b">Jenis kendaraan</label>
		<!-- <input type="text" name="kendaraan" id="b" required> -->
		<select name='jenis_kendaraan' class="browser-default">
			<option value="" disabled selected>Pilih Jenis Kendaraan</option>
			<?php
			$query = mysql_query("SELECT * FROM kendaraan");
			while ($g = mysql_fetch_array($query)) {
				echo "<option value='$g[id]'>Golongan member $g[jenis_kendaraan]</option>";
			}
			?>
		</select>

		<label for="f">Nopol Kendaraan </label>
		<input type="text" name="nomor_kendaraan" id="f" required>

		<label>Gol Member </label>
		<select name='golongan' class="browser-default">
			<option value="" disabled selected>Pilih Golongan Member</option>
			<?php
			$query = mysql_query("SELECT * FROM golongan_member");
			while ($g = mysql_fetch_array($query)) {
				echo "<option value='$g[id_golongan_member]'>Golongan member $g[nama_golongan_member]</option>";
			}
			?>
		</select>
		<!-- <label for="g">Gol Darah</label> -->


		<br>

		<input class="btn green" type="submit" name='submit' value='Kirim'>

	</form>
</article>
<br><br>