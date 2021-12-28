<?php
require 'inc/header.php';
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
        if (empty($_POST["username"])) {
            $error['username'] = "Name là trường bắt buộc.";
        } else {
            $username = input_data($_POST["username"]);
            // Kiểm tra và chỉ cho phép nhập chữ và khoảng trắng 
            if (!preg_match("/^[A-Za-z0-9_\.]{6,32}$/", $username)) {
                $error['username'] = " Tên đăng nhập không đúng định dạng.";
            }
        }
        if (empty($_POST["fullname"])) {
            $error['fullname'] = "Fullname là trường bắt buộc.";
        } else {
            $fullname = input_data($_POST["fullname"]);
        }

        //Validate email 
        if (empty($_POST["email"])) {
            $error['email'] = "Email là trường bắt buộc.";
        } else {
            $email = input_data($_POST["email"]);
            // Kiểm tra email có đúng định dạng hay không 
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email không đúng định dạng.";
            }
        }
        if (empty($_POST['password'])) {
            $error['password'] = "Mật khẩu là trường bắt buộc.";
        } else {
            // Kiểm tra định dạng password
            if (!is_password($_POST['password'])) {
                $error['password'] = "Mật khẩu không đúng định dạng";
            } else {
                $password = $_POST['password'];
            }
        }


        // Kiểm tra bắt buộc nhập 
        if (empty($_POST["gender"])) {
            $error['gender'] = "Gender là trường bắt buộc.";
        } else {
            $gender = input_data($_POST["gender"]);
        }

        if (empty($error)) {
            // $sql = "INSERT INTO tbl_users(fullname,username,email,password,gender)
            //         VALUES ('{$fullname}','{$username}','{$email}','".md5('{$password}')."','{$gender}')";
            //     if(mysqli_query($connect,$sql)){
            //         echo "Thêm thành viên thành công !";
            //     }else{
            //         echo mysqli_error($connect);
            //     }
            $data = array(
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'password' => md5($password),
                'gender' => $gender
            );
            $id_insert = db_insert("tbl_users", $data);
            if(isset($id_insert))
                echo("Thêm thành viên thành công");
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



    ?>



    <br><br>
    <form method="post" action="">
        FullName:
        <input type="text" name="fullname" value="<?php set_value('fullname'); ?>">
        <?php form_error('fullname'); ?>
        <br><br>
        Username:
        <input type="text" name="username" value="<?php set_value('username'); ?>">
        <?php form_error('username'); ?>
        <br><br>
        E-mail:
        <input type="text" name="email" value="<?php set_value('email'); ?>">
        <?php form_error('email'); ?>
        <br><br>
        Password:
        <input type="password" name="password">
        <?php form_error('password'); ?>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        <br>
        <?php form_error('gender'); ?>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        <br><br>
    </form>

    <!-- END CONTENT -->
    <?php
    require 'inc/footer.php';
    ?>