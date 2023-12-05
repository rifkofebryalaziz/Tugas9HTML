<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nimErr  = $nameErr = $emailErr = $alamatErr =  "";
$nim = $name = $email = $alamat =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nim"])) {
    $nimErr = "Nim wajib diisi";
  } else {
    $nim = test_input($_POST["nim"]);
    // check if nim only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$nim)) {
      $nimErr = "Only letters and white space allowed";
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Nama wajib diisi";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
}
if (empty($_POST["email"])) {
  $emailErr = "Email wajib diisi";
} else {
  $email = test_input($_POST["email"]);
  // check if e-mail address is well-formed
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
}

    
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["alamat"])) {
      $alamatErr = "Alamat waijb diisi";
    } else {
      $alamat = test_input($_POST["alamat"]);
      // check if alamt only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$alamat)) {
        $alamatErr = "Only letters and white space allowed";
      }
    }
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php
echo "<h2>Identitas</h2>";
echo "Nim : 22090102<br>";
echo "Nama : Rifko Febry Al Aziz<br>";
?>
<h2>Pertemuan 9 PHP Form Handling and Form Validation </h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  Nim: <input type="text" name="nim" value="<?php echo $nim;?>">
  <span class="error">* <?php echo $nimErr;?></span>
  <br><br> 
  Nama : <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail : <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Alamat : <input type="text" name="alamat" value="<?php echo $alamat;?>">
  <span class="error">* <?php echo $alamatErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $nim;
echo "<br>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $alamat;
echo "<br>";
?>
</body>
</html>