
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Thông Tin Cá Nhân</h4>
                    </div>
                    <div class="content">
                        <form action="includes/processUpdateProfile.php" method="POST" enctype="" name="f1">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Tên hiển thị</label>
                                        <input type="text" class="form-control" name="fullname_up" placeholder="Họ Và Tên" value="<?php echo $show_fullname; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email_up" placeholder="Email" value="<?php echo $show_email?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Số Điện Thoại</label>
                                        <input type="text" class="form-control" name="phone_up" value="<?php echo $show_phone ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quyền Hạn</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $name_position ?>">
                                    </div>
                                </div>
                              	<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ngày Khởi Tạo</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $show_date ?>">
                                    </div>
                                </div>
                            </div>          

							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Địa Chỉ</label>
                                        <input type="text" class="form-control" name="address_up" placeholder="Địa Chỉ" value="<?php echo$show_address ?>">
                                    </div>
                                </div>
                            </div>							

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>URL Facebook</label>
                                        <input type="text" class="form-control" name="fb_up" placeholder="Địa Chỉ Facebook" value="<?php echo $show_facebook ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>URL Instagram</label>
                                        <input type="text" class="form-control" name="in_up" placeholder="Địa Chỉ Instagram" value="<?php echo $show_instagram ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>URL Twitter</label>
                                        <input type="text" class="form-control" name="tt_up" placeholder="Địa Chỉ Twitter" value="<?php echo $show_twitter ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Giới Thiệu</label>
                                        <textarea rows="5" class="form-control" name="description_up" placeholder="Giới Thiệu Cá Nhân"><?php echo $show_description ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="luuthongtin" class="btn btn-info btn-fill pull-right">Lưu Thông Tin</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>				
            </div>
			
            <div class="col-md-4">
				<div class="card card-user">
					<h4 class="text-center text-img">Ảnh Đại Diện</h4>
					<?php 
						if($show_avata ==''){
							echo '<img src="img/avata.png" class="img-avata" alt="User Image" width="300px" height="300px">';
						}else{
							echo '<img src="img/'.$show_avata.'" class="img-avata" alt="User Image" width="300px" height="300px">';
						}						
					?>					
					<hr>
				</div>
				<form action="includes/controllerProfile.php" method="post" enctype="multipart/form-data">
					<input type="file" name="image">
					<button type="submit" name="luuanh" class="btn btn-info btn-fill pull-right">Lưu ảnh</button>
				</form>
            </div>
        </div>	
    </div>	<!--Container-fluid-->
</div> <!--Content-->


