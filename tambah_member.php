<?php
if (isset($_POST['submit'])) {
    print_r($_POST['a']);
    $sekarang = date("Y-m-d");
    $pass = md5($_POST['pass']);
    $tanggal_sekarang = date("Y-m-d");
    $user_id = $_SESSION['id_user'];
    // $sql1 = "UPDATE tb_member SET plat_nomor = '$_POST[nomor_kendaraan]', id_golongan_member = $_POST[golongan], jenis_kendaraan =$_POST[jenis_kendaraan] where id_member = $_POST[id_member]";
    // $sql2 = "UPDATE tb_user SET nama_lengkap = '$_POST[nama_lengkap]', no_telpon = $_POST[no_telpon], email ='$_POST[email]' where id_user_member = $_POST[id_user_member]";
    mysql_query("INSERT INTO `tb_member`(
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
    // mysql_query($sql2);
    // print_r($sql1);
    echo "<script>window.alert('Anda Sukses Tambah Data Member.');
    				window.location='index.php?page=profil'</script>";
}

// $_SESSION['id_user']
?>

<style>
    section {
        margin: 0 !important
    }

    #uu {
        margin-top: -280%;
    }

    .aa {
        margin-top: -100%;
    }
</style>

<article>
    <h1>Tambah Member</h1>

    <form action='' method='POST'>
        <label for="b">Jenis kendaraan</label>
        <!-- <input type="text" name="kendaraan" id="b" required> -->
        <select name='jenis_kendaraan' class="browser-default">
            <option value="" disabled>Pilih Jenis Kendaraan</option>
            <?php
            $query = mysql_query("SELECT * FROM kendaraan");
            while ($g = mysql_fetch_array($query)) {

                echo "<option value='$g[id]'  >$g[jenis_kendaraan]</option>";
            }
            ?>
        </select>

        <label for="f">Nopol Kendaraan </label>
        <input type="text" name="nomor_kendaraan" id="f" value="<?= $get_data['plat_nomor'] ?>" required>

        <label>Gol Member </label>
        <select name='golongan' class="browser-default">
            <option value="" disabled>Pilih Golongan Member</option>
            <?php
            $query = mysql_query("SELECT * FROM golongan_member");
            while ($g = mysql_fetch_array($query)) {

                echo "<option value='$g[id_golongan_member]' >Golongan member $g[nama_golongan_member]</option>";
            }
            ?>
        </select>
        <!-- <label for="g">Gol Darah</label> -->


        <br>

        <input class="btn green" type="submit" name='submit' value='submit'>

    </form>
</article>
<br><br>