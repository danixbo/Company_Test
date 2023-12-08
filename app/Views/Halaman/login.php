<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="tempatCSS/customCSS/login.css">
</head>
<body>
    <div class="container-aaa">
        <div class="sisi-kiri">
            <div class="kotak">
                    <div class="logo"><p><p class="logo-1">R</p><p class="logo-2">U</p><p class="logo-3">P</p><p class="logo-4">A</p><p class="logo-5">N</p></p></div>
                    <div class="welcome"><strong>Masuk</strong><br><p>Akses untuk masuk kehalaman Beranda dengan alamat email dan kata sandi</p></div>
                <form method="POST" action="<?=base_url('/login/processLogin');?>">
                    <?php if (session()->getFlashdata('error')) { ?>
                        <div class="alert alert-danger">
                            <?php echo session()->getFlashdata('error') ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="submit"><button type="submit" name="masuk">Masuk</button></div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>