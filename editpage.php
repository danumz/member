<?php
if (isset($_POST['update'])) {
    print_r($_POST['a']);
    $sekarang = date("Y-m-d");
    $pass = md5($_POST['pass']);
    $sql1 = "UPDATE tb_member SET plat_nomor = '$_POST[nomor_kendaraan]', id_golongan_member = $_POST[golongan], jenis_kendaraan =$_POST[jenis_kendaraan] where id_member = $_POST[id_member]";
    $sql2 = "UPDATE tb_user SET nama_lengkap = '$_POST[nama_lengkap]', no_telpon = $_POST[no_telpon], email ='$_POST[email]' where id_user_member = $_POST[id_user_member]";
    mysql_query($sql1);
    mysql_query($sql2);
    // print_r($sql1);
    echo "<script>window.alert('Anda Sukses Update Data Member.');
    				window.location='index.php?page=kelolamember'</script>";
} else {
    $data = mysql_query("
    select * from tb_member 
    INNER JOIN tb_user ON tb_member.id_user_member=tb_user.id_user_member
    WHERE tb_member.id_member = " . $_GET['edit']);
    $get_data = mysql_fetch_array($data);
    // print_r($get_data);
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
    <h1>Edit Data Member</h1>

    <form action='' method='POST'>
        <label for="user">Nama Lengkap</label>

        <input type="hidden" name="id_member" id="user" value="<?= $get_data['id_member'] ?>">
        <input type="hidden" name="id_user_member" id="user" value="<?= $get_data['id_user_member'] ?>">
        <input type="text" name="nama_lengkap" id="user" value="<?= $get_data['nama_lengkap'] ?>" required>
        <label for="user">Email</label>
        <input type="text" name="email" id="user" value="<?= $get_data['email'] ?>" required>
        <label for="user">No telpon</label>
        <input type="text" name="no_telpon" id="user" value="<?= $get_data['no_telpon'] ?>" required>

        <label for="b">Jenis kendaraan</label>
        <!-- <input type="text" name="kendaraan" id="b" required> -->
        <select name='jenis_kendaraan' class="browser-default">
            <option value="" disabled>Pilih Jenis Kendaraan</option>
            <?php
            $query = mysql_query("SELECT * FROM kendaraan");
            while ($g = mysql_fetch_array($query)) {
                if ($g['id'] == $get_data['jenis_kendaraan']) {
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                echo "<option value='$g[id]' $selected >$g[jenis_kendaraan]</option>";
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
                if ($g['id_golongan_member'] == $get_data['id_golongan_member']) {
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                echo "<option value='$g[id_golongan_member]' $selected>Golongan member $g[nama_golongan_member]</option>";
            }
            ?>
        </select>
        <!-- <label for="g">Gol Darah</label> -->


        <br>

        <input class="btn green" type="submit" name='update' value='Edit'>

    </form>
</article>
<br><br>