<?php
session_start();
?>
<html>
<head>
<title>4 GIRLS| Đăng ký</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<form action="" method="POST">
		<div class="register">
			<h1>Đăng ký</h1>
	<?php
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
		$username = $_POST["username"];
		$password1 = $_POST["password"];
		$password2 =$_POST["password-repeat"];
 		$hoten = $_POST["hoten"];
      $diachi = $_POST["diachi"];
		$sdt = $_POST["sdt"];
		$email=$_POST["email"];
  			//Kiểm tra nhập đầy đủ thông tin
			if ($username == "" || $password1 == ""|| $password2 == "" || $hoten == "" || $diachi == "" || $sdt == "" || $email=="" ) {
				echo "Bạn vui lòng nhập đầy đủ thông tin !";
			}else{
				if($password1==$password2){
					//mã hóa mật khẩu
					$hashedPassword=password_hash($password1,PASSWORD_DEFAULT);
  					// Kiểm tra tên tài khoản đã tồn tại chưa
					$conn = mysqli_connect("localhost", "root", "", "ql_banhang");
  					$sql="SELECT * from taikhoan where username='$username'";
					$kt=mysqli_query($conn, $sql);
					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{
					//thực hiện việc lưu trữ dữ liệu vào db
						$sql = "INSERT INTO taikhoan (hoten,username,password,diachi,sdt,email) VALUES ('$hoten','$username','$hashedPassword','$diachi',$sdt, '$email')";
						mysqli_query($conn,$sql);
						echo "<p>chúc mừng bạn đã đăng ký thành công</p>";
					}
				}
				else{
					echo "Mật khẩu không khớp";
				}
			}
		}
	?>
			<hr>
            <label for="hoten"><b>Họ và tên</b></label>
			<input type="text" placeholder="Họ và tên" name="hoten" id="hoten">
			<label for="username"><b>Tên đăng nhập</b></label>
			<input type="text" placeholder="Tên đăng nhập" name="username" id="username">
			<label for="password"><b>Mật khẩu</b></label>
			<input type="password" placeholder="******" name="password" id="password">
			<label for="password-repeat"><b>Nhập lại mật khẩu</b></label>
			<input type="password" placeholder="******" name="password-repeat" id="password-repeat">
			<label for="sdt"><b>Số điện thoại</b></label>
			<input type="text" placeholder="Số điện thoại" name="sdt" id="sdt">
         <label for="diachi"><b>Địa chỉ</b></label>
			<input type="text" placeholder="Địa chỉ" name="diachi" id="diachi">
			<label for="diachi"><b>Email</b></label>
			<input type="text" placeholder="Email" name="email" id="email">
			<hr>
			<button type="submit" name="btn_submit" class="submit">Đăng ký</button>
			</div>
			<div class="register login">
			<p>Bạn đã có tài khoản rồi? <a href="../pages/dangnhap.php">Đăng nhập</a>.</p>
		</div>
	</form>
</body>
</html>