<?php
require 'inc/header.php';
?>
<?php
require 'inc/sidebar.php';
?>
<?php
// $sql = "SELECT * FROM tbl_users";
// $result = mysqli_query($connect,$sql);
// $list_users = array();
// if(mysqli_num_rows($result) > 0){
//     while ($row = mysqli_fetch_assoc($result)){
//         $list_users[] = $row;
//     }
// }
// show_array($list_users);
$num_rows = db_num_rows("SELECT * FROM tbl_users");
// WHERE gender = 'female'
$num_per_page = 4;
$total_row = $num_rows;
$num_page = ceil($total_row / $num_per_page);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $num_per_page;
$list_users = get_users($start, $num_per_page,);
// "gender = 'female'"

?>

<div id="content">
    <br>
    <a href="?mod=users&act=add">Thêm thành viên</a><br>
    <h1>Danh sách thành viên : <p style="font-size : 12px">Có <?php echo $num_rows ?> thành viên trong hệ thống</p>
    </h1>
    <style>
        .table-data tr td {
            border-bottom: 1px solid #333;
            padding: 8px 15px;
        }

        .table-data thead tr td {
            font-weight: bold;
        }

        .table-data {
            margin-bottom: 20px;
        }
    </style>
    <?php
    if (!empty($list_users)) {
    ?>
        <table class="table-data">
            <thead>
                <tr>
                    <td>STT</td>
                    <td>ID</td>
                    <td>FullName</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Giới tính</td>
                    <td>Thao tác</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $temp = $start;
                foreach ($list_users as $user) :
                    $temp++;
                ?>
                    <tr>
                        <td><?php echo $temp; ?></td>
                        <td><?php echo $user['user_id']; ?></td>
                        <td><?php echo $user['fullname']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo show_gender($user['gender']); ?></td>
                        <td><a href="<?php echo "?mod=users&act=update&id={$user['user_id']}" ?>">Sửa</a> | <a href="<?php echo "?mod=users&act=delete&id={$user['user_id']}" ?>">Xóa</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    <?php
    }
    ?>
    <?php
    echo get_pagging($num_page, $page, "?mod=users&act=main");

    ?>

</div>

<!-- END CONTENT -->
<?php
require 'inc/footer.php';
?>