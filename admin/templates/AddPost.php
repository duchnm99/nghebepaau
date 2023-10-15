<script language="javascript">
    function ChangeToSlug(){
        var title, slug;
 
        //Lấy text từ thẻ input title 
        title = document.getElementById("title").value;
 
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();
 
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }
</script>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Thêm Bài Viết</h4>
                    </div>
                    <div class="content">
                        <form action="includes/processAddPost.php" method="POST" enctype="multipart/form-data" name="f1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề" onkeyup="ChangeToSlug();">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Đường dẫn</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Đường dẫn tự động tạo" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Chuyên mục</label>
                                        <select class="form-control" name="parent">
                                            <option value = 0 >---- Chuyên mục ------</option>
                                            <?php 
                                                include('DB/connection.ini');
                                                $username = $_SESSION['username'];                                            
                                                 
                                                if(isset($_SESSION['username'])){
                                                    $sql_cate = "SELECT * FROM categories ORDER BY `categories`.`id` "; 
                                                }

                                                $result = mysqli_query($conn, $sql_cate);

                                                if (mysqli_num_rows($result) > 0) {
                                                    // output data of each row
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                                            
                                                        echo "<option value= ".$row["id"]." > ".$row["name"]."</option>";                                                                    
                                                                        
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }                                            
                                            ?>
                                        </select>
                                    </div>
                                </div>  
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ảnh</label>
                                        <input type="file" class="form-control" id="image" name="image" placeholder="">
                                    </div>
                                </div>                                  
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tóm tắt</label>
                                       <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Nhập văn bản tóm tắt..."></textarea>
                                    </div>
                                </div>
                              	<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nội dung bài viết</label>
                                        <textarea name="content" id="content" cols="30" rows="5"  class="form-control" placeholder="Nhập nội dung..."></textarea>
                                    </div>
                                </div>                             
                                                                             
                            </div>
                            <button type="submit" name="btnThem" class="btn btn-info btn-fill pull-right">Thêm bài viết</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
			</div>
        </div>	
    </div>	<!--Container-fluid-->
</div> <!--Content-->

				