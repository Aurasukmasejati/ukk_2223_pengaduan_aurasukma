<?php
session_start();
if (empty ($_SESSION['login']== 'masyarakat')){
    header("location:../index.php");
}
include '../layouts/header.php';

if (isset($_GET['page'])) {
    $page= $_GET['page'];

switch ($page) {
    case 'tanggapan':
        include 'tanggapan.php';
        break;
        default:
        echo "halaman tidak tersedia";
        break;
  }
} else{
    include 'masyarakat.php';
}


include '../layouts/footer.php';
    
    
?>