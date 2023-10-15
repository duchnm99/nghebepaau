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
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh Sách Chuyên Mục</h4>                                                          						
                            </div>							
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>	
                                    	<th>Tên</th>                                    	
                                    	<th>Đường Dẫn</th>                                    	
                                    	<th>ID Cha</th>                                   	
                                        <th>Bài Viết</th>                                                                       	                                   	
                                        <?php if($show_position == '1'){ ?>
                                            <th>Hoạt Động</th>
                                        <?php } ?>
                                    </thead>
                                    <tbody>
                                        <?php 
                                           	include('DB/connection.ini');

                                            $username = $_SESSION['username'];
                                        
                                            if(isset($_SESSION['username'])){
                                        
                                                $error=$show_categories='';
                                            
                                                $resultGetID = mysqli_query($conn, 'select count(id) as total from categories');
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
                                        
                                                $sql_cate = "SELECT * FROM categories ORDER BY `categories`.`id` DESC LIMIT $start, $limit"; 
                                            }        

                                            $resultCate = mysqli_query($conn,$sql_cate);
                                            
                                            if (mysqli_num_rows($resultCate) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($resultCate) ) {
                                                    echo "<tr>";
                                                    echo" <td>".$row["id"]."</td>";
                                                    echo "<td>".$row["name"]."</td>";
                                                    echo "<td>".$row["slug"]."</td>";

                                                    $sqlParent_id = "SELECT * FROM categories WHERE id = '".$row["parent_id"]."'"; 
                                                    $resultParent_id = mysqli_query($conn, $sqlParent_id);

                                                    if(mysqli_num_rows($resultParent_id) > 0){
                                                        while($rowParent = mysqli_fetch_assoc($resultParent_id)){
                                                            echo "<td>".$rowParent["name"]."</td>";
                                                        }
                                                    }else {
                                                        echo "<td>---</td>";
                                                    }

                                                    $sqlCountPost = "SELECT COUNT(id) FROM post WHERE categories_id = '".$row["id"]."'";
                                                    $resultCountPost = mysqli_query($conn, $sqlCountPost);
                                                    if(mysqli_num_rows($resultCountPost) > 0){
                                                        while($rowCount = mysqli_fetch_assoc($resultCountPost)){
                                                            echo "<td>".$rowCount["COUNT(id)"]." bài viết</td>";
                                                        }
                                                    }else{
                                                        echo "<td>Không có bài viết nào</td>";
                                                      }
                                                   
                                                    if($show_position == '1'){
                                                        echo "<td>
                                                                <a href='UpdateCategories.php?id=".$row['id']."' title='Sửa' class='text-info' style='font-size:30px' ><i class='glyphicon glyphicon-pencil'></i> </a>
                                                                <a href='includes/deleteCategories.php?id=".$row['id']."' title='Xóa' class='text-danger ml-3' style='font-size:30px' ><i class='glyphicon glyphicon-trash'></i> </a>
                                                            </td>";
                                                    }
                                                    echo "</tr>";      
                                                }
                                            } else {
                                                echo "0 results";
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