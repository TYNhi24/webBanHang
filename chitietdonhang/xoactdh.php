<?php
	session_start();// Bắt đầu một phiên làm việc với session
	$id = $_GET['id'];// Lấy ID của chi tiết đơn hàng từ URL
	$conn =	mysqli_connect("localhost", "root", "", "ql_banhang"); // Kết nối đến cơ sở dữ liệu
	$sql= "DELETE FROM chitietdonhang where id=$id ";// Tạo câu truy vấn SQL để xóa chi tiết đơn hàng có ID tương ứng
	$ketqua = mysqli_query($conn, $sql);// Thực thi truy vấn
	header("location: ../chitietdonhang/quanlyctdh.php");// Chuyển hướng người dùng đến trang quản lý chi tiết đơn hàng sau khi xóa thành công
?>
