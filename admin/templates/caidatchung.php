<?php
	include('DB/connection.ini');
	$sql = "SELECT * FROM setting";
	$thucthi=mysqli_query($conn,$sql);
	if(mysqli_num_rows($thucthi)>0) 
	{
		while($row = mysqli_fetch_assoc($thucthi))
		{
			$id=$row['id_setting'];
			$img=$row['img_logo'];
		}
	}
	
?>


<div class="content">
	<div class="container-fluid">
		<div class="row">		
			<div class="col-md-4">
				<div class="card">
					<div class="header">
						<h3 class="title text-info">Thay đổi logo</h3>
					</div>
					<div class="content">
						<?php echo '<img width="180px" height="60px" src="../images/'.$img.'" alt="img-logo" style="margin: 0 0 25px 0;">';?>
						<form action="includes/controllerLogo.php" method="post" enctype="multipart/form-data">
							<input type="file" name="image">
							<input type="submit" class="btn btn-info btn-sm" value="Lưu ảnh">
						</form>
					</div>
				</div>
			</div>
			 <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h3 class="title text-success">Cập Nhật Địa Chỉ MXH</h3>
                    </div>
                    <div class="content">
                        <form action="" method="POST" enctype="" name="f1">                           
							<?php
								$select = "SELECT * FROM setting";
								$result = mysqli_query($conn,$select);
								if(mysqli_num_rows($result)>0)
								{
									while($row = mysqli_fetch_assoc($result))
									{
										$fb1 = $row['url_fb'];
										$in1 = $row['url_in'];
										$tt1 = $row['url_tt'];
										$gg1 = $row['url_gg'];
										$pr1 = $row['url_pr'];
									}
								}
							?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>URL Facebook</label>
                                        <input type="text" class="form-control" name="fb" placeholder="Địa Chỉ Facebook" value="<?php echo $fb1; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>URL Instagram</label>
                                        <input type="text" class="form-control" name="in" placeholder="Địa Chỉ Instagram" value="<?php echo $in1; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>URL Twitter</label>
                                        <input type="text" class="form-control" name="tt" placeholder="Địa Chỉ Twitter" value="<?php echo $tt1; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>URL Google</label>
                                        <input type="text" class="form-control" name="gg" placeholder="Địa Chỉ Google" value="<?php echo $gg1; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>URL Printes</label>
                                        <input type="text" class="form-control" name="pr" placeholder="Địa Chỉ Printes" value="<?php echo $pr1; ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="luuthongtin" class="btn btn-info btn-fill pull-right">Lưu Thông Tin</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
				<!-- PHP Cập nhật url -->
				<?php									
					if(isset($_POST['luuthongtin'])){						
						$fb = $_POST['fb'];
						$in = $_POST['in'];
						$tt = $_POST['tt'];						
						$gg = $_POST['gg'];						
						$pr = $_POST['pr'];						
						
						$update = "UPDATE setting SET url_fb='".$fb."', url_in='".$in."', url_tt='".$tt."', url_gg='".$gg."', url_pr='".$pr."' ";
						
						if(mysqli_query($conn,$update)){
							echo '<meta http-equiv="refresh" content="0;url=http://localhost/NgheBepAAu/admin/Caidatchung.php">';
						}else{
							echo 'Lỗi: '. $update . "<br>" .mysqli_error($conn);
						}
					}					
				?><!-- END PHP Cập nhật url -->
            </div>
			<div class="col-md-12">
				<div class="card">
                    <div class="header">
                        <h3 class="title text-info">Cập Nhật Liên Hệ</h3>
                    </div>
                    <div class="content">
						<form action="" method="POST" enctype="" name="f2">	
						<?php
								$sql_sl = "SELECT * FROM contact";
								$chay = mysqli_query($conn,$sql_sl);
								if(mysqli_num_rows($chay)>0)
								{
									while($row = mysqli_fetch_assoc($chay))
									{
										$map = $row['map'];
										$phone = $row['phone'];
										$hotline = $row['hotline'];
										$email = $row['email'];
										$email2 = $row['email2'];
									}
								}
						?>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>URL MAP</label>									
										<textarea rows="5" class="form-control" name="map" placeholder="Địa chỉ Map"><?php echo $map ?></textarea>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone</label>
											<input type="text" class="form-control" name="phone" placeholder="Số điện thoại: 0357 947 986" value="<?php echo $phone;?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Hotline</label>
											<input type="text" class="form-control" name="hotline" placeholder="Đường dây nóng: 1800 8198" value="<?php echo $hotline;?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Email 1</label>
											<input type="text" class="form-control" name="email" placeholder="Email tư vấn" value="<?php echo $email;?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Email 2</label>
											<input type="text" class="form-control" name="email2" placeholder="Email góp ý" value="<?php echo $email2;?>">
										</div>
									</div>
									<button type="submit" name="luu" class="btn btn-info btn-fill pull-right">Lưu</button>
									<div class="clearfix"></div>
								</div>
							</div>
						</form>
						<!-- PHP Cập nhật liên hệ -->
						<?php									
							if(isset($_POST['luu'])){						
								$map = $_POST['map'];
								$phone = $_POST['phone'];
								$hotline = $_POST['hotline'];						
								$email = $_POST['email'];						
								$email2 = $_POST['email2'];						
								
								$update = "UPDATE contact SET map='".$map."', phone='".$phone."', hotline='".$hotline."', email='".$email."', email2='".$email2."' ";
								
								if(mysqli_query($conn,$update)){
									echo '<meta http-equiv="refresh" content="0;url=http://localhost/NgheBepAAu/admin/Caidatchung.php">';
								}else{
									echo 'Lỗi: '. $update . "<br>" .mysqli_error($conn);
								}
							}					
						?><!-- END PHP Cập nhật liên hệ -->
					</div>
				</div>
			</div>
		</div><!--row-->
	</div>	<!--container-fluid-->
</div>	<!--content-->