<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>SavePet</title>

  <link rel="icon" href="image/logo2.png" type="image/x-icon" />
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
</head>

<body>
  <?php
  include('koneksi.php');
  $query = mysqli_query($koneksi, "SELECT * FROM hewan");
  ?>
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
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Admin</a>
          </li>


        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div id="awal">
      <img src="image/logo2.png" style="width: 250px; height: 250px;" />
      <div style="
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
          ">
        <p class="tulisan-awal">
          Buat hidup mereka lebih baik, dengan mengadopsi mereka dan memberi
          kasih sayang kita kepada mereka.
        </p>
        <p class="tulisan-awal">
          Gabung komunitas kami untuk selamatkan mereka!!
        </p>
        <a href="about.php">
          <button style="
              width: 100px;
              height: 45px;
              border-radius: 20px;
              background-color: #343a40;
              border-width: 0px;
              color: antiquewhite;
            ">
            About Us
          </button>
        </a>
      </div>
    </div>
    <div class="isi">

      <div style="
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding : 50px;
          ">
        <?php
        $no = 1;
        while ($row = mysqli_fetch_array($query)) {
        ?><div id="container-list">
            <div class="item-list">
              <a href="adopt.php">
                <img src="image_view.php?id_gambar=<?php echo $row['id_gambar']; ?>" class="gambar" />
              </a>
            </div>

            <div style="display: flex; flex-direction: column; justify-content: center; width :280px; ">
              <table style="margin-left: 50px;">
                <tr>
                  <td>Nama</td>
                  <td> : </td>
                  <td><?php echo $row['nama_hewan'] ?></td>
                </tr>
                <tr>
                  <td>Umur</td>
                  <td> : </td>
                  <td><?php echo $row['umur'] ?></td>
                </tr>
                <tr>
                  <td>Jenis/Ras</td>
                  <td> : </td>
                  <td><?php echo $row['jenis'] ?></td>
                </tr>
              </table>

            </div>
          </div>

        <?php
          $no++;
        } ?>
      </div>
    </div>

  </div>

  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<footer>
  <div style="
        width: 70vw;
        display: flex;
        justify-content: space-around;
        flex-direction: row;
        align-items: center;
      ">
    <div id="footer-1">
      <img src="image/logo2.png" style="width: 200px; height: 200px;" />
      <div>
        <p class="tulisan-foot">savepet@savepet.com</p>
        <p class="tulisan-foot">085799472417</p>
      </div>
    </div>
    <div>
      <p class="tulisan-foot">Jalan Kapten Ismail 108</p>
      <p class="tulisan-foot">Tegal, Indonesia</p>
    </div>
  </div>
</footer>

</html>
