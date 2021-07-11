 <?php

    include 'koneksi.php';
    $data = mysqli_query($koneksi,"select * from kas");
        while($d = mysqli_fetch_array($data)){
            
            $jumlahmasuk[]    =$d['jumlah'];
            $jumlahkeluar[]    =$d['keluar'];
            }
            $totalmasuk    =array_sum($jumlahmasuk);
            $totalkeluar    =array_sum($jumlahkeluar);
            $total=$totalmasuk-$totalkeluar;

 ?>
 <marquee>Selamat Datang di Sistem Pengelolaan Keuangan GBI Anugerah Allah</marquee>          
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                     <h2>Halaman Utama</h2>   
                        <h5>Pengelolaan Keuangan GBI Anugerah Allah </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="glyphicon glyphicon-import"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo "Rp.". number_format($totalmasuk); ?>,-</p>
                    <p class="text-muted">Total Pemasukan</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="glyphicon glyphicon-export"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo "Rp.". number_format($totalkeluar); ?>,-</p>
                    <p class="text-muted">Total Pengeluaran</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back  noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="glyphicon glyphicon-usd"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo "Rp.". number_format($total); ?>,-</p>
                    <p class="text-muted">Saldo Akhir</p>
                </div>
             </div>

		     </div>

                <!-- /. ROW  -->

            <div class="row" style="margin:0px 0px 0px 0px;">
                <div class="col-md-6">
                    <div class="jumbotron">
                         <h3 >Profil Singkat Gereja</h3>
                        <h5>Sejarah Gereja Bethel Indonesia Anugerah Allah </h5>                       
                        <p >Gereja Bethel Indonesia Anugerah Allah adalah sebuah gereja yang berada dalam Sinode Gereja Bethel Indonesia (GBI), yang adalah anggota dari Persekutuan Gereja-gereja di Indonesia (PGI), Dewan Pentakosta Indonesia (DPI), dan Persekutuan Injili Indonesia (PII).<br> GBI Anugerah Allah digembalai oleh Pdt. Liem Tayen, S.Th. yang terletak di Mall Of Indonesia, Ruko City Home Blok M.3 SAN FRANSISCO BAY, RT.18/RW.8, Kelapa Gading Barat, Kecamatan Kelapa Gading<a href="?page=about">click lebih lanjut</a>
                        
                        </p>
                    </div>
                </div>
            
                    <!-- /. ROW  -->

            <div class="row" style="margin:0px 0px 0px 0px;">
                <div class="col-md-6">
                    <div class="jumbotron">
                         <p>Galery</p> 
                         <table>                          
                        <tr>
                        <th><img src="assets/img/2.jpg"  width="200" height="150" /></th>
                        <th><img src="assets/img/8.jpg" width="220" height="150" /></th>
                        </tr>
                        <tr>
                        <th><img src="assets/img/12.jpg" width="200" height="150"/></th>
                        <th><img src="assets/img/10.jpg" width="220" height="150"/></th>
                        </tr>
                    </table>
                    <hr>
                    <a href="?page=about" class="btn btn-primary" role="button">Lihat lebih banyak</a>
                    </div>
                </div>
            </div>
            </div>
                    <!-- /. ROW  -->

    </div>
   