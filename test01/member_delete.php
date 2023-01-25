<?php
    include_once '../db_library.php';
        $id = $_GET['id'];
        $sql = "DELETE FROM tb_test01 WHERE t_id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script> alert('ลบผู้ใช้งานเสร็จสิ้น'); window.location = 'member.php'; </script>";
        }
        else{
            echo "<script> alert('ไม่สามารถลบผู้ใช้งานได้'); window.location = 'member.php'; </script>";
        }
    
?>