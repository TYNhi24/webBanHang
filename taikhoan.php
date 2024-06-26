<?php
session_start();
if (!isset($_SESSION['username'])) {
   header('Location: ./pages/dangnhap.php');
	exit();
}
?>
<html>
<head>
	<title>4 GIRLS | Tài khoản</title>
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
<div class="product-detail-decribe" >
	<div class="product-detail-describe__detail">
		<div class="page">
		<table class="layout display responsive-table">
		<img class="anh" src="./img/username.png" alt="">
		<thead>
		<tr>
			<th>Tên tài khoản</th>
			<th >Họ và tên</th>
			<th >Số điện thoại</th>
			<th >Địa chỉ</th>
			<th> Email</th>
			<th>Hóa đơn</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
			<?php
					echo "<tr>";
					echo "<td>".$_SESSION['username']."</td>";
					echo "<td >".$_SESSION['hoten']."</td>";
					echo "<td >0".$_SESSION['sdt']."</td>";
					echo "<td> ".$_SESSION['diachi']."</td><hr width='40%'>";
					echo "<td>".$_SESSION['email']."</td>";
					echo "<td>" . ($_SESSION['username'] != 'admin' ? '<a href="./hoadon.php?id='.$_SESSION['id'].'">Hóa đơn</a>' : '') . "</td>";
					echo '<td><a href=" ./pages/doimk.php?id= '.$_SESSION['id'].'">Đổi mật khẩu</a></td>';
					echo "</tr>";
			?>
		</tbody>
		</table>
		</div>
		<div >
			<style>
					.admin{
						text-align: center;
						font-size: 20px;
						color: #2c2c2c;
						font-weight: bold;
						margin-bottom: 30px;
					}
			</style>
			<?php
				if ($_SESSION['username'] == 'admin'): ?>
					<a href="admin.php" class="footer-item-link admin" id="btn">Chủ Shop</a>
			<?php endif; ?>
			</div>
	</div>
</div>
</body>
<!-- BÊN trên LÀ sản phẩm -->
<footer>
	<div class="footer" style="margin-top: 55px;">
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
								<img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/1fddd5ee3e2ead84.png"width="70" height="30" alt="Google play" class="footer__dowload-app-img">
								</a>
							<a class="footer__dowload-app-link">
								<img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/135555214a82d8e1.png"width="70" height="30" alt="App Store" class="footer__dowload-app-img">
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