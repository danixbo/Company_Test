<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/tempatCSS/customCSS/kontak.css">
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
        <div class="btn-logreg">
            <button class="logreg" onclick="location.href='login';">LOGIN</button>
            <button class="logreg" onclick="location.href='register';">REGISTER</button>
        </div>
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

    <div class="kontak">
        <!-- <div class="move-kontak"> -->
            <div class="address-kontak">
                <div class="mail">
                    <div class="isian icons">
                        <strong>Email</strong>
                        <p>u6I5h@example.com</p>
                    </div>
                    <div class="icons">
                        <i class="bi bi-envelope-at"></i>
                    </div>
                </div>
                <div class="mail">
                    <div class="isian icons">
                        <strong>Email</strong>
                        <p>u6I5h@example.com</p>
                    </div>
                    <div class="icons">
                        <i class="bi bi-envelope-at"></i>
                    </div>
                </div>
                <div class="mail">
                    <div class="isian icons">
                        <strong>Email</strong>
                        <p>u6I5h@example.com</p>
                    </div>
                    <div class="icons">
                        <i class="bi bi-envelope-at"></i>
                    </div>
                </div>
                <div class="mail">
                    <div class="isian icons">
                        <strong>Email</strong>
                        <p>u6I5h@example.com</p>
                    </div>
                    <div class="icons">
                        <i class="bi bi-envelope-at"></i>
                    </div>
                </div>
                <div class="mail">
                    <div class="isian icons">
                        <strong>Email</strong>
                        <p>u6I5h@example.com</p>
                    </div>
                    <div class="icons">
                        <i class="bi bi-envelope-at"></i>
                    </div>
                </div>
            </div>
            <div class="kotak-kontak">
                <input type="text" placeholder="Nama">
                <input type="email" placeholder="Alamat Email">
                <input type="text" placeholder="Subject">
                <textarea name="" id="" placeholder="Pesan"></textarea>
                <button type="submit">Kirim</button>
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
</body>
</html>