<!------ Include the above in your HEAD tag ---------->

<!-- https://bootsnipp.com/tags/login -->
<!-- https://bootsnipp.com/snippets/featured/login-form -->
<?php
//biến lưu đường link
include_once ("../../libraries/page.php");
$currentURL = curPageURL();
$__home = 'http://localhost/DoAn_Web01_E404_2018/e-shopvp/views/page/index.php';
$href_public = '../../public';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link href="<?php echo $href_public;?>/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo $href_public;?>/css/login.css" rel="stylesheet" id="bootstrap-css">

    <!------ Include the above in your HEAD tag ---------->
</head>

<body id="LoginForm">
    <div class="container">
        <!-- <h1 class="form-heading">WELCOME!</h1> -->
        <!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="index.php">
							<img src="../img/logo.png" alt="">
						</a>
					</div>
					<!-- /Logo -->
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Đăng nhập</h2>
                </div>

                <form id="Login">

                    <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Tên đăng nhập hoặc Email">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Mật khẩu">
                    </div>
                    <div class="forgot">
                        <a href="#">Quên mật khẩu?</a>
                    </div>

                    <button type="submit" class="btn btn-primary">Đăng nhập</button>

                    <div class="flex-col-c p-t-170 p-b-40">
                        <span class="txt1 p-b-9">
                            Chưa có tài khoản?
                        </span>

                        <a href="#" class="txt3">
                            Đăng ký ngay
                        </a>
                    </div>

                </form>
            </div>
            <p class="botto-text text-uppercase" style=" color: #1d2124;"> 1660052 - Nguyễn Đình Bình | 1660056 - Nguyễn Tuấn Cảnh | 1660164 - Nguyễn Anh Hào</p><br>
            <p class="botto-text text-uppercase" style=" color: #1d2124;">Đồ Án Web</p>
        </div>
    </div>

    <script src="<?php echo $href_public;?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $href_public;?>/js/jquery.min.js"></script>
</body>

</html>
