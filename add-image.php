<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
$cdate = date("y-m-d H:i:s");

require "hewan.php";
$log = new LogAktivitas();
$qry_idlog = $log->idLog();
$fch_idlog = $qry_idlog->fetch(PDO::FETCH_OBJ);
$idlog_fch = $fch_idlog->id;
$idlog = $idlog_fch + 1;


$hewan = new Hewan();
$qry_id = $hewan->desc_id();
$fch_id = $qry_id->fetch(PDO::FETCH_OBJ);
$id_fch = $fch_id->id;
$id = $id_fch + 1;

if (isset($_POST['submit'])) {

  $fileName = $_FILES["file"]["name"];
  $path = "upload/" . $fileName;
  $type_file = $_FILES['file']['type'];
  $tmp_file = $_FILES['file']['tmp_name'];


  $nama = $_POST['nama_lengkap_hewan'];
  $usia = $_POST['usia_hewan'];
  $jenis = $_POST['jenis_hewan'];
  $id = '';



  if (move_uploaded_file($tmp_file, $path)) {
    $update = $hewan->addImage($id, $nama, $usia, $jenis, $fileName, $type_file, $cdate, $cdate, '0000-00-00 00:00:00');
    if ($update == "Berhasil") {
      $keterangan = "Meng-upload data hewan";
      $input_log = $log->tambah($idlog, $keterangan, $cdate);
      header('location: dashboard.php');
      $_SESSION['pesan'] = 'sukses';
    } else {
      header('location: log-activity.php');
      $_SESSION['pesan'] = 'eror';
    }
  }
}
