<?php
	include('DB/connection.ini');
	session_start();	
	if(isset($_SESSION['username']))
	{
		// Lấy dữ liệu tài khoản
		$sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
		$result = mysqli_query($conn,$sql);	
		if(mysqli_num_rows($result)>0) // lấy DATA
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$show_id = $row['id'];
				$show_username = $row['username'];
				$show_password = $row['password'];
				$show_fullname = $row['fullname'];
				$show_email = $row['email'];
				$show_position = $row['position'];
				if ($show_position == '1') {
					$name_position = 'Quản trị viên';
				}
				else{
					$name_position='Nhân viên';
				}				
				$show_date = $row['date_created'];			
				$show_facebook = $row['facebook'];
				$show_instagram = $row['instagram'];
				$show_twitter = $row['twitter'];
				$show_phone = $row['phone'];
				$show_address = $row['address'];
				$show_description = $row['description'];
				$show_avata = $row['url_avata'];			
			}
		}	
	}	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Nghề Bếp Á Âu ADMIN</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="bootstrap/bootstrap-3/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <!--  CSS  -->
	<link href="css/style.css" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
   

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="dark" data-image="img/sidebar-4.jpg">
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Nghề Bếp Á Âu ADMIN
                </a>
            </div>
			<div class="media">
				<div class="pull-left avata">
				<?php
					if($show_avata == ''){
						echo '<img src="img/avata.png" class="img-circle elevation-2" alt="User Image" width="46px" height="46px">';
					}else{						
						echo '<img src="img/'.$show_avata.'" class="img-circle elevation-2" alt="User Image" width="46px" height="46px">';
					}
				?>
				  				 				  
				</div>
				<div class="media-body">
					<h5 class="media-heading"><?php echo $show_fullname?></h5>
					<?php
						 // Hiển thị cấp bậc tài khoản
                        // Nếu là admin
                        if($show_position == '1'){                                                             
                            echo '<span class="label label-primary">Quản trị viên </span>';
                        }
                        // Ngược lại là nhân viên
                        else{
                            echo '<span class="label label-primary">Nhân viên </span>';
                        }
					?>
				</div>				
			</div>
            <ul class="nav">
                <li class="nav-item"><a href="Dashboard.php"><i class="glyphicon glyphicon-dashboard"></i><p>Bảng Điều Khiển</p></a></li>
                <li class="nav-item"><a href="Profile.php"><i class="glyphicon glyphicon-user"></i><p>Hồ Sơ Cá Nhân</p></a></li>
                <li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle"  id="menu1" data-toggle="dropdown">
						<i class="glyphicon glyphicon-list-alt"></i>
						<p>Bài Viết</p>                      
					</a>
					<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1" style="background: #6d6d6d;">
						<li role="presentation">
							<a href="Post.php" role="menuitem" tabindex="-1">
								<i class="glyphicon glyphicon-triangle-right"></i>
								<p>Danh Sách Bài Viết</p>                               
							</a>
						</li>	
                        <li role="presentation">
							<a href="AddPost.php" role="menuitem" tabindex="-1">
								<i class="glyphicon glyphicon-triangle-right"></i>
								<p>Thêm Bài Viết</p>                               
							</a>
						</li>						
					</ul>
				</li>
                <li class="nav-item"><a href=""><i class="glyphicon glyphicon-picture"></i><p>Hình Ảnh</p></a><li>
                <li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle"  id="menu1" data-toggle="dropdown">
						<i class="glyphicon glyphicon-tags"></i>
						<p>Danh Mục</p>                      
					</a>
					<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1" style="background: #6d6d6d;">
						<li role="presentation">
							<a href="Categories.php" role="menuitem" tabindex="-1">
								<i class="glyphicon glyphicon-triangle-right"></i>
								<p>Danh Sách Chuyên Mục</p>                               
							</a>
						</li>
            <?php if($show_position == '1'){ ?>
                        <li role="presentation">
							<a href="AddCategories.php" role="menuitem" tabindex="-1">
								<i class="glyphicon glyphicon-triangle-right"></i>
								<p>Thêm Chuyên Mục</p>                               
							</a>
						</li>
            <?php }else{} ?> 						
					</ul>
				</li>
			<?php if($show_position == '1'){ ?>	
                <li class="nav-item"><a href="Caidatchung.php"><i class="glyphicon glyphicon-cog"></i><p>Cài Đặt Chung</p></a></li>
			<?php } ?>
                <li class="nav-item"><a href="Accounts.php"><i class="glyphicon glyphicon-lock"></i><p>Tài Khoản</p></a></li>
				<li class="nav-item"><a href="logout.php"><i class="glyphicon glyphicon-off"></i><p>Thoát</p></a></li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">               
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="Dashboard.php" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
						<li>
							<a href="">
								<p>Trang Quản Trị Website Dạy Nấu Ăn Hướng Nghiệp Á Âu</p>
							</a>
						</li>                       
                    </ul>

                    <ul class="nav navbar-nav navbar-right">                        
						<li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                    <!--    <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
					-->
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>