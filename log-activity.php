<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="image/logo2.png" type="image/x-icon" />
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/style-admin.css" rel="stylesheet" />
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
          <li class="nav-item active">
            <a class="nav-link" href="log-activity.php">Log Aktivitas <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add.php">Add Data</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Sampah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="proses_log.php?q=out">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-isi">
    <table style="width: 80%; margin-top: 3%;">
      <tr>
        <th>ID</th>
        <th>Keterangan</th>
        <th>Created Date</th>
        <th>Action</th>
      </tr>
      <?php
      include "./hewan.php";
      $hewan = new LogAktivitas();
      $data = $hewan->list();
      $no = 1;

      while ($row = $data->fetch(PDO::FETCH_OBJ)) {
      ?>
        <tr>
          <td><?php echo $row->id ?></td>
          <td><?php echo $row->keterangan ?></td>
          <td><?php echo $row->cdate ?></td>
          <td id="action" style="border-top: 1px; border-left: 1px; border-right: 1px;">
            <a href="delete.php?q=del&id=<?php echo $row->id; ?>">
              <div class="btn" style="background-color: red;">
                <h7 class="txt-btn">Delete</h7>
              </div>
            </a>

          </td>
        </tr>
      <?php

        $no++;
      }
      ?>

</body>

</html>
