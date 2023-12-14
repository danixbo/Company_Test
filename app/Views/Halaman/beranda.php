<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/tempatCSS/customCSS/beranda.css">
</head>
<body>
<div class="header-tengah">
    <header id="header">
        <h1 class="logo">LOGO</h1>
        <nav class="navbar">
            <a href="/">Beranda</a>
            <a href="#itungan">Layanan</a>
            <a href="#footer-profile">Berita</a>
            <a href="/kontak">Kontak</a>
        </nav>
        <!-- tombol login register -->
        <?php if (!session()->has('user_id')): ?>
            <div class="btn-logreg">
                <button class="logreg" onclick="location.href='login';">LOGIN</button>
                <button class="logreg" onclick="location.href='register';">REGISTER</button>
            </div>
        <?php else: ?>
            <!-- Dropdown menu -->
            <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="transition ease-in-out delay-30 text-black bg-gray-400 hover:text-white hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Menu <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <div id="dropdownInformation" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                <div><?= session('nama_lengkap') ?></div>
                <div class="font-medium truncate">@<?= session('username') ?></div>
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                <li>
                    <!-- harus diubah ke dashboard -->
                    <a href="<?= base_url('dashboard/kontak') ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard/profile') ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                </li>
                </ul>
                <div class="py-2">
                    <a href="<?= base_url('/logout') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                </div>
            </div>

        <?php endif; ?>


        <div class="toggle-btn">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="dropdown-menu">
            <a href="index.html#intro">Beranda</a>
            <a href="#itungan">Layanan</a>
            <a href="#footer-profile">Berita</a>
            <a href="#">Kontak</a>
            <a href="login">Login</a> 
            <a href="register">Register</a> 
        </div>
    </header>
</div>

    <div class="container">
        <div class="intro">
            <div class="judul-intro">
                <p class="judul1">Wujudkan Rumah Impianmu <br> <p class="judul2">Bersama Layanan Unggulan Kami</p> </p>
            </div>
            <div class="deskripsi-intro">
                <p>Di "Bawah Langit Senja," kami hadir dengan layanan terbaik untuk mewujudkan rumah <br>
                impianmu. Setiap detail dirancang dengan teliti untuk menciptakan ruang yang indah<br> 
                dan nyaman bagi Anda dan keluarga. Dengan kami, bukan sekadar rumah yang <br> 
                dibangun, tetapi kenangan abadi yang tersimpan di setiap sudut.</p>
            </div>
            <div class="btn-intro">
                <button type="submit">PRODUCT KAMI</button>
            </div>
        </div>
        <div class="gambar">
            <img src="gambar/haha1.jpg" alt="">
        </div>
    </div>

    <div class="mempercayai-kami section">
        <div class="kotak">
            <div class="kotak-1 reveal fade-left">
                <p class="kotak-judul">Layanan Kami</p>
                <p class="kotak-deskripsi">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="kotak-1 reveal fade-top">
                <p class="kotak-judul">Kemanan & Privacy</p>
                <p class="kotak-deskripsi">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="kotak-1 reveal fade-bottom">
                <p class="kotak-judul">Ribuan Pengguna</p>
                <p class="kotak-deskripsi">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="kotak-1 reveal fade-right">
                <p class="kotak-judul">Tercepat</p>
                <p class="kotak-deskripsi">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>


    <div class="berita">
        <h2>Berita harian Anda tentang rumah impian</h2>
        <div class="berita-isi">
            <div class="berita-kiri reveal fade-left">
                <img src="gambar/berita-1.jpg" alt="">
                <p class="judul-berita">Gemilang di Pesisir: Rumah Modern Bersentuhan dengan Keindahan Laut</p>
                <p class="deskripsi-berita-panjang">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nemo esse nisi porro dolore eveniet tempora consequuntur delectus, repellendus itaque minus rem? Cum iure optio assumenda vel mollitia dolores eaque.</p>
                <p class="deskripsi-berita">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nemo esse nisi porro dolore eveniet tempora consequuntur delectus, repellendus itaque minus rem? Cum iure optio assumenda vel mollitia dolores eaque.</p>
            </div>
            <div class="berita-kanan">
                <div class="bagian-1 reveal fade-right">
                    <img src="gambar/berita-2.jpg" alt="">
                    <div class="deskripsi-bagian">
                        <p class="judul-bagian">Keistimewaan Terpencil: Rumah Mewah Nan Eksklusif</p>
                        <p class="deskripsi-berita-panjang">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nemo esse nisi porro dolore eveniet tempora consequuntur delectus, repellendus itaque minus rem? Cum iure optio assumenda vel mollitia dolores eaque.</p>
                        <p class="deskripsi-berita">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="bagian-2 reveal fade-right-delay-1">
                    <img src="gambar/berita-3.jpg" alt="">
                    <div class="deskripsi-bagian">
                        <p class="judul-bagian">Eksklusivitas di Pedalaman: Rumah Modern Megah</p>
                        <p class="deskripsi-berita-panjang">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nemo esse nisi porro dolore eveniet tempora consequuntur delectus, repellendus itaque minus rem? Cum iure optio assumenda vel mollitia dolores eaque.</p>
                        <p class="deskripsi-berita">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="bagian-2 reveal fade-right-delay-2">
                    <img src="gambar/berita-2.jpg" alt="">
                    <div class="deskripsi-bagian">
                        <p class="judul-bagian">Keanggunan Tersembunyi: Rumah Mewah di Pelosok</p>
                        <p class="deskripsi-berita-panjang">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nemo esse nisi porro dolore eveniet tempora consequuntur delectus, repellendus itaque minus rem? Cum iure optio assumenda vel mollitia dolores eaque.</p>
                        <p class="deskripsi-berita">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="bagian-2 reveal fade-right-delay-3">
                    <img src="gambar/berita-1.jpg" alt="">
                    <div class="deskripsi-bagian">
                        <p class="judul-bagian">Ketenangan Terpencil: Rumah Modern yang Megah</p>
                        <p class="deskripsi-berita-panjang">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nemo esse nisi porro dolore eveniet tempora consequuntur delectus, repellendus itaque minus rem? Cum iure optio assumenda vel mollitia dolores eaque.</p>
                        <p class="deskripsi-berita">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="footer-profile">
        <h2 style="margin-bottom: 20px; font-size:20px; font-weight: 600;">DaniXD Developer</h2>
        <p style="margin-bottom: 40px;">
            Lorem ipsum dolor sit amet consectetur adipisicing <br>
            elit. Nihil harum eum obcaecati temporibus exercitationem <br>
            eius enim qui, nisi eaque sed blanditiis asperiores  <br>
            maiores tempore totam nulla rem ea! Voluptas, non. <br>
        </p>
        <i class="fa-brands fa-youtube"></i>
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-x-twitter"></i>
        <i class="fa-brands fa-instagram fa-gradient"></i>
    </div>
    <footer>
        <div class="kocak">
            <p>Copyright &copy;2023 </p><a href="#">DaniXD</a>
        </div>
    </footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="/TempatJS/customJs/script.js"></script>
</body>
</html>