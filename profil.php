<?php
if ($_SESSION[id_user] != '') {
    echo "
<style>
    #page{
        width: 1150px !important;
    }
    section {
        margin: 0 !important
    }

    .aa {
        margin-top: -60%;
    }
    
</style>
";
} else {
    echo "
<style>
    section {
        margin: 0 !important
    }

    #uu {
        margin-top: -200% !important;
    }
    
</style>
";
}
echo "<article>

    <h1>Data Profil member <a class='btn' href='index.php?page=tambah_member'>Tambah</a></h1>
    <table width=100% border=1>
        <tr bgcolor=cf0b0b>
            <th>No</th>
            <th>Member</th>
            <th>Jenis</th>
            <th>Kendaraan</th>
            <th>Nopol</th>
            <th>Status</th>
        </tr>";
$no = 1;
$query = mysql_query("SELECT * FROM tb_member a
INNER JOIN golongan_member b ON a.id_golongan_member=b.id_golongan_member
INNER JOIN kendaraan d ON a.jenis_kendaraan=d.id
INNER JOIN tb_user c ON a.id_user_member=c.id_user_member
where a.id_user_member = " . $_SESSION['id_user']);
while ($r = mysql_fetch_array($query)) {
    if ($r['tanggal_akhir'] == null) {
        $tanggalnya = "selamanya";
    } else {
        $tanggalnya = $r['tanggal_akhir'];
    }
    echo "<tr>
    <td style=' text-align:center !important'>$no</td>
    <td style=' text-align:center !important'>$r[id_member]</td>
    <td style=' text-align:center !important'>$r[nama_golongan_member]</td>
    <td style=' text-align:center !important'>$r[jenis_kendaraan]</td>
    <td style=' text-align:center !important'>$r[plat_nomor]</td>
    
    <td  style=' text-align:center !important'>$r[status]</td>
</tr>";
    $no++;
}
echo "
    </table>
</article>";
