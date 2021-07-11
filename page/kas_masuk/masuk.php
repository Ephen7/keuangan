<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Pemasukan
                        </div>
                        <form method="POST">
                            <table align="center" style="margin:10px 10px 0px 10px;">
                                <tr>
                                    <td>Dari tanggal : </td>
                                    <td> <input type="date" name="dari_tgl" required="required" style="margin:0px 10px 0px 10px;"></td>
                                    <td> s/d </td>
                                    <td> <input type="date" name="sampai_tgl" required="required" style="margin:0px 0px 0px 10px;"></td>
                                    <td> <input style="margin:0px 10px 0px 10px;" type="submit" class="btn btn-primary" name="filter" value="Filter"></td>
                                    <td>  <a style="margin:0px 10px 0px 0px;" href="tampil_kel.php" type="button" class="btn btn-success" name="semua" >Semua</a></td> <td> 
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
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>  
                                    </thead>
                                    <tbody>

                                    <?php 
		include 'koneksi.php';

        $query = mysqli_query($koneksi,"select max(kode) as kode_ FROM kas where jenis ='masuk'");
        $data  = mysqli_fetch_array($query);
        $kode_ = $data['kode_'];
        $noUrut = (int) substr($kode_, 3, 3);
        $noUrut++;
        $id_m = "1";
        $date_ = date('y');
        $newID = $id_m.$date_.sprintf("%03s", $noUrut);
		$no = 1;
        if (isset($_POST['filter'])){
            $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
            $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);
            $data = mysqli_query($koneksi,"select * from kas where jenis ='masuk' and tgl between '$dari_tgl' and '$sampai_tgl'");
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
          $data = mysqli_query($koneksi,"select * from kas where jenis ='masuk'");   
        }
		
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['kode']; ?></td>
				<td><?php echo date('d F Y', strtotime($d['tgl'])); ?></td>
				<td><?php echo $d['keterangan']; ?></td>
				<td align="right"><?php echo number_format ($d['jumlah']).",-"; ?></td>
				<td>
					<a id="edit_data" data-toggle="modal" data-target="#edit" data-id="<?php echo $d['kode'] ?>" data-ket="<?php echo $d['keterangan'] ?>" data-tgl="<?php echo $d['tgl'] ?>" data-jml="<?php echo $d['jumlah'] ?>" class="btn btn-info"><i class="fa fa-edit"></i>EDIT</a>

					<a onclick="return confirm('Yakin ingin Hapus Data ini?')" href="?page=hapus_masuk&id=<?php echo $d['kode']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>HAPUS</a>
				</td>
			</tr> 
			<?php 
                        
			 $jumlah[]    =$d['jumlah'];

		    }
		    $total    =array_sum($jumlah);
		?>
                                    </tbody>
                                    <tr>
                                    	<th colspan="4">Total kas masuk</th>
                                    	<td align="right"><?php echo"Rp.".number_format($total).",-"?></td>
                                    </tr> 

                                </table>
                            </div>
                         
                         <!--Halaman Tambah -->
                        <div class="panel-body">
                            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
                              Input Pemasukan
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Input Pemasukan</h4>
                                        </div>
                                        <div class="modal-body">

	                                            <form role="form" method="POST">

	                                        		<div class="form-group">
	                                            	<label>Kode</label>
	                                            	<input class="form-control" readonly="" name="kode" value="<?php echo $newID; ?>" />
	                                        		</div>

		                                        	<div class="form-group">
	                                            	<label>Keterangan</label>
	                                            	<textarea class="form-control" rows="3" name="ket"></textarea>
	                                        		</div>

		                                        	<div class="form-group">
	                                            	<label>Tanggal</label>
	                                            	<input class="form-control" type="date" name="tgl"/>
	                                        		</div>

	                                        		<div class="form-group">
	                                            	<label>Jumlah</label>
	                                            	<input class="form-control" type="number" name="jml"/>
	                                        		</div>


	                                    		
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cencel</button>
                                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
  						
  						<?php

  							if (isset($_POST['simpan'])){

  								$kode = $_POST['kode'];
  								$ket = $_POST['ket'];
  								$tgl = $_POST['tgl'];
  								$jml = $_POST['jml'];

  								$data = mysqli_query($koneksi,"insert into kas (kode, keterangan, tgl, jumlah, jenis, keluar)values('$kode', '$ket', '$tgl', '$jml', 'masuk', 0)");

  								if ($data) {
  									?>
  										<script type="text/javascript">
  											alert("Simpan Data Berhasil");
  											window.location.href="?page=masuk";
  										</script>
  									<?php

  								}

  							}

  							?>
  						 <!--Akhir Halaman Tambah -->

  						<!--Halaman Ubah  -->
  						 <div class="panel-body">
                            
                            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Ubah Pemasukan</h4>
                                        </div>
                                        <div class="modal-body" id="modal_edit">

	                                            <form role="form" method="POST">

	                                        		<div class="form-group">
	                                            	<label>Kode</label>
	                                            	<input class="form-control" name="kode" placeholder="Input Kode" id="kode" readonly />
	                                        		</div>	

		                                        	<div class="form-group">
	                                            	<label>Keterangan</label>
	                                            	<textarea class="form-control" rows="3" name="ket" id="ket"></textarea>
	                                        		</div>

		                                        	<div class="form-group">
	                                            	<label>Tanggal</label>
	                                            	<input class="form-control" type="date" name="tgl" id="tgl"/>
	                                        		</div>

	                                        		<div class="form-group">
	                                            	<label>Jumlah</label>
	                                            	<input class="form-control" type="number" name="jml" id="jml"/>
	                                        		</div>


	                                    		
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cencel</button>
                                            <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <script src="assets/js/jquery-1.10.2.js"></script>
                         
                         <script type="text/javascript"> 
                         	
                         $(document).on("click", "#edit_data", function(){
                         	var kode = $(this).data('id');
                         	var ket = $(this).data('ket');
                         	var tgl = $(this).data('tgl');
                         	var jml = $(this).data('jml');

                         	$("#modal_edit #kode").val(kode);
                         	$("#modal_edit #ket").val(ket);
                         	$("#modal_edit #tgl").val(tgl);
                         	$("#modal_edit #jml").val(jml);

                         })

                         </script>

                         <?php

                         if (isset($_POST['ubah'])){

  								$kode = $_POST['kode'];
  								$ket = $_POST['ket'];
  								$tgl = $_POST['tgl'];
  								$jml = $_POST['jml'];

  								$data = mysqli_query($koneksi,"update kas set keterangan ='$ket', tgl='$tgl', jumlah='$jml' where kode ='$kode'");

  								if ($data) {
  									?>
  										<script type="text/javascript">
  											alert("Ubah Data Berhasil");
  											window.location.href="?page=masuk";
  										</script>
  									<?php

  								}

  							}
                         ?>

  						<!--Akhir Halaman Ubah  -->
                    </div>
              	</div>
</div>
