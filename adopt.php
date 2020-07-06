<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="icon" href="image/logo2.png" type="image/x-icon" />
  <title>SavePet | Adopsi</title>
</head>

<body style="
      display: flex;
      justify-content: center;
      flex-direction: row;
      background-color: white;
    ">

  <div style="
        height: 100vh;
        margin: -0.5%;
        width: 40vw;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      ">
    <img src="image/logo2.png" style="
          height: 300px;
          width: 300px;
          margin-bottom: 10%;
          border-radius: 20px;
        " />
  </div>
  <div style="
        background-color: teal;
        height: 100vh;
        margin: -0.5%;
        width: 61vw;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      ">
    <h1 style="color: white;">Formulir Adopsi</h1>
    <form style="
          display: flex;
          justify-content: center;
          flex-direction: column;
          width: 35vw;
        " action="submit_adopsi.php" method="POST">
      <b class="judul_input">Nama Lengkap</b>
      <input class="txt_input_adop" type="text" placeholder="John Connor" name="nama_lengkap" />
      <b class="judul_input">Alamat Lengkap</b>
      <input class="txt_input_adop" type="text" placeholder="Jalan Merpati 3 Tegal" name="alamat" />
      <b class="judul_input">No Handphone / No. Whatsapp</b>
      <input class="txt_input_adop" type="text" placeholder="08xxxxxxxxxxx" name="no_hp" />
      <b class="judul_input">Penghasilan per bulan</b>
      <input class="txt_input_adop" type="text" placeholder="3 Juta" name="penghasilan" />
      <b class="judul_input">Pengalaman memelihara hewan</b>
      <input class="txt_input_adop" type="text" placeholder="Ya, kucing ras angora satu tahun lalu" name="pengalaman" />
      <b class="judul_input">Nama hewan yang ingin diadopsi</b>
      <input class="txt_input_adop" type="text" placeholder="Jack" name="nama_hewan" />
      <b class="judul_input">Jenis hewan yang ingin diadopsi</b>
      <input class="txt_input_adop" type="text" placeholder="Anjing" name="jenis" />
      <div style="
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15%;
          ">
        <input type="submit" value="Kirim" id="btn" name="submit" />
      </div>
    </form>
  </div>
</body>

</html>
