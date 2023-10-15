<!-- PHP Cập nhật thông tin -->
<?php
	session_start();
	include('../DB/connection.ini');					
	$username = $_SESSION['username'];
	if(isset($_POST['luuthongtin'])){
		$ten = $_POST['fullname_up'];
		$mail = $_POST['email_up'];
		$sdt = $_POST['phone_up'];
		$add = $_POST['address_up'];
		$fb = $_POST['fb_up'];
		$in = $_POST['in_up'];
		$tt = $_POST['tt_up'];
		$gioithieu = $_POST['description_up'];
						
		$update = "UPDATE users SET fullname='".$ten."', email='".$mail."', facebook='".$fb."', instagram='".$in."', twitter='".$tt."', 
									phone='".$sdt."', address='".$add."', description='".$gioithieu."' WHERE username='".$username."'";
						
		if(mysqli_query($conn,$update)){
		    echo '<meta http-equiv="refresh" content="0;url=http://localhost/NgheBepAAu/admin/Profile.php">';
		}else{
			echo 'Lỗi: '. $update . "<br>" .mysqli_error($conn);
		}
	}
	include('../DB/close.ini');
?><!-- END PHP Cập nhật thông tin -->