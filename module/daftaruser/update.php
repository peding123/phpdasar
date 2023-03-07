<?php

include "connect.php";

if (!isset($_GET['username'])) {
    header('Location: index.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE username=$username";
$query = mysqli_query($conn, $sql);
$users = mysqli_fetch_assoc($query);

if (isset($_POST["update"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $namalengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $notelp = $_POST['no_telp'];
    $level = $_POST['level'];
    $blokir = $_POST['blokir'];

    $sql = "UPDATE users SET password='$password', nama_lengkap='$namalengkap', email='$email', no_telp='$notelp', level='$level', blokir='$blokir' WHERE username=$username";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: index.php');
    } else {
        // kalau gagal tampilkan pesan
        echo mysqli_error($conn);
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Data Karyawan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container my-5">
        <form action="" method="post">
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" value="<?= $users["username"]; ?>">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="nama" value="<?= $users["password"]; ?>">
            </div>
            <div class="mb-3">
                <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" value="<?= $users["nama_lengkap"]; ?>">
            </div>
            <div class="mb-3">
                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" value="<?= $users["email"]; ?>">
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $users["no_telp"]; ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $users["level"]; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenisKelamin" id="laki-laki" value="Y" <?php if ($users['blokir'] == 'Y') echo 'checked' ?>>
                    <label class="form-check-label" for="laki-laki">
                        Laki - Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenisKelamin" id="perempuan" value="Y" <?php if ($users['blokir'] == 'N') echo 'checked' ?>>
                    <label class="form-check-label" for="perempuan">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="right text-end">
                <a class="btn btn-secondary" href="index.php">Kembali</a>
                <button class="btn btn-primary" type="submit" name="update">Update</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>