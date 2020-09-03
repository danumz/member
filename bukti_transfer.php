<?php
if (isset($_POST['transaksi'])) {
    $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg', 'pdf');
    $nama = $_FILES['user']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['user']['size'];
    $file_tmp = $_FILES['user']['tmp_name'];
    $id = $_SESSION[id_user];
    // print_r($nama . $_SESSION[id_user]);
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, 'bukti transfer/' . $nama);
            $query = mysql_query("UPDATE tb_member SET file= '$nama' where id_user_member = '$id'");
            echo $query;
            if ($query) {
                echo "<script>window.alert('Maaf, Login anda Gagal !!!.');
    				window.location='index.php?page=login'</script>";
            } else {
                echo "<script>window.alert('Maaf, Upload anda Gagal !!!.');</script>";
            }
        } else {
            echo 'UKURAN FILE TERLALU BESAR';
        }
    } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
    // $userlogin = $_POST[user];
    // $passlgoin = md5($_POST[pass]);
    // $login = mysql_query("SELECT * FROM tb_user 
    // 				where username='$userlogin' AND password='$passlgoin'");
    // $cek = mysql_num_rows($login);
    // $r = mysql_fetch_assoc($login);
    // if ($cek >= 1) {
    //     $_SESSION[id_user]     = $r[id_user_member];
    //     $_SESSION[nama_lengkap] = $r[nama_lengkap];
    //     $_SESSION[status] = $r[status_user];
    //     echo "<script>window.alert('Anda Sukses Login.');
    // 				window.location='index.php'</script>";
    // } else {
    //     echo "<script>window.alert('Maaf, Login anda Gagal !!!.');
    // 				window.location='index.php?page=login'</script>";
    // }
}
?>

<article>
    <br>
    <form action='' method='POST' enctype="multipart/form-data">
        <div class="card gray">
            <div class="container"><br>
                <h5 class="center">Form Kirim Bukti Transfer</h5>
                <label for="user">Bukti Transfer (img/pdf)</label>
                <br>
                <br>
                <input type="file" name="user" id="user"><br>
                <br>
                <input class="btn blue" type="submit" value="Kirim" name="transaksi"><br><br>
            </div>
        </div>
    </form>
</article>