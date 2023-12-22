<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/tempatCSS/customCSS/kontak.css">
</head>
<body>
<div class="header-tengah">
    <header id="header">
        <h1 class="logo">LOGO</h1>
        <nav class="navbar">
            <a href="/beranda">Beranda</a>
            <a href="/produk">Produk</a>
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
            <a href="/beranda">Beranda</a>
            <a href="/produk">Produk</a>
            <a href="/kontak">Kontak</a>
        <?php if (!session()->has('user_id')): ?>
            <a href="/login">Login</a> 
            <a href="/register">Register</a>
        <?php else: ?>
            <a href="<?= base_url('dashboard/kontak') ?>">Dashboard</a>
            <a href="<?= base_url('dashboard/profile') ?>">Settings</a>
            <a href="<?= base_url('/logout') ?>">Sign Out</a>
        <?php endif; ?>
        
        </div>
    </header>
</div>

    <div class="kontak">
        <!-- <div class="move-kontak"> -->
            <div class="address-kontak">
                <div class="mail">
                    <a href="#" class="isian">
                        <div class="hehe">
                            <strong>Email</strong>
                            <p>u6I5h@example.com</p>
                        </div>
                        <div>
                            <i class="bi bi-envelope-at"></i>
                        </div>
                    </a>
                </div>
                <div class="mail">
                    <a href="#" class="isian">
                        <div class="hehe">
                            <strong>Facebook</strong>
                            <p>u6I5h@example.com</p>
                        </div>
                        <div>
                            <i class="bi bi-facebook"></i>
                        </div>
                    </a>
                </div>
                <div class="mail">
                    <a href="#" class="isian">
                        <div class="hehe">
                            <strong>Twitter</strong>
                            <p>u6I5h@example.com</p>
                        </div>
                        <div>
                            <i class="bi bi-twitter-x"></i>
                        </div>
                    </a>
                </div>
                <div class="mail">
                    <a href="#" class="isian">
                        <div class="hehe">
                            <strong>Instagram</strong>
                            <p>u6I5h@example.com</p>
                        </div>
                        <div>
                            <i class="bi bi-instagram"></i>
                        </div>
                    </a>
                </div>
                <div class="mail">
                    <a href="#" class="isian">
                        <div class="hehe">
                            <strong>Linkedin</strong>
                            <p>u6I5h@example.com</p>
                        </div>
                        <div>
                            <i class="bi bi-linkedin"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="kotak-kontak">
                <form method="post" action="<?= base_url('kontak/tambah') ?>">
                    <input type="text" placeholder="Nama" id="nama" name="nama">
                    <input type="email" placeholder="Alamat Email" id="email" name="email">
                    <input type="text" placeholder="Subject" id="subject" name="subject">
                    <textarea placeholder="Pesan" id="pesan" name="pesan" ></textarea>
                    <button type="submit">Kirim</button>
                    <?php if(session()->getFlashdata('pesan')): ?>
                        <div class="alert alert-success mt-4" role="alert">
                            <?= session()->getFlashdata('pesan') ?>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        <!-- </div> -->
    </div>


<script>
    // untuk menu
    const toggleBtn = document.querySelector(".toggle-btn");
    const toggleBtnIcon = document.querySelector(".toggle-btn i");
    const dropdownMenu = document.querySelector(".dropdown-menu");

    toggleBtn.onclick = function () {
    dropdownMenu.classList.toggle("open");
    const isOpen = dropdownMenu.classList.contains("open");

    toggleBtnIcon.classList = isOpen ? "fa-solid fa-xmark" : "fa-solid fa-bars";
    };
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>