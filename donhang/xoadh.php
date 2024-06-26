<?php
		session_start();// Bắt đầu phiên làm việc với session
		$id = $_GET['id'];// Lấy ID của đơn hàng từ URL
		$conn =	mysqli_connect("localhost", "root", "", "ql_banhang");// Kết nối đến cơ sở dữ liệu
		$sql= "DELETE FROM donhang where id=$id ";// Tạo câu truy vấn SQL để xóa đơn hàng có ID tương ứng
		$ketqua = mysqli_query($conn, $sql);// Thực thi truy vấn
		header("location: ../donhang/quanlydh.php");// Chuyển hướng người dùng đến trang quản lý đơn hàng sau khi xóa thành công
?>
