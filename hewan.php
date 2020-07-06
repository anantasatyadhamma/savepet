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
}
