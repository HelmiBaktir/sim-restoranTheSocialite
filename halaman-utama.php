<?php
session_start();
if (!isset($_SESSION["nama"])) {
  header("Location: metode/login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/halaman-utama.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://css.gg/log-in.css' rel='stylesheet'>
  <script src="js/jquery-3.5.1.min.js"></script>
  <title>Halaman Utama</title>
</head>

<body>

  <!-- HEAD -->
  <div class="header">
    <!-- Logo The Socialite -->
    <div class="site-identity">
      <a href="http://localhost/KP/halaman-utama.php"><img id="logo" src="img/Logo.png" alt="Site Name" /></a>
      <h2>The Socialite</h2>
    </div>

    <!-- Profile -->
    <div class="side-right">
      <!-- nama bisa didapat dari nama user ex: name=Helmi+Ganteng-->
      <?php
      $nama = $_SESSION['nama'];
      $url = '<img src=' . 'https://ui-avatars.com/api/?color=ff0000&name=' . $nama . '>';
      echo ($url);
      ?>
      <button onclick="keluar()" style="font-size:25px; color:white"><i class="gg-log-in"></i></button>
      <div class="txtUset">
        <h4 id="nama-user"></h4>
        <p id="email-user"></p>
      </div>

    </div>
  </div>

  <div class="cardContainer" id="card-container">
    <div class="row" id="row-container">


  </div>
  </div>

  <!-- CARD MENU -->

  <div class="container-menu">
    <!-- Master Data -->
    <a href="masterdata/master-menu.php">
      <div id="box1" class="box">
        <div class="center">
          <span class="iconify" data-icon="ic:baseline-food-bank" style="color: #2a1f41;" data-width="150" data-height="150"></span><br>
        </div>
        <h3>Master Data</h3>
      </div>
    </a>

    <!-- Master Laporan -->

    <a href="master_laporan/laporan-penjualan.php">
      <div id="box2" class="box">
        <div class="center">
          <span class="iconify" data-icon="bi:clipboard-data-fill" style="color: #2a1f41;" data-width="110" data-height="150"></span>
        </div>
        <h3>Master Laporan</h3>
      </div>
    </a>

    <!-- Master Transaksi -->

    <a href="master_transaksi/proses-produksi.php">
      <div id="box3" class="box">
        <div class="center">
          <span class="iconify" data-icon="icon-park-solid:transaction-order" style="color: #2a1f41;" data-width="120" data-height="150"></span>
        </div>
        <h3>Transaksi</h3>
      </div>
    </a>



  </div>
  <script>
    function keluar() {
      $.post("ajax/logout-ajax.php", {}).done(function(data) {
        if (data == 'session terhapus') {
          window.location = 'metode/login.php'
        } else {
          alert("terdapat masalah dalam melakukan logout");
        }
      })
    }

    var email = "<?php echo ($_SESSION['email']) ?>";
    var nama = "<?php echo ($_SESSION['nama']) ?>";

    document.getElementById('nama-user').innerHTML = nama;
    document.getElementById('email-user').innerHTML = email;
  </script>
  <script>
    $(document).ready(function() {
      $.post("ajax/halaman-utama-ajax.php", {}).done(function(data) {
        $("#row-container").html(data);
      })
    })
  </script>


</body>

</html>