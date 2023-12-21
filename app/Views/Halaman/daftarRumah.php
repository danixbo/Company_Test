<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/tempatCSS/customCSS/rumah.css">
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
            <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="transition ease-in-out delay-30 text-white bg-cyan-800 hover:bg-cyan-900 focus:ring-4 focus:outline-none focus:ring-cyan-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Menu <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
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
        <?php if (!session()->has('user_id')): ?>
            <a href="login">Login</a> 
            <a href="register">Register</a>
        <?php else: ?>
            <a href="<?= base_url('dashboard/kontak') ?>">Dashboard</a>
            <a href="<?= base_url('dashboard/profile') ?>">Settings</a>
            <a href="<?= base_url('/logout') ?>">Sign Out</a>
        <?php endif; ?>
        
        </div>
    </header>
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