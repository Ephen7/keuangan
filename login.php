<?php

$koneksi = mysqli_connect("localhost","root","","keuangan");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
							
?>
<html>
<head> <title>Home </title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
</head>
<style>
   h3 {
     text-shadow: 10px 10px 50px #000;
   }
</style>
<body background="assets/img/background.jpg" alt="image" sizes="100%">
	<img src="assets/img/logo_GBI.png" align="center" height="100" width="100" />
	<h3 align="center"><font size="6" color="white"><strong>SISTEM INFORMASI PENGELOLAAN KEUANGAN</strong></h2>
	<h3 align="center"><font size="5" color="white"><strong>GBI ANUGERAH ALLAH</strong></h2>
<form id="searchbox" method="post">


<table  class="container">

</table>

<table class="post">
<td valign="top">

      <h2 align="center"><font color="maroon">Silahkan Login</font></h2>

 <table width="60%" border="0" align="center" cellpadding="0">
<tr>
<td>Username</td>

<td>:         <input type="text" name="username" size="25"></td>
</tr>
   <tr>
<td>Password</td>

<td>:         <input type="password" name="password" size="25"></tr>
</tr>

    <tr>
      <td height="48"> </td>
      <td><button type="submit" name="input" >LOGIN</button>
      	<a href="pengunjung.php"> <input type="button" value="PENGUNJUNG" /></a></td>
         
    </tr>
</table>
  </td>
</table>
</form>
	<?php
	if(isset($_POST['input'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$data = mysqli_query($koneksi,"SELECT * FROM user where username='$username' AND password='$password'");
    $cek= mysqli_num_rows($data);
    if ($cek > 0) {
        session_start();
        $row = mysqli_fetch_array($data);
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['status'] = "login";
      	header("location:index.php");
  	}else{
  		  ?>
            <script language="JavaScript">
                alert('Oops! Login Failed. Username & password tidak sesuai ...');
                document.location='login.php';
            </script>
            <?php
        }
  	}
?>
</body>
</html>