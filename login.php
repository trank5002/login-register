<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="${encoding}">
<title>Insert title here</title>
</head>
<body>
<?php 
    // connection database
    require_once 'connect.php';
    
    //get data from database 
    if(isset($_POST['btn_submit'])) {
        // lay user and pass
        $user = $_POST['username'];
        $pass = $_POST['password'];
        // format lai thong tin user and passs
        $user = strip_tags($user);
        $pass = strip_tags($pass);
        $user = addslashes($user);
        $pass = addslashes($pass);
        //neu khong dien thong tin
        if($user == "" || $pass == "") {
            echo "UserName or Password not empty.";
        }else {
            $sql = "SELECT * FROM member WHERE username = '$user' AND password = '$pass'";
            $query = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($query);
            if($num_rows == 0) {
                echo "UserName or Password is not correct.Please login again";
            }else {
                // save in session
                $_SESSION['username'] = $user;
                header('Location: process.php');
            }
        }
    }

?>
	<form method="POST" action="login.php">
	<fieldset>
	    <legend>Đăng nhập</legend>
	    	<table>
	    		<tr>
	    			<td>Username</td>
	    			<td><input type="text" name="username" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="password" name="password" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input type="submit" name="btn_submit" value="Đăng nhập">
	    			 <a href='dangky.php' title='Đăng ký'>Đăng ký</a></td>
	    		</tr>
	    	</table>
  </fieldset>
  </form>
</body>
</html>