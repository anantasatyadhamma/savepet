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

if ($q == "del") {
  $log = new LogAktivitas();
  $hapus = $log->hapus($id);
  if ($hapus == "Berhasil") {
    header('location: log-activity.php');
    $_SESSION['pesan'] = 'sukses';
  } else {
    header('location: log-activity.php');
    $_SESSION['pesan'] = 'eror';
  }
} else if ($q == "del_hewan") {
  $hewan = new Hewan();
  $hapus = $hewan->hapus($id, $cdate);

  if ($hapus == "Berhasil") {
    $keterangan = "Menghapus data hewan dengan id $id";
    $input_log = $log->tambah($idlog, $keterangan, $cdate);
    header('location: dashboard.php');
    $_SESSION['pesan'] = 'sukses';
  } else {
    header('location: dashboard.php');
    $_SESSION['pesan'] = 'eror';
  }
}
