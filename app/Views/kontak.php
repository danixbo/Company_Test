<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="kontak.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        if (session()->getFlashdata("notif")) :
        ?>
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    An example warning alert with an icon
                </div>
            </div>
            <?= session()->getFlashdata('notif')?>
            <button type="button" class="btn btn-danger">Danger</button>

        <?php
        endif;
        ?>
        <div class="kotak">
            <form action="" method="post">
                <div class="judul">
                    <p>Kontak Kami</p>
                </div>
                <div class="Nama"><label for="nama">Masukkan Nama</label><input type="text" placeholder="Masukkan Nama Lengkap" name="nama"></div>
                <div class="Email"><label for="email">Masukkan Email</label><input type="email" placeholder="Masukkan Email" name="email"></div>
                <div class="Subject"><label for="subjek">Masukkan Subject</label><input type="text" placeholder="Subject" name="subjek"></div>
                <div class="Message"><label for="pesan">Masukkan Pesan</label><textarea name="pesan" id="" cols="30" rows="5"></textarea></div>
                <div class="kirim"><button type="submit">Masuk!!</button></div>
            </form>
        </div>
    </div>
</body>

</html>