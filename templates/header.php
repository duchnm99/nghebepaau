<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nghề Bếp Á Âu</title>   
    <link rel="stylesheet" type="text/css" href="css/libs/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ionicons.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/fonts/ionicons.css">
    <link rel="stylesheet" type="text/css" href="css/libs/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/libs/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/libs/bootstrap-theme.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/libs/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" href="css/libs/owl.theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/libs/jquery.fancybox.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/jquery-ui.min.css"/>	
	<link rel="stylesheet" type="text/css" href="css/libs/owl.transitions.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/jquery.mCustomScrollbar.css"/>	
	<link rel="stylesheet" type="text/css" href="css/libs/slick.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/animate.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/hover.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="css/browser.css" media="all"/>	
    <?php
        include('DB/connection.ini');
    ?>
</head>
<body class="preload">
    <div class="wrap">
        <header id="header">
            <div class="container">
                <div class="main-header">
                    <div class="wrap-nav-logo">
                        <div class="logo">
                            <?php 
                                $select_logo = "SELECT * FROM setting";
                                $resultLogo = mysqli_query($conn,$select_logo);
                                if(mysqli_num_rows($resultLogo) >0 ){
                                    while($rowST = mysqli_fetch_assoc($resultLogo)){
                                        echo "<a href='index.php'><img src='images/".$rowST['img_logo']."'width='180px' height='60px' alt=''></a>";
                                    }
                                }                               
                            ?>
                        </div>
                        <!--End Logo-->
                        <nav class="main-nav">
                            <ul>
                                <li><a href="index.php?id=1">TRANG CHỦ</a></li>
                              
                                <li class="has-sub-menu">
                                    <a href="khoahoc.php?id=3">KHÓA HỌC <i class="ion-ios-arrow-down"></i></a>
                                    <ul class="sub-menu">
                                    <?php
                                            $parentID = 3;
                                            $sql = "SELECT * FROM categories WHERE parent_id = '".$parentID."' ";
                                            $result = mysqli_query($conn, $sql);
                                            if(mysqli_num_rows($result) >0 ){
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo"<li><a href='#'>".$row['name']."</a></li>";
                                                }
                                            }
                                        ?>                                       
                                    </ul>
                                </li>
                                <li class="has-sub-menu">
                                    <a href="#?id=4">KHAI GIẢNG <i class="ion-ios-arrow-down"></i></a>
                                    <ul class="sub-menu">
                                    <?php
                                            $parentID = 4;
                                            $sql = "SELECT * FROM categories WHERE parent_id = '".$parentID."' ";
                                            $result = mysqli_query($conn, $sql);
                                            if(mysqli_num_rows($result) >0 ){
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo"<li><a href='#'>".$row['name']."</a></li>";
                                                }
                                            }
                                        ?>                                       
                                    </ul>
                                </li>
                                <li class="has-sub-menu">
                                    <a href="#?id=5">HỌC VIÊN <i class="ion-ios-arrow-down"></i></a>
                                    <ul class="sub-menu">
                                    <?php
                                            $parentID = 5;
                                            $sql = "SELECT * FROM categories WHERE parent_id = '".$parentID."' ";
                                            $result = mysqli_query($conn, $sql);
                                            if(mysqli_num_rows($result) >0 ){
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo"<li><a href='#'>".$row['name']."</a></li>";
                                                }
                                            }
                                        ?>                                       
                                    </ul>
                                </li>
                                <li class="has-sub-menu">
                                    <a href="#?id=6">TIN TỨC <i class="ion-ios-arrow-down"></i></a>
                                    <ul class="sub-menu">
                                    <?php
                                            $parentID = 6;
                                            $sql = "SELECT * FROM categories WHERE parent_id = '".$parentID."' ";
                                            $result = mysqli_query($conn, $sql);
                                            if(mysqli_num_rows($result) >0 ){
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo"<li><a href='#'>".$row['name']."</a></li>";
                                                }
                                            }
                                        ?>                                       
                                    </ul>
                                </li>
                             
                              
                                <li><a href="thuvien.php?id=7">THƯ VIỆN</a></li>
                                <li><a href="lienhe.php">LIÊN HỆ</a></li>
                            </ul>
                        </nav>
                        <!--End Main Nav-->
                    </div>
                </div>
            </div>
        </header>
        <!--End Header-->