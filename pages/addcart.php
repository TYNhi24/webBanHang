<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
</head>
<body>
<?php
    // Kết nối đến cơ sở dữ liệu MySQL
    $conn = mysqli_connect("localhost", "root", "", "ql_banhang");
    // Kiểm tra kết nối
    if (!$conn) {
        die("Ket noi that bai: " . mysqli_connect_error());
    }
    // Truy vấn để lấy thông tin sản phẩm từ bảng "sanpham"
    $sql = "SELECT * FROM sanpham";
    $query = mysqli_query($conn, $sql);
    // Lấy ID của sản phẩm được truyền qua tham số GET từ URL
    $id = $_GET['item'];
    // Kiểm tra xem sản phẩm đã được thêm vào giỏ hàng trước đó chưa
    if(isset($_SESSION['cart'][$id])) {//tạo 1 session cart thêm id(item)vào
        // Nếu đã tồn tại, tăng số lượng sản phẩm lên 1
        $qty = $_SESSION['cart'][$id] + 1;
    } else {
        // Nếu chưa tồn tại, thiết lập số lượng sản phẩm là 1
        $qty = 1;
    }
    // Lưu số lượng sản phẩm vào session
    $_SESSION['cart'][$id] = $qty;

    // Chuyển hướng người dùng đến trang giỏ hàng
    header("location:../pages/giohang.php");
    // Dừng việc thực thi mã PHP
    exit();
?>
</body>
</html>
