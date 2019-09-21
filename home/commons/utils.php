<?php 
$host = "127.0.0.1";
$dbname = "home";
$dbusername ="root";
$dbpwd = "";
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", 
	$dbusername, $dbpwd);

$siteUrl='http://localhost/home/';
$adminUrl = 'http://localhost/home/admin/';
$adminAssetUrl = 'http://localhost/home/admin/adminlte/';
define('TABLE_CATEGORY', 'categories');
define('TABLE_PRODUCT','products');
define('TABLE_COMMENT', 'comments');
define('TABLE_BRANDS', 'brands');
define('TABLE_SLIDESHOW', 'slideshows');
define('TABLE_WEB', 'web_settings');
const USER_ROLES = [
	'admin' => 500,
	'moderator' => 300,
	'member' => 1
];

function dd($var){
	echo "<pre>";
	var_dump($var);
	die;
}
function checkLogin(){
	global $siteUrl;
	if(!isset($_SESSION['login']) || $_SESSION['login'] == null){
	  header('location: '.$siteUrl . 'login.php');
	  die;
	}
}
function checkLog($role = 300){
	global $siteUrl;
	if(!isset($_SESSION['login']) 
		|| $_SESSION['login'] == null
		|| $_SESSION['login']['role'] < $role){
	  header('location: '.$siteUrl . 'index.php');
	  die;
	}
}
if (isset($_GET['sp_id'])) {
    $id = $_GET['sp_id'];
    $sqlview = "UPDATE products SET views = (views + 1) where id = $id";
    $stmt = $conn->prepare($sqlview);
    $stmt->execute();
}
?>