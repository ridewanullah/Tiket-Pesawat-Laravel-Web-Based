<?php
    if ($_GET['module']=='home') {
        include "dashboard.php";
    }elseif($_GET['module']=='pesawat') {
        include "module\pesawat\pesawat.php";
    }elseif($_GET['module']=='jadwal') {
        include "module\jadwal\jadwal.php";
    }elseif($_GET['module']=='reservasi') {
        include "module\reservasi\reservasi.php";
    }else{
        echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
    }
?>