<?php
if (isset($_POST[login])) {
    $userlogin = $_POST[user];
    $passlgoin = md5($_POST[pass]);
    $login = mysql_query("SELECT * FROM tb_user 
					where username='$userlogin' AND password='$passlgoin'");
    $cek = mysql_num_rows($login);
    $r = mysql_fetch_assoc($login);
    if ($cek >= 1) {
        $_SESSION[id_user]     = $r[id_user_member];
        $_SESSION[nama_lengkap] = $r[nama_lengkap];
        $_SESSION[status] = $r[status_user];
        echo "<script>window.alert('Anda Sukses Login.');
					window.location='index.php'</script>";
    } else {
        echo "<script>window.alert('Maaf, Login anda Gagal !!!.');
					window.location='index.php?page=login'</script>";
    }
}
?>
<style>
    section {
        margin: 0 !important
    }

    #uu {
        margin-top: -80% !important;
    }
</style>
<article><br>
    <h5 class="center ">Pilih Opsi Login</h5><br>
    <div class="row">
        <div class="col m6 s12">
            <a class="white-text center" href="index.php?page=login">
                <div class="card-panel green darken-2">
                    <h6 calss="light text-darken-3">Anggota</h6>
                </div>
            </a>
        </div>
        <div class="col m6 s12">
            <a class="white-text center" href="index.php?page=admin">
                <div class="card-panel red darken-2">
                    <h6 calss="grey-text light text-darken-3">Administrator</h6>
                </div>
            </a>
        </div>
    </div>
    <!-- <h5 class="center ">Pilih Opsi Login</h5><br> -->
    <p class="center"> Ingin membuat akun member?

        <a href="index.php?page=pendaftaran">Klik Disini untuk mendaftar</a>

    </p>
    <article>