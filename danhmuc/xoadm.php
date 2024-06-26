<?php
	session_start();
	$id = $_GET['id'];
	$conn =	mysqli_connect("localhost", "root", "", "ql_banhang");
	$sql= "DELETE FROM danhmuc where id=$id ";
	$ketqua = mysqli_query($conn, $sql);
	header("location: ../danhmuc/quanlydm.php");
?>
>