<?php
    session_start();
    include('DB/connection.ini');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8"/>
    <title>Nghề Bếp Á Âu Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
 
    <!-- Liên kết Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/bootstrap-3/css/bootstrap.min.css"/> 
    <link rel="stylesheet" href="bootstrap/bootstrap-3/css/bootstrap.css">
    <!-- Liên kết thư viện jQuery -->
    <script src=""></script>        
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Nghề Bếp Á Âu <small>ADMIN</small></h1>
        </div><!-- div.page-header -->
        <div class="row">
            <div class="col-md-6">
                <p>Vui lòng đăng nhập để tiếp tục.</p>
                <form method="POST" action="">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" placeholder="Tên đăng nhập" id="username" name="username">
                        </div><!-- div.input-group -->
                    </div><!-- div.form-group -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" class="form-control" placeholder="Mật khẩu" id="password" name="password">
                        </div><!-- div.input-group -->
                    </div><!-- div.form-group -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="btnDangNhap" onclick="KTraDangNhap()">Đăng nhập</button>
                    </div><!-- div.form-group -->
                    <div class="alert alert-danger hidden"></div>
                </form><!-- form#formSignin -->
            </div><!-- dib.col-md-6 -->
        </div><!-- div.row -->
        <script type="text/javascript">
            function KTraDangNhap(){
                u = document.getElementById("username").value;
                p = document.getElementById("password").value;
                if(u == "")
                    {
                        alert("Tài khoản không được trống! Vui lòng nhập tài khoản.");
                        form.username.focus();
                        return false;
                    }
                if(p == "")
                    {
                        alert("Mật khẩu không được trống! Vui lòng nhập mật khẩu.");
                        form.password.focus();
                        return false;
                    }
            };           
        </script>
        <?php        
            if(isset($_POST["btnDangNhap"])){
                // Lấy thông tin từ form bằng phương thức POST
                $username = $_POST["username"];
                $password = $_POST["password"];
                $password = md5($password);
                // Kiểm tra đk bắt buộc đối với các field không đc trống
                
                $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
                $result = mysqli_query($conn, $sql);                               
                if(mysqli_num_rows($result)>0){              
                    $_SESSION['username']=$username;
                    $_SESSION['password']=$password;
                    header('location: Dashboard.php');
                }else{
                    echo "Tên đăng nhập hoặc mật khẩu chưa chính xác! Vui lòng nhập lại!";
                }
            } 
        ?>
    </div><!-- div.container -->
</body>
</html>
    
    