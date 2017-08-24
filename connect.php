
<?php
 $db = array(
        'server' => 'localhost',
        'username'=> 'root',
        'password' => '',
        'dbname' => 'login'
    );
    //connection mysql
    $conn = mysqli_connect($db['server'],$db['username'],$db['password'],$db['dbname']);
    if(!$conn) {
        die('loss connection' .mysqli_connect_errno($conn));
    }
    
?>