<?php
session_start();
$username = trim($_POST['username']);
$pw = md5(trim($_POST['pw']));

if (!strlen($username) || !strlen($pw)){
    echo "<script>alert('Username/Password Error!');history.back();</script>";
    exit();
}

include_once "conn.php";

$sql = "select * from info where username = '$username' and pw = '$pw' ";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num){
    $_SESSION['loggedUsername'] = $username;
   echo "登录成功"; 
}
else{
    unset($_SESSION['loggedUsername']);
    echo "登录失败，用户名或密码错误";
    exit();
}
?>