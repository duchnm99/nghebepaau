<?php	
	include('../DB/connection.ini');	
	$username = $_SESSION['username'];
	// Nếu đăng nhập
	if (isset($_SESSION['username']))
	{       
		$rowPosition = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE username = '".$username."'"));
		if($rowPosition['position']=='1')
		{
			$sqlSelectPosts = "SELECT COUNT(id) FROM post ";
			$sqlSelectCate  = "SELECT COUNT(id) FROM categories ";	
			$sqlSelectUsers = "SELECT COUNT(id) FROM users WHERE position = '0' ";
		}
		else 
		{
			$sqlSelectPosts = "SELECT COUNT(id) FROM post WHERE user_id = '".$rowPosition['id']."'";
			$sqlSelectCate  = "SELECT COUNT(id) FROM categories ";
			$sqlSelectUsers = "SELECT COUNT(id) FROM users WHERE position = '0' ";
		}
		
		$rowPosts = mysqli_fetch_assoc(mysqli_query($conn,$sqlSelectPosts));
		$rowCate = mysqli_fetch_assoc(mysqli_query($conn,$sqlSelectCate));	
		$rowUsers = mysqli_fetch_assoc(mysqli_query($conn,$sqlSelectUsers));

	}       
?>

	<div class="content">
		<div class="container-fluid">
			<div class="row">	
				
				<div class="col-md-4">
					<div class="card">
						<div class="header">
							<h2 class="text-success">Tổng Bài Viết</h2>											
						</div>
						<div class="content text-right">
							<h3 class="text-center"> <?php echo $rowPosts['COUNT(id)']; ?> <i class="glyphicon glyphicon-pencil"></i></h3>
							<a href="Post.php" class="small-box-footer">More info <i class="glyphicon glyphicon-arrow-right"></i></a>		
						</div>				
					</div>
				</div>

				<div class="col-md-4">
					<div class="card">
						<div class="header">
							<h2 class="text-success">Danh Mục</h2>											
						</div>
						<div class="content text-right">
							<h3 class="text-center"> <?php echo $rowCate['COUNT(id)']; ?> <i class="glyphicon glyphicon-tags"></i></h3>
							<a href="Categories.php" class="small-box-footer">More info <i class="glyphicon glyphicon-arrow-right"></i></a>		
						</div>				
					</div>
				</div>
				
			<?php	
			if($show_position == '1'){ ?>				
				<div class="col-md-4">
					<div class="card">
						<div class="header">
							<h2 class="text-success">Nhân Viên</h2>											
						</div>
						<div class="content text-right">
							<h3 class="text-center"> <?php echo $rowUsers["COUNT(id)"]; ?> <i class="glyphicon glyphicon-user"></i></h3>
							<a href="Register.php" class="small-box-footer">More info <i class="glyphicon glyphicon-arrow-right"></i></a>		
						</div>				
					</div>
				</div>	
			<?php
			}else{}
			?>
			
			</div>			
		</div>	<!--container-fluid-->
	</div>	<!--content-->


