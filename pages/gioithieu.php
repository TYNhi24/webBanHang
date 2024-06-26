<?php
session_start();
?>
<html>
<head>
	<title>4 GIRLS | Giới thiệu</title>
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
<!-- BÊN DƯỚI LÀ sản phẩm -->
		<style>
      .h3{
            text-align: center;
            color: black;
				margin-top: 20px;
      }
      .h4{
            color: blue;
      }
      .img1{
            display: block; 
            margin-left: auto; 
            margin-right: auto;
            width: 500;
            height: 500;
      }
      .img2{
            display: block; 
            margin-left: auto; 
            margin-right: auto;
            width: 500;
            height: 500;
      }
      </style>
			<div class="grid wide">
               <h3 class="h3">Cửa hàng quần áo 4GIRLS</h3><br>
               <h4 class="h4">Website ra đời</h4>
               <p>
                  Shop 4 GIRLS ra đời dựa trên niềm yêu thích thời trang của chủ shop bởi vẻ đẹp mê hoặc của các mẫu quần áo thời thượng này! <br>
               </p>
               <img class="img1" src="https://noithatqg.com/wp-content/uploads/2021/04/gia-treo-quan-ao.gif" alt=""><br>
               <p>Phần trở ngại lớn ở đây là giá tiền của những bộ quần áo chính hãng thì quá cao so với đa phần các 
                  bạn trẻ, vì thế mình đã tạo ra 4 GIRLS để nhằm đưa đến cho các bạn có niềm yêu thích những bộ 
                  trang phục cá tính này với một mức giá hấp dẫn kèm với chất lượng tốt nhất trong tầm giá. <br>
                  Với tiêu chí mức giá hợp lý nhưng chất lượng lại tốt hơn so với những gì các bạn lại bỏ ra, 
                  4 GIRLS hứa sẽ luôn luôn đưa đến chân của bạn chất lượng đồ đảm bảo tốt nhất.
               </p>
               <h4 class="h4">Tiêu chí bán hàng</h4>
               <p>Tiêu chí bán hàng tại 4 GIRLS đó là làm hài lòng khách hàng tối đa!</p>
               <ul>
                  <li>Chăm sóc khách hàng tốt.</li>
                  <li>Giá cả hợp túi tiền.</li>
                  <li>Hỗ trợ sau khi khách hàng đã mua hàng.</li>
                  <li>Giao hàng nhanh chóng.</li>
               </ul>
               <h4 class="h4">Sản phẩm</h4>
               <p>Tất cả sản phẩm quần áo tại 4 GIRLS là những mẫu đều được dựa trên nguyên bản gốc của các hãng đồ hiệu.
               </p>
               <img class="img2" src="../img/12.jpg" alt=""><br>
               <img class="img2" src="../img/9.jpg" alt=""><br>
               <img class="img2" src="../img/15.jpg" alt=""><br>
               <p>
                  Về phần vải được làm bằng chất liệu cùng với chất liệu hàng chính hãng, bền, và
                  thoải mái cho người mặc. Với chất lượng gia công tốt, hoàn thiện chuẩn với hàng chính hãng nhằm
                  giúp cho bạn thỏa đam mê thời trang.
               </p>
               <p>
                  Độ bền của sản phẩm luôn được đảm bảo từ 3 – 5 tháng, thông tin được chính mình trải nghiệm và
                  nhiều khách hàng sở hữu bộ quần áo của shop gửi về cho mình.
               </p>
               <p>
                  Chính vì thế mà 4 GIRLS muốn được là người đưa đến cho các bạn nhiều mẫu mới được ưa chuộng trên thế giới.
               </p>
			</div>
		</div>
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
</body>

</html>