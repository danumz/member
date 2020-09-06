			<?php if ($_SESSION[id_admin] != '') { ?>
				<!-- <a href='index.php?page=kelolaberanda'><button class='button btn green darken-1'>Kelola Beranda</button></a>
				<a href='index.php?page=kelolatentangkami'><button class='button btn green darken-1'>Kelola Tentang Kami</button></a>
				<a href='index.php?page=kelolaberita'><button class='button btn green darken-1'>Kelola Berita</button></a>
				<a href='index.php?page=kelolamember'><button class='button btn green darken-1'>Kelola Data member </button></a>
				<a href='index.php?page=kelolacalonmember'><button class='button btn green darken-1'>Kelola Calon member </button></a>
				<a href='logout.php'><button class='button btn red darken-1'>Keluar</button></a> -->
			<?php } else {
				$usernya = mysql_fetch_array(mysql_query("SELECT * FROM tb_member where id_user_member='$_SESSION[id_user]' AND status='tidak aktif'"));

				if ($_SESSION[id_user] != '') {
					echo "<div style='' class='aa'>";
					if ($usernya['status'] == 'tidak aktif' && $usernya['file'] == null) {
						echo "<center><br><span style='color:red'>Maaf, <b>$_SESSION[nama_lengkap]</b></span><br>
						Setelah Melihat Profile member anda, Member anda / salah satu member anda Belum Disetujui Untuk Menjadi Member, silahkan transfer ke BRI rek 123456789 sesuai nominal member yang anda pilih dan bukti laporan transfer kirim ke nomer 0892345671, <a href='index.php?page=bukti_transfer'>Kirim bukti tranfer disini</a></center>";
					} else if ($usernya['status'] == 'tidak aktif' && $usernya['file'] != null) {
						echo "<center><br><span style='color:red'>Terima kasih, <b>$_SESSION[nama_lengkap]</b> </span><br>
						telah melakukan pembayaran dan upload transaksi. Setelah Melihat Profile anda, Mohon tunggu persetujuan</center>";
					} else {
						echo "<center><br><span style='color:green'>Selamat! <b>$_SESSION[nama_lengkap]</b></span><br>
						Setelah Melihat Profile anda, Maka Anda Telah Disetujui Untuk Menjadi Member,jika batasan member sudah habis silahkan daftar ulang kembali terimakasih..</center>";
					}
					echo "</div>";
				}
			?>
			<?php
				echo "<table style='width:100% !important' id='uu'>
								<tr bgcolor=ed1b24>
									<th><marquee>Hot News</marquee></th>
								</tr>";
				$query = mysql_query("SELECT i.judul, i.isi, i.id_informasi, i.tanggal, ad.nama_lengkap
									FROM informasi i JOIN admin ad 
									WHERE i.id_admin = ad.id_admin 
									ORDER BY id_informasi DESC LIMIT 20");
				$no = 1;
				while ($r = mysql_fetch_array($query)) {
					$isi_berita = (strip_tags($r[isi]));
					$isi = substr($isi_berita, 0, 300000);
					$isi = substr($isi_berita, 0, strrpos($isi, " "));
					echo "<tr>
											<td><a class='red white-text' href='index.php?page=detailberita&id=$r[id_informasi]'>$r[judul]</a></td>
											
										  </tr>";
					$no++;
				}
				echo "</table>";
			}
			?>
			<br><br>