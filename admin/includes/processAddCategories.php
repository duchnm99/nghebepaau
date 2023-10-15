<?php	
    include('../DB/connection.ini');  
    session_start(); 
    $username=$_SESSION['username'];
    if (isset($_SESSION['username']))
    {
        $sql_cate = "SELECT * FROM categories ORDER BY `categories`.`id`"; 
        if(isset($_POST['btnThem']))
        {
            $nameCate = $_POST['nameCate'];
            $slug = $_POST['slug'];
            $parent = $_POST['parent'];           
            $sql = "INSERT INTO categories (name,slug,parent_id,creat_at) VALUES ('".$nameCate."','".$slug."','".$parent."',Now())";
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
    }
	// Ngắt kết nối
	include('../DB/close.ini');
?>
