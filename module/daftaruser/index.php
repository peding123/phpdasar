<?php

include "./function/config.php";

$row = mysqli_query($conn, "SELECT * FROM users");


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <h1 class="">Daftar User</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Email</th>
                <th scope="col">No. Telp</th>
                <th scope="col">Level</th>
                <th scope="col">Blokir</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($result = mysqli_fetch_array($row)) : ?>
                <tr>
                    <th scope="col"><?= $result["username"] ?></th>
                    <td><?= $result["password"] ?></td>
                    <td><?= $result["nama_lengkap"] ?></td>
                    <td><?= $result["email"] ?></td>
                    <td><?= $result["no_telp"] ?></td>
                    <td><?= $result["level"] ?></td>
                    <td><?= $result["blokir"] ?></td>
                    <td><a class="btn btn-primary" href="media.php?module=daftaruser/update.php?username=<?= $result["username"] ?>">Edit</a> <a class="btn btn-danger" href="delete.php?username=<?= $result["username"] ?>" onclick="return confirm('Hapus?');">Hapus</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>