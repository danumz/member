-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Mei 2020 pada 16.30
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_member`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat_email` varchar(100) NOT NULL,
  `alamat_lengkap` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `alamat_email`, `alamat_lengkap`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'administrator@gmail.com', 'demak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan_member`
--

CREATE TABLE `golongan_member` (
  `id_golongan_member` int(5) NOT NULL,
  `nama_golongan_member` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan_member`
--

INSERT INTO `golongan_member` (`id_golongan_member`, `nama_golongan_member`, `keterangan`) VALUES
(1, 'A karyawan', 'Member A karyawan'),
(2, 'B pasien', 'Member B pasien'),
(3, 'C mahasiswa/relasi', 'Member C Mahasiswa/relasi'),
(4, 'D umum', 'Member D Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE `halaman` (
  `id_halaman` int(5) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `halaman`
--

INSERT INTO `halaman` (`id_halaman`, `judul`, `isi`) VALUES
(1, '<marquee behavior ="alternate">KENTENTUAN HARGA MEMBER PARKIR</marquee>', '<font color="red">MONTOR  </font>\r\nKARYAWAN = Rp.0\r\nPASIEN = Rp.30.000\r\nKet: Untuk 14 hari.\r\nMAHASISWA / RELASI = Rp.50.000\r\nKet: Untuk 30 hari ( 1 bulan).\r\nUMUM = Rp.90.000\r\nKet: Untuk 30 hari ( 1 bulan).\r\n<img src="gambar/parkir.jpg" width="50%">\r\n<font color="red">MOBIL </font>\r\nKARYAWAN = Rp.0\r\nPASIEN = Rp.60.000\r\nKet: Untuk 14 hari.\r\nMAHASISWA / RELASI = Rp.70.000\r\nKet: Untuk 30 hari ( 1 bulan).\r\nUMUM = Rp.100.000\r\nKet: Untuk 30 hari ( 1 bulan).\r\n\r\n<h5>NB: jika ingin memperpanjang member silahkan daftar ulang lagi!!!!!!!</h5>'),
(2, 'Tentang Kami Member Parkir RSI Sultan Agung', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus aspernatur optio temporibus ad officiis debitis, iste dolorum, deleniti animi possimus ipsum exercitationem, fugit fuga ea. Adipisci temporibus dolorum, in nostrum aperiam enim libero eius distinctio, repellat nam et rem sed hic porro ducimus earum maxime nobis qui! Tenetur, rerum vero. Suscipit dicta animi veniam deserunt nostrum. Iure perspiciatis voluptate cum aspernatur odio corporis quisquam veritatis deserunt ad, iste veniam quidem saepe cumque nobis atque vitae!\r\n\r\nVoluptatum tempore optio architecto eligendi culpa, ea, nostrum magnam et a temporibus quibusdam fugit tempora assumenda quaerat consectetur error unde eveniet repellendus! Atque omnis, saepe, nemo accusantium nostrum explicabo iste architecto similique quis id quia cumque itaque deserunt a vel repellat hic repellendus velit asperiores! Porro, voluptatibus culpa. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint minima quisquam in a vero ipsam omnis rem quam velit excepturi placeat exercitationem, ullam repellat fuga cum officia corporis illo laboriosam voluptas sunt consequuntur tempore asperiores provident. Deleniti rerum impedit, non iure nulla eos maiores commodi necessitatibus, sed vitae aliquam deserunt dicta inventore ab, perspiciatis laudantium? Amet libero qui consequuntur vero facilis voluptas necessitatibus consectetur recusandae nihil, suscipit fugit, praesentium illum molestiae, autem velit natus facere repellendus sint minus ea maxime nisi numquam obcaecati at. Incidunt, voluptatibus. Unde corporis culpa in! Hic excepturi veniam earum molestiae nobis inventore! Deleniti aliquid natus iure, neque numquam quibusdam aperiam ab non. \r\n\r\nSapiente deleniti labore itaque corporis dolorum aliquam vero quae quisquam. Modi inventore repudiandae quo dolor excepturi impedit fugiat. Dolore commodi delectus voluptatem voluptatum, ipsa saepe sapiente eos perferendis, quibusdam voluptatibus accusamus! Esse, quibusdam blanditiis cumque natus magnam temporibus commodi ea facere id culpa quod voluptates maxime totam asperiores fugit vero magni, repudiandae vitae? Veniam, facere consectetur velit eligendi error est!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi_kami`
--

CREATE TABLE `hubungi_kami` (
  `id_hubungi_kami` int(5) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `alamat_email` varchar(150) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tanggal_pesan` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hubungi_kami`
--

INSERT INTO `hubungi_kami` (`id_hubungi_kami`, `nama_lengkap`, `alamat_email`, `isi_pesan`, `tanggal_pesan`) VALUES
(1, 'Robihamanto', 'robihamanto@hotmail.com', 'Assalamualaikum, saya sudah mendaftar sebagai pendonor, mohon unutk di cek dan konfirmasi status saya secepatnya. terima kasih,..', '2015-09-17 09:24:57'),
(3, 'Putri Dewi', 'puputri@gmail.com', 'Suntikin dong mas..', '2019-10-22 14:33:14'),
(5, 'sairozi', 'coba@gmail.com', 'tolong di konfirmasi', '2020-05-03 06:30:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `id_admin`, `judul`, `isi`, `tanggal`) VALUES
(8, 1, 'BlogBugaBagi Bersedekah Donor Darah', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi, odio. Dignissimos at adipisci perferendis consectetur provident placeat nulla vitae esse corrupti illo voluptatem nobis reprehenderit officiis sit dolorem saepe, rem expedita iure qui magnam est omnis excepturi? \r\n\r\nOptio veniam laudantium asperiores omnis labore minus quod voluptatum explicabo debitis similique odit eligendi saepe maiores odio vitae ab officiis, consectetur minima aperiam pariatur quas cupiditate incidunt expedita adipisci. Dolor, est voluptatibus. Nulla quam repellendus natus iusto maiores! Corrupti, fugit? Incidunt corporis iste maiores. Impedit repudiandae officiis obcaecati, corrupti ipsam rerum quaerat magni possimus dicta repellendus libero voluptates quae adipisci omnis autem at optio amet vitae placeat dignissimos tempora cupiditate? Voluptatum quo eum voluptatem, error ratione nostrum voluptates mollitia suscipit delectus doloribus minus inventore expedita possimus molestias sint commodi illum excepturi accusantium labore? \r\n\r\nDolorum, magnam minima! Soluta a culpa adipisci amet odio earum aliquam voluptates reiciendis quisquam molestias necessitatibus delectus, veniam cupiditate aut facilis! Optio quos voluptatum minima ab nostrum, consequuntur voluptates, nemo voluptate eveniet fugit velit rerum, officiis alias nisi dignissimos obcaecati rem quo officia est corrupti voluptas inventore dolore explicabo. Quibusdam, asperiores. Repudiandae aperiam eaque cum assumenda aliquam, non nihil voluptates, impedit facilis dolor ea, molestiae quos. Quae illum beatae ipsa a sit id laudantium in provident facilis incidunt? \r\n\r\nOmnis, vitae tempore! Tenetur, necessitatibus dolorem. Eos odit architecto minus itaque facere eum natus nulla, doloribus ipsam voluptatem ullam totam perferendis assumenda? Beatae deserunt voluptates quibusdam provident ducimus autem, aliquid suscipit dicta nemo optio numquam molestias, magni veritatis reprehenderit vitae nulla consectetur ea impedit? Assumenda minima quidem eaque doloribus nesciunt iste, voluptas, delectus illum sint nobis deserunt quam temporibus molestiae veritatis autem voluptatum, iure enim eligendi? Inventore, minus pariatur esse ipsam sed minima debitis porro, eos ad possimus consequatur blanditiis ullam illum saepe quae tempora officiis! Pariatur ipsa numquam ab? Ipsam, itaque placeat harum ab, nesciunt quae tempora velit fugiat voluptatem sequi eveniet neque necessitatibus maxime! Consectetur vitae fugiat sed excepturi enim? \r\n\r\nTenetur, inventore repudiandae possimus at a soluta optio veritatis velit laboriosam vitae, explicabo et nesciunt incidunt laborum maxime provident. Inventore reprehenderit odio aliquam. Perspiciatis ratione debitis aliquam dolorum, quam eligendi ex! \r\n\r\nQuia eum cumque aliquid, tempora inventore vel molestias dolorum quo quaerat. Veritatis, necessitatibus molestias! Blanditiis quisquam reiciendis repellat esse sunt ut. Ducimus aut corporis animi minima provident cumque quia fuga pariatur totam dolor accusamus beatae quisquam ab nulla deleniti, necessitatibus sit repudiandae, ratione ullam maxime sed ipsum qui porro excepturi. \r\n\r\nTenetur labore reprehenderit quidem, optio culpa possimus eaque expedita, saepe odit laudantium dignissimos cumque. Voluptatum sunt assumenda ipsa omnis nesciunt natus debitis, fugit quisquam, harum vero laboriosam iure magnam dolorem, magni repellendus?', '2019-10-22 14:22:24'),
(30, 1, 'Gejala Virus Corona (COVID-19)', 'Gejala awal infeksi virus Corona atau COVID-19 bisa menyerupai gejala flu, yaitu demam, pilek, batuk kering, sakit tenggorokan, dan sakit kepala. Setelah itu, gejala dapat hilang dan sembuh atau malah memberat. Penderita dengan gejala yang berat bisa mengalami demam tinggi, batuk berdahak bahkan berdarah, sesak napas, dan nyeri dada. Gejala-gejala tersebut muncul ketika tubuh bereaksi melawan virus Corona.\r\n\r\nSecara umum, ada 3 gejala umum yang bisa menandakan seseorang terinfeksi virus Corona, yaitu:\r\n\r\nDemam (suhu tubuh di atas 38 derajat Celsius)\r\nBatuk kering\r\nSesak napas\r\nAda beberapa gejala lain yang juga bisa muncul pada infeksi virus Corona meskipun lebih jarang, yaitu:\r\n\r\nDiare\r\nSakit kepala\r\nKonjungtivitis\r\nHilangnya kemampuan mengecap rasa atau mencium bau\r\nRuam di kulit\r\nGejala-gejala COVID-19 ini umumnya muncul dalam waktu 2 hari sampai 2 minggu setelah penderita terpapar virus Corona.', '2020-05-15 16:43:45'),
(31, 1, 'Pencegahan Virus Corona (COVID-19)', '\r\nSampai saat ini, belum ada vaksin untuk mencegah infeksi virus Corona atau COVID-19. Oleh sebab itu, cara pencegahan yang terbaik adalah dengan menghindari faktor-faktor yang bisa menyebabkan Anda terinfeksi virus ini, yaitu:\r\n\r\nTerapkan physical distancing, yaitu menjaga jarak minimal 1 meter dari orang lain, dan jangan dulu ke luar rumah kecuali ada keperluan mendesak.\r\nGunakan masker saat beraktivitas di tempat umum atau keramaian, termasuk saat pergi berbelanja bahan makanan.\r\nRutin mencuci tangan dengan air dan sabun atau hand sanitizer yang mengandung alkohol minimal 60%, terutama setelah beraktivitas di luar rumah atau di tempat umum.\r\nJangan menyentuh mata, mulut, dan hidung sebelum mencuci tangan.\r\nTingkatkan daya tahan tubuh dengan pola hidup sehat.\r\nHindari kontak dengan penderita COVID-19, orang yang dicurigai positif terinfeksi virus Corona, atau orang yang sedang sakit demam, batuk, atau pilek.\r\nTutup mulut dan hidung dengan tisu saat batuk atau bersin, kemudian buang tisu ke tempat sampah.\r\nJaga kebersihan benda yang sering disentuh dan kebersihan lingkungan, termasuk kebersihan rumah.\r\nUntuk orang yang diduga terkena COVID-19 atau termasuk kategori ODP (orang dalam pemantauan) maupun PDP (pasien dalam pengawasan), ada beberapa langkah yang bisa dilakukan agar virus Corona tidak menular ke orang lain, yaitu:\r\n\r\nLakukan isolasi mandiri dengan cara tinggal terpisah dari orang lain untuk sementara waktu. Bila tidak memungkinkan, gunakan kamar tidur dan kamar mandi yang berbeda dengan yang digunakan orang lain.\r\nJangan keluar rumah, kecuali untuk mendapatkan pengobatan.\r\nBila ingin ke rumah sakit saat gejala bertambah berat, sebaiknya hubungi dulu pihak rumah sakit untuk menjemput.\r\nLarang orang lain untuk mengunjungi atau menjenguk Anda sampai Anda benar-benar sembuh.\r\nSebisa mungkin jangan melakukan pertemuan dengan orang yang sedang sedang sakit.\r\nHindari berbagi penggunaan alat makan dan minum, alat mandi, serta perlengkapan tidur dengan orang lain.\r\nPakai masker dan sarung tangan bila sedang berada di tempat umum atau sedang bersama orang lain.\r\nGunakan tisu untuk menutup mulut dan hidung bila batuk atau bersin, lalu segera buang tisu ke tempat sampah.\r\nKondisi-kondisi yang memerlukan penanganan langsung oleh dokter di rumah sakit, seperti melahirkan, operasi, cuci darah, atau vaksinasi anak, perlu ditangani secara berbeda dengan beberapa penyesuaian selama pandemi COVID-19. Tujuannya adalah untuk mencegah penularan virus Corona selama Anda berada di rumah sakit. Konsultasikan dengan dokter mengenai tindakan terbaik yang perlu dilakukan.', '2020-05-15 16:45:36'),
(32, 1, 'Lowongan Kerja di RSI Sultan Agung Semarang Jawa Tengah', 'RSI atau Rumah Sakit Islam Sultan Agung Semarang Provinsi Jawa Tengah ini merupakan rumah sakit di bawah Yayasan Badan Wakaf Sultan Agung Semarang yang ber alamat kan di Jl. Kaligawe Raya KM.4, Terboyo Kulon, Kec. Genuk, Kota Semarang, Jawa Tengah 50112. Saat ini RSI Sultan Agung Semarang Provinsi Jawa Tengah sedang membuka 4 lowongan kerja diantaranya sebagai berikut :\r\n\r\nloker rsi sultan agung semarang\r\nA. Apoteker\r\nB. Perawat\r\nC. Tenaga Teknis Kefarmasian\r\nD. Analis Kesehatan\r\nE. Radiografer\r\nPeryaratan :\r\n\r\n1.Formasi A Minimal pendidikan apoteker\r\n2.Formasi B di utamakan NS, Pendidikan D3 dengan pelatihan khusus\r\n( Bedah, ICU, Hemodialisa, Kardiologi Dasar dan Anastesi )\r\n3.Formasi C sampai E minimal pendidikan D3 sesuai profesi\r\n4.Indek Prestasi Komulatif ( IPK ) 3.00\r\n5.Memiliki STR yang masih berlaku\r\n6.Berusia setinggi tinggi nya 30 Tahun per 31 Desember 2020\r\n7.Tinggi badan minimum 155 cm ( wanita ) dan 160 cm ( pria ), dengan berat badan proporsional serta berpenampilan menarik\r\nBagi anda yang berminat dengan lowongan pekerjaan Apoteker, perawat, tenaga medis kefarmasian, analis kesehatan, radiografer di atas, hendaknya anda segera menyiapkan berkas atau CV, Surat Lamaran pekerjaan yang pada umumnya berisi :\r\n\r\nBerkas Administrasi yang harus di lampirkan :\r\n\r\n1.CV ( Daftar Riwayat Hidup )\r\n2.Lamaran Kerja\r\n3.Fotokopi ijazah dan transkrip nilai akademin yang di legalisir\r\n4.Fotokopi STR yang masih berlaku dan di legalisir\r\n5.fotokopi sertifikat pelatihan sesuai dengan kompetensi\r\n6.fotokopi sertifikat BTCLS ( perawat )\r\n7.fotokopi KTP yang masih berlaku / surat perekaman e-KPT yang di tetapkan oleh 8.Dinas Kependudukan dan Catatan Sipil\r\n9.Foto berwarna ukuran postcard ( tampak seluruh badan )\r\n10.Surat Keteragann sehat dan bebas narkoba dari Puskesmas / Rumah Sakit\r\n11.Fotokopi SKCK\r\nLain lain\r\n\r\n1.Pelamar datang langsung dengan membawa berkas lamaran lengkap dengan jadwal sebagai berikut :\r\n-Hari Senin, 3 Februari 2020 pukul 08.30-14.00 WIB untuk farmasi, apoteker, tenaga medis kefarmasian, analis kesehatan dan radiografer\r\n-Hari Selasa, 4 Februari 2020 pukul 08.30-14.00 WIB untuk formasi perawat.\r\n-tempat pelakasanaan di Ruang ex RSIGM Gedung A Lantai 2 Rumah Sakit Islam Sultan Agung Semarang.\r\n2.Saat mengikuti tahapan seleksi, peserta wajib mengenakan pakaian atasan putih bawahan hitam dan memakai sepatu ( tidak boleh mengenakan kaos atau sandal jepit )\r\n3.Seluruh rekruitmen pegawai mulai dari proses pelamaran, pelaksanaan seleksi sampai dengan penentuan kelulusan TIDAK DIPUNGUT BIAYA\r\n4.Bagi pelamar yang terbukti melakukan perjokian atau memberikan keterangan PALSU dnyatakan TIDAK LULUS / GUGUR dan akan dikenakan sanksi hukum yang berlaku\r\nAtau bagi anda yang masih bingung seperti apa surat lamaran pekerjaan yang baik dan benar. lokerkendal.com memiliki contoh surat lamaran pekerjaan yang dapat anda gunakan sebagai acuan dalam membuat surat lamaran pekerjaan, agar anda dapat segera mengirim surat lamaran pekerjaan anda ke perusahaan yang anda inginkan. Berikut surat lamaran pekerjaan yang kami sediakan.', '2020-05-15 16:58:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_informasi` int(5) NOT NULL,
  `id_komentar` int(5) NOT NULL,
  `id_user_donor` int(5) NOT NULL,
  `komentar` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_informasi`, `id_komentar`, `id_user_donor`, `komentar`, `time`) VALUES
(8, 4, 2, 'Omnis, vitae tempore! Tenetur, necessitatibus dolorem. Eos odit architecto minus itaque facere eum natus nulla, doloribus ipsam voluptatem ullam totam perferendis assumenda?', '2019-10-22 07:46:18'),
(8, 5, 2, 'Omnis, vitae tempore! Tenetur, necessitatibus dolorem. Eos odit architecto minus itaque facere eum natus nulla, doloribus ipsam voluptatem ullam totam perferendis assumenda?', '2019-10-22 07:46:27'),
(7, 6, 2, 'Omnis, vitae tempore! Tenetur, necessitatibus dolorem. Eos odit architecto minus itaque facere eum natus nulla, doloribus ipsam voluptatem ullam totam perferendis assumenda?', '2019-10-22 07:46:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user_member` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kendaraan` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `nopol_kendaraan` varchar(11) NOT NULL,
  `id_golongan_member` int(5) NOT NULL,
  `email` text NOT NULL,
  `status_user` enum('aktif','nonaktif') NOT NULL DEFAULT 'nonaktif',
  `waktu` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user_member`, `username`, `password`, `nama_lengkap`, `jenis_kendaraan`, `tanggal_lahir`, `no_telpon`, `alamat_lengkap`, `nopol_kendaraan`, `id_golongan_member`, `email`, `status_user`, `waktu`) VALUES
(14, 'ulum', '827ccb0eea8a706c4c34a16891f84e7b', 'nasrul ulum', 'montor', '2002-05-04', '09876553235', 'demak', 'H2180PN', 2, 'baru@gmail.com', 'aktif', '2020-05-03'),
(23, 'siapa', '827ccb0eea8a706c4c34a16891f84e7b', 'siapa ya', 'mobil', '1999-06-02', '4526178190240', 'semarang', 'k6412KL', 2, 'baru@gmail.com', 'nonaktif', '2020-05-22'),
(24, 'sairozi', '827ccb0eea8a706c4c34a16891f84e7b', 'sairozi', 'montor', '1996-09-03', '0891234543', 'demak', 'H6140FN', 4, 'coba@gmail.com', 'nonaktif', '2020-05-22'),
(16, 'ulum', '827ccb0eea8a706c4c34a16891f84e7b', 'nasrul ulum', 'montor', '2002-04-04', '09876543', 'demak', 'H2180PN', 2, 'baru@gmail.com', 'aktif', '2020-05-03'),
(18, 'sairozi', '827ccb0eea8a706c4c34a16891f84e7b', 'sairozi', 'montor', '1995-09-03', '-098765556789', 'demak', 'H6140FN', 4, 'Baru', 'nonaktif', '2020-05-03'),
(20, 'ulum', '827ccb0eea8a706c4c34a16891f84e7b', 'nasrul ulum', 'montor', '2001-04-04', '4526178190240', 'demak', 'H2180PN', 2, 'baru@gmail.com', 'nonaktif', '2020-05-05'),
(22, 'fiqoh', '827ccb0eea8a706c4c34a16891f84e7b', 'fiqoh nimah', 'mobil', '2000-05-07', '09767542569786', 'semarang', 'H7771PP', 4, 'coba@gmail.com', 'aktif', '2020-05-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `golongan_member`
--
ALTER TABLE `golongan_member`
  ADD PRIMARY KEY (`id_golongan_member`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  ADD PRIMARY KEY (`id_hubungi_kami`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user_member`),
  ADD KEY `id_golongan_darah` (`id_golongan_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `golongan_member`
--
ALTER TABLE `golongan_member`
  MODIFY `id_golongan_member` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id_halaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  MODIFY `id_hubungi_kami` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user_member` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
