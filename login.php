<?php
session_start();

require_once("database.php");
require_once("user.php");

$username = $_POST["Input_Username"];
$password = $_POST["Input_Password"];

//$password_valid = "12345678";
//$username_valid = "reva";

$db = new Database();
$conn = $db->koneksi();
$user = new User($conn);

$ditemukan = $user->login($username,$password);
if($ditemukan == false){
    $_SESSION['pesan_kesalahan'] = "Login Gagal";
    header("Location: index.php");
    exit;
}else{
    $_SESSION['is_logged_in'] = true;
    header("Location: dashboard/index.php");
    exit;
}

if($password == $username &&
    $username == $username_valid)

echo "Selamat Datang" . $username ;
echo "<br />" ;
echo "Password anda" . $password ;



