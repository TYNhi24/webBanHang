<?php
session_start();
?>
<html>
<head>
	<title>4 GIRLS | Hóa đơn</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/grid.css">
	<link rel="stylesheet" type="text/css" href="./css/responsive.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<form action="timkiem.php" method="POST">
	<div class="app">
		<div class="header">
			<div class="grid wide">
				<div class="header-main">
					<div class="logo">
					<a href="./index.php"><img src="https://i.pinimg.com/736x/f5/f2/70/f5f270d9ddd51a81d705852a88c9e537.jpg" width="150" height="120"></a>
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
	</div>
</form>
<!--Phan giua-->
<!--phan cai thanh-->
	<div class="navigation-bar">
		<ul class="navbar-list">
			<li class="navbar-item"><a href="index.php" class="navbar-link">Trang chủ</a></li>
			<li class="navbar-item"><a href="./pages/gioithieu.php" class="navbar-link">Giới thiệu</a></li>
		</ul>
		<ul class="navbar-list">
			<li class="navbar-item"><a href="./pages/giohang.php" class="navbar-link">Giỏ hàng</a></li>
			<li class="navbar-item"><a href="./taikhoan.php" class="navbar-link">Tài khoản</a></li>
			<li class="navbar-item"><a href="./pages/dangxuat.php" class="navbar-link">Đăng xuất</a></li>
		</ul>
	</div>
<!-- BÊN DƯỚI LÀ sản phẩm -->
				<div class="product-detail-decribe"  style="text-align: center; margin-bottom:130px" >
					<div class="product-detail-describe__detail">
<div class="page">
<table class="layout display responsive-table">
	<head>
	<tr>
		<th>STT</th>
		<th>Tổng tiền</th>
		<th >Trạng thái</th>
		<th >Ngày mua</th>
		<th >Địa chỉ</th>
	</tr>
	</head>
	<body>
	<?php
		$stt = 1;
		// Lấy iduser từ tham số GET trên URL
		$iduser = $_GET['id'];
		$conn = mysqli_connect("localhost", "root", "", "ql_banhang");
		if (!$conn) {
			die("Kết nối thất bại: " . mysqli_connect_error());
		}
		// lấy tất cả các đơn hàng của người dùng có iduser tương ứng
		$sql = "SELECT * FROM donhang WHERE iduser = " . $iduser;
		$ketqua = mysqli_query($conn, $sql);
		// Kiểm tra xem truy vấn có trả về kết quả hay không
		if (mysqli_num_rows($ketqua) > 0) {
			// Duyệt qua từng dòng kết quả trả về từ truy vấn
			while ($row = mysqli_fetch_assoc($ketqua)) {
				// Hiển thị mỗi dòng dữ liệu trong một hàng
				echo "<tr>";
				echo "<td>" . $stt . "</td>"; // số thứ tự
				echo "<td>" . number_format($row['tongtien'], 3) . " vnđ</td>"; // tổng tiền
				echo "<td>" . $row['trangthai'] . "</td>"; // trạng thái đơn hàng
				echo "<td>" . $row['ngaymua'] . "</td>"; //  ngày mua
				echo "<td>" . $row['diachi'] . "</td>"; // địa chỉ
				echo "</tr>";
				// Tăng số thứ tự lên 1
				$stt++;
			}
		}
		// Đóng kết nối cơ sở dữ liệu
		mysqli_close($conn);
	?>
	</body>
</table>
</div>
</div>
</div>
</body>
<!-- BÊN trên LÀ sản phẩm -->
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
</html>