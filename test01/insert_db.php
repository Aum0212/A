<?php
    include '../db_library.php';
    if(isset($_POST ['submit'])){
        $user = $_POST ['user'];
        $pass = $_POST ['pass'];
        $firstname = $_POST ['firstname'];
        $lastname = $_POST ['lastname'];
        $email = $_POST ['email'];
        $phone = $_POST ['phone'];

        // $hashed = password_hash($_POST ['m_pass'], PASSWORD_DEFAULT);

        $select = "SELECT * FROM tb_test01 WHERE t_user = '$user'";
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            echo "<script> alert('Username ซ้ำ'); window.location = 'insert.php'; </script>";
        } else
        
        $sql = "INSERT INTO tb_test01(t_user, t_pass, t_first, t_last, t_email, t_phone)
        VALUES ('$user','$pass','$firstname','$lastname','$email','$phone')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script> alert('บันทึกข้อมูลเรียบร้อยแล้ว'); window.location = 'member.php'; </script>";
        }
        else{
            echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); window.location = 'insert.php'; </script>";
        }
        }
        ?>