<?php
    include_once 'db_library.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM tb_member WHERE m_id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script> alert('ลบผู้ใช้งานเสร็จสิ้น'); window.location = 'member.php'; </script>";
        }
        else{
            // echo "<script> alert('ไม่สามารถลบผู้ใช้งานได้'); window.location = 'member.php'; </script>";
        }
    }
?>