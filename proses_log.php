<?php
session_start();
$q = $_GET['q'];
date_default_timezone_set('Asia/Jakarta');
$cdate = date("y-m-d H:i:s");

require "./hewan.php";
$log = new LogAktivitas();
$qry_idlog = $log->idLog();
$fch_idlog = $qry_idlog->fetch(PDO::FETCH_OBJ);
$idlog_fch = $fch_idlog->id;
$idlog = $idlog_fch + 1;

if ($q == "in") {
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $sign_in = new User();
  $hasil = $sign_in->cekAdmin($user, $pass);
  $cek = $hasil->fetchColumn();
  if ($cek == 1) {
    $login = $sign_in->fetchAdmin($user, $pass);
    $adm = $login->fetch(PDO::FETCH_OBJ);
    session_start();
    $_SESSION['user'] = $user;
    $_SESSION['id'] = $adm->id;
    $_SESSION['nama'] = $adm->nama;
    $keterangan = "login admin $_SESSION[nama]";
    $input_log = $log->tambah($idlog, $keterangan, $cdate);
    header("location: dashboard.php");
  } else if ($cek !== 1) {
    header("location: login.php");
    $_SESSION['pesan'] = 'eror';
  }
} else if ($q == "out") {
  unset($_SESSION['user']);
  $keterangan = "Logout admin $_SESSION[nama]";
  session_destroy();
  $input_log = $log->tambah($idlog, $keterangan, $cdate);
  header("location: index.php");
}
