<?php
require 'db/config.php';
require 'db/database.php';
require 'data/pages.php';
require 'lib/pages.php';
require 'data/products.php';
require 'lib/data.php';
require 'lib/url.php';
require 'lib/users.php';
require 'lib/product.php';
require 'lib/number.php';
require 'lib/cart.php';
require  'lib/pagging.php';
session_start();
ob_start();
?>

<?php
db_connect($config);
$mod = !empty($_GET['mod']) ? $_GET['mod'] : 'home';
$act = !empty($_GET['act']) ? $_GET['act'] : 'main';

$path = "modules/{$mod}/{$act}.php";
if (file_exists($path)) {
    require $path;
} else {
    echo require 'inc/404.php';
}
?>

