<?php
	// Kết nối CSDL
    include('../DB/connection.ini');
    session_start();
    $username = $_SESSION['username'];
    if(isset($_SESSION['username'])){           

        if(isset($_POST['btnSua'])){   
            $id = $_POST['id'];        
            $status = $_POST['status'];
            $hot = $_POST['hot'];          
            $title = $_POST['title'];          
            $slug = $_POST['slug'];
            $categories_id = $_POST['parent'];            
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

            $description = $_POST['description'];
            $content = $_POST['content'];           
            // Lệnh update
            $sql = "UPDATE post SET title='".$title."',content='".$content."',description='".$description."',slug='".$slug."',hot='".$hot."',status='".$status."',images='".$file_name."',categories_id='".$categories_id."', update_at = Now() WHERE id ='".$id."'"; 
            // Thực hiện update
            if (mysqli_query($conn, $sql)) {
                //header('location:Post.php');
                echo"<meta http-equiv='refresh' content='0;url=http://localhost/NgheBepAAu/admin/Post.php'>";                             
            } else {
                echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
            }            
        }

    }	
	// ngắt kết nối
	include('../DB/close.ini');
?>