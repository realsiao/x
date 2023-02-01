<?
$servername = "localhost";
$dusername = "member";
$dpassword = "8P6mk3teakbAzYp3";
$dbname = "member"; 
 
// 创建连接
$conn = new mysqli($servername, $dusername, $dpassword, $dbname);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
?>