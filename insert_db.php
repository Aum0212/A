<?php
    include 'db_library.php';
    if(isset($_POST ['submit'])){
        $m_user = $_POST ['m_user'];
        $m_pass = $_POST ['m_pass'];
        $m_name = $_POST ['m_name'];
        $m_phone = $_POST ['m_phone'];

        // $hashed = password_hash($_POST ['m_pass'], PASSWORD_DEFAULT);

        $select = "SELECT * FROM tb_mamber WHERE m_name = '$m_name'";
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            echo "<script> alert('Username ซ้ำ'); window.location = 'insert.php'; </script>";
        } else
        
        $sql = "INSERT INTO tb_member(m_user, m_pass, m_name, m_phone)
        VALUES ('$m_user','$m_pass','$m_name','$m_phone')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script> alert('บันทึกข้อมูลเรียบร้อยแล้ว'); window.location = 'member.php'; </script>";
        }
        else{
            echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); window.location = 'insert.php'; </script>";
        }
        }
        ?>