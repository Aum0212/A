<?php
    include 'db_library.php';
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $m_user = $_POST['m_user'];
        $m_pass = $_POST['m_pass'];
        $m_name = $_POST['m_name'];
        $m_phone = $_POST['m_phone'];

        $sql = "UPDATE tb_member SET
        m_user='$m_user',
        m_pass='$m_pass',
        m_name='$m_name',
        m_phone='$m_phone'
        WHERE m_id = '$id'";
        $result = mysqli_query($conn,$sql);

        if($result){
            echo "<script>  window.location = 'admin.php'; </script>";
        }
        else{
            echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); window.location = 'admin_edit.php'; </script>";
        }
    }

    ?>