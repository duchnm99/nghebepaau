<style>
    .pagination {
        display: -ms-flexbox;
        display: flex;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;     
    }
    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }
</style>
        <section id="content" style="background-color:#ededed52;">
			<div class="container">  
			<div class="shop-banner banner-adv line-scale zoom-image" style="margin-top: 25px;">
                <a href="#" class="adv-thumb-link"><img src="images/thuvien/banner-blog-list.jpeg" alt="" /></a>				
            </div>
                <!-- ENd Banner -->
                <div class="content-shop">
                    <div class="row">
                        <div class="col-md-4">
                            <aside class="sidebar-left sidebar-blog border">						
                                <div class="widget widget-popular-post">
                                    <h2 class="title18 title-widget">PHỔ BIẾN</h2>
                                    <div class="wg-product-slider wg-post-slider">
                                        <div class="wrap-item group-navi" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[560,2],[768,1]]">                                                    
                                            <div class="item">
                                            <?php
                                                if(isset($_GET['id'])){
                                                    $id = $_GET["id"];                                               
                                                    $sqlhot = "SELECT * FROM post WHERE categories_id ='".$id."' AND hot = 1 AND status = 1 ORDER BY id DESC LIMIT 0,5";
                                                    $resulthot = mysqli_query($conn,$sqlhot);                                                
                                                    if(mysqli_num_rows($result)>0){
                                                        while($rowhot = mysqli_fetch_assoc($resulthot)){                                                    
                                            ?>
                                                <div class="item-pop-post table">
                                                    <div class="post-thumb banner-adv overlay-image zoom-image">
                                                        <a href="#" class="adv-thumb-link">
                                                            <img src="images/<?php echo $rowhot['images'];?>" width="70px" height="70px" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-info">
                                                        <h3 class="title14"><a href="ViewsPost.php?id=<?php echo $rowhot['id'];?>"><?php echo $rowhot['title']; ?></a></h3>
                                                        <span class="black"><?php echo $rowhot['update_at']; ?></span>
                                                    </div>
                                                </div> 
                                            <?php			
                                                        }
                                                    }else{
                                                        echo "0 results";
                                                    }
                                                }
                                            ?>    
                                            </div>                                           
                                            <!-- End Item -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Widget -->
                            </aside>
                        </div>						
                        
						<div class="col-md-8">
                            <div class="main-content-blog">                                    
                                <div class="content-blog-list row">
                                    
                                    <?php                                       
                                        /**CODE PHÂN TRANG**/
                    
                                        // TÌM TỔNG SỐ RECORDS
                                        $result = mysqli_query($conn, 'select count(id) as total from post');
                                        $row = mysqli_fetch_assoc($result);
                                        $total_records = $row['total'];
                                        // TÌM LIMIT VÀ CURRENT_PAGE
                                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $limit = 8; // 4 bản sản phẩm mỗi trang
                                        // TÍNH TOÁN TOTAL_PAGE VÀ START
                                        // tổng số trang
                                        $total_page = ceil($total_records / $limit);
                                        // Giới hạn current_page trong khoảng 1 đến total_page
                                        if ($current_page > $total_page){
                                            $current_page = $total_page;
                                        }
                                        else if ($current_page < 1){
                                            $current_page = 1;
                                        }
                                        // Tìm Start
                                        $start = ($current_page - 1) * $limit;
                                        // TRUY VẤN LẤY DANH SÁCH TIN TỨC
                                        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                                        $result = mysqli_query($conn, "SELECT * FROM post LIMIT $start, $limit");
                                        
                                        /**CODE PHÂN TRANG**/       
                                                          
                                        $sql = "SELECT * FROM post WHERE categories_id ='".$_GET['id']."' AND status = 1 ORDER BY id DESC LIMIT 0,8";
                                        $result = mysqli_query($conn,$sql);                                                
                                        if(mysqli_num_rows($result)>0){
                                           while($row = mysqli_fetch_assoc($result)){                                                    
                                    ?>
                                        <article class="item-blog-list col-md-6">
                                            <div class="banner-adv fade-out-in zoom-image">
                                                <a href="ViewsPost.php?id=<?php echo $row['id'];?>" class="adv-thumb-link"><img src="images/<?php echo $row['images'];?>" width="370px" height="230px" alt="" /></a>
                                            </div>
                                            <div class="blog-info border bg-white">
                                                <h3 class="title30 font-bold"><a href="ViewsPost.php?id=<?php echo $row['id'];?>" class="black"><?php echo $row['title'];?></a></h3>
                                                <ul class="list-inline-block blog-comment-date">                                              
                                                    <li><label>Ngày đăng: </label><?php echo $row['update_at'];?></li>
                                                    <li><label>Lượt xem: </label><?php echo $row['view'];?></li>
                                                </ul>
                                                <p class="black"><?php echo $row['description']; ?></p>
                                                <div class="table social-readmore">
                                                    <div class="text-left">
                                                        <a href="ViewsPost.php?id=<?php echo $row['id'];?>" class="shop-button">Xem tiếp...</a>
                                                    </div>
                                                    <div class="text-right blog-social">
                                                        <span>Share: </span>
                                                        <a href="#" class="silver"><i class="fa fa-facebook"></i></a>
                                                        <a href="#" class="silver"><i class="fa fa-twitter"></i></a>
                                                        <a href="#" class="silver"><i class="fa fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </article>	
                                    <?php			
                                            }
                                        }else{
                                            echo "0 results";
                                       }
                                    ?>							
                                </div>
                            </div> 
                            <div class="pagination " style="font-size:20px;">
                                <?php 
                                    // PHẦN HIỂN THỊ PHÂN TRANG
                                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                    if ($current_page > 1 && $total_page > 1){
                                        echo '<a class="page-link" href="?page='.($current_page-1).'">Prev</a>';
                                    }
                                    // Lặp khoảng giữa
                                    for ($i = 1; $i <= $total_page; $i++){
                                        // Nếu là trang hiện tại thì hiển thị thẻ span
                                        // ngược lại hiển thị thẻ a
                                        if ($i == $current_page){
                                            echo '<span class="page-link text-danger">'.$i.'</span>';
                                        }
                                        else{
                                            echo '<a class="page-link" href="?page='.$i.'">'.$i.'</a>';
                                        }
                                    }
                                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                    if ($current_page < $total_page && $total_page > 1){
                                        echo '<a class="page-link" href="?page='.($current_page+1).'">Next</a>';
                                    }
                                ?>
                            </div>                               
						</div>			
                                    
                        
									
                    </div>
                </div>
                <!-- End Content Shop -->
            </div>
        </section>
    </div>