<?php
session_start();

//cek apakah user sudahh login
if (!isset($_SESSION['username'])) {
  header ("location:index.php");

  if ($_SESSION['level'] != "admin") {
    die("anda bukan siapa siapa");
  }
}

 ?>

 <!DOCTYPE html>
   <html>
     <head>
     <title>Guru Piket</title>
       <!--Import matefile:///E:/Tubes/index.php#test3rialize.css-->
       <link type="text/css" rel="stylesheet" href="css/materialize.min.css" >
       <link rel="stylesheet" type="text/css" href="css/style.css">
       <link href="css/iconmaterialize.css" rel="stylesheet">
       <link rel="shortcut icon" href="img/logo.png" />

       <!--Let browser know website is optimized for mobile-->
       <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     </head>

     <body>
       <!-- Start Page Loading -->

     <?php
       $batas    = 5;
       $halaman  = @$_GET['halaman'];
       if (empty($halaman)) {
         $posisi   = 0;
         $halaman  = 1;
       }else{
         $posisi   =($halaman - 1)*$batas;
       }
       //koneksi ke database
       include "config/koneksi.php";
       //query menampilkan data
       if (isset($_GET['cari'])) {
        $q        = $_GET['s'];
        $tampil   = "SELECT * FROM  user WHERE username LIKE '%$q%' OR level LIKE '%$q%' ORDER BY username DESC LIMIT $posisi,$batas";
       }else{
         $tampil   = "SELECT * FROM  user ORDER BY username DESC LIMIT $posisi,$batas";
       }


         $hasil    = mysqli_query($konek,$tampil);
         $jmlhasil = mysqli_num_rows($hasil);

     ?>
     <div class="container">
     <div class="row">
       <div class="col s12">
         <table >
         <tr>
           <td>username</td>
           <td>password</td>
           <td>level</td>
         </tr>
  <?php
 if ($jmlhasil<1) {
   echo "<tr>";
   echo "<td colspan='5' style='text-align:center;'>No Result!</td>";
   echo "</tr>";
 }else{

 //penomoran
   $no=$posisi+ 1;
 //tampil nama, email dan pesan
 while($data=mysqli_fetch_array($hasil)){
   echo "<tr>";
   echo "<td> $data[username] </td> ";
   echo "<td> $data[password]</td> ";
   echo "<td> $data[level]</td>";
   echo "</tr>";
   $no++;
   }
 }


 ?>

       </table>

  <?php
 //untuk pagging
 $tampil2 = "SELECT * FROM user";
 $hasil2 = mysqli_query($konek,$tampil2);
 $jmldata= mysqli_num_rows($hasil2);
 $jmlhalaman = ceil($jmldata/$batas);

 echo "JUMLAH DATA : $jmldata <br>";
 echo "<ul >
        <li class=disabled><a href=#></a></li>";

 for ($i=1; $i <=$jmlhalaman ; $i++) {

   if ($i != $halaman) {

     echo "

     <li class=waves-effect><a href=$_SERVER[PHP_SELF]?halaman=$i> $i </a></li>
     ";

   }else{
     echo "
      <li class=active><a href=# class=halaman>$i</a></li>

     ";

   }


 }

  ?>
         </div>
       </div>
       </div>
       </div>
       <div id="test2" class="col s12">
   <form action="piket.php" method="GET">
     <div class="container">
     <div class="row">
       <div class="col s12">
           <div class="input-field col s12">
           <div class="search">
           <div class="row">
             <div class="col 6">
             <input type="text" class="validate" name="s">
             <label for="icon_prefix">Search</label>
             </div>
             <div class="col s4">
             <input type="submit" class="btn" value="cari" name="cari">
             </div>
             </div>
             </div>
             </div>
             </div>
             </div>
             </div>
   </form><!--end form-->

     <?php
       $batas    = 5;
       $halaman  = @$_GET['halaman'];
       if (empty($halaman)) {
         $posisi   = 0;
         $halaman  = 1;
       }else{
         $posisi   =($halaman - 1)*$batas;
       }
       //koneksi ke database
       include "config/koneksi.php";
       //query menampilkan data
       if (isset($_GET['cari'])) {
        $q        = $_GET['s'];
        $tampil   = "SELECT * FROM buku WHERE judul LIKE '%$q%' OR genre LIKE '%$q%' OR pembuat LIKE '%$q%' ORDER BY judul DESC LIMIT $posisi,$batas";
       }else{
         $tampil   = "SELECT * FROM buku ORDER BY judul DESC LIMIT $posisi,$batas";
       }


         $hasil    = mysqli_query($konek,$tampil);
         $jmlhasil = mysqli_num_rows($hasil);

     ?>
     <div class="container">
     <div class="row">
       <div class="col s12">
         <table>
         <tr>
           <td>Judul</td>
           <td>Genre</td>
           <td>Pembuat</td>
         </tr>
  <?php
 if ($jmlhasil<1) {
   echo "<tr>";
   echo "<td colspan='5' style='text-align:center;'>No Result!</td>";
   echo "</tr>";
 }else{

 //penomoran
   $no=$posisi+ 1;
 //tampil nama, email dan pesan
 while($data=mysqli_fetch_array($hasil)){
   echo "<tr>";
   echo "<td> $data[judul] </td> ";
   echo "<td> $data[genre]</td> ";
   echo "<td> $data[pembuat]</td>";
   echo "</tr>";
   $no++;
   }
 }


 ?>

       </table>

  <?php
 //untuk pagging
 $tampil2 = "SELECT * FROM buku";
 $hasil2 = mysqli_query($konek,$tampil2);
 $jmldata= mysqli_num_rows($hasil2);
 $jmlhalaman = ceil($jmldata/$batas);

 echo "JUMLAH DATA : $jmldata <br>";
 echo "<ul class=pagination style=margin:auto;width:230px;>
        <li class=disabled><a href=#><i class=material-icons>chevron_left</i></a></li>";

 for ($i=1; $i <=$jmlhalaman ; $i++) {

   if ($i != $halaman) {

     echo "

     <li class=waves-effect><a href=$_SERVER[PHP_SELF]?halaman=$i> $i </a></li>
     ";

   }else{
     echo "
      <li class=active><a href=# class=halaman>$i</a></li>

     ";

   }


 }

  ?>

   </ul>
         </div>
       </div>
       </div>
       </div>
     </div>
   </div>
   </div>
   </div>
     </div>

   </div>
   </div>
   </div>

     <div class="fixed-action-btn vertikal">
     <a class="btn-floating btn-large red">
       <i class="large material-icons">reorder</i>
     </a>
     <ul>
       <li><a href="log.php?op=out" class="btn-floating red darken-1"><i class="material-icons">power_settings_new</i></a></li>
     </ul>
   </div>
   <br>
   <br>
   <br>
   <br>
   <br>

         <footer class="page-footer teal lighten-2">
           <div class="footer-copyright teal lighten-2">
             <div class="container">
             © 2016 Copyright XI RPL 2
             </div>
           </div>
         </footer><!--end footer-->
       <!--Import jQuery before materialize.js-->
       <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
       <script type="text/javascript" src="js/materialize.min.js"></script>
       <script type="text/javascript" src="js/plugins.min.js"></script>
       <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
     </body>
   </html>
