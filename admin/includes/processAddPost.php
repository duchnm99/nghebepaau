<?php
	// Tạo kết nối
    include('../DB/connection.ini');
    session_start();
    $username = $_SESSION['username'];
    if(isset($_SESSION['username'])){
        if(isset($_POST['btnThem'])){
            $title = $_POST['title'];
            $slug = $_POST['slug'];
            $parent = $_POST['parent'];
            $description = $_POST['description'];
            $content = $_POST['content'];
            $hot = 0;
            $status = 0;
            $sql_ID = "SELECT * FROM users WHERE username = '".$username."' ";
            $result_ID = mysqli_query($conn, $sql_ID);
            if(mysqli_num_rows($result_ID) > 0){
                while($rowID = mysqli_fetch_assoc($result_ID)){
                    $userID = $rowID['id'];
                }
            }

            if(isset($_FILES['image'])){
                $errors= array();
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
                $arr = explode('.',$file_name);
                $file_ext = strtolower(end($arr));
                $expensions = array("jpeg","jpg","png");
                if(in_array($file_ext,$expensions)=== false){
                    $errors[]="Chỉ cho phép định dạng JPG, JPEG hoặc PNG.";
                }
                if($file_size > 2097152){
                    $errors[]='Chỉ cho phép upload file có kích thước < 2 MB';
                }
                if(empty($errors)==true){
                    move_uploaded_file($file_tmp,"../../images/".$file_name);
                }
                else{
                    print_r($errors);
                }
            }       
            // Câu SQL Insert
            $sql = "INSERT INTO post (title, content, description, slug, hot, status, user_id, images, categories_id, creat_at, update_at) VALUES ('".$title."','".$content."','".$description."','".$slug."','".$hot."','".$status."','".$userID."','".$file_name."','".$parent."',Now(),Now() )";
            
            // Thực hiện thêm record
            if (mysqli_query($conn, $sql)) {
                //  header('location:Post.php');
                echo"<meta http-equiv='refresh' content='0;url=http://localhost/NgheBepAAu/admin/Post.php'>";
 
            } else {
                echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
            }
        }else{
            $error = "<div class='text-center'>	
                            <p class='text-danger'>Nhập đủ các trường và ảnh</p>
                        </div>";
        } 
    }
    
	// Ngắt kết nối
	include('../DB/close.ini');
?>