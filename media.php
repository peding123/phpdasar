<?php
session_start();

include "function/config.php";

if (!isset($_SESSION['username'])) {
    echo "<center>Untuk mengakses modul, anda harus login <br>";
    echo "<a href = login.php><b>LOGIN</b></a></center>";
    exit;
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/media.css">
</head>

<body>
    <div class="">
        <div class="wrapper">
            <div class="row m-0">
                <div class="col-md-3 bg-dark text-light shadow">
                    <ul class="nav text-light flex-column my-3">
                        <li class=" nav-item">
                            <a class="nav-link" style="padding: 20px 15px; font-size: 1.3em; border-radius: 10px;" href="?module=home">Home</a>
                        </li>
                        <?php include "menu.php"; ?>
                        <li class="nav-item">
                            <a class="nav-link" style="padding: 20px 15px; font-size: 1.3em; border-radius: 10px;" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 bg-light">
                    <div class="m-4">
                        <div id="header" class="mt-3">
                        </div>
                        <div id="content">
                            <?php include "content.php"; ?>
                        </div>
                        <div id="footer">
                            Copyright &copy; 2023
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>