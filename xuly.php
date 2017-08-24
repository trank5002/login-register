<?php 
    if(!isset($_POST['txtUsername'])) {
        die('');
    }
    require_once 'connect.php';
    // lay du lieu tu file dang ky
        $username = strip_tags($_POST['txtUsername']);
        $password = strip_tags($_POST['txtPassword']);
        $username = addslashes($_POST['txtUsername']);
        $password = addslashes($_POST['txtPassword']);
    // kiem tra ng dung da nhap du hay chua?
    $password = md5($password);
    if($username == "" || $password == "") {
       echo "Vui lòng nhập đầy đủ thông tin. 
           <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    // kiem tra ten dang nhap nay da co nguoi dung chua
   $sql = "SELECT username FROM member WHERE username = '$username'";
   $result = mysqli_query($conn,$sql);
   $num_rows = mysqli_num_rows($result);
   if($num_rows > 0) {
       echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác.
           <a href='javascript: history.go(-1)'>Trở lại</a>";
       exit;
   }
   // luu vao database
   
   $addmember = mysqli_query($conn,"INSERT INTO member (username,password) VALUES ('{$username}','{$password}')");
   //Thông báo quá trình lưu
   if ($addmember)
       echo "Quá trình đăng ký thành công. <a href='/'>Về trang chủ</a>";
       else
           echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='dangky.php'>Thử lại</a>";
?>