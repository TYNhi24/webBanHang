<?php
session_start();
if (!isset($_SESSION['username'])) {
   header('Location: ../pages/dangnhap.php');
   exit;
}
?>
<html>
<head>
<title>4 GIRLS| Đổi mật khẩu</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<form action="" method="POST">
	<div class="register">
	<h1>Đổi mật khẩu</h1>
	<?php
		if (isset($_POST["btn_submit"])) {
			// Lấy thông tin người dùng
			$username = $_SESSION['username']; // Lấy tên đăng nhập từ session
			$old_password = $_POST["old_password"];
			$new_password = $_POST["new_password"];
			$confirm_new_password = $_POST["confirm_new_password"];
			// Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			if (empty($old_password) || empty($new_password) || empty($confirm_new_password)) {
				echo "<p>Nhập đầy đủ thông tin!</p>";
			} else if ($new_password !== $confirm_new_password) {
				echo "<p>Mật khẩu mới không khớp!</p>";
			} else {
				$conn = mysqli_connect("localhost", "root", "", "ql_banhang");
				if (!$conn) {
					die("Kết nối thất bại: " . mysqli_connect_error());
				}
				$stmt = $conn->prepare("SELECT * FROM taikhoan WHERE username = ?");
				$stmt->bind_param("s", $username);
				$stmt->execute();
				$result = $stmt->get_result();
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();//lấy hàng kết quả dưới dạng một mảng kết hợp
					// Kiểm tra mật khẩu cũ
					if (password_verify($old_password, $row['password'])) {
						// Kiểm tra mật khẩu mới khác mật khẩu cũ
						if ($old_password === $new_password) {
							echo "<p>Mật khẩu mới phải khác mật khẩu cũ!</p>";
						} else {
							// Hash mật khẩu mới
							$hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
							// Cập nhật mật khẩu mới
							$update_stmt = $conn->prepare("UPDATE taikhoan SET password = ? WHERE username = ?");
							$update_stmt->bind_param("ss", $hashed_new_password, $username);
							if ($update_stmt->execute()) {
								echo "<p>Đổi mật khẩu thành công! Chuyển hướng về trang chủ...</p>";
								header('Location: ../index.php');
								exit;
							} else {
								echo "<p>Có lỗi xảy ra, vui lòng thử lại.</p>";
							}
							$update_stmt->close();
						}
					} else {
						echo "<p>Mật khẩu cũ không đúng!</p>";
					}
				} else {
					echo "<p>Tên đăng nhập không tồn tại!</p>";
				}
				$stmt->close();
				$conn->close();
			}
		}
	?>
	<p>Vui lòng điền thông tin để đổi mật khẩu</p>
	<hr>
	<label for="old_password"><b>Mật khẩu cũ</b></label>
	<input type="password" placeholder="******" name="old_password" id="old_password">
	<label for="new_password"><b>Mật khẩu mới</b></label>
	<input type="password" placeholder="******" name="new_password" id="new_password">
	<label for="confirm_new_password"><b>Nhập lại mật khẩu mới</b></label>
	<input type="password" placeholder="******" name="confirm_new_password" id="confirm_new_password">
	<hr>
	<button type="submit" name="btn_submit" class="submit">Đổi mật khẩu</button>
	</div>
	</form>
</body>
</html>