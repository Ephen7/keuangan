<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data User
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>UserName</th>
                                            <th>Password</th>
                                            <th>Nama</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                          
                                        </tr>  
                                    </thead>
                                    <tbody>

                                    <?php 
		include 'koneksi.php';
        $query = mysqli_query($koneksi,"select max(id) as kode_ FROM user");
        $data  = mysqli_fetch_array($query);
        $kode_ = $data['kode_'];
        $noUrut = (int) substr($kode_, 3, 3);
        $noUrut++;
        $id_m = "1";
        $date_ = date('y');
        $newID = $id_m.$date_.sprintf("%03s", $noUrut);
		$no = 1;
		$data = mysqli_query($koneksi,"select * from user");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['id']; ?></td>
				<td><?php echo $d['username']; ?></td>
				<td><?php echo $d['password']; ?></td>
				<td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['level']; ?></td>	
                <td>
                    <a id="edit_data" data-toggle="modal" data-target="#edit" data-id="<?php echo $d['id'] ?>" data-user="<?php echo $d['username'] ?>" data-pass="<?php echo $d['password'] ?>" data-nama="<?php echo $d['nama'] ?>" data-level="<?php echo $d['level'] ?>" class="btn btn-info"><i class="fa fa-edit"></i>EDIT</a>

                    <a onclick="return confirm('Yakin ingin Hapus Data ini?')" href="hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>HAPUS</a>


                </td>			
			</tr> 
			<?php 
			 
			
            }

		?>
                                   
                                </table>
                            </div>
                         
                         <!--Halaman Tambah -->
                        <div class="panel-body">
                            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
                              Tambah User
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Input User</h4>
                                        </div>
                                        <div class="modal-body">

                                                <form role="form" method="POST">

                                                    <div class="form-group">
                                                    <label>ID</label>
                                                    <input class="form-control" readonly="" name="id" placeholder="Auto" />
                                                    </div>

                                                    <div class="form-group">
                                                    <label>Username</label>
                                                    <input class="form-control" name="user"/>
                                                    </div>

                                                    <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-control" name="pass" type="password" />
                                                    </div>

                                                    <div class="form-group">
                                                    <label>Nama</label>
                                                    <input class="form-control" name="nama"/>
                                                    </div>

                                                    <div class="form-group">
                                                    <label>Level</label>
                                                    <select class="form-control" name="level" style="width:100px"><option value="admin">Admin</option><option value="user">User</option></select>
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

                                $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
                                $user = $_POST['user'];
                                $pass = $_POST['pass'];
                                $nama = $_POST['nama'];
                                $level = $_POST['level'];


                                $data = mysqli_query($koneksi,"insert into user (id, username, password, nama, level)values('$id', '$user', md5('$pass'), '$nama', '$level')");

                                if ($data) {
                                    ?>
                                        <script type="text/javascript">
                                            alert("Simpan Data Berhasil");
                                            window.location.href="?page=user";
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
                                            <h4 class="modal-title" id="myModalLabel">Form Ubah User</h4>
                                        </div>
                                        <div class="modal-body" id="modal_edit">

	                                            <form role="form" method="POST">

	                                        		<div class="form-group">
	                                            	<label>ID</label>
	                                            	<input class="form-control" name="id" placeholder="Input ID" id="id" readonly />
	                                        		</div>	

		                                        	<div class="form-group">
                                                    <label>Username</label>
                                                    <input class="form-control" name="user" id="user"/>
                                                    </div>

                                                    <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-control" name="pass" id="pass" />
                                                    </div>

                                                    <div class="form-group">
                                                    <label>Nama</label>
                                                    <input class="form-control" name="nama" id="nama"/>
                                                    </div>

                                                    <div class="form-group">
                                                    <label>Level</label>
                                                    <select class="form-control" name="level" id="level" style="width:100px"><option value="admin">Admin</option><option value="user">User</option></select>
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
                         	var id = $(this).data('id');
                         	var user = $(this).data('user');
                         	var pass = $(this).data('pass');
                            var nama = $(this).data('nama');
                         	var level = $(this).data('level');

                         	$("#modal_edit #id").val(id);
                         	$("#modal_edit #user").val(user);
                         	$("#modal_edit #pass").val(pass);
                         	$("#modal_edit #nama").val(nama);
                            $("#modal_edit #level").val(level);

                         })

                         </script>

                         <?php

                         if (isset($_POST['ubah'])){

  								$id = $_POST['id'];
                                $user = $_POST['user'];
                                $pass = md5($_POST['pass']);
                                $nama = $_POST['nama'];
                                $level = $_POST['level'];

  								$data = mysqli_query($koneksi,"update user set username ='$user', password='$pass', nama='$nama', level='$level' where id ='$id'");

  								if ($data) {
  									?>
  										<script type="text/javascript">
  											alert("Ubah Data Berhasil");
  											window.location.href="?page=user";
  										</script>
  									<?php

  								}

  							}
                         ?>

  						<!--Akhir Halaman Ubah  -->
                    </div>
              	</div>
</div>
