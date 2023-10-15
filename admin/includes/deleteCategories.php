<?php
	// Kết nối
	include('../DB/connection.ini');
	
	if(isset($_GET['id'])){
		$id = $_GET["id"];
        // Câu SQL delete
		$sql = "DELETE FROM categories WHERE id='".$id."'";
		// Thực hiện câu truy vấn
		if (mysqli_query($conn, $sql)) {
			// echo "Xóa thành công";
            echo"<meta http-equiv='refresh' content='0;url=http://localhost/NgheBepAAu/admin/Categories.php'>";
		} else {
			echo "Xóa thất bại: " . mysqli_error($conn);
        }        
	}
	// ngắt kết nối
	include('../DB/close.ini');
?>


