<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="image/logo2.png" type="image/x-icon" />
  <link href="css/style-login.css" rel="stylesheet" />
  <title>SavePet | Login</title>
</head>

<body>
  <div id="container">
    <img src="image/logo2.png" style="width: 200px; height : 200px" />
    <form id="form" action="proses_log.php?q=in" method="post">
      <label class="label">Username</label>
      <input type="text" name="user" class="txt-input" />
      <label class="label">Password</label>
      <input type="password" name="pass" class="txt-input" />
      <div id="container-btn"><input type="submit" id="btn" name="button" /></div>

    </form>
  </div>

</body>

</html>
