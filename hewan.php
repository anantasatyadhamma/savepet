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
      $sql = "SELECT * FROM hewan WHERE delete_flag = 1";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (\Throwable $e) {
      echo $e->getMessage();
    }
  }
  public function hapus($id_gambar, $ddate)
  {
    try {
      $sql = "UPDATE hewan set delete_flag = '0', delete_date = '$ddate' where id_gambar = '$id_gambar'";
      $qry = $this->db->query($sql);

      if ($qry) {
        return "Berhasil";
      } else {
        return "Gagal";
      }
      return $qry;
    } catch (\Throwable $e) {
      echo $e->getMessage();
    }
  }
}

class LogAktivitas
{
  public function __construct()
  {
    try {
      $this->db = new PDO('mysql:host=localhost;dbname=savepet', 'root', '');
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  public function list()
  {
    try {
      $sql = "SELECT *FROM log_activity ORDER BY id DESC";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  public function tambah($idlog, $keterangan, $cdate)
  {
    try {
      $sql = "INSERT INTO log_activity(id,keterangan,cdate) VALUES('$idlog','$keterangan','$cdate')";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  public function idLog()
  {
    try {
      $sql = "SELECT *FROM log_activity ORDER BY id DESC limit 1";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  public function hapus($id)
  {
    try {
      $sql = "DELETE FROM log_activity WHERE id = '$id'";
      $qry = $this->db->query($sql);
      if ($qry) {
        return "Berhasil";
      } else {
        return "Gagal";
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  public function hapusSemua()
  {
    try {
      $sql = "DELETE FROM log_activity";
      $qry = $this->db->query($sql);
      if ($qry) {
        return "Berhasil";
      } else {
        return "Gagal";
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }
  public function idLog_total()
  {
    try {
      $sql = "SELECT COUNT(*) FROM log_activity";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}

class User
{
  public function __construct()
  {
    try {
      $this->db = new PDO('mysql:host=localhost;dbname=savepet', 'root', '');
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function loginAdmin($user, $pass)
  {
    try {
      $sql = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
      $qry = $this->db->query($sql);
      if ($qry) {
        return "Berhasil";
      } else {
        return "Gagal";
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  public function cekAdmin($user, $pass)
  {
    try {
      $sql = "SELECT COUNT(*) FROM user WHERE username = '$user' AND password = '$pass'";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  public function fetchAdmin($user, $pass)
  {
    try {
      $sql = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
