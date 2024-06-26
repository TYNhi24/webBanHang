<?php 
    session_start();
    if (isset($_SESSION['username'])) {
        unset($_SESSION['username']);
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng xuất</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; text-align: center;">
    <div>
        <p>Bạn đã đăng xuất thành công.</p>
        <a href="../main1.php"><input type="button" value="Đăng nhập"></a>
    </div>
</body>
</html>