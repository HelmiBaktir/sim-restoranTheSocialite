<?php
	session_start();
  session_unset();
?>  
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="../css/login.css"/>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'/>
        <script src="../js/jquery-3.5.1.min.js"></script>
        <title>Login</title>
    </head>
    <body>
        <div class="backroundC">
            <div class="container">
                <img class="logo" src="../img/Logo.png" alt="Logo"/>
                <p id="larger" class="margin-l">Masuk</p>
                <!-- USERNAME -->
                <p id="smaller" class="margin-l">Masukkan username</p>
                <input type="text" class="margin-l" id="idusername" placeholder="Username"/>
                <br/>
                <br/>
                <!-- PASSWORD -->
                <p for='idpassword' id="smaller" class="margin-l">Masukkan kata sandi</p>
                <input type="password" class="margin-l" id="idpassword" placeholder="Password"/>
                <br/>
                <br/>
                <input type="checkbox" class="margin-l" id="box" onclick="myFunction()"/>
                <label id="smaller" for="box">Show Password</label>
                <!-- LUPASANDI --><br/>
                <br/>
                <a id="lupa-password" href="">Lupa kata sandi?</a>
                <!-- BUTTON MASUK --><br/>
                <br/>
                <input type="button" id="btnMasuk" value="Masuk" onclick="masuk()"/>
            </div>
            <img class="imgBackround" src="../img/theSocialite.jpeg" alt="ig:thesocialite"/>
        </div>
        <!-- HIDE LOGIN -->
        <script>
function myFunction() {
  var x = document.getElementById("idpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
        <!-- SCRIPT LOGIN JS -->
  <script>
  function masuk(){

    var username = $('#idusername').val();
    var password = $('#idpassword').val();

    $.post("../ajax/login_ajax.php",{
      uname:username,
      pword:password
    }).done(function(data){ 
      var jdata = $.parseJSON(data);
      if(jdata.status == 'sukses'){
        alert("Login Berhasil ");
        window.location='../halaman-utama.php';
      }
      else
      {
        alert("login gagal");
      }
    })
  }
</script>
    </body>
</html>