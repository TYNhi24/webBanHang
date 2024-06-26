<?php
session_start();
?>
<html>
<head>
	<title>4 GIRLS | Quản lí đơn hàng</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/grid.css">
	<link rel="stylesheet" type="text/css" href="../css/responsive.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script type="text/javascript" src="../javascript.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<form action="../timkiem.php" method="POST">
	<div class="app">
		<div class="header">
			<div class="grid wide">
				<div class="header-main">
					<div class="logo">
					<a href="../index.php"><img src="https://i.pinimg.com/736x/f5/f2/70/f5f270d9ddd51a81d705852a88c9e537.jpg" width="150" height="120"></a>
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
				<a href="" class="header__sort-link">Đơn hàng</a>
			</li>
		</ul>
		<div class="container">
			<div class="grid wide">
				<div class="row sm-gutter grid-content">
					<div class="column l-2 me-0 s-0">
						<nav class="category">
							<h3 class="category-heading">
								<p style="text-align: center; margin-top:20px;">Quản lý đơn hàng</p> 
							</h3>
							<ul class="category-list">
								<li class="category-item category-item--active">
									<a href="../admin.php" >Quay lại </a>
								</li>
							</ul>
						</nav>
					</div>
					<div class="column l-10 me-12 s-12">
					<div class="page">
					<table class="layout display responsive-table">
					<thead>
					<tr>
						<th>STT</th>
						<th >ID đơn hàng</th>
						<th >ID User</th>
						<th >Tổng tiền</th>
						<th >Trạng thái</th>
						<th >Thời gian</th>
						<th >Địa chỉ</th>
						<th >Số điện thoại</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
					<?php
						// Kết nối tới cơ sở dữ liệu MySQL
						$conn =	mysqli_connect("localhost", "root", "", "ql_banhang");
						$sql= "SELECT * FROM donhang ";
						// Thực thi câu lệnh SQL và lưu kết quả vào biến $ketqua
						$ketqua = mysqli_query($conn, $sql);
						// Khởi tạo biến $stt để đánh số thứ tự cho các đơn hàng, bắt đầu từ 1
						$stt = 1;
						// Lặp qua các bản ghi trong kết quả truy vấn
						while ($row = mysqli_fetch_array($ketqua)) {
							// Bắt đầu một hàng mới trong bảng HTML
							echo "<tr>";
							// Hiển thị số thứ tự
							echo "<td>".$stt."</td>";
							// Hiển thị ID của đơn hàng
							echo "<td>".$row['id']."</td>";
							// Hiển thị ID của người dùng
							echo "<td>".$row['iduser']."</td>";
							// Hiển thị tổng tiền của đơn hàng, định dạng số và thêm "đ" vào cuối
								echo "<td>".number_format($row['tongtien'],3)."đ</td>";
							// Hiển thị trạng thái của đơn hàng
							echo "<td>".$row['trangthai']."</td>";
							// Hiển thị ngày mua của đơn hàng
							echo "<td>".$row['ngaymua']."</td>";
							// Hiển thị địa chỉ giao hàng
								echo "<td>".$row['diachi']."</td>";
							// Hiển thị số điện thoại của người nhận, thêm "0" vào đầu
							echo "<td>0".$row['sdt']."</td>";
							// Hiển thị nút xóa đơn hàng, liên kết tới trang "xoadh.php" với tham số id của đơn hàng
							echo '<td><a href=" xoadh.php?id= '.$row['id'].'"><img src="../img/thungrac.jpg" alt="" width="40px" height="40px"></a></td>';
							// Kết thúc hàng
							echo "</tr>";
							// Tăng biến số thứ tự lên 1
							$stt++;
						}
						// Đóng kết nối tới cơ sở dữ liệu
						mysqli_close($conn);
					?>
				</tbody>
				</table>
				</div>
</div>
</div>
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