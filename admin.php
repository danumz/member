<?php
if (isset($_POST[login])) {
	$userlogin = $_POST[user];
	$passlgoin = md5($_POST[pass]);
	$login = mysql_query("SELECT * FROM admin 
					where username='$userlogin' AND password='$passlgoin'");
	$cek = mysql_num_rows($login);
	$r = mysql_fetch_assoc($login);
	if ($cek >= 1) {
		$_SESSION[id_admin] 	= $r[id_admin];
		$_SESSION[nama_lengkap] = $r[nama_lengkap];
		echo "<script>window.alert('Anda Sukses Login.');
					window.location='index.php'</script>";
	} else {
		echo "<script>window.alert('Maaf, Login anda Gagal !!!.');
					window.location='index.php?page=admin'</script>";
	}
}
?>

<style>
	section {
		margin: 0 !important
	}

	#uu {
		margin-top: -100%;
	}
</style>

<article><br>
	<!-- <h1>Form Login Admin</h1> -->
	<form action='' method='POST'>
		<!-- <form  action='' method='POST'> -->
		<div class="card gray">
			<div class="container"><br>
				<h5 class="center">Form Login Admin</h5>
				<label for="user">Nama Pengguna</label>
				<input type="text" name="user" id="user">

				<label for="pass">Kata Sandi</label>
				<input type="password" name="pass" id="pass"><br><br />
				<input class="btn blue" type="submit" value="Masuk" name="login"><br><br>
			</div>
		</div>
		<!-- <center><table style='width:299px; margin:10% 0 10% 0; background:#e3e3e3; padding:30px; border:1px solid #cecece'>
						<tr>
							<td>Username</td> <td> <input type='text' name='user'></td>
						</tr>
						<tr>
							<td>Password</td> <td> <input type='password' name='pass'></td>
						</tr>
						<tr>
							<td colspan='2'><input style='float:right' type='submit' value='Login' name='login'></td>
						</tr>
					</table></center> -->
	</form>
</article>