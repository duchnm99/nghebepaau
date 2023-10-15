<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
			    // Tăng View
                $Check = 'news_'.$_GET['id'];
                if (!isset($_SESSION[$Check])) {
                    $_SESSION[$Check] = uniqid(); 
                    $sql = 'UPDATE post SET view = view + 1 WHERE id="'.$_GET['id'].'"';
                    mysqli_query($conn, $sql);
                }
				// Câu SQL lấy danh sách
				$sql = "SELECT * FROM post WHERE id='".$_GET['id']."'";
				// Thực thi câu truy vấn và gán vào $result
				$result = mysqli_query($conn, $sql);
				$value = mysqli_fetch_array($result,MYSQLI_ASSOC);
				// var_dump($value);
			?>				
			<div class="product-content">
				<?php echo $value['content'];?>
			</div>			
		</div>	
		<div class="container">
				<h2 class="title text-info">CÁC KHÓA HỌC TƯƠNG TỰ</h2>
				<div class="row">	
					<?php
					
						$sql = "SELECT * FROM post WHERE categories_id = '".$value['categories_id']."' AND status = 1 ORDER BY id DESC LIMIT 0,8";	
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
</div>

