<?php
$connect = mysqli_connect('localhost', 'root', '', 'php_mysql');
if (!$connect) {
    echo " Kết nối thất bại !" . mysqli_connect_error();
    die();
}
// else{
//     echo "ok";
// }
