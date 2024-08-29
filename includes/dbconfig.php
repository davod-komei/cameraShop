<?php
// $servername = "localhost";
// $dbname = "camera";
// $username = "root";
// $password = "";

$database_url = getenv('DATABASE_URL');

if (! $database_url) {
    die("تنظیمات اتصال به دیتابیس تعیین نشده اند.");
}

$db_info = parse_url($database_url);

$db_host = $db_info["host"];
$db_port = $db_info["port"];
$db_user = $db_info["user"];
$db_pass = $db_info["pass"];
$db_name = ltrim($db_info["path"], '/');

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
ob_start();
if(!isset($_SESSION))
	session_start();
?>