<?php
session_start();
if (!isset($_SESSION['username'])) {
   header('Location: ./pages/dangnhap.php');
   exit();
}
?>
<html>
<head>
	<title>4 GIRLS | Trang chủ</title>
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
<!--phan trang hình lớn-->
<div class="carousel-inner">
   <div class="carousel-item active">
    	<img class="d-block w-100 h-50 " src="img/anhnen.jpg" width="500 px" height="200 px" alt="First slide">
   </div>
	</div>
</div>
<!--thanh dung danh muc-->
<div class="container">
	<div class="grid wide">
		<div class="row sm-gutter grid-content">
			<div class="column l-2 me-0 s-0">
				<nav class="category">
					<h3 class="category-heading">
						<i class="category-heading-icon fas fa-bars"></i>
						Danh mục
					</h3>
					<ul class="category-list">
						<li class="category-item category-item--active">
							<?php
								$conn = mysqli_connect("localhost", "root", "", "ql_banhang");
								$sql = "SELECT * From danhmuc";
								$ketqua = mysqli_query($conn,$sql);
								while($row=mysqli_fetch_array($ketqua)){
									echo '<a href="danhmuc.php?iddanhmuc= '.$row['id'].'" class="category-item__link">'.$row['tendanhmuc'].'</a>';
								}
							?>
						</li>
					</ul>
				</nav>
			</div>
		<?php
			$conn = mysqli_connect('localhost', 'root', '', 'ql_banhang');
			$result = mysqli_query($conn, 'select count(id) as total from sanpham');//đếm số sp và gán kết quả cho total.
			$row = mysqli_fetch_assoc($result);//Lấy dữ liệu từ kết quả
			$total_records = $row['total'];//Gán giá trị vào biến $total_records chứa tổng số sản phẩm
        	// TÌM LIMIT VÀ CURRENT_PAGE
			$current_page = isset($_GET['page']) ? $_GET['page'] : 1;//lưu trữ giá trị của trang hiện tại.Nếu tham số page không tồn tại, giá trị mặc định 1 
			$limit = 10;//số sp hiển thị trên mỗi trang
        // TÍNH TOÁN TOTAL_PAGE VÀ START
			$total_page = ceil($total_records / $limit);//tính tổng số trang để hiển thị tất cả sp
		  //ceil():Hàm này lấy kết quả của phép chia và làm tròn nó lên số nguyên gần nhất.
        // Giới hạn current_page trong khoảng 1 đến total_page
			if ($current_page > $total_page){
            $current_page = $total_page;
			}
			else if ($current_page < 1){
            $current_page = 1;
			}
        // Tìm Start (vị trí sp đầu tiên, được tính toán dựa trên trang hiện tại và số bản ghi mỗi trang)
        $start = ($current_page - 1) * $limit;
			//Truy vấn để lấy sp cho trang hiện tại, sắp xếp theo id giảm dần(sp gần đây nhất)
		  $result = mysqli_query($conn, "SELECT * FROM sanpham ORDER BY id DESC  LIMIT $start, $limit");
      ?>

<!-- BÊN DƯỚI LÀ sản phẩm -->
<div class="column l-10 me-12 s-12">
<div class="home-filter"></div>
	<div class="home-product">
	<div class="row sm-gutter">
			<?php
				while($row=mysqli_fetch_assoc($result)){
					if ($row['soluong'] >0  ){
						echo '<div class="column l-2-4 me-4 s-6">
								<a class="home-product-item" href="./pages/sanpham.php?id=' . $row['id'] . '">
									<div class="home-product-item__img" style="background-image:url(' . $row['hinhanh'] . ')"></div>
										<h4 class="home-product-item__name">' . $row['tensp'] . '</h4>
									<div class="home-product-item__price">
										<div class=" "> Giá ' . number_format($row['giasp'], 3) . ' vnđ</div>
									</div>
									<div class="home-product-item__action">
										<div class="home-product-item__sold">Số lượng: ' . $row['soluong'] . '</div>
									</div>
								</a>
							</div>';
					}
					else {
						echo'<div class="column l-2-4 me-4 s-6" >
								<a class="home-product-item" href="./pages/sanpham.php?id= '.$row['id'].'">
									<div class="home-product-item__img" style="background-image:url('.$row['hinhanh'] .')"></div>
										<h4 class="home-product-item__name">'.$row['tensp'].'</h4>
									<div class="home-product-item__price">
										<div class=" "> Giá '.number_format($row['giasp'],3).' vnđ</div>
									</div>
									<div class="home-product-item__action">
										<span class="home-product-item__sold">Số lượng: 0</span>
									</div>
								</a>
							</div>';
					}
				}
			?>
	</div>
</div>
<!-- BÊN trên LÀ sản phẩm -->
		<div class="pagination">
			<?php
				// PHẦN HIỂN THỊ PHÂN TRANG
				// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
				if ($current_page > 1 && $total_page > 1){
					echo '<a href="./index.php?page='.($current_page-1).'"> <font size="6px">
						<i class="page-control-icon fas fa-angle-left"></i></font> </a>  ';
				}
				//Hiển thị các số trang: Lặp qua tất cả các trang từ 1 đến $total_page và hiển thị số trang.
				for ($i = 1; $i <= $total_page; $i++){
					// Nếu là trang hiện tại thì hiển thị thẻ span
						if ($i == $current_page){
							echo '<span><font size="6px">'.$i.'</font></span>';
						}
						//ngược lại dùng thẻ <a> để tạo liên kết
						else{
							echo '<a href="./index.php?page=  '.$i.'  "><font size="6px">'.$i.'</font></a> | ';
						}
				}
				//Nếu trang hiện tại nhỏ hơn tổng số trang và tổng số trang lớn hơn 1, thì hiển thị nút "Next" để chuyển đến trang sau
				if ($current_page < $total_page && $total_page > 1){
					echo '<a href="./index.php?page='.($current_page+1).'">  <font size="6px">
					<i class="page-control-icon fas fa-angle-right"></i></font></a>';
				}
			?>
		</div>
	</div>
	</div>
	</div>
</div>
</body>
<!--Phần footer-->
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