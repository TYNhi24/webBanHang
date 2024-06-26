<?php
session_start();
?>
<html>
<head>
<title>4 GIRLS| Đăng nhập</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<form action="" method="POST">
	<div class="register">
	<h1>Đăng nhập</h1>
	<?php
		// Kiểm tra nếu người dùng đã nhấn nút đăng nhập thì mới xử lý
		if (isset($_POST["btn_submit"])) {
			// Lấy thông tin người dùng
			$username = $_POST["username"];
			$password = $_POST["password"];
			if (empty($username) || empty($password)) {
				echo "<p>Nhập đầy đủ thông tin!</p>";
			} else {
				$conn = mysqli_connect("localhost", "root", "", "ql_banhang");
				if (!$conn) {
					die("Kết nối thất bại: " . mysqli_connect_error());
				}

				// Chuẩn bị câu lệnh SQL để tránh SQL Injection
				$stmt = $conn->prepare("SELECT * FROM taikhoan WHERE username = ?");
				$stmt->bind_param("s", $username);
				$stmt->execute();
				$result = $stmt->get_result();

				if ($result->num_rows > 0) {//kiểm tra xem có bất kỳ hàng nào trong kết quả truy vấn hay không
					$row = $result->fetch_assoc();
					// Kiểm tra mật khẩu
					if (password_verify($password, $row['password'])) {
						// Lưu các thông tin  vào session để dùng sau này
						$_SESSION['id'] = $row['id'];
						$_SESSION['hoten'] = $row['hoten'];
						$_SESSION['username'] = $username;
						$_SESSION['diachi'] = $row['diachi'];
						$_SESSION['sdt'] = $row['sdt'];
						$_SESSION['email']=$row['email'];
						// Đăng nhập thành công chuyển hướng trang index.php
						header('Location: ../index.php');
						exit;
					} else {
						echo "Sai mật khẩu";
					}
				} else {
					echo "Tên đăng nhập không tồn tại";
				}
				$stmt->close();
				$conn->close();
			}
		}
	?>

	<hr>
	<label for="username"><b>Tên đăng nhập</b></label>
	<input type="text" placeholder="Tên đăng nhập" name="username" id="username">
	<label for="password"><b>Mật khẩu</b></label>
	<input type="password" placeholder="******" name="password" id="password">
	<hr>
	<button type="submit" name="btn_submit" class="submit">Đăng nhập</button>
	</div>
	<div class="register login">
	<p>Bạn chưa có tài khoản? <a href="../pages/dangky.php">Đăng ký</a>.</p>
	</div>
	</form>
</body>
</html>