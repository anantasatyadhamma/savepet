<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "savepet";

try {
  $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Koneksigagal: " . $e->getMessage();
}
session_status() == PHP_SESSION_NONE ? session_start() : "";

if (isset($_GET['login'])) {
  $username = isset($_POST['username']) ? $_POST['username'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  $query = $db->prepare("select username, password from user where username=?");
  $query->execute(array($username));
  if ($query->rowCount()) {

    $data = $query->fetchObject();

    if (password_verify($password, $data->password)) {

      $user_id = $_SESSION['user_id'] = $data->id;
      exit("1");
    } else {
      exit("Password yang Anda Masukkan Tidak Valid");
    }
  } else {

    exit("Maaf, email Anda belum terdaftar di sistem kami");
  }
}

if (isset($_GET['sukses'])) {
  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = $db->prepare("select * from users where id=?");
    $query->execute(array($user_id));
    if ($query->rowCount()) {
      $data = $query->fetchObject();
      echo "Selamat datang " . $data->nama . ", ";
      echo "<a href='proses.php?keluar'>Keluar</a>";
    }
  } else {

    header("location: login.php");
  }
}

if (isset($_GET['keluar'])) {
  unset($_SESSION['user_id']);
  session_destroy();
  header("location: login.php");
}
