<?php
include "function/config.php";

if (isset($_POST["login"])) {
    function antiinjection($data)
    {
        global $conn;
        $filter_sql = mysqli_real_escape_string($conn, $data);
        $filter_sql = stripslashes(strip_tags(htmlspecialchars($filter_sql, ENT_QUOTES)));
        return $filter_sql;
    }

    $username = antiinjection($_POST["username"]);
    $password = antiinjection(md5($_POST["password"]));

    $proses = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND blokir = 'N'");
    $user = mysqli_num_rows($proses);
    $db = mysqli_fetch_array($proses);

    if ($user > 0) {
        session_start();
        $_SESSION['username'] = $db['username'];
        $_SESSION['namalengkap'] = $db['nama_lengkap'];
        $_SESSION['password'] = $db['password'];
        $_SESSION['leveluser'] = $db['level'];

        echo "<center>LOGIN BERHASIL <br></center>";
        header("Location: media.php?module=home");
    } else {
        $error = "Username atau Password salah";
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
    <style>
    </style>
</head>

<body>
    <form action="" method="post">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-5">Silahkan login untuk melanjutkan!</p>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" id="username" class="form-control form-control-lg" name="username" required />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" class="form-control form-control-lg" name="password" required />
                                    </div>
                                    <?php if (isset($error)) : ?>
                                        <p style="color: red; font-style: italic;"><?= $error; ?></p>
                                    <?php endif; ?>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>