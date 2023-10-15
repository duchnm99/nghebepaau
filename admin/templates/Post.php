<style>
    .pagination {
        display: -ms-flexbox;
        display: flex;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
        float: right;
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
<?php
    include('DB/connection.ini');
    $username=$_SESSION['username'];
    // Nếu đăng nhập
    if (isset($_SESSION['username']))
    {
        $sql_selectId = "SELECT * FROM users WHERE username = '$username'";
            $resultId = mysqli_query($conn, $sql_selectId);

            if (mysqli_num_rows($resultId) > 0) {
            // output data of each row
                while($rowId = mysqli_fetch_assoc($resultId)) 
                { 
                    $id = $rowId['id'];
                    $position = $rowId['position'];
                }
            }
    
            if($position == '1')
                {$resultGetID = mysqli_query($conn, 'select count(id) as total from post');}
            else
                {$resultGetID = mysqli_query($conn, 'select count(id) as total from post WHERE user_id ="'.$id.'" ');}
            $rowGetID = mysqli_fetch_assoc($resultGetID);
            $total_records = $rowGetID['total'];
            
            // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 10;
            
            // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
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

        if($position == '1')
        {
            $sql_posts = "SELECT * FROM `post` ORDER BY `post`.`id` DESC LIMIT $start, $limit   "; 
        }
        else if($position  == '0')
        {   
            $sql_posts = "SELECT * FROM `post`  WHERE user_id = '".$id."' ORDER BY `post`.`id` DESC LIMIT $start, $limit   "; 
        }                
    }
?>

    
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh Sách Bài Viết</h4>        
                                                        						
                            </div>							
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>	
                                    	<th>Tiêu Đề</th>                                    	
                                    	<th>Nổi Bật</th>
                                        <th>Trạng Thái</th>                                   	                                	
                                    	<th>Chuyên Mục</th>    
										<th>Lượt Xem</th> 
                                    	<th>Ngày Đăng</th>
                                        <th>Tác Giả</th>                                                                           	                                   	
                                    	<th>Hoạt Động</th>                                      
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $resultPost = mysqli_query($conn, $sql_posts);
                                        if($resultPost != false){
                                            if (mysqli_num_rows($resultPost) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($resultPost)) {
                                                    echo "<tr>";
                                                    echo" <td>".$row["id"]."</td>";
                                                    echo "<td>".$row["title"]."</td>";
                                                    //Hiển thị nổi bật
                                                    if($row["hot"] == 1){
                                                        echo "<td>
                                                                <span class='text-center text-success glyphicon glyphicon-ok-circle'></span> 
                                                            </td>";                                                                            
                                                    }else{
                                                        echo "<td>
                                                                <span class='text-center text-danger glyphicon glyphicon-remove-circle'></span> 
                                                            </td>";
                                                    }             
                                                    //Hiển thị trạng thái
                                                    if($row["status"] == 1){
                                                        echo "<td>
                                                                <span class='text-center text-success glyphicon glyphicon-ok-circle'></span> 
                                                            </td>";                                                                            
                                                    }else{
                                                        echo "<td>
                                                                <span class='text-center text-danger glyphicon glyphicon-remove-circle'></span> 
                                                            </td>";
                                                    }                
                                                    // Hiển thị chuyên Mục       
                                                    $sqlParent_id = "SELECT * FROM categories WHERE id = '".$row['categories_id']."'"; 
                                                    $resultParent_id = mysqli_query($conn, $sqlParent_id);
                                                    if(mysqli_num_rows($resultParent_id) > 0){
                                                        while($rowParent = mysqli_fetch_assoc($resultParent_id)){
                                                            echo "<td>".$rowParent["name"]."</td>";
                                                        }
                                                    }else{
                                                        echo "<td>---</td>";
                                                    }
                                                                    
                                                    echo "<td>".$row["view"]."</td>";                                                             
                                                    echo "<td>".$row["creat_at"]."</td>";
                                                    //Hiển thị tên tác giả
                                                    $sql_name = "SELECT * FROM users WHERE id = '".$row['user_id']."' ";
                                                    $result_name = mysqli_query($conn, $sql_name);
                                                    if(mysqli_num_rows($resultParent_id) > 0){
                                                        while($rowName = mysqli_fetch_assoc($result_name)){
                                                            echo "<td>" .$rowName["fullname"]. "</td>";
                                                        }
                                                    }else {
                                                        echo "<td>----</td>";
                                                    }   
                                                    //Hiển thị hoạt động                                                    
                                                    echo "<td>
                                                            <a href='UpdatePost.php?id=".$row['id']."' title='Sửa' class='text-info' style='font-size:30px'  ><i class='glyphicon glyphicon-edit'></i> </a>
                                                            <a href='includes/deletePost.php?id=".$row['id']."' title='Xóa' class='text-danger ml-3' style='font-size:30px' ><i class='glyphicon glyphicon-trash'></i> </a>
                                                        </td>";
                                                    echo "</tr>";
                                                   
                                                }
                                            }else{
                                                echo "result 0";
                                            }
                                        }
                                    ?>												
                                    </tbody>
                                </table>
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
                    
                </div>	<!--row-->
            </div>	<!--container-fluid-->
        </div> <!--Content-->