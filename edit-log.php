<?php
session_start();
$q = $_GET['q'];
$id = $_GET['id'];
date_default_timezone_set("Asia/Jakarta");
$cdate = date("y-m-d H:i:s");

require "./hewan.php";
$log = new LogAktivitas();
$qry_idlog = $log->idLog();
$fch_idlog = $qry_idlog->fetch(PDO::FETCH_OBJ);
$idlog_fch = $fch_idlog->id;
$idlog = $idlog_fch + 1;

if ($q == "tam_hewan") {
  $hewan = new Hewan();
  $tambah = $hewan->update1($id, $cdate);

  if ($tambah == "Berhasil") {
    $keterangan = "Menambah data hewan berhasil";
    $input_log = $log->tambah($idlog, $keterangan, $cdate);
    // header('location: add.php');
    $_SESSION['pesan'] = 'sukses';
  } else {
    header('location: dashboard.php');
    $_SESSION['pesan'] = 'eror';
  }
}
