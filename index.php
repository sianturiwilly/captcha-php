<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Membuat Captcha dengan PHP</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<?php
$pesan='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['input_kode'])) {
            if ($_SESSION['kode_captcha']!=$_POST['input_kode']){
                $pesan="<div class='alert alert-danger'><strong>Error!</strong> Kode yang dimasukan salah.</div>";
                session_destroy();
            }else {
                $pesan="<div class='alert alert-success'><strong>Sukses!</strong> Kode yang dimasukan benar.</div>";
            }
        }
}
?>
<div class="container">
    <br>
<h4>Membuat Captcha dengan PHP</h4>
    <hr>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="form-group">
        <img src="captcha.php" width="85" height="35" alt="Kode Acak" />
    </div>
    <div class="form-group">
        <label>Username:</label>
        <input type="text" name="input_kode" id="kodeval" size="6" maxlength="6" class="form-control" placeholder="Masukan kode disini" required />
    </div>
    <?php echo $pesan; ?>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>