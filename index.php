<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gereja Bethel Indonesia Anugerah Allah</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />  
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Anugerah Allah</a> 
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: left;
font-size: 16px;">Selamat Datang : <?php echo $_SESSION['nama'];?> </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><?php echo date('l, d-m-Y');?> <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/logo_GBI.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                    </li>

                    <li>
                        <a  href="?page=masuk"><i class="glyphicon glyphicon-import"></i> Pemasukan</a>
                    </li>

                    <li>
                        <a  href="?page=keluar"><i class="glyphicon glyphicon-export"></i> Pengeluaran</a>
                    </li>

                    <li>
                        <a  href="?page=laporan"><i class="glyphicon glyphicon-usd"></i> Laporan Kas</a>
                    </li>

                    <li>
                        <a  href="?page=user"><i class="glyphicon glyphicon-user"></i> User</a>
                    </li> 
              	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >  
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                        <?php

                            $page = isset($_GET['page']) ? $_GET['page'] : '';
                            $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';


                            if ($page == "masuk") {
                                if ($aksi == "") {
                                    include "page/kas_masuk/masuk.php";
                                }
                            }elseif ($page == "hapus_masuk") {
                                if ($aksi == "") {
                                    include "page/kas_masuk/hapus.php";
                                }

                            }elseif ($page == "keluar") {
                                if ($aksi == "") {
                                    include "page/kas_keluar/keluar.php";
                                } 
                            }elseif ($page == "hapus_keluar") {
                                if ($aksi == "") {
                                    include "page/kas_keluar/hapus.php";
                                }
                            }elseif ($page == "laporan") {
                                if ($aksi == "") {
                                    include "page/laporan/laporan.php";
                                }
                            }elseif ($page == "user") {
                                if ($aksi == "") {
                                    include "page/user/user.php";
                                }
                            }elseif ($page == "") {
                                if ($aksi == "") {
                                    include "page/home/home.php";
                                }
                            }elseif ($page == "about") {
                                if ($aksi == "") {
                                    include "page/about/about.php";
                                }
                            }

                        ?>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
