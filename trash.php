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
          <li class="nav-item">
            <a class="nav-link" href="log-activity.php">Log Aktivitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add.php">Add Data</a>
          </li>
          <li class="nav-item active"">
            <a class=" nav-link" href="trash.php">Sampah
            <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="proses_log.php?q=out">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div style="display: flex; justify-content: flex-end; width: '100%'; background-color: black; align-items: flex-end; padding: 40px 150px 20px 0px;">
    <a href="delete.php?q=del_trash_all">
      <div class="btn" style="background-color: red;">
        <h7 class="txt-btn">Delete All</h7>
      </div>
    </a>
  </div>
  <div class="container-isi">

    <table style="width: 80%; margin-top: 3%;">
      <tr>
        <th>No</th>
        <th>Nama Hewan</th>
        <th>Umur Hewan</th>
        <th>Jenis/Ras</th>
        <th>Delete Date</th>
        <th>Action</th>
      </tr>
      <?php
      include "./hewan.php";
      $hewan = new Hewan();
      $data = $hewan->trash();
      $no = 1;

      while ($row = $data->fetch(PDO::FETCH_OBJ)) {
      ?>
        <tr>
          <td style="text-align: center;"><?php echo $no ?></td>
          <td><?php echo $row->nama_hewan ?></td>
          <td><?php echo $row->umur ?></td>
          <td><?php echo $row->jenis ?></td>
          <td><?php echo $row->delete_date ?></td>
          <td id="action" style="border-top: 1px; border-left: 1px; border-right: 1px;">
            <a href="update.php?q=restore&id=<?php echo $row->id_gambar; ?>">
              <div class="btn" style="background-color: darkcyan;">
                <h7 class="txt-btn">Restore</h7>
              </div>
            </a>
            <a href="delete.php?q=del_trash&id=<?php echo $row->id_gambar; ?>">
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

    </table>
  </div>
</body>

</html>
