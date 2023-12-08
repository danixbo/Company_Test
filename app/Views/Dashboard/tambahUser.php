<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/tempatCSS/bootstrap/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="/custom-css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-lg bg-dark mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container">
        <form method="post" action="<?= base_url('dashboard/user/tambah') ?>">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-select" name="level" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="Member">Member</option>
                    <option value="Writer">Writter</option>
                    <option value="Admin">Admin</option>
                </select>
                <!-- <input type="text" class="form-control" id="level" name="level"> -->
            </div>
            <div class="d-flex mt-4">
                <button type="submit" class="btn btn-success ms-3">Tambah User</button>
                <a href="<?= base_url('dashboard/user') ?>" class="btn btn-primary">Kembali</a>
            </div>

        </form>
    </div>

    <script src="/tempatJS/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="/custom-js.js"></script>
</body>

</html>