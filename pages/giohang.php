<?php
session_start();
//Cập nhật số lượng sp
if(isset($_POST['submit'])){
 // Lấy tổng số tiền từ form
	$total = $_POST["total"];//từ $_SESSION['total']
	// Duyệt qua các số lượng sản phẩm được gửi từ form
   foreach($_POST['qty'] as $key=>$value){
	   // Kiểm tra nếu số lượng là 0 và là số
		if( ($value == 0) and (is_numeric($value))){
			// Xóa sản phẩm  khỏi giỏ hàng
			unset ($_SESSION['cart'][$key]);
		}
		// Kiểm tra nếu số lượng lớn hơn 0 và là số
		else if(($value > 0) and (is_numeric($value))){
			// Cập nhật số lượng của sản phẩm trong giỏ hàng
			$_SESSION['cart'][$key]=$value;
		}
   }
   // Chuyển hướng về trang giỏ hàng
   header("location:../pages/giohang.php");
}
?>
<html>
<head>
<title>4 GIRLS| Giỏ hàng</title>
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
<!--phần cái thanh-->
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
<?php
// Đảo ngược mảng để sản phẩm mới nhất được hiển thị đầu tiên
		// Khởi tạo biến tổng số tiền
	$total=0;
	// Kiểm tra giỏ hàng có sản phẩm không
	$ok=0;
	if(isset($_SESSION['cart'])){
		foreach($_SESSION['cart'] as $k => $v){
			if(isset($k)){
				$ok=1;
			}
		}
	}
	if($ok == 1){
		// sản phẩm có trong giỏ hàng
		echo "<form action='../pages/giohang.php' method='post'>";
			// Lặp qua các sản phẩm trong giỏ hàng
			foreach($_SESSION['cart'] as $key=>$value){//trong sesion cart chứa key : sản phẩm, value: số lượng
				$item[]=$key;
			}
			$str=implode(",",$item);//1 chuỗi được phân tách bằng , chứa tất cả các mã sp id
			// Kết nối cơ sở dữ liệu
			$conn = mysqli_connect("localhost", "root", "", "ql_banhang");
			$sql ="SELECT * from sanpham where id in ($str)";
			$query=mysqli_query($conn,$sql);
			 // Bắt đầu bảng hiển thị giỏ hàng
			echo'<div class="container">
			<table id="cart" class="table table-hover table-condensed">
			<thead>
			<tr>
				<th style="width:45%">Sản phẩm</th>
				<th style="width:15%">Giá</th>
				<th style="width:8%">Số lượng</th>
			</tr>
			</thead> ';
			// Lặp qua kết quả truy vấn và hiển thị thông tin của từng sản phẩm
			while($row=mysqli_fetch_array($query)){
				echo '
						<tbody>
						<tr>
						<td data-th="Product">
							<div class="row" >
							<!-- Phần này để hiển thị hình ảnh sản phẩm -->
							<div class="col-sm-2 hidden-xs"><img src="../'.$row['hinhanh'].'" alt="Sản phẩm 1" class="img-responsive" width="100" style="float: flex; margin-right: 12px;">
							</div>
							<!-- Phần này để hiển thị tên sản phẩm -->
							<div class="col-sm-10" style="font-family: Arial; font-size: 10px; margin-top: 8px; margin-left: 10px" >
								<h4 style="font-family: Arial; font-size: 15px; margin-right: 12px; display: inline-block; width: 328px; position: relative;">'.$row['tensp'].'</h4>
							</div>
							</div>
						</td>
						<!-- Phần này để hiển thị giá sản phẩm, được định dạng theo số thập phân với dấu phẩy -->
						<td data-th="Gia">'.number_format($row['giasp'],3).' vnđ</td>
						<!-- Phần này để hiển thị và cho phép người dùng chỉnh sửa số lượng sản phẩm trong giỏ hàng -->
						<td data-th="So luong">
						<input class="form-control text-center" type="number" name="qty['.$row['id'].']" value="'.$_SESSION['cart'][$row['id']].'">
						</td>
						<!-- Phần này để hiển thị nút xóa sản phẩm theo idsp trong giỏ hàng -->
						<td class="actions" data-th="Xoa">
							<a class="" href="../pages/delcart.php?productid='.$row['id'].'"> <img src="../img/thungrac.jpg" width="45px" height="38px"> </a>
						</td>
						</tr>
						</tbody>
						';
				// Tính tổng số tiền
				$total += $_SESSION['cart'][$row['id']]*($row['giasp']);
				$_SESSION['total']= $total;
			}
		?>
					<?php
					        // Kết thúc bảng hiển thị giỏ hàng
							echo '
							<tfoot>
							<tr>
							<td><a href="../index.php" class="btn btn-warning">Mua tiếp</a></td>
							<td colspan="2" class="hidden-xs"> </td>
							<td class="hidden-xs text-center"><strong>Tổng tiền: '.number_format($total,3). ' vnđ</strong></td>
							<td><a href="../pages/thanhtoan.php" class="btn btn-success btn-block">Thanh toán</a></td>
						</tr>
						</tfoot>
						</table>
						</div>
							';
					?>
			<?php
							// Nút cập nhật giỏ hàng và nút xóa giỏ hàng
							echo "<div class='pro' style='text-align: center;'>";
							echo " <b>
										<div  style='margin-bottom: 15px'>
										<img src='../img/reload.png' width='17px'  height='17px'>
										<input type='submit' name='submit' value='Cập nhật giỏ hàng'>
										</div>
										<div style='margin-bottom: 15px'>
										<a href='../pages/delcart.php?productid=0'><img src='../img/thungrac.jpg' width='25px' height='17px' >Xóa bỏ giỏ hàng</a>
										</div>
									</b>";
							echo "</div>";
	}
	else
	{		// Nếu không có sản phẩm trong giỏ hàng
			echo "<div class='pro' style='text-align: center; margin-top:40px; margin-bottom:206px'>";
			echo "<p>
						Không có sản phẩm trong giỏ hàng <br/>
						<a href='../index.php'>
							<img src='../img/giohang.png' width='40px' height='40px'>
							Vào trang mua sắm
						</a>
					</p>";
			echo "</div>";
	}
					?>
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
                           <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/135555214a82d8e1.png" width="70" height="30"alt="App Store" class="footer__dowload-app-img">
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