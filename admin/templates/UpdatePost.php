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
<?php
   if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM post WHERE id = '".$id."' ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){        
            $show_title = $row['title'];
            $show_content = $row['content'];
            $show_description = $row['description'];
            $show_slug = $row['slug'];
            $show_hot = $row['hot'];
            $show_status = $row['status'];
            $show_images = $row['images'];
            $show_categories = $row['categories_id'];
        }
    }else{
        echo "0 results";
    }
}
?>



<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Sửa Bài Viết</h4>
                    </div>
                    <div class="content">
                        <form action="includes/processUpdatePost.php" method="POST" enctype="multipart/form-data" name="f1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" class="form-control" id="ID" name="id" readonly  value="<?php echo $id ?>" >
                                    </div>
                                </div>
                        <?php if($show_position == '1'){ ?>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="<?php if($show_position=='0') {echo 'd-none';}?>">Trạng thái</label>
                                        <select class="form-control col-md-3 mr-5 <?php if($show_position == '0'){echo "d-none";}?>"  name="status" >
                                            <option <?php if($show_status == 0){ echo "selected='selected'" ;}?> value = 0 >--OFF--</option>
                                            <option <?php if($show_status == 1){ echo "selected='selected'" ;}?> value = 1 >--ON--</option>
                                        </select>                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="<?php if($show_position=='0') {echo 'd-none';}?>">Nổi bật</label>
                                        <select class="form-control col-md-3 <?php if($show_position == '0'){echo "d-none";}?>" name="hot" >
                                            <option <?php if($show_hot == 0){ echo "selected='selected'";}?> value = 0 >--OFF--</option>
                                            <option <?php if($show_hot == 1){ echo "selected='selected'" ;}?> value = 1 >--ON--</option>
                                        </select>
                                    </div>
                                </div>
                        <?php } ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề" onkeyup="ChangeToSlug();" value="<?php echo $show_title ?>" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Đường dẫn</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Đường dẫn tự động tạo" value="<?php echo $show_slug?>" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Chuyên mục</label>
                                        <select class="form-control" name="parent">
                                            <option value = 0 >---- Chuyên mục ------</option>
                                            <?php                                                
                                                $sql_cate = "SELECT * FROM categories ORDER BY `categories`.`id` DESC";                                             
                                                $result = mysqli_query($conn, $sql_cate);

                                                if (mysqli_num_rows($result) > 0) {
                                                    // output data of each row
                                                    while($row = mysqli_fetch_assoc($result)) {                                                                          
                                                        echo "<option ";
                                                            if($show_categories == $row["id"]){
                                                                echo "selected='selected'";
                                                            }
                                                             echo "value= ".$row["id"]." > ".$row["name"]."</option>";                                                                                                                                          
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
                                        <input type="file" class="form-control" id="image" name="image" placeholder=""  >
                                    </div>
                                </div>                                  
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tóm tắt</label>
                                       <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Nhập văn bản tóm tắt..."><?php echo $show_description ?></textarea>
                                    </div>
                                </div>
                              	<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nội dung bài viết</label>
                                        <textarea name="content" id="content" cols="30" rows="5"  class="form-control" placeholder="Nhập nội dung..."><?php echo $show_content ?></textarea>
                                    </div>
                                </div>                             
                                                                             
                            </div>
                            <button type="submit" name="btnSua" class="btn btn-info btn-fill pull-right">Sửa bài viết</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
			</div>
        </div>	
    </div>	<!--Container-fluid-->
</div> <!--Content-->

				