<?php

class Hewan
{
  public function __construct()
  {
    try {
      $this->db = new PDO('mysql:host=localhost;dbname=savepet', 'root', '');
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\Throwable $e) {
      echo $e->getMessage();
    }
  }
  public function daftarHewan()
  {
    try {
      $sql = "SELECT * FROM hewan";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (\Throwable $e) {
      echo $e->getMessage();
    }
  }
  public function addImage()
  {
    $targetDir = getcwd() . DIRECTORY_SEPARATOR;
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $nama = $_POST['nama_lengkap_hewan'];
    $usia = $_POST['usia_hewan'];
    $jenis = $_POST['jenis_hewan'];
    try {
      $sql = "INSERT into hewan (gambar, tipe_gambar, nama_hewan, umur, jenis, created_date, modified_date) VALUES ('" . $fileName . "', '$fileType', '$nama', '$usia', '$jenis', NOW(), NOW())";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (\Throwable $e) {
      echo $e->getMessage();
    }
  }
}
