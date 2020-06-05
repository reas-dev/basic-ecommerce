-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 11:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_kamera`
--
CREATE DATABASE IF NOT EXISTS `toko_kamera` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `toko_kamera`;

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `no_nota` varchar(20) NOT NULL,
  `kode_pelanggan` varchar(20) NOT NULL,
  `kode_cam` varchar(20) NOT NULL,
  `jml_jual` int(5) NOT NULL,
  `total_harga` int(12) NOT NULL,
  `tgl_jual` date NOT NULL,
  `status_lunas` int(1) NOT NULL,
  `status_kirim` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`no_nota`, `kode_pelanggan`, `kode_cam`, `jml_jual`, `total_harga`, `tgl_jual`, `status_lunas`, `status_kirim`) VALUES
('sA4MCZIbYNGjzlBpiDWo', 'sA4MCZIbYNGjzlBpiDWo', 'A7S', 1, 35000000, '2020-05-29', 0, 0),
('X1ykOx68IgPKiUhjQweC', 'X1ykOx68IgPKiUhjQweC', 'D7200', 1, 16500000, '2020-05-29', 1, 0),
('XfokMjr7HyJqdSTOVWnB', 'XfokMjr7HyJqdSTOVWnB', 'Hero8', 1, 5500000, '2020-05-29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kamera`
--

CREATE TABLE `kamera` (
  `kode_cam` varchar(20) NOT NULL,
  `merk_cam` varchar(20) NOT NULL,
  `tipe_cam` enum('mirrorless','DSLR','Action Cam','Pocket Cam') NOT NULL,
  `img_cam` varchar(255) DEFAULT NULL,
  `stock` int(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamera`
--

INSERT INTO `kamera` (`kode_cam`, `merk_cam`, `tipe_cam`, `img_cam`, `stock`, `harga`, `deskripsi`) VALUES
('3000D', 'CANON', 'DSLR', '3000D.jpg', 34, 5000000, 'Canon EOS 3000D Kit EF-S 18-55mm f/3.5-5.6 III menawarkan pengalaman DSLR klasik bagi para pengguna kamera DSLR yang baru. Canon EOS 3000D Kit 18-55mm dibekali dengan Sensor CMOS ukuran APS-C 18 megapiksel, sekitar 19 kali lipat lebih besar daripada sensor yang digunakan dalam kamera smartphone. Hal ini memungkinkan untuk menangkap lebih banyak cahaya dan detail dalam gambar, serta berperan menghasilkan buram pada latar belakang yang indah. Informasi gambar dapat secepatnya diproses oleh prosesor gambar DIGIC 4+, menghasilkan output dengan resolusi dan kualitas yang tinggi. Kecil dan ringan, dengan berat kira-kira 436 gram (termasuk baterai dan kartu memori), inilah satu kamera yang juga ideal dipakai untuk perjalanan.'),
('5D-IV', 'CANON', 'DSLR', '5D-IV.jpg', 11, 47200000, 'Kamera Canon EOS 5D Mark IV Body Only dibangun di atas seri 5D sebelumnya yang sangat kuat, menawarkan penyempurnaan yang luar biasa dalam kualitas, kinerja dan fleksibilitas gambar. Komitmen Canon terhadap keunggulan imaging adalah jiwa dari EOS 5D Mark IV.'),
('5DS', 'CANON', 'DSLR', '5DS.jpg', 10, 45000000, 'Canon EOS 5DS R Body – Dengan teknologi baru dan sejumlah upgrade signifikan, Canon EOS 5DS R Body ini dikenal sebagai DSLR yang patut diperhitungkan. Dengan sensor CMOS 50.6MP full-frame, kamera ini mampu menangkap gambar dengan resolusi sangat tinggi yang cocok untuk pencetakan berskala besar dan cropping yang ekstensif. Prosesor Dual DIGIC 6 Image menyediakan sarana untuk menangani kelimpahan informasi ini, yang memungkinkan kecepatan kinerja cepat dan kualitas gambar terbaik. Canon EOS 5DS Body ini juga memiliki kemampuan video canggih termasuk pengambilan HD 1080p pada 30 fps dan fungsi Time Lapse yang mengambil foto diam pada interval yang ditentukan dan menggabungkannya ke dalam film full HD.'),
('7D-II', 'CANON', 'DSLR', '7D-II.jpg', 9, 29000000, 'Canon EOS 7D Mark II EF-S18-135mm dilengkapi dengan sensor CMOS 20.2 megapiksel yang hebat, ISO 16,000, dan dioperasikan oleh prosesor pencitraan ganda DIGIC 6 untuk memastikan kualitas gambar yang sempurna dalam kondisi pemotretan dan situasi pencahayaan. Fungsi Piksel Ganda CMOS AF menghasilkan fokus yang halus dan akurat ketika merekam video, sehingga subjek tetap fokus bahkan pada suasana yang paling dinamis.'),
('800D', 'CANON', 'DSLR', '800D.jpg', 12, 11500000, 'Canon EOS 800D Kit EF-S 18-55mm IS STM – Canon EOS 800D Kit EF-S 18-55mm IS STM memiliki fokus AF tercepat di dunia dengan 0.03sec. Selama pengambilan gambar langsung dengan model DSLR EOS standar ini, anda akan dibantu dengan UI intuitif yang mudah digunakan untuk memandu Anda dalam mengambil gambar yang menarik secara estetis.\r\n<br>\r\nKamera DSLR Canon ini dilengkapi dengan DIGIC 7 image processor dan sensor APS-C dengan resolusi 24.2-megapixel yang digabungkan untuk menghasilkan gambar yang lebih akurat dan detail. Dengan sistem dual pixel CMOS AF, anda dapat mendapatkan fokus dengan cepat 0,03 detik selama dalam mode live view. Selain itu, ada fitur lainnya seperti desain panel LCD layar sentuh vari-angle, memungkinkan lebih banyak kebebasan saat memotret, sehingga lebih mudah memotret hampir semua hal dari self-portrait hingga film profesional full HD 50p / 60p.\r\n<br>\r\nKamera Canon EOS 800D Kit EF-S 18-55mm IS STM juga dibekali Fitur Wireless Wi-Fi/NFC dan Bluetooth yang memungkinkan koneksi konstan dengan smartphone untuk berbagi foto dan video dengan lebih mudah dan sebagi remote control.'),
('A6000', 'SONY', 'mirrorless', 'a6000.jpg', 17, 8700000, 'Sony A6000 Kit 16-50mm f/3.5-5.6 OSS Hitam merupakan sebuah kamera mirrorless dari Sony yang fleksibel dan canggih di kelasnya. Sony A6000 Kit 16-50mm ini memiliki fitur sensor 24.3MP APS-C Exmor APS HD CMOS, dan prosesor gambar BIONZ X layar untuk menghasilkan foto resolusi tinggi dan film Full HD dengan marked low-light quality dan sensitivitas ISO 25600. Sony A6000 Kit 16-50mm dilengkapi juga dengan LCD 3.0″ 921k-Dot Xtra Fine Tilting. Selain sifat pencitraan penting, prosesor gambar juga cocok untuk continuous shooting hingga 11 fps. Sistem Intelligent Fast Hybrid AF dari Sony A6000 Kit 16-50mm menggunakan metode phase & contrast-detection untut memperoleh fokus yang cepat dan akurat.'),
('A6400', 'SONY', 'mirrorless', 'A6400.jpg', 27, 12900000, 'Stabil, cepat, serbaguna, dan ringkas, Sony A6400 Kit 16-50mm f/3.5-5.6 OSS adalah kamera mirrorless format APS-C yang mengadopsi banyak fitur yang biasanya disediakan untuk jajaran full-frame mereka. Termasuk akuisisi fokus otomatis 0.02 detik, Real-time Eye AF dan kemampuan Real-time Tracking, pemotretan kecepatan tinggi hingga 11 fps dan pemotretan silent hingga 8 fps, keduanya dengan AF/AE tracking, BIONZ X image processing engine yang ditingkatkan, layar sentuh LCD 180° yang sepenuhnya dapat dimiringkan, perekaman film UHD 4K dengan pembacaan piksel penuh dan tidak ada penghilangan piksel, perekaman internal untuk video time-lapse, dan banyak lagi.'),
('A7', 'SONY', 'mirrorless', 'A7.jpg', 6, 15000000, 'Sony A7 Body Only adalah kamera mirrorless dari Sony (Body Only) dengan resolusi 24 Megapixel Sensor full-frame Exmor CMOS dan E-Mount body. Fitur lainnya adalah hybrid phase detection autofocus yang mengakselerasi auto focus saat memotret subjek yang bergerak di lingkungan dengan cahaya terang (seperti di outdoor contohnya).'),
('A7-II', 'SONY', 'mirrorless', 'A7-II.jpg', 9, 20900000, 'Sony A7 Mark II memiliki Resolusi Kamera 24.3 Megapixel dimana kualitas hasil foto nya setara dengan kamera DSLR seri Professional. Sony A7 Mark II merupakan Kamera Mirrorless Sony pertama yang menggunakan 5-axis stabilization. Fitur ini menstabilkan jenis lensa apapun yang dipasangkan ke kamera, sehingga Anda dapat mengunakan shutter speed yang lebih rendah saat memotret tanpa menghasilkan gambar yang buram karena tangan bergetar (hand shake) saat mengambil foto.<br>\r\nDalam Box Kamera Sony A7 Mark II Kit FE 85mm f/1.8 ini sudah include dengan Lensa FE 85mm F/1.8 dari Sony yang dapat menghemat pengeluaran uang anda untuk melengkapi gear anda.'),
('A7S', 'SONY', 'mirrorless', 'a7s.jpg', 7, 35000000, 'Sony A7S II Mirrorless Body Only merupakan Kamera Mirrorless Sony yang punya spesifikasi khusus untuk videografi karena kualitas video yang dihasilkan sangat bagus baik format Full HD ataupun 4K. Fitur video yang biasanya hanya tersedia di kamera video pro juga tersedia di Sony A7S II ini seperti S Log Gamma 3, Gamma Assist display, slow motion Full HD. Sony A7S II juga memiliki rentang ISO sangat tinggi  mencapai ISO 409.600 yang memungkinkan merekam video atau mengambil foto dalam keadaan yang sangat gelap.'),
('D5500', 'NIKON', 'DSLR', 'D5500.jpg', 19, 8800000, 'Nikon D5500 Kit AF-P 18-55mm VR adalah kamera DSLR dari Nikon yang di lengkapi dengan LCD Touchscreen yang berfungsi memudahkan Anda mengatur setting kamera. Nikon D5500 Kit Lensa AF-P 18-55mm VR memiliki Sensor 24.2 Megapixel dan prosesor gambar EXPEED 4 yang menyajikan hasil foto High-Resolution dan Video Full HD 1080p dengan fitur low-light sensitivity yang menyediakan ISO sampai dengan ISO 25600 dan kecepatan pengambilan gambar 5 fps.'),
('D7200', 'NIKON', 'DSLR', 'D7200.jpg', 22, 16500000, 'Untuk pertama kalinya dengan Nikon D7200 Kit AF-S 18-140mm f/3.5-5.6G ED VR dapat memberikan kualitas gambar yang menggembirakan, kemampuan low-light dan kecepatan DSLR Nikon tersedia dengan built-in Wi-Fi® dan Near Field Communication (NFC). Memperkenalkan D7200, bintang baru kamera DX-format Nikon line-up.'),
('D750', 'NIKON', 'DSLR', 'D750.jpg', 24, 24500000, 'Bagi Anda yang ingin menemukan inspirasi di mana saja, untuk mengambil foto maupun merekam video, yang menginginkan kamera DSLR dengan format full-frame, Nikon D750 adalah jawaban yang tepat untuk memenuhi kebutuhan fotografi Anda. Memiliki fitur-fitur yang hampir sama seperti Nikon D4S dan Nikon D810. Nikon D750 memiliki kualitas gambar yang mempesona, berkat perpaduan antara sensor kamera 24MP & prosesor Expeed 4, bisa juga merekam video secara sinematik. Desain kokoh, handling yang nyaman, memiliki LCD yang bisa dimiringkan dan built-in Wi-Fi.'),
('DSC-RX100', 'SONY', 'Pocket Cam', 'DSC-RX100.jpg', 13, 18000000, 'Sony DSC-RX100 VII memadukan kecepatan, jangkauan, dan portabilitas, menjadikan kamera ini dapat mengemas banyak keheningan dan fleksibilitas video. Kamera generasi ketujuh dalam seri RX100 ini merupakan yang kedua dengan fitur lensa 24-200mm-equivalent ZEISS Vario-Sonnar T* yang mengesankan, yang mencakup focal length sudut lebar hingga telefoto untuk fleksibilitas pemotretan yang lebih besar dalam berbagai kondisi. Memanfaatkan rentang yang diperluas dengan20.1MP 1″ Exmor RS CMOS sensor yang didesain ulang, bersama dengan BIONZ X image processor yang ditingkatkan, untuk kinerja pemotretan cepat, sensitivitas tinggi to ISO 12800, dan perekaman video UHD 4K. Desain sensor yang diperbarui adalah semua tentang kecepatan dan memungkinkan blackout-free continuous shooting hingga 20 fps untuk pelacakan subjek yang lebih mudah. ​​Single Burst Shooting juga memungkinkan pemotretan pada pengaturan extreme 90-fps untuk bekerja dengan subjek yang bergerak paling cepat. Desain sensor juga menyediakan 357-point hybrid AF system untuk kinerja fokus yang cepat dan akurat dan pelacakan subjek dalam mode stills dan video. Desain stacked dan front-end LSI juga berkontribusi pada operasi yang lebih cepat dan kualitas gambar yang ditingkatkan. Kinerja video juga tetap mengesankan dengan penggabungan S-Log3 dan pengaturan HLG gamma, dan High Frame Rate shooting memungkinkan Anda untuk merekam hingga 960 fps untuk slow-motion playback.\r\n<br>\r\nMempertahankan faktor bentuk ramping dan klasik dari RX100, VII masih memiliki perawakan yang dapat dikantongi meskipun lensa zoom diperluas. 2.36m-dot OLED electronic viewfinder pop-up adalah cara yang ramping untuk eye-level viewing atau, sebagai alternatif, 3.0″ 921.6k-dot LCD touchscreen dapat digunakan. LCD ini memiliki desain tilting atau dapat di miringkan untuk mendukung pekerjaan anda dari high dan low angle dan kemampuan sentuhnya memungkinkan penggunaan fungsi Touch Focus dan Touch Shutter .Kamera juga menggunakan konektivitas Bluetooth dan Wi-Fi untuk berbagi citra ke perangkat seluler yang ditautkan atau untuk menanamkan informasi lokasi dari smartphone Anda.'),
('DSC-WX350', 'SONY', 'Pocket Cam', 'DSC-WX350.jpg', 47, 3500000, 'Sony DSC WX350 Digital Camera Silver dengan desain ringkas yang cukup untuk masuk saku, Sony DSC WX350 Digital Camera Silver kaya akan fitur seperti sensor 20,1MP, lensa ZEISS dengan zoom optik 8x, auto fokus cepat, dan stabilisasi gambar Optical SteadyShot.\r\n<br>\r\nKamera ini dilengkapi dengan 2,7 inch, 230k-dot Clear Photo LCD monitor menyediakan ketajaman, natural color yang memudahkan untuk pemotretan, membaca menu, dan melihat foto, bahkan dalam sinar matahari. stabilisasi gambar Optical SteadyShot yang mampu untuk meredam guncangan pada kamera, bebas blur tembakan. Selain itu, manfaat dari Sweep Panorama menembak hingga 360 °, memungkinkan Anda untuk menangkap seluruh foto lanskap dalam satu tembakan.'),
('G7X', 'CANON', 'Pocket Cam', 'G7X.jpg', 17, 9500000, 'Canon PowerShot G7 X Mark III Black menawarkan multimedia fluency dalam desain yang ringkas dan ramping dengan dibedakan oleh desain sensor canggih dan kemampuan pencitraan yang fleksibel. 20.1MP 1″ CMOS sensor menggunakan desain stacked, yang berpasangan dengan DIGIC 8 image processor untuk mewujudkan kinerja pemfokusan yang cepat, full-resolution shooting up to 20 fps, dan UHD 4K30p video recording. Secara optik, G7 X Mark III memiliki lensa 4.2x zoom, yang mencakup 24-100mm equivalent focal length range untuk wide-angle to short-telephoto fields of view. maximum aperture range f/1.8-2.8 cocok bekerja dalam kondisi pencahayaan yang sulit seperti halnya Optical Image Stabilizer , yang mengkompensasi efek dari guncangan kamera. Desain ramping kamera ini juga dilengkapi dengan layar sentuh LCD 3.0″ 180° yang dapat dimiringkan dan memiliki Bluetooth dan Wi-Fi untuk terhubung secara wireless ke mobile device.'),
('Hero8', 'GoPro', 'Action Cam', 'Hero8.jpg', 66, 5500000, 'GoPro HERO8 merupakan kamera aksi generasi terbaru yang dirancang untuk menangkap rekaman yang halus dan stabil dari setiap petualangan terbaru Anda. HERO8 Black menghadirkan pembaruan HyperSmooth 2.0 stabilization untuk menghasilkan gerakan halus, seperti gimbal yang didukung di semua frame rates. Pembaruan tambahan termasuk desain fisik yang lebih ramping dengan basis tipe “folding finger” untuk pemasangan cepat, pintu baterai yang dirancang ulang untuk penggantian baterai yang lebih cepat, lensa dengan twice impact resistance seperti HERO7, Battery Mod opsional untuk masa pakai baterai yang hampir 2.5x lebih banyak , dan Media Mod opsional untuk memperluas kemungkinan aksesoris Anda.'),
('M6', 'CANON', 'mirrorless', 'M6.jpg', 16, 15000000, 'Canon EOS M6 II Kit EF-M 15-45mm f/3.5-6.3 IS STM Black memadukan resolusi tinggi dengan kemampuan foto dan video yang tepat, kamera mirrorless ini memiliki body yang ramping dengan berbagai fitur yang sesuai dengan aplikasi multimedia. 32.5MP CMOS sensor berukuran APS-C mencapai kejernihan gambar, resolusi, dan jangkauan dinamis yang ditingkatkan, bersama dengan sensitivity mahir terhadap ISO 25600 dan noise rendah agar sesuai bekerja di berbagai situasi. Dikombinasikan dengan advanced image processing, sensor ini juga mampu menghasilkan video UHD 4K30p dan Full HD 120p, serta mendukung continuous stills shooting rates dengan AF dan AE tracking. Dual Pixel CMOS AF menyediakan 5481 titik yang dapat dipilih untuk pemfokusan yang tepat, halus, dan cepat untuk foto dan video, dan dukungan untuk Eye AF Servo memprioritaskan mata subyek ketika memotret portrait. Melengkapi kemampuan pencitraan, EOS M6 Mark II menggabungkan LCD layar sentuh 3,0″ 1,04m-dot, yang memiliki desain bisa dimiringkan (tilting) 180 ° untuk bidikan menghadap ke depan. EVF-DC2 electronic viewfinder tambahan juga disertakan, yang dipasang melalui kamera hot shoe, untuk memberikan clear eye-level viewing. Selain itu, Wi-Fi dan konektivitas Bluetooth internal memungkinkan Anda memasangkan perangkat seluler dengan kamera untuk mentransfer file secara nirkabel untuk berbagi foto dan movies Anda secara online.'),
('Max360', 'GoPro', 'Action Cam', 'Max360.jpg', 51, 8800000, 'GoPro MAX 360 Action Camera akan mempermudah anda dalam mengambil foto dan video panorama tanpa benar-benar menggeser kamera. Menggunakan lensa sisi yang berlawanan, MAX dapat menangkap semua yang terjadi dalam tampilan 360 ° hingga video beresolusi 4992 x 2496 dan foto 5760 x 2880. Baik foto dan video secara otomatis akan di stitched dan di jahit dalam kamera untuk fleksibilitas pengeditan dan berbagi dengan mudah. Itu juga dapat menggunakan hanya satu lensa untuk menangkap traditional GoPro HERO-style wide-angle action footage saat dibutuhkan.<br>\r\nMAX mendukung beberapa mode untuk video dan foto kreatif, seperti mode PowerPano yang dapat mengambil still photo 270 ° tanpa distorsi. Mode TimeWarp memungkinkan Anda untuk merekam dalam mode HERO standar dengan fungsi kecepatan variabel; Anda dapat memperlambat lalu mempercepat rekaman Anda secara real time dengan satu ketukan. MAX mendukung format video HEVC yang merekam file yang sangat kecil dengan tetap menjaga kualitas gambar, menghemat ruang berharga pada SD card Anda.'),
('RX0-II', 'SONY', 'Action Cam', 'RX0-II.jpg', 48, 10000000, 'Sony RX0 II Digital Camera merupakan kamera premium, ultra-compact, dan tangguh dengan set fitur luar biasa untuk stills dan video. Faktor bentuk ini membuatnya ideal untuk travel dan kehidupan sehari-hari sementara15.3MP 1″ Exmor RS stacked CMOS sensor dan BIONZ X image processor memastikan gambar Anda memiliki kualitas tertinggi. Selain itu, model ini menawarkan perekaman video UHD 4K30 internal, electronic image stabilization untuk movies, dan LCD 1.5″ 230k-dot 180° yang dapat memiringkan dengan sempurna untuk selfie dan vlogging. Selain itu, RX0 II dapat menangani kondisi buruk dengan mudah, tahan air hingga 10 meter, tahan debu, tahan benturan hingga 200 kg, dan tahan guncangan hingga 2 meter.<br>\r\nKualitas gambar adalah yang paling penting, dengan sensor tipe 1″ Exmor RS Stacked CMOS Sensor yang relatif besar dan chip DRAM khusus yang secara dramatis mempercepat pemrosesan dan kinerja. Digabungkan ke dalam sistem prosesor BIONZ X memungkinkan kinerja cahaya rendah yang luar biasa dengan sensitivitas hingga ISO 12800 serta continuous shooting pada 16 fps dan dukungan untuk Eye AF dalam mode tertentu. Pembacaan sensor cepat juga meningkatkan rolling shutter dan kecepatan hingga 1/32000 detik. Manfaat sistem pencitraan ini adalah lensa ZEISS Tessar T* 24mm equivalent f/4 yang memastikan minimal distortion, ketajaman luar biasa, dan jarak fokus minimum hanya 20 cm.'),
('Z7', 'NIKON', 'mirrorless', 'Z7.jpg', 11, 65500000, 'Nikon telah mengambil langkah berikutnya dalam perjalanan pencitraan mereka dengan Kamera Mirrorless Nikon Z7 Kit Z 24-70mm F4 S, dijuluki “The Perfectionist,” dan Sistem Z revolusioner. Kamera format FX beresolusi tinggi ini memperkenalkan Z Mount, desain berdiameter besar dengan jarak flensasi 16mm yang pendek, memungkinkan Nikon membuat kamera yang ringkas namun kuat dan mengembangkan optik yang lebih maju. Nikon Z7 adalah yang pertama dalam seri ini, dan menghadirkan sensor BSI CMOS 45.7MP dan EXPEED 6 Image Processing Engine, memberikan kualitas gambar dan kecepatan luar biasa dengan rentang sensitivitas asli ISO 64-25600.<br>\r\nTermasuk dengan bodi kamera adalah lensa zoom standar NIKKOR Z 24-70mm f/4 S, yang mencakup wide angle hingga portrait dan fitur aperture maksimum f/4 konstan. Desain optik menggabungkan satu elemen asferis serta elemen dispersi ekstra-rendah yang unik. Keduanya membantu mengurangi berbagai penyimpangan dan distorsi untuk ketajaman tinggi dan rendering warna yang akurat. Lapisan Nano Crystal juga digunakan untuk mengontrol flare dan ghosting untuk meningkatkan kontras dalam kondisi pencahayaan yang kuat. Cocok untuk aplikasi foto dan video, motor AF stepping juga ditampilkan untuk kinerja fokus otomatis yang halus dan senyap.');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama`, `alamat`, `kecamatan`, `kota`, `kode_pos`) VALUES
('sA4MCZIbYNGjzlBpiDWo', 'Andreas', 'Jl Kartini Raya', 'Semarang Timur', 'Semarang', '50125'),
('X1ykOx68IgPKiUhjQweC', 'andre', 'Jl Nebeng Sejalan', 'Ngaliyan', 'Semarang', '50127'),
('XfokMjr7HyJqdSTOVWnB', 'andreas', 'Jl Kuda Kembar', 'Semarang Timur', 'Semarang', '50125');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`) VALUES
(1, 'Andreas Yulianto', 'andre', 'andreasyulianto3@gmail.com', '$2y$10$/MJ3YHS.5OPhX91w81iWbu.REOBg3frgIz9lWuH6JaFwmk33WmwEu', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`no_nota`),
  ADD KEY `kode_cam` (`kode_cam`);

--
-- Indexes for table `kamera`
--
ALTER TABLE `kamera`
  ADD PRIMARY KEY (`kode_cam`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
