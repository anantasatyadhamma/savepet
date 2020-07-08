<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/style-add.css" rel="stylesheet" />
  <link rel="icon" href="image/logo2.png" type="image/x-icon" />
  <title>SavePet | Add Data</title>
</head>

<body style="background-color: darksalmon;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <img/ src="image/logo2.png" style="width: 100px; height: 100px;">
      <a class="navbar-brand" href="#">SAVEPET</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="dashboard.php">Dashboard
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="log-activity.php">Log Aktivitas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add.php">Add Data

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Sampah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
  session_start();
  $id = $_GET['id'];
  include "./hewan.php";
  $hewan = new Hewan();
  $data = $hewan->editHewan($id);
  $row = $data->fetch(PDO::FETCH_OBJ);
  ?>
  <div id="container">
    <div id="card">
      <h2>EDIT</h2>
      <form style="margin-top: 20px; flex-direction: column; display: flex;" action="edit-aksi.php" method="POST" enctype="multipart/form-data">
        <b class="judul_input">Nama Lengkap</b>
        <input class="txt_input_adop" type="text" placeholder="Nama hewan" name="nama_lengkap_hewan" value="<?php echo $row->nama_hewan ?>" />
        <b class="judul_input">Umur</b>
        <input class="txt_input_adop" type="text" placeholder="Usia" name="usia_hewan" value="<?php echo $row->umur ?>" />
        <b class="judul_input">Jenis/Ras</b>
        <input class="txt_input_adop" type="text" placeholder="Jenis/Ras" name="jenis_hewan" value="<?php echo $row->jenis ?>" />

        Select Image File to Upload:
        <input type="file" name="file" id="file">
        <a href="tambah.php?q=tam_hewan" style="margin-top: 30px;">
          <div class="btn" style="background-color: red;">
            <h7 class="txt-btn">Upload</h7>
          </div>
        </a>

        <!-- <div name="submit" value="Upload"  > -->

      </form>


    </div>
  </div>
</body>

</html>
