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
  public function trash()
  {
    try {
      $sql = "SELECT * FROM hewan WHERE delete_flag = 0";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (\Throwable $e) {
      echo $e->getMessage();
    }
  }
  public function editHewan($id)
  {
    try {
      $sql = "SELECT * FROM hewan WHERE delete_flag = 1 && id_gambar = $id";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (\Throwable $e) {
      echo $e->getMessage();
    }
  }
  public function addImage($id, $nama, $umur, $jenis, $pathname, $fileType, $cdate, $mdate,  $ddate)
  {
    try {
      $sql = "INSERT into hewan (id_gambar, gambar, tipe_gambar, nama_hewan, umur, jenis, created_date, modified_date, delete_date, delete_flag) VALUES ('$id','$pathname', '$fileType', '$nama', '$umur', '$jenis', '$cdate', '$mdate','$ddate', '1')";
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
  public function restore($id)
  {
    try {
      $sql = "UPDATE hewan SET delete_flag = '1' WHERE id_gambar = $id";
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
  public function hapusTrash($id_gambar)
  {
    try {
      $sql = "DELETE FROM hewan WHERE (delete_flag = '0' AND id_gambar = '$id_gambar')";
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
  public function hapusTrashALL()
  {
    try {
      $sql = "DELETE FROM hewan WHERE delete_flag = '0'";
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
  public function update($nama, $umur, $jenis, $pathname, $id, $fileType, $mdate)
  {
    try {
      $sql = "UPDATE hewan SET nama_hewan = '$nama', umur = '$umur', jenis = '$jenis', gambar = '$pathname', tipe_gambar = '$fileType', modified_date = '$mdate' WHERE id_gambar = '$id'";
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
  public function update2($nama, $umur, $jenis, $mdate, $id)
  {
    try {
      $sql = "UPDATE hewan SET nama_hewan = '$nama', umur = '$umur', jenis = '$jenis', modified_date = '$mdate' WHERE id_gambar = '$id'";
      $qry = $this->db->query($sql);
      if ($sql) {
        return "Berhasil";
      } else {
        return "Gagal";
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  public function desc_id()
  {
    try {
      $sql = "SELECT *FROM hewan ORDER BY id_gambar DESC LIMIT 1";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  public function lihat($id)
  {
    try {
      $sql = "SELECT *FROM hewan WHERE id_gambar = '$id' and delete_flag='1'";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  public function getAdopsi()
  {
    try {
      $sql = "SELECT *FROM adopsi ORDER BY id DESC";
      $qry = $this->db->query($sql);
      return $qry;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  public function hapus_adopt($id)
  {
    try {
      $sql = "DELETE FROM adopsi where id = '$id'";
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
