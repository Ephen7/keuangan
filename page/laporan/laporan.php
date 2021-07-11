<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Laporan Keuangan
                        </div>
                        <form method="POST">
                            <table align="center" style="margin:10px 10px 0px 10px;">
                                <tr>
                                    <td>Dari tanggal : </td>
                                    <td> <input type="date" name="dari_tgl" required="required" style="margin:0px 10px 0px 10px;"></td>
                                    <td> s/d </td>
                                    <td> <input type="date" name="sampai_tgl" required="required" style="margin:0px 0px 0px 10px;"></td>
                                    <td> <input style="margin:0px 10px 0px 10px;" type="submit" class="btn btn-primary" name="filter" value="Filter"></td>
                                    <td>  <a style="margin:0px 10px 0px 0px;" href="tampil.php" type="button" class="btn btn-success" name="semua" >Semua</a></td> <td> 
                                    <?php 
                                    include 'koneksi.php';
                                    if (isset($_POST['filter'])){
                                    $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
                                    $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);
                                    echo "*Dari tanggal : ".date('d F Y', strtotime($dari_tgl))." s/d ".date('d F Y', strtotime($sampai_tgl));
                                    }
                                    ?>
                                    </td>
                                </tr>
                                
                            </table>
                        </form>

                        <div class="panel-body">
                            <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Masuk</th>
                                            <th>Keluar</th>
                                            <th>Jenis</th>
                                          
                                        </tr>  
                                    </thead>
                                    <tbody>

                                    <?php 
		include 'koneksi.php';
		$no = 1;
        if (isset($_POST['filter'])){
            $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
            $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);
            $data = mysqli_query($koneksi,"select * from kas where tgl between '$dari_tgl' and '$sampai_tgl'");
            $cek= mysqli_num_rows($data);
            if (empty($cek)) {
                ?>
                <script type="text/javascript">
                alert("Maaf data yang anda filter tidak ada!");
                </script>
                <?php
                return;

            }
        }else{
          $data = mysqli_query($koneksi,"select * from kas");    
        }
		while($d = mysqli_fetch_assoc($data)){
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $d['kode'] ?></td>
				<td><?= date('d F Y', strtotime($d['tgl'])) ?></td>
				<td><?= $d['keterangan'] ?></td>
				<td align="right"><?= number_format ($d['jumlah']).",-" ?></td>
				<td align="right"><?= number_format ($d['keluar']).",-" ?></td>
				<td><?= $d['jenis'] ?></td>
				
			</tr> 
			<?php 
			 
			$jumlahmasuk[]    =$d['jumlah'];
            $jumlahkeluar[]    =$d['keluar'];
            }
            $totalmasuk    =array_sum($jumlahmasuk);
            $totalkeluar    =array_sum($jumlahkeluar);
            $total=$totalmasuk-$totalkeluar;
		?>
                                    </tbody>
                                    <tr>
                                    	<th colspan="4">Total kas masuk</th>
                                    	<td colspan="2" style="font-size: 15px; text-align: center;"><?php echo"Rp.".number_format($totalmasuk).",-"?></td>
                                    </tr> 
                                    <tr>
                                    	<th colspan="4">Total kas keluar</th>
                                    	<td colspan="2" style="font-size: 15px; text-align: center;"><?php echo"Rp.".number_format($totalkeluar).",-"?></td>
                                    </tr> 
                                    <tr>
                                    	<th colspan="4">Saldo Akhir</th>
                                    	<td colspan="2" style="font-size: 15px; text-align: center;"><?php echo"Rp.".number_format($total).",-"?></td>
                                    </tr> 

                                </table>
                            </div>
                         
                         <!--Tombol Cetak -->
                        <div class="panel-body">
                            <a onclick="return confirm('Apakah Anda ingin mendownload data?')" href="export_excel.php" target="_blank" class="btn btn-success"><i class="glyphicon glyphicon-save"></i>Download Data ke Excel</a>

                            <a onclick="return confirm('Apakah Anda ingin mencetak laporan?')" href="cetak.php" target="_blank" class="btn btn-info"><i class="glyphicon glyphicon-print"></i>CETAK</a>

                        </div>
		



              	</div>
</div>
