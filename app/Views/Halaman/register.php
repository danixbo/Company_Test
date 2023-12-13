<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="tempatCSS/customCSS/register.css">
    <link rel="stylesheet" href="/tempatCSS/bootstrap/bootstrap.rtl.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
    <div class="container-aaa">
        <div class="sisi-kiri">
            <div class="kotak">
                    <div class="logo"><p><p class="logo-1">R</p><p class="logo-2">U</p><p class="logo-3">P</p><p class="logo-4">A</p><p class="logo-5">N</p></p></div>
                    <div class="welcome"><strong>Masuk</strong><br><p>Akses untuk masuk kehalaman Beranda dengan alamat email dan kata sandi</p></div>
                <form method="post" action="<?= base_url('register/prosesRegister') ?>">
                    <?php if(session()->getFlashdata('pesan')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?php
                            $errorData = session()->getFlashdata('error');
                            // Check if it's an array, if not, convert it to an array
                            $errorArray = is_array($errorData) ? $errorData : [$errorData];
                            echo implode('<br>', $errorArray);
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="●●●●●●●●" required>
                        <p id="helper-text-explanation" class="mb-3 text-sm text-gray-500 dark:text-gray-400">Password Minimal 8 Karakter.</p>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="username" name="nama" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="mySelect" class="pilihan">
                            <option value="Member">Member</option>
                        </select>
                    </div>
                    <div class="submit"><button onclick="location.href='<?= base_url('/beranda') ?>'" style="background: #AC0940;">Beranda</button><button type="submit" name="masuk" onclick="return validateForm();">Regiter</button></div>
                    <div class="register"><a href="<?= base_url('login') ?>"><p style="margin-left:auto;">Sudah Punya Akun?</p> <p style="color: #48D1CC; margin-right:auto;">Login</p></a></div>
                </form>
            </div>
        </div>
        <div class="sisi-kanan">
            <div class="quotes">
                <p id="quoteText">
                Apapun bentuk kekalahanmu, jangan pernah menyerah <br>
                sebab, yang gagal belum tentu kalah. sedangkan yang <br>
                menyerah sudah pasti kalah
                </p>
                <br>
                <p>
                    ~ Murashi
                </p>
            </div>
            <img src="https://images.unsplash.com/photo-1519643225200-94e79e383724?q=80&w=2076&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tentukan nilai yang ingin Anda atur
        var nilaiYangInginAndaAtur = "Member";

        // Temukan elemen select
        var selectElement = document.getElementById('mySelect');

        // Loop melalui opsi dan pilih yang sesuai dengan nilai yang ingin Anda atur
        for (var i = 0; i < selectElement.options.length; i++) {
        if (selectElement.options[i].value === nilaiYangInginAndaAtur) {
            selectElement.selectedIndex = i;
            break;
        }
        }
    });
</script>
</body>
</html>