<?php

include "function/config.php";

if ($_SESSION['leveluser'] == 'admin') {
    $sql = mysqli_query($conn, "SELECT * FROM modul WHERE aktif='Y' ORDER BY urutan");
} else {
    $sql = mysqli_query($conn, "SELECT * FROM modul WHERE status='User' AND aktif='Y' ORDER BY urutan");
}
while ($m = mysqli_fetch_array($sql)) {
    echo "<li><a class='nav-link' style='padding: 20px 15px; font-size: 1.3em; border-radius: 10px; margin: 10px 0px;' href='$m[link]'> $m[nama_modul]</a></li>";
}
