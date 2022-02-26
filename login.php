<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="./lib/css/base.css">
    <link rel="stylesheet" href="./lib/css/login.css">
    <link rel="stylesheet" href="./lib/css/login/reponsive.css">
</head>
<body>
<?php

	require_once("models/config_login.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
		$username = $_POST["username"];
		$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "select * from tb_username where username = '$username' and password = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng');</script>";
			}else{
				$_SESSION['username'] = $username;
                echo "<script>alert('Chào mừng admin quay lại hệ thống');window.location='http://localhost/tesst/views/v_point/point.php'</script>";
               
			}
		}
	}
?>
    <div class="main">
        <div class="container-flur">
            <header class="header">
                <div class="header-wrap">
                    <div class="header-logo">
                        <a href="" class="header-logo__link">
                            <img src="./lib/img/login/logo1.png" alt="" class="header-logo__img">
                        </a>
                        
                    </div>
                    <div class="header-logo">
                        <a href="" class="header-logo__link">
                            <img src="./lib/img/login/logo-hunre.png" alt="" class="header-logo__img">
                        </a>
                        
                    </div>
    
                    <div class="header-contact">
                        <div class="header-contact__left">
                            <a href="" class="header-inner">
                                <div class="header-img__wrap">
                                    <img src="./lib/img/login/phone.svg" alt="" class="header-inner__img">
                                </div>
    
                                <span class="header-inner__content">
                                    (+84) 829 998 923
                                </span>

                                <div class="header-img__wrap-mobi">
                                    <img src="./lib/img/login/fb.svg" alt="" class="header-inner__img-mobi">
                                </div>
                            </a>
    
                            <a href="" class="header-inner">
                                <div class="header-img__wrap">
                                    <img src="./lib/img/login/mail.svg" alt="" class="header-inner__img">
                                </div>
                                
                                <span class="header-inner__content">
                                    anh280900@gmail.com
                                </span>
                            </a>
                        </div>
    
                        <div class="header-contact__right">
                            <a href="" class="header-contact__link">
                                <div class="header-img__wrap">
                                    <img src="./lib/img/login/fb.svg" alt=""  class="header-inner__img">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </header>    
    
            <div class="content">
                <div class="login">
                    <div class="login-inner">
                        <div class="login-top">
                            <h4 class="login-top__heading">
                                Đăng nhập quản lý dữ liệu lỗ khoan khu vực Đồng bằng Sông Cửu Long
                            </h4>

                            <span class="login-top__separate">
                                <img src="./lib/img/login/Group 48.svg" alt="" class="login-top__separate-img">
                            </span>
                        </div>

                        <div class="login-body">
                            <form method="POST" action="login.php" class="login-form">
                                <div class="login-form__inner">
                                    <div class="login-form__create">
                                    </div>

                                    <div class="login-form__main">
                                        <div class="login-form__wrap">
                                            <label for="" class="login-form__account">
                                            Tên đăng nhập
                                            </label>

                                            <input type="text" name="username" class="login-form__input" placeholder="Username">
                                        </div>

                                        <div class="login-form__wrap">
                                            <label for="" class="login-form__account">
                                                Mật khẩu
                                            </label>

                                            <div class="login-form__hidden">
                                                <input type="password" name="password" id="myInput" class="login-form__input" style="font-size: 18px;" placeholder="Password" value="">

                                                <input type="checkbox" hidden class="login-form__hidden-btn" id="showpass" onclick="myFunction()">

                                                <label for="showpass">
                                                    <img src="./lib/img/login/hidden.svg" alt="" class="login-form__input-eye">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="login-form__main-question">
                                            <label class="container-c">Lưu lại
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark"></span>
                                            </label>


                                            <a href="" class="login-form__main-forget">
                                                Quên mật khẩu?
                                            </a>
                                        </div>

                                        <div class="login-form__main-submit">
                                            <input  name="btn_submit" value="Đăng nhập"  type="submit" class="login-form__main-btn">
                                                
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                       
                    </div>
                </div>
            </div>
    
            <!-- <footer class="footer">
                <div class="copyright">
                    <img src="" alt="" class="copyright-img">
                </div>
            </footer> -->

           
                
        </div>
    </div>
  
    <script src="lib/bootstrap/js/jquery.min.js"></script>

    <script>
        function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    </script>
</body>
</html>
