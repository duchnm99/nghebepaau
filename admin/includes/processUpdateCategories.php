<?php
    include('../DB/connection.ini');
    session_start();
    $username = $_SESSION['username'];
    if(isset($_POST['btnSua'])){       
        $id = $_POST['id'];    
        $Name = $_POST['nameCate'];
        $Slug = $_POST['slug'];
        $Parent = $_POST['parent'];

        $sql = "UPDATE categories SET name='".$Name."',slug='".$Slug."',parent_id='".$Parent."',update_at=Now() WHERE id='".$id."' ";
        if(mysqli_query($conn, $sql)){
           echo"<meta http-equiv='refresh' content='0;url=http://localhost/NgheBepAAu/admin/Categories.php'>";          
           
        }else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }else{
        $error = "<div class='text-center'>	
                        <p class='text-danger'>Nhập đủ thông tin.</p>
                    </div>";
    } 
    // Ngắt kết nối
	include('../DB/close.ini');      
?>