
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">				
				<div class="card">
					<div class="header">
						<h4 class="title">Đổi Mật Khẩu</h4>
					</div>
					<div class="content">
						<form action="" method="POST" name="f1" enctype="">
							<div class="form-group">
								<label>Mật khẩu cũ</label>
								<input type="password" class="form-control" name="pass_old" >
							</div>
							<div class="form-group">
								<label>Mật khẩu Mới</label>
								<input type="password" class="form-control" name="pass_new" >
							</div>
							<div class="form-group">
								<label>Nhập Lại Mật Khẩu</label>
								<input type="password" class="form-control" name="pass_confirm" >
							</div>
							<button type="submit" name="doimatkhau" class="btn btn-info btn-fill pull-right">Đổi Mật Khẩu</button>
							<?php
								if($show_position == '1'){
									echo '<button type="submit" class="btn btn-warning btn-fill pull-right"><a href="Register.php" style="
																																	color: white;
																																	text-decoration: none;
																																">Đăng ký</a></button>';									
								}					
							?>
							<div class="clearfix"></div>							
						</form>
					</div>
				</div>
				<?php
					include('DB/connection.ini');						
					$username = $_SESSION['username'];
					if(isset($_POST['doimatkhau'])){
						$pass_old = $_POST['pass_old'];
						$pass_old = md5($pass_old);
						$pass_new = $_POST['pass_new'];
						$pass_confirm = $_POST['pass_confirm'];
						if($pass_old =='' || $pass_new =='' || $pass_confirm ==''){
							echo "Vui lòng nhập đầy đủ mật khẩu!";
						}else{
							$sql_check="SELECT password FROM users WHERE username='".$username."' ";
							$result=mysqli_query($conn, $sql_check);
							while($row = mysqli_fetch_assoc($result))
							{
								$pass= $row['password'];
								//$pass = md5($pass);
								if($pass != $pass_old)
								{
									echo "Mật khẩu cũ bạn nhập không chính xác, vui lòng nhập lại";
								}
								else if($pass_new!=$pass_confirm){
									echo "Mật khẩu xác nhận nhập sai";
									}
									else{	
										$pass_new = md5($pass_new);
										$sql_doimatkhau="UPDATE users SET password='".$pass_new."' WHERE username='".$username."'";
										if(mysqli_query($conn,$sql_doimatkhau)){										
											echo "Đổi mật khẩu thành công. ";												
										}				
									}							
							}				
						}
					}
				?>	
			</div>
			
		</div>
	</div>	<!--container-fluid-->
</div>	<!--content-->
