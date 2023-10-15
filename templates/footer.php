    <?php
        $sql = "SELECT * FROM contact";
        $resultft = mysqli_query($conn,$sql);
        if(mysqli_num_rows($resultft) >0 ){
            while($row = mysqli_fetch_assoc($resultft)){
                $phone = $row['phone'];
                $hotline = $row['hotline'];
                $email1 = $row['email'];
                $email2 = $row['email2'];
            }
        }
    ?>    
        <footer id="footer">
            <div class="footer">
                <div class="container">
                    <div class="rows">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="footer-box">
                                <h2 class="title font-bold">NGHỀ BẾP Á ÂU</h2>
                                <ul>
                                    <li><a href="#">Giới Thiệu</a></li>
                                    <li><a href="#">Cơ Sở Vật Chất</a></li>
                                    <li><a href="#">Giảng Viên</a></li>
                                    <li><a href="#">Định Hướng Phát Triển</a></li>
                                    <li><a href="#">Điều Khoản</a></li>
                                    <li><a href="#">Góp Ý Liên Hệ</a></li>
                                    <li><a href="#">Hê Thống Chi Nhánh</a></li>                        
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="footer-box">
                                <h2 class="title font-bold">THÔNG TIN</h2>
                                <ul>
                                    <li>Tổng đài tư vấn: <a href="#"><?php echo $hotline;?></a>
                                        <br>8h00 - 20h00 (Miễn phí cước)
                                    </li> 
                                    <li>Email: <a href="#"><?php echo $email2?></a></li>                    
                                    <li>Góp ý phản ánh: <a href="#"><?php echo $phone;?></a>
                                        <br>8h00 - 20h00 (Miễn phí cước)
                                    </li>
                                    <li>Email: <a href="#"><?php echo $email1?></a> </li>                           
                                    <li>
                                        Thời gian hoạt động:<br>
                                        Thứ 2 - Thứ 7 (8h00-21h00)<br>
                                        CN (8h00 - 17h00)
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="footer-box">
                                <h2 class="title font-bold">HỌC VIÊN</h2>
                                <ul>
                                    <li><a href="#">Tuyển Sinh</a></li>
                                    <li><a href="#">Nội Quy</a></li>
                                    <li><a href="#">Hướng Dẫn</a></li>
                                    <li><a href="#">Hỏi Đáp</a></li>
                                    <li><a href="#">Lịch Học - Lịch Thi</a></li>
                                    <li><a href="#">Tra Cứu Điểm</a></li>                                                
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="footer-box">
                                <h2 class="title font-bold">LIÊN KẾT</h2>
                                <div class="social-network">
                                    <a href="#" class="float-shadow"><img src="images/hdft/icon-fb.png" alt=""></a>
                                    <a href="#" class="float-shadow"><img src="images/hdft/icon-tw.png" alt=""></a>
                                    <a href="#" class="float-shadow"><img src="images/hdft/icon-ig.png" alt=""></a>
                                    <a href="#" class="float-shadow"><img src="images/hdft/icon-gp.png" alt=""></a>
                                    <a href="#" class="float-shadow"><img src="images/hdft/icon-pt.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--End Footer-->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_four"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_one"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/libs/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/libs/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/libs/jquery.fancybox.js"></script>
    <script type="text/javascript" src="js/libs/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/libs/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/libs/jquery.jcarousellite.min.js"></script>
    <script type="text/javascript" src="js/libs/jquery.elevatezoom.js"></script>
    <script type="text/javascript" src="js/libs/jquery.mCustomScrollbar.min.js"></script>
    <script type="text/javascript" src="js/libs/slick.js"></script>
    <script type="text/javascript" src="js/libs/modernizr.custom.js"></script>
    <script type="text/javascript" src="js/libs/jquery.hoverdir.js"></script>
    <script type="text/javascript" src="js/libs/popup.js"></script>
    <script type="text/javascript" src="js/libs/timecircles.js"></script>
    <script type="text/javascript" src="js/libs/wow.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
	
</body>
</html>