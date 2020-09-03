				<ul>
					<?php if ($_SESSION['id_admin'] != '') { ?>
						<li><a href="#">Kelola Situs <span class="caret"></span></a>
							<div>
								<ul>
									<li><a href="index.php?page=kelolaberanda">Beranda </a></li>
									<li><a href="index.php?page=kelolatentangkami">Tentang Kami</a></li>
									<li><a href="index.php?page=kelolaberita">Berita</a></li>
								</ul>
							</div>
						</li>
						<li><a href="#">Kelola member <span class="caret"></span></a>
							<div>
								<ul>
									<li><a href="index.php?page=kelolamember">Data member </a></li>
									<li><a href="index.php?page=kelolacalonmember">Calon member </a></li>
								</ul>
							</div>
						</li>

						<li><a href="index.php?page=kelolapesanmasuk">Pesan Masuk </a></li>
					<?php } ?>
					<?php if ($_SESSION['id_user'] != '' or $_SESSION['id_admin'] == '') { ?>
						<li><a href="index.php">Beranda</a></li>
						<li><a href="index.php?page=tentangkami">Tentang Kami</a></li>
						<li><a href="index.php?page=berita">Berita</a></li>
						<li><a href="index.php?page=hubungikami">Hubungi Kami</a></li>
						<li><a href="index.php?page=FAQ">FAQ</a></li>
					<?php } ?>
					<?php if ($_SESSION['id_user'] == '' and $_SESSION['id_admin'] == '') { ?>
						<!-- <li><a href="index.php?page=pendaftaran">Form Pendaftaran</a></li> -->
					<?php } ?>

					<?php if ($_SESSION['id_user'] != '' or $_SESSION['id_admin'] != '') { ?>
						<li><a href="#">Informasi <span class="caret"></span></a>
							<div>
								<ul>
									<li><a href="index.php?page=member">member</a></li>
									<li><a href="index.php?page=calonmember">Colon member </a></li>
									<?= $_SESSION['id_user'] != '' ? '<li><a href="index.php?page=profil">Profil</a></li>' : "" ?>
								</ul>
							</div>
						</li>
					<?php } ?>

					<!-- <li><a href="index.php?page=hubungikami">Hubungi Kami</a></li> -->

					<?php if ($_SESSION['id_user'] != '' || $_SESSION['id_admin'] != '') {
						echo "<li><a href='#'>Selamat! <b style='color:black'>$_SESSION[nama_lengkap]</b></a>
								<div>
									<ul>
										<li><a href='logout.php'>Logout</a></li>
									</ul>
								</div>
							  </li>"; ?>
					<?php }
					?>

					<?php if ($_SESSION['id_admin'] == '' and $_SESSION['id_user'] == '') { ?>
						<li><a href="index.php?page=opsilogin">Login</a></li>
					<?php } ?>
				</ul>