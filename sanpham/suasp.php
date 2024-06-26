<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['submit'])) {
		if ($_FILES['uploadFile']['name'] != NULL) {//Kiểm tra người dùng có chọn file ?
			//Kiểm tra loại file ảnh có hợp lệ ?
			if ($_FILES['uploadFile']['type'] == "image/jpeg" || $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {
					$path='../img/';//upload ảnh vào img
					$file =$_FILES['uploadFile'];
					$file_name = $file['name'];
					move_uploaded_file($file['tmp_name'],$path.$file_name);
					$hinhanh=$path.$file_name;//đường dẫn ảnh
					}
			// Lấy các giá trị từ form
				$tensp = $_POST['tensp'];
				$giasp = $_POST['giasp'];
				$soluong = $_POST['soluong'];
				$size = $_POST['size'];
				$mau = $_POST['mau'];
				$iddanhmuc = $_POST['iddanhmuc'];

				$conn =	mysqli_connect("localhost", "root", "", "ql_banhang");
				 // Tạo câu lệnh SQL để cập nhật thông tin sản phẩm
				$sql = "UPDATE sanpham SET
								tensp = '".$tensp."',
								giasp = '".$giasp."',
								hinhanh = '".$hinhanh."',
								soluong = '".$soluong."',
								size = '".$size."',
								mau = '".$mau."',
								iddanhmuc = '".$iddanhmuc."'
						WHERE id=".$_GET['id'] ;
				$ketqua = mysqli_query($conn, $sql);
				mysqli_close($conn);
		}
	}
	header("location: ../sanpham/quanlysp.php");
}
?>
<html>
<head>
	<title>4 GIRLS | Sửa sản phẩm</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/grid.css">
	<link rel="stylesheet" type="text/css" href="../css/responsive.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<form action="../timkiem.php" method="POST">
	<div class="app">
		<div class="header">
			<div class="grid wide">
				<div class="header-main">
					<div class="logo">
						<a href="../index.php"><img src="https://i.pinimg.com/736x/f5/f2/70/f5f270d9ddd51a81d705852a88c9e537.jpg" width="150" height="110"></a>
					</div>
					<div class="search">
						<input type="text" name="s" class="search-bar" placeholder="">
						<style>.tim{height: 40px;}</style>
						<input class="tim" type="submit" value="Tìm kiếm">
					</div>
					<div class="contact" style="margin-top: 10px;">
						<p>Hotline: 0123456789</p>
						<p>Address: Ngô Mây-Quy Nhơn</p>
						<p>Email: <a href="mailto:4girls@gmail.com" style="color: #333;">4girls@gmail.com</a></p>
					</div>
				</div>
			</div>
		</div>
		</form>

<!--phan cai thanh-->
<div class="navigation-bar">
		<ul class="navbar-list">
			<li class="navbar-item"><a href="../index.php" class="navbar-link">Trang chủ</a></li>
			<li class="navbar-item"><a href="../pages/gioithieu.php" class="navbar-link">Giới thiệu</a></li>
		</ul>
		<ul class="navbar-list">
			<li class="navbar-item"><a href="../pages/giohang.php" class="navbar-link">Giỏ hàng</a></li>
			<li class="navbar-item"><a href="../taikhoan.php" class="navbar-link">Tài khoản</a></li>
			<li class="navbar-item"><a href="../pages/dangxuat.php" class="navbar-link">Đăng xuất</a></li>
		</ul>
</div>
<!--sản phẩm-->
		<ul class="header__sort-bar">
			<li class="header__sort-item">
				<a href="" class="header__sort-link">Tài khoản</a>
			</li>
		</ul>

		<div class="container">
			<div class="grid wide">
				<div class="row sm-gutter grid-content">
					<div class="column l-2 me-0 s-0">
						<nav class="category">
							<h3 class="category-heading">
								<p style="text-align: center; margin-top:20px;">Sửa sản phẩm</p>
							</h3>
							<ul class="category-list">
								<li class="category-item category-item--active">
									<a href="../admin.php" > Quay lại </a>
								</li>
							</ul>
						</nav>
					</div>
	<!-- BÊN DƯỚI LÀ sản phẩm -->
		<div class="product-detail-decribe" style="text-align: center;">
		<div class="product-detail-describe__detail">
		<?php
			$conn2 = mysqli_connect("localhost", "root", "", "ql_banhang");
			$sql2 = "SELECT * FROM sanpham WHERE id=".$_GET['id'];
			$ketqua2 = mysqli_query($conn2, $sql2);
			$row = mysqli_fetch_array($ketqua2);
		?>
		<table>
			<form action="" enctype="multipart/form-data" method="POST">
				<tr>
					<td>Tên sản phẩm:</td>
					<td><input type="text" name="tensp" size="100" value="<?php echo $row['tensp'] ?>"></td>
				</tr>
				<tr>
					<td>Giá sản phẩm:</td>
					<td><input type="text" name="giasp" value="<?php echo $row['giasp'] ?>" size="100"></td>
				</tr>
				<tr>
					<td>Màu:</td>
					<td><input type="text" name="mau" value="<?php echo $row['mau'] ?>" size="100"></td>
				</tr>
				<tr>
					<td>Size:</td>
					<td><input type="text" name="size" value="<?php echo $row['size'] ?>" size="100"></td>
				</tr>
				<tr>
					<td>Số lượng:</td>
					<td><input type="text" name="soluong" value="<?php echo $row['soluong'] ?>" size="100"></td>
				</tr>
				<tr>
					<td>Hình ảnh:</td>
					<td>
						<?php echo "<img src='../".$row['hinhanh']."' width='170' height='200'>"; ?>
						<input type="hidden" name="existing_image" value="<?php echo $row['hinhanh']; ?>">
						<br>Có thể đổi thành hình ảnh: <input type="file" name="uploadFile"><br>
					</td>
				</tr>
				<tr>
					<td>Danh mục:</td>
					<td>
						<select name="iddanhmuc">
							<?php
								$sql3 = "SELECT * FROM danhmuc";
								$ketqua3 = mysqli_query($conn2, $sql3);
								while ($row3 = mysqli_fetch_array($ketqua3)) {
									echo '<option value="'.$row3['id'].'">'.$row3['tendanhmuc'].'</option>';
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td style="text-align: center;">
						<input type="submit" name="submit" value="Sửa sản phẩm">
					</td>
				</tr>
			</form>
		</table>
	</div>
	</div>
</div>
</div>
</div>
<!--phần footer-->
<footer>
		<div class="footer">
			<div class="grid wide">
				<div class="row">
					<div class="column l-2-4 me-4 s-6">
						<h3 class="footer__heading">Chăm sóc khách hàng</h3>
						<ul class="footer-list">
							<li class="footer-item">
								<a class="footer-item-link">Trung tâm trợ giúp</a>
							</li>
							<li class="footer-item">
								<a class="footer-item-link">TT Mail</a>
							</li>
							<li class="footer-item">
								<a class="footer-item-link">Hướng dẫn mua hàng</a>
							</li>
						</ul>
					</div>
					<div class="column l-2-4 me-4 s-6">
						<h3 class="footer__heading">Giới thiệu</h3>
						<ul class="footer-list">
							<li class="footer-item">
								<a class="footer-item-link">Giới thiệu</a>
							</li>
							<li class="footer-item">
								<a class="footer-item-link">Tuyển dụng</a>
							</li>
							<li class="footer-item">
								<a class="footer-item-link">Điều khoản</a>
							</li>
						</ul>
					</div>
					<div class="column l-2-4 me-4 s-6">
						<h3 class="footer__heading">Tiêu chí</h3>
						<ul class="footer-list">
							<li class="footer-item">
								<a  class="footer-item-link">Chất lượng</a>
							</li>
							<li class="footer-item">
								<a  class="footer-item-link">Giá tốt nhất</a>
							</li>
							<li class="footer-item">
								<a  class="footer-item-link">Tất cả vì khách hàng</a>
							</li>
						</ul>
					</div>
					<div class="column l-2-4 me-4 s-6">
						<h3 class="footer__heading">Theo dõi</h3>
						<ul class="footer-list">
							<li class="footer-item">
								<a  class="footer-item-link">
									<i class="fab fa-facebook"></i>
									Facebook
								</a>
							</li>
							<li class="footer-item">
								<a class="footer-item-link">
									<i class="fab fa-instagram"></i>
									Instagram
								</a>
							</li>
						</ul>
					</div>
					<div class="column l-2-4 me-4 s-6">
                  <h3 class="footer__heading">Vào cửa hàng trên ứng dụng</h3>
                  <div class="footer__dowload">
                     <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/5b6e787c2e5ee052.png" width="80" height="60" alt="Dowload QR" class="footer__dowload-qr">
                     <div class="footer__dowload-apps">
                        <a class="footer__dowload-app-link">
                           <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/1fddd5ee3e2ead84.png" width="70" height="30"alt="Google play" class="footer__dowload-app-img">
                           </a>
                        <a class="footer__dowload-app-link">
                           <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/135555214a82d8e1.png" width="70" height="30" alt="App Store" class="footer__dowload-app-img">
                        </a>
                     </div>
                  </div>
               </div>
				</div>
			</div>
			<div class="footer__bottom">
				<div class="grid wide">
					<p>© 2024 - Bản quyền thuộc về 4 GIRLS</p>
				</div>
			</div>
		</div>
</footer>
</body>

</html>