<div class="custom-banner-adv">
			<div class="container">
				<h2 class="title text-center text-info">
					<?php 
						if(isset($_GET['id'])){

							$id = $_GET["id"];
							$sqlShowCate = "SELECT * FROM categories WHERE id ='".$id."'";
							$resultShowCate=mysqli_query($conn, $sqlShowCate);
                            if (mysqli_num_rows($resultShowCate) > 0) 
                            {
								// output data of each row
                                while ($rowCateName = mysqli_fetch_assoc($resultShowCate)){
                                    echo $rowCateName['name'];
                                }       
							}else{
								echo "0 results";
							}
						}
					?>	
					</h2>
				<div class="row">					
					<?php
						
						$sql = "SELECT * FROM post WHERE categories_id ='".$_GET['id']."' ORDER BY id DESC LIMIT 0,4";
						$result = mysqli_query($conn,$sql);
						
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_assoc($result)){
							
					?>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-banner-adv">
						<a title='Xem' href="ViewsPost.php?id=<?php echo $row['id'];?>"><img src="images/<?php echo $row['images'];?>" width="270"  alt="" />
							<h3 class="title18"><?php echo $row['title']; ?></h3>
							</a>							
						</div>
					</div>
					<?php			
							}
						}else{
							echo "0 results";
						}
					?>
					
					
				</div>
			</div>
		</div>
	<section expanded>
		<div class="custom-khoahoc1">
			<div class="container">
				<h2 class="title text-center">KHÓA HỌC NẤU ĂN</h2>
				<div class="row">	
					<?php
						$parentID = 10;
						$sql = "SELECT * FROM post WHERE categories_id = '".$parentID."' AND status = 1 ORDER BY id DESC LIMIT 0,8";	
						$result = mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_assoc($result)){
					?>				
						<div class="col-md-3 col-sm-3 col-xs-12">
							<div class="item-custom-khoahoc1">
								<a href="ViewsPost.php?id=<?php echo $row['id'];?>"><img src="images/<?php echo $row['images'];?>" width="270" height="180" alt="" />
									<h3 class="title18"><?php echo $row['title']; ?></h3>
								</a>
								<p><?php echo $row['description']; ?></p>
							</div>
						</div>
					<?php
							}
						}else{
							echo "0 results";
						}
					?>
				</div>
			</div>
		</div>	
	</section>
	<section expanded>
		<div class="custom-khoahoc2">
			<div class="container">
				<h2 class="title text-center">KHÓA HỌC LÀM BÁNH</h2>
				<div class="row">	
					<?php
						$parentID = 11;
						$sql = "SELECT * FROM post WHERE categories_id = '".$parentID."' AND status = 1 ORDER BY id DESC LIMIT 0,8";	
						$result = mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_assoc($result)){
					?>				
						<div class="col-md-3 col-sm-3 col-xs-12">
							<div class="item-custom-khoahoc1">
								<a href="ViewsPost.php?id=<?php echo $row['id'];?>"><img src="images/<?php echo $row['images'];?>" width="270" height="180" alt="" />
									<h3 class="title18"><?php echo $row['title']; ?></h3>
								</a>
								<p><?php echo $row['description']; ?></p>
							</div>
						</div>
					<?php
							}
						}else{
							echo "0 results";
						}
					?>
				</div>
			</div>
		</div>	
	</section>
	<section expanded>
		<div class="custom-khoahoc3">
			<div class="container">
				<h2 class="title text-center">KHÓA HỌC PHA CHẾ</h2>
				<div class="row">						
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc3">
							<a href="#"><img src="images/khoahoc/3kh-bartruong.jpg" width="270" height="180" alt="" /></a>
							<h3 class="title18">Nghiệp Vụ Bar trưởng</h3>
							<p>Khóa học tích hợp các nội dung bao gồm: Pha Chế Đặc Biệt, Bartender, Barista, Quản lý Bar và 2 tháng thực tập miễn phí.</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc3">
							<a href="#"><img src="images/khoahoc/3kh-pcdacbiet.jpg" width="270" height="180" alt="" alt="" /></a>
							<h3 class="title18">Khóa Học Pha Chế Đặc Biệt</h3>
							<p>Khóa học tích hợp các nội dung Pha Chế Đặc Biệt, Bartender, Barista, Quản lý Bar và 2 tháng thực tập miễn phí.</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc3">
							<a href="#"><img src="images/khoahoc/3kh-tonghop.jpg" width="270" height="180" alt="" alt="" /></a>
							<h3 class="title18">Khóa Học Pha Chế Tổng Hợp</h3>
							<p>Hướng dẫn và cung cấp công thức đồ uống thông dụng, cà phê máy, cocktail…</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc3">
							<a href="#"><img src="images/khoahoc/3kh-bartender.jpg" width="270" height="180" alt="" alt="" /></a>
							<h3 class="title18">Khóa Học Bartender</h3>
							<p>Cung cấp kiến thức về rượu, kỹ thuật pha chế cocktail, mocktail chuyên nghiệp, biết cách sắp xếp, bố trí quầy bar.</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc3">
							<a href="#"><img src="images/khoahoc/3kh-barista.jpg" width="270" height="180" alt="" /></a>
							<h3 class="title18">Khóa Học Barista</h3>
							<p>Trang bị kiến thức từ cơ bản đến chuyên sâu về cà phê và các thức uống có nền tảng từ cà phê.</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc3">
							<a href="#"><img src="images/khoahoc/3kh-chuyende.jpg" width="270" height="180" alt="" alt="" /></a>
							<h3 class="title18">Khóa Học Thep Chuyên Đề</h3>
							<p>Khóa học ngắn hạn chỉ trong 1 – 3 buổi để nắm được công thức và cách kết hợp một trong các thức uống như trà sữa, thức uống detox, sinh tố, nước ép,…</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc3">
							<a href="#"><img src="images/khoahoc/3kh-nhahang-cafe.jpg" width="270" height="180" alt="" alt="" /></a>
							<h3 class="title18">Khóa Học Kinh Doanh Nhà Hàng - Café</h3>
							<p>Kiến thức, kinh nghiệm thực tế và bí quyết thành công từ chuyên gia dành cho những học viên có nhu cầu kinh doanh thức uống.</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc3">
							<a href="#"><img src="images/khoahoc/3kh-lamkem.jpg" width="270" height="180" alt="" alt="" /></a>
							<h3 class="title18">Khóa Học Làm Kem</h3>
							<p>Cung cấp cách làm và hướng dẫn cách làm 4 dòng kem thông dụng: kem tinh bột, kem tinh mùi, kem trái cây và kem kết hợp.</p>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</section>	
	<section expanded>
		<div class="custom-khoahoc4">
			<div class="container">
				<h2 class="title text-center">BẾP GIA ĐÌNH</h2>
				<div class="row">						
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc4">
							<a href="#"><img src="images/khoahoc/4kh-buasangtm.jpg" width="270" height="180" alt="" /></a>
							<h3 class="title18">Bữa Sáng Thông Minh</h3>
							<p>Khóa học hướng dẫn cho bạn bí quyết kết hợp các nguyên liệu đơn giản để tạo ra những bữa sáng chất lượng dựa trên tiêu chí nhanh chóng – ngon miệng – dinh dưỡng.</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc4">
							<a href="#"><img src="images/khoahoc/4kh-hnag.jpg" width="270" height="180" alt="" alt="" /></a>
							<h3 class="title18">Hôm Nay Ăn Gì?</h3>
							<p>Hôm nay ăn gì sẽ không còn là nỗi lo của bạn với cách chế biến khoa học hơn 25 món ngon, dinh dưỡng, được sắp xếp theo thực đơn từng ngày.</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc4">
							<a href="#"><img src="images/khoahoc/4kh-mnct.jpg" width="270" height="180" alt="" alt="" /></a>
							<h3 class="title18">Món Ngon Cuối Tuần</h3>
							<p>Cuối tuần chiêu đãi gia đình bằng những món ăn, thức uống, bánh ngọt thơm ngon, hấp dẫn chuẩn vị Nhà hàng cao cấp.</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc4">
							<a href="#"><img src="images/khoahoc/4kh-pccool.jpg" width="270" height="180" alt="" alt="" /></a>
							<h3 class="title18">Pha Chế Cực Cool</h3>
							<p>Cung cấp dinh dưỡng cho cơ thể bằng những thức uống nhà làm theo công thức chuẩn từ những Chuyên gia pha chế hàng đầu.</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc4">
							<a href="#"><img src="images/khoahoc/4kh-banhngot.jpg" width="270" height="180" alt="" /></a>
							<h3 class="title18">Bánh Ngọt Yêu Thương</h3>
							<p>Sau khi hoàn thành khóa học, bạn có thể tự tay làm được những chiếc bánh ngọt thơm ngon, đẹp mắt, trao gửi yêu thương đến người thân.</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc4">
							<a href="#"><img src="images/khoahoc/4kh-mnaau.jpg" width="270" height="180" alt="" alt="" /></a>
							<h3 class="title18">Món Ngon Á Âu</h3>
							<p>Bạn sẽ nắm ngay những bí quyết chế biến món ngon Á Âu giúp bữa cơm gia đình thơm ngon, lạ miệng hơn.</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc4">
							<a href="#"><img src="images/khoahoc/4kh-buatrua.jpg" width="270" height="180" alt="" alt="" /></a>
							<h3 class="title18">Bữa Trưa Vui Vẻ</h3>
							<p>Bạn sẽ nắm được những món ăn ngon, đơn giản, nhanh gọn cho một bữa trưa ít thời gian mà vẫn giữ được hương vị thơm ngon và đầy đủ dinh dưỡng.</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="item-custom-khoahoc4">
							<a href="#"><img src="images/khoahoc/4kh-ctm.jpg" width="270" height="180" alt="" alt="" /></a>
							<h3 class="title18">Công Thức Mới</h3>
							<p>Cung cấp những công thức món ăn mới lạ, đơn giản cho gia đình.</p>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</section>	