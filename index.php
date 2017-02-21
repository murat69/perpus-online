<?php
session_start();

//cek apakah user sudahh login
if (isset($_SESSION['username_s'])) {
  header("location:siswa.php");

}
if (isset($_SESSION['username_p'])) {
  header("location:piket.php");

}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!--Import materialize.css-->
     <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
     <link href="css/iconmaterialize.css" rel="stylesheet">
     <link rel="stylesheet" href="css/style.css">
           <link rel="shortcut icon" href="img/logo.png" />
     <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
  <body>



  <div id="test1" class="col s12">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <div class="login">
         <form action="log.php?op=in" method="POST">
              <div class="input-field col s12">
                <label for="password">Username</label>
              <input id="icon_prefix" type="text" class="validate" name="username_s">
              </div><!--end inputfield-->
              <div class="input-field col s12">
              <input id="password" type="password" class="validate" name="psw">
              <label for="password">Password</label>
              </div><!--end inputfield-->
              <p>
              <input type="checkbox" name="checkbox" value="check" id="test5" />
              <label for="test5">Saya Bersedia Bertanggung Jawab</label>
              </p>
              <button class="btn waves-effect waves-light" type="submit" name="action" onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms first.');return false}">Login
            </button><!--end button-->
        </form><!--end form-->
        </div><!--end cardpanel-->
        </div><!--end login-->
        </div><!--end cols12-->
      </div><!--end rows-->
    </div><!--end container-->
  </div>
  </body>
</html>
