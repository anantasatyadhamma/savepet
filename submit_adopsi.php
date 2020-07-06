<?php
$koneksi = mysqli_connect("localhost", "root", "", "savepet");

$nama = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$penghasilan = $_POST['penghasilan'];
$pengalaman = $_POST['pengalaman'];
$nama_hewan = $_POST['nama_hewan'];
$jenis_hewan = $_POST['jenis'];

$query = "INSERT INTO adopsi (id, nama_lengkap, no_hp, penghasilan, pengalaman, nama_hewan, alamat, jenis) VALUES ( '', '$nama', '$no_hp', '$penghasilan', '$pengalaman', '$nama_hewan', '$alamat', '$jenis_hewan')";
mysqli_query($koneksi, $query);



header("location:index.php");
