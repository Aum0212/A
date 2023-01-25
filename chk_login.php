<?php
    session_start();
    include "db_library.php";
    if(isset($_POST['submit'])){
        $m_user = $_POST['m_user'];
        $m_pass = $_POST['m_pass'];

        $sql = "SELECT * FROM tb_member WHERE m_user = '$m_user' AND m_pass = '$m_pass'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
    // เช็คว่ามีข้อมูลหรือไม่
if(!empty($row)){
    // เช็คสิทะ์การเข้าใช้งาน
    if($row['m_permis'] == 'admin'){
        $_SESSION['login'] = $row['m_id'];
        echo "<script>window.location = 'index.php'; </script>";
    } else{
        echo "<script>alert('ไม่สามารถเข้าสู่ระบบได้ !!'); window.location = 'login.php'; </script>";
    }

}else{
    echo "<script>alert('ไม่สามารถเข้าสู่ระบบได้ !!'); window.location = 'login.php'; </script>";
    }
}
?>