<?php
session_start();
error_reporting(0);
include "koneksi.php";
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Selamat datang di web Member Parkir</title>
	<link rel="stylesheet" href="asset/style.css">
	<link rel="stylesheet" href="asset/materialize/css/materialize.min.css">
	<!-- html 5 -->
</head>

<body>
	<main id="page">
		<header id="header">
			<img src="gambar/Kopmensa.jpg" alt="" width="1400" height="150" srcset="">
			<nav>
				<?php include "menu.php"; ?>
			</nav>
		</header>

		<section>
			<?php
			include "content.php";
			include "content-admin.php";
			?>
		</section>

		<aside style="margin: 15px;">
			<div>
				<?php include "sidebar.php"; ?>
			</div>
		</aside>

		<div style="clear:both"></div>

		<footer>
			<!-- <hr> -->
			<p>
				<h10>
					<marquee bgcolor="#FFFF33">Copyright 2020 - KOPMENSA KAB. SEMARANG</marquee>
				</h10>
			</p>

		</footer>
	</main>
	</div>

	<!-- JS -->
	<script src="asset/materialize/js/materialize.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('select').formSelect();
		});
	</script>
</body>

</html>