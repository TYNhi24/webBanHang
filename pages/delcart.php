<?php
    // Bắt đầu hoặc tiếp tục phiên làm việc với session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Cart</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php
    // Lấy giỏ hàng từ session
    $cart = $_SESSION['cart'];
    // Lấy ID của sản phẩm cần xóa từ tham số GET trong URL giohang.php
    $id = $_GET['productid'];
    // Kiểm tra nếu ID sản phẩm là 0 (tức là yêu cầu xóa toàn bộ giỏ hàng)
    if ($id == 0) {
        // Xóa toàn bộ giỏ hàng bằng cách unset session 'cart'
        unset($_SESSION['cart']);
    } else {
        // xóa sản phẩm có ID tương ứng
        unset($_SESSION['cart'][$id]);
    }
    // Chuyển hướng người dùng đến trang giỏ hàng sau khi xóa sản phẩm và dừng việc thực thi mã PHP
    header("location:../pages/giohang.php");
    exit();
?>
</body>
</html>
