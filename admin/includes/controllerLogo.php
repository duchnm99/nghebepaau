<?php
	include('../DB/connection.ini');
	session_start();
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
			$sql_insert_anh= "UPDATE setting SET img_logo ='".$file_name."' ";
			if(mysqli_query($conn,$sql_insert_anh))
			{
				header('location:../Caidatchung.php');
			}
		}
		else{
			print_r($errors);
		}
	}
?>
	
	