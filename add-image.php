<?php

include './hewan.php';
$statusMsg = '';

$targetDir = getcwd() . DIRECTORY_SEPARATOR;
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

$nama = $_POST['nama_lengkap_hewan'];
$usia = $_POST['usia_hewan'];
$jenis = $_POST['jenis_hewan'];

if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"]) && !empty($nama) && !empty($usia) && !empty($jenis)) {
  // Allow certain file formats
  $allowTypes = array('jpg', 'png', 'jpeg');
  if (in_array($fileType, $allowTypes)) {
    // Upload file to server
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
      // Insert image file name into database
      // include "./hewan.php";
      $hewan = new Hewan();

      $insert = $hewan->addImage();

      if ($insert) {
        $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
      } else {
        $statusMsg = "File upload failed, please try again.";
      }
    } else {
      $statusMsg = "Sorry, there was an error uploading your file.";
    }
  } else {
    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
  }
} else {
  $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
