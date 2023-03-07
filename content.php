<?php

include "function/config.php";

if ($_GET['module'] == 'home') {
    $username = $_SESSION['username'];
    $level = $_SESSION['leveluser'];
    echo "<h1>Selamat datang $username, anda login sebagai $level</h1>";
}
if ($_GET['module'] == 'daftaruser') {
    include "module/daftaruser/index.php";
}
