<?php
    session_start();
    include "../db_library.php";
    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sql = "SELECT * FROM tb_test01 WHERE t_user = '$user' AND t_pass = '$pass'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
    // เช็คว่ามีข้อมูลหรือไม่
if(!empty($row)){
        $_SESSION['login'] = $row['t_id'];
        echo "<script>window.location = 'member.php'; </script>";

    }else{
        echo "<script>alert('ไม่สามารถเข้าสู่ระบบได้ !!'); window.location = 'login.php'; </script>";
    }
    }
?>