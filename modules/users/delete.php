<?php
$id = $_GET['id'];
// $sql = "DELETE FROM tbl_users WHERE user_id = {$id}";
//     if(mysqli_query($connect,$sql)){
//             echo "Xóa thành công !";
//     }else{
//             echo mysqli_error($connect);
//     }       
db_delete("tbl_users","user_id = {$id}");
redirect("?mod=users&act=main");
