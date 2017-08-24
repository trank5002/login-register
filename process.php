<?php 
    session_start();
    // kt xem ng dung da dang nhap hay chua, neu chua chuyen ve man hinh login
    if(!isset($_SESSION['username'])) {
        header('Location:login.php');
    }else {
        echo 'Click vào đây để <a href="logout.php">Logout</a>';
    }
?>
<html>
<head>
	<title>trang chủ</title>
	<meta charset="utf-8">
</head>
<body>
	Chúc mừng bạn có username là <?php echo $_SESSION['username'];  ?> đã đăng nhập thành công !
	 
</body>
</html>