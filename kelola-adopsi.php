<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style-admin.css" rel="stylesheet" />
  <link rel="icon" href="image/logo2.png" type="image/x-icon" />
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <title>SavePet | Admin</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <img/ src="image/logo2.png" style="width: 100px; height: 100px;">
      <a class="navbar-brand" href="#">SAVEPET</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="log-activity.php">Log Aktivitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add.php">Add Data</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="kelola-adopsi.php">Kelola Adopsi<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="trash.php">Sampah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="proses_log.php?q=out">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-isi">
    <table style="width: 85%; margin-top: 3%; margin-bottom:3%">
      <tr>
        <th>ID</th>
        <th>Nama Lengkap</th>
        <th>No HP</th>
        <th>Penghasilan</th>
        <th>Pengalaman</th>
        <th>Nama Hewan</th>
        <th>Alamat Lengkap</th>
        <th>Jenis/Ras</th>
        <th>Created Date</th>
        <th>Action</th>
      </tr>
      <?php
      include "./hewan.php";
      $hewan = new Hewan();
      $data = $hewan->getAdopsi();


      while ($row = $data->fetch(PDO::FETCH_OBJ)) {
      ?>
        <tr>
          <td><?php echo $row->id ?></td>
          <td><?php echo $row->nama_lengkap ?></td>
          <td><?php echo $row->no_hp ?></td>
          <td><?php echo $row->penghasilan ?></td>
          <td style="width: 100px;"><?php echo $row->pengalaman ?></td>
          <td><?php echo $row->nama_hewan ?></td>
          <td><?php echo $row->alamat ?></td>
          <td><?php echo $row->jenis ?></td>
          <td style="width: 170px;"><?php echo $row->created_date ?></td>
          <td style="border-top: 1px; border-left: 1px; border-right: 1px;">
            <a href="delete.php?q=del-adopt&id=<?php echo $row->id; ?>&nama=<?php echo $row->nama_lengkap ?>">
              <div class="btn" style="background-color: red;">
                <h7 class="txt-btn">Delete</h7>
              </div>
            </a>
          </td>
        </tr>
      <?php

      }
      ?>
  </div>
</body>

</html>
