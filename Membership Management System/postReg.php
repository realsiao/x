<?php
header("Content-Type:text/html;charset=utf-8");
//$_GET $_POST
$username = trim($_POST['username']);
$pw = trim($_POST['pw']);
$pw2 = trim($_POST['pw2']);
$sex = $_POST['sex'];

include_once "conn.php";

$sql = "CREATE TABLE IF NOT EXISTS info (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(30) NOT NULL,
    pw VARCHAR(100) NOT NULL,
    sex ENUM('男', '女') NOT NULL
);";
$conn->query($sql);

if ($sex !== '男' && $sex !== '女') {
    die('Failed. Error: 无效的性别值');
}

if (!strlen($username) || !strlen($pw)){
    echo "<script>alert('Username/Password Error!');history.back();</script>";
    exit();
}

if ($pw !== $pw2){
    echo "<script>alert('Password/Confirm Error!');history.back();</script>";
    exit();  
}

$check_sql = "SELECT * FROM info WHERE username = '$username'";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows > 0) {
    echo "用户名存在";
    exit();
}

$sql = "insert into info (username, pw, sex) values ('$username', '".md5($pw)."', '$sex')";

$result = $conn->query($sql);
if($result){
    echo "Success";
}
else{
    echo "Failed. Error: ". $conn->error;
}

$conn->close();
?>