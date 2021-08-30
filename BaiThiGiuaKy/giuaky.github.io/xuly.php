<?php
//Khai báo sử dụng session
session_start();
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
if (isset($_POST['dangnhap']))
{
//Kết nối tới database
include('connect.php');
  
//Lấy dữ liệu nhập vào
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
  
//Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
if (!$username || !$password) {
echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. ";
exit;
}
  
// // mã hóa pasword
// $password = md5($password);
  
//Kiểm tra tên đăng nhập có tồn tại không
$query = "SELECT name_user, pass_user FROM user WHERE name_user='$username'";

$result = mysqli_query($connect, $query) or die( mysqli_error($connect));

if (!$result) {
echo "Tên đăng nhập hoặc mật khẩu không đúng!";
} else {
echo "<a href='quantri.php'/>";
}
  
//Lấy mật khẩu trong database ra
$row = mysqli_fetch_array($result);
  
//So sánh 2 mật khẩu có trùng khớp hay không
if ($password != $row['pass_user']) {
echo "Mật khẩu không đúng. Vui lòng nhập lại. ";
exit;
}
  
//Lưu tên đăng nhập
$_SESSION['username'] = $username;
    header("Location: quantri.php");
    die();
    $connect->close();
}
?>