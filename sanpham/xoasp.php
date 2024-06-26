<?php
	session_start();
	//lấy giá trị tham số của 'id', đc truyền qua pt GET và lưu trữ trong biến 'id'
	$id = $_GET['id'];
	$conn =	mysqli_connect("localhost", "root", "", "ql_banhang");
	//tạo câu lệnh sql xóa một bản ghi từ bảng "sanpham" có trường id bằng giá trị biến id
	$sql= "DELETE FROM sanpham where id=$id ";
	$ketqua = mysqli_query($conn, $sql);
	//chuyẻne hướng đến trang quanlysp
	header("location: ../sanpham/quanlysp.php");
?>
