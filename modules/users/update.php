<?php
$id = (int) $_GET['id'];

?>
<?php
require 'inc/header.php';
?>
<?php
require 'inc/sidebar.php';
?>

<div id="content">
    <br>
    <a href="?mod=users&act=main">Danh sách thành viên</a><br>
</div>
<html>

<head>
    <style>
        .error {
            color: #FF0001;
        }
    </style>
</head>

<body>
    <?php
    // Định nghĩa biến 

    $username = $fullname = $email = $mobileno = $gender = $website = $agree = $password = "";

    //Input fields validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Validate chuỗi 

        if (empty($_POST["fullname"])) {
            $error['fullname'] = "Fullname là trường bắt buộc.";
        } else {
            $fullname = input_data($_POST["fullname"]);
        }
        // Kiểm tra bắt buộc nhập 
        if (empty($_POST["gender"])) {
            $error['gender'] = "Gender là trường bắt buộc.";
        } else {
            $gender = input_data($_POST["gender"]);
        }

        if (empty($error)) {
            // $sql = "UPDATE tbl_users SET fullname = '$fullname', gender = '$gender'
            //         WHERE user_id = {$id}";
            //     if(mysqli_query($connect,$sql)){
            //         echo "Cập nhật thành công !";
            //     }else{
            //         echo mysqli_error($connect);
            //     }
            $data = array(
                'fullname' => $fullname,
                'gender' => $gender
            );
            db_update("tbl_users", $data, "user_id = {$id}");
        }
    }
    function input_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function is_password($password)
    {
        $parttern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
        if (preg_match($parttern, $password))
            return true;
    }
    function form_error($label_field)
    {
        global $error;
        if (isset($error[$label_field])) {
            echo "<span style=\"color:
                red;\">{$error[$label_field]}</span><br/>";
        }
    }
    function set_value($label_field)
    {
        global $$label_field;
        if (isset($$label_field))
            echo  $$label_field;
    }

    // $sql = "SELECT * FROM tbl_users WHERE user_id = {$id}";
    // $result = mysqli_query($connect, $sql);
    // $item = mysqli_fetch_assoc($result);

    $item = db_fetch_row("SELECT * FROM tbl_users WHERE user_id = {$id}");
    ?>



    <br><br>
    <form method="post" action="">
        FullName:
        <input type="text" name="fullname" value="<?php if (!empty($item['fullname'])) echo $item['fullname'] ?> " value="<?php set_value('fullname'); ?>">
        <?php form_error('fullname'); ?>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        <br>
        <?php form_error('gender'); ?>
        <br><br>
        <input type="submit" name="btn_update" value="Update">
        <br><br>
    </form>

    <!-- END CONTENT -->
    <?php
    require 'inc/footer.php';
    ?>