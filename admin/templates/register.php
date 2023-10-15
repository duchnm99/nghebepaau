
<div class="content">
	<div class="container-fluid">
		<div class="row">		
			<div class="col-md-6">
				<div class="card">
					<div class="header">
						<h4 class="title">Thêm Tài Khoản</h4>
					</div>
					<div class="content">
						<form action="" method="POST" name="f2" enctype="">
							<div class="form-group">
								<label>Tên Người Dùng</label>
								<input type="text" class="form-control" name="tennd" >
							</div>
							<div class="form-group">
								<label>Tài Khoản Đăng Nhập</label>
								<input type="text" class="form-control" name="uname" >
							</div>
							<div class="form-group">
								<label>Mật Khẩu</label>
								<input type="password" class="form-control" name="pass" >
							</div>
							<div class="form-group">
								<label>Quyền Hạn</label>
								<input type="text" class="form-control" placeholder="0 Nhân viên, 1 Quản trị viên" name="quyen" >
							</div>							
							<button type="submit" name="themtk" class="btn btn-info btn-fill pull-right">Thêm Tài Khoản</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
				<?php
				include('DB/connection.ini');
				$username = $_SESSION['username'];
				if(isset($_POST['themtk'])){
					//Lấy thông tin từ form bằng phương thức POST
					$tennd = $_POST["tennd"];
					$uname = $_POST["uname"];
					$pass = $_POST["pass"];
					$pass = md5($pass);
					$quyen = $_POST["quyen"];					
					$time = date("Y-m-d  H:i:s");							
					// Kiểm tra trống
					if($tennd == '' ||$uname == '' ||$pass == ''|| $quyen =='' ){
						echo "<h3 class='text-center text-warning'>Vui lòng nhập đầy đủ thông tin!</h3>";
					}else{
						$sql_user = "SELECT username FROM users WHERE username = '$uname'";
						$thucthi = mysqli_query($conn,$sql_user);						
						if(mysqli_num_rows($thucthi)>0){
							echo "<h3 class='text-center text-warning'>Tài khoản tồn tại! Vui lòng nhập tên khác!</h3>";
						}else{
							$sql_insert = "INSERT INTO users(
															fullname,
															username,
															password,
															position,														
															date_created
														)VALUES(
															'$tennd',
															'$uname',
															'$pass',
															'$quyen',															
															'$time'
														)";
							mysqli_query($conn,$sql_insert);
							echo "<h3 class='text-center text-success'>Đăng ký thành công người dùng: <span>$tennd</span></h3>";
						}
					}
				}			
			?>
			</div>			
			
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Danh Sách Tài Khoản</h4>
					</div>
					<div class="content">
						<table class="table table-striped">
							<thead>
								<tr>	
									<th scope="col">ID</th>
									<th scope="col">Tên Người Dùng</th>
									<th scope="col">Tên Đăng Nhập</th>									
									<th scope="col">Quyền Hạn</th>																			
									<th scope="col">Hành Động</th>
								</tr>
							</thead>
							<tbody>
								<?php
									
									$sql = "SELECT * FROM users";
									$thucthi = mysqli_query($conn, $sql);
									
									while($post = mysqli_fetch_array($thucthi)){									
								?>	
									<tr>
										<th><?php echo $post['id']; ?></th>
										<th><?php echo $post['fullname']; ?></th>
										<th><?php echo $post['username']; ?></th>									
										<th><?php echo ($post['position']==1)? "Quản trị viên" : "Nhân viên"; ?></th>															
										<th>
											<a href="includes/deleteUsers.php?id=<?php echo $post['id']; ?> " title="Xóa" class="text-danger" style="font-size:30px" ><i class="glyphicon glyphicon-trash"></i> </a>
										</th>
									</tr>
								<?php									
									}
									include('DB/close.ini')
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	<!--container-fluid-->
</div>	<!--content-->
