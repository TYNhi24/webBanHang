<?php
session_start();
   $id = $_GET['id'];

   $conn =	mysqli_connect("localhost", "root", "", "ql_banhang");
   $sql= "SELECT * FROM sanpham where id = $id";
   $ketqua = mysqli_query($conn, $sql);
?>
<html>
<head>
	<title>4 GIRLS | Sản phẩm</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/grid.css">
	<link rel="stylesheet" type="text/css" href="../css/responsive.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<body>
<form action="../timkiem.php" method="POST">
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
			<li class="navbar-item"><a href="../index.php" class="navbar-link">Trang chủ</a></li>
			<li class="navbar-item"><a href="../pages/gioithieu.php" class="navbar-link">Giới thiệu</a></li>
		</ul>
		<ul class="navbar-list">
			<li class="navbar-item"><a href="../pages/giohang.php" class="navbar-link">Giỏ hàng</a></li>
			<li class="navbar-item"><a href="../taikhoan.php" class="navbar-link">Tài khoản</a></li>
			<li class="navbar-item"><a href="../pages/dangxuat.php" class="navbar-link">Đăng xuất</a></li>
		</ul>
	</div>
<!--phan sản phẩm-->
<?php
   $row=mysqli_fetch_array($ketqua);
		echo '<div class="product-detail">
			<div class="grid wide">
				<div class="prodoct-detail-info">
					<div class="grid__column-left">
						<div class="product-detail-item-img">
							<div class="product-detail-item-img-general product-detail-item-img-1" id="img-1" style="background-image: url(../'.$row['hinhanh'].' );"></div>
						</div>
					</div>
					<div class="grid__column-right">
						<div class="product-detail-title">
							<div class="product-detail-favorite">
								Yêu thích
							</div>
                        '.$row['tensp'].'
							<span class="product-detail-label"></span>
						</div>
						<div class="product-detail-appreciate">
							<div class="product-detail-appreciate__space product-detail-appreciate__rating">
								<span style="text-decoration: underline;">4.9</span>
								<i class="home-product-item__star-gold fas fa-star"></i>
								<i class="home-product-item__star-gold fas fa-star"></i>
								<i class="home-product-item__star-gold fas fa-star"></i>
								<i class="home-product-item__star-gold fas fa-star"></i>
								<i class="home-product-item__star-gold fas fa-star"></i>
							</div>
							<div class="product-detail-appreciate__space product-detail-appreciate__appre">
								<span>1k</span>
								<div class="product-detail-label-lb">Đánh giá</div>
							</div>
							<div class="product-detail-appreciate__space product-detail-appreciate__sold">
								<span>2,6k</span>
								<div class="product-detail-label-lb">Đã bán</div>
							</div>
						</div>
						<div class="product-detail-ship">
							<label class="product-detail-label-lb" style="width: 110px;">Giá sản phẩm</label>
							<div class="home-product-item__price-old">'.number_format($row['giasp'],3).' vnđ</div>	
						</div>

						<div class="product-detail-ship">
							<label class="product-detail-label-lb" style="width: 110px;">Vận chuyển</label>
							<div class="product-detail-ship-content">
								<div class="product-detail-ship-content-free">
									<img src="../img/freeship.png" height="15" width="25">
									<span style="margin-left: 5px;">Miễn phí vận chuyển</span>
								</div>
							</div>
						</div>

						<div class="product-detail-color">
							<div class="product-detail-label-lb product-detail-label-lb-width">Màu sắc</div>
							<div class="product-detail-color-color">
								<input label="'.$row['mau'].'" type="radio" name="color" value="'.$row['mau'].'" checked>
							</div>
						</div>

						<div class="product-detail-size">
							<div class="product-detail-label-lb product-detail-label-lb-width">Size</div>
							<div class="product-detail-size-size">
								<input label="'.$row['size'].'" type="radio" name="size" value="'.$row['size'].'" checked>
							</div>
						</div>

						<div class="product-detail-quantity">
							<div class="product-detail-label-lb" style="width: 110px;">Số lượng</div>
							<div class="product-detail-label-lb">'.$row['soluong'].' sản phẩm có sẵn</div>
						</div>

						<div class="product-detail-shopping">
						<a href="../pages/addcart.php?item='.$row['id'].'">
								<button class="product-detail-shopping-addtocart-btn" data-toggle="modal" data-target="#dialog1">
									<i class="fas fa-cart-plus"></i>
									Thêm vào giỏ hàng
								</button>
						</a>
						</div>
					</div>
				</div>';
?>

<!--phan chi tiet san pham-->
	<div class="product-detail-decribe">
		<div class="product-detail-describe__detail">
			<h3 class="product-detail-decribe-heading">CHI TIẾT SẢN PHẨM</h3>
				<div class="product-detail-describe__detail-content">
					<div class="product-detail-describe__detail-content-row">
						<label class="product-detail-describe-label">Thương hiệu</label>
							<div class="product-detail-describe__detail-content-column">4 GIRLS</div>
					</div>
					<div class="product-detail-describe__detail-content-row">
						<label class="product-detail-describe-label">Hình dáng</label>
							<div class="product-detail-describe__detail-content-column">Đẹp, phù hợp với nhiều lứa tuổi</div>
					</div>
					<div class="product-detail-describe__detail-content-row">
						<label class="product-detail-describe-label">Kích thước</label>
							<div class="product-detail-describe__detail-content-column">Vừa</div>
					</div>
					<div class="product-detail-describe__detail-content-row">
						<label class="product-detail-describe-label">Họa tiết</label>
							<div class="product-detail-describe__detail-content-column">Bắt mắt, phù hợp với nhiều đồ thời trang</div>
					</div>
					<div class="product-detail-describe__detail-content-row">
						<label class="product-detail-describe-label">Phong cách</label>
							<div class="product-detail-describe__detail-content-column">Hiện đại </div>
					</div>
					<div class="product-detail-describe__detail-content-row">
						<label class="product-detail-describe-label">Loại </label>
							<div class="product-detail-describe__detail-content-column">Công sở, Đi học, Hẹn hò</div>
					</div>
					<div class="product-detail-describe__detail-content-row">
						<label class="product-detail-describe-label">Chất liệu</label>
							<div class="product-detail-describe__detail-content-column">Vải tốt</div>
					</div>
					<div class="product-detail-describe__detail-content-row">
						<label class="product-detail-describe-label">Xuất xứ</label>
							<div class="product-detail-describe__detail-content-column">Mỹ</div>
					</div>
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