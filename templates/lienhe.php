<?php
        $sql = "SELECT * FROM contact";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) >0 ){
            while($row = mysqli_fetch_assoc($result)){
                $phone = $row['phone'];
                $hotline = $row['hotline'];
                $email1 = $row['email'];
                $email2 = $row['email2'];
                $map = $row['map'];
            }
        }
    ?>    
<section id="content">
            <div class="container">
                <div class="content-page">
                    <div class="contact-map border">
                        <iframe src="<?php echo $map; ?>" style="border:0" allowfullscreen="" width="1170" height="380"></iframe>
                    </div>
                    <div class="contact-info-page">
                        <div class="list-contact-info">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="item-contact-info text-center">
                                        <a class="contact-icon color wobble-horizontal" href="#"><i class="fa fa-mobile"></i></a>
                                        <h2 class="title">HOTLINE: <a href="#"><?php echo $hotline; ?></a></h2>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="item-contact-info text-center">
                                        <a class="contact-icon color wobble-horizontal" href="#"><i class="fa fa-phone"></i></a>
                                        <h2 class="title">PHONE: <a href="#"><?php echo $phone ?></a></h2>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="item-contact-info text-center">
                                        <a class="contact-icon color wobble-horizontal" href="<?php echo $email2 ?>"><i class="fa fa-envelope"></i></a>
                                        <h2 class="title"><a href="mailto:<?php echo $email2 ?>"><?php echo $email2 ?></a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-form-page">
                        <h2 class="title text-center">THÔNG TIN TƯ VẤN</h2>
                        <div class="form-contact">
                            <form method="post" action="contact.php">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input name="name" value="Nhập họ tên của bạn*" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" type="text">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input name="email" value="Nhập Email của bạn*" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" type="text">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input name="phone" value="Nhập số điện thoại" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" type="text">
                                    </div>                                    
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <select class="border" name="khoahoc" >																		
                                            <option value="Chọn chuyên ngành học*">Chọn khóa học*</option>				
                                            <option value="BN - Bếp Nóng">****KHÓA HỌC BẾP NÓNG****</option>							
                                            <option value="BN - Học nấu ăn">Học nấu ăn</option>						
                                            <option value="BN - Học nấu ăn chay">Học nấu ăn chay</option>						
                                            <option value="BN - Học nấu ăn cấp tốc">Học nấu ăn cấp tốc</option>						
                                            <option value="BN - Nghiệp vụ bếp trưởng">Nghiệp vụ bếp trưởng</option>						
                                            <option value="BN - Bếp trưởng bếp Á">Bếp trưởng bếp Á</option>						
                                            <option value="BN - Bếp trưởng bếp Âu">Bếp trưởng bếp Âu</option>						
                                            <option value="BN - Foot Stylist">Foot Stylist</option>
                                            <option value="BB - Bếp Bánh">****KHÓA HỌC BẾP BÁNH****</option>						
                                            <option value="BB - Bếp trưởng bếp bánh">Bếp trưởng bếp Bánh</option>                                           						
                                            <option value="BB - Học làm bánh">Học làm bánh</option>						
                                            <option value="BB - Lớp bánh kem">Lớp bánh kem</option>						
                                            <option value="BB - Lớp bánh Âu">Lớp bánh Âu</option>						
                                            <option value="BB - Lớp bánh Á">Lớp bánh Á</option>						
                                            <option value="PC - Pha Chế">****KHÓA HỌC PHA CHẾ****</option>
                                            <option value="PC - Học pha chế">Học pha chế</option>						
                                            <option value="PC - Học pha chế đặc biệt">Học pha chế đặc biệt</option>						
                                            <option value="PC - Học pha chế theo yêu cầu">Học pha chế theo yêu cầu</option>						
                                            <option value="PC - Khóa Bar trưởng">Khóa Bar trưởng</option>						
                                            <option value="PC - Khóa Barista">Khóa Barista</option>						
                                            <option value="PC - Khóa Bartender">Khóa Barista</option>																				
                                            <option value="LK - Học làm kem">Học làm kem</option>																				
                                            <option value="LK - Học làm kem theo yêu cầu">Học làm kem theo yêu cầu</option>																				
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <select class="border" name="diadiem">																		
                                            <option value="Chọn địa điểm học*">Chọn địa điểm học*</option>										
                                            <option value="Hà Nội">Hà Nội</option>							
                                            <option value="Hà Nội">Nghệ An</option>							
                                            <option value="Hà Nội">Đà Nẵng</option>							
                                            <option value="Hà Nội">Đắk Lắk</option>							
                                            <option value="Hà Nội">Tp Hồ Chí Minh</option>						s																		
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="messenge" col="30" rows="8" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"></textarea>
                                        <input class="shop-button" value="Gửi thông tin" type="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>	
                <!-- End Content Page -->
            </div>
        </section>