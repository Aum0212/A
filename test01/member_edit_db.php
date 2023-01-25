<?php
    include '../db_library.php';
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $user = $_POST ['user'];
        $pass = $_POST ['pass'];
        $firstname = $_POST ['firstname'];
        $lastname = $_POST ['lastname'];
        $email = $_POST ['email'];
        $phone = $_POST ['phone'];

        $sql = "UPDATE tb_test01 SET
        t_user='$user',
        t_pass='$pass',
        t_first='$firstname',
        t_last='$lastname',
        t_email='$email',
        t_phone='$phone'
        WHERE t_id = '$id'";
        $result = mysqli_query($conn,$sql);

        if($result){
            echo "<script>  window.location = 'member.php'; </script>";
        }
        else{
            echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); window.location = 'member_edit.php'; </script>";
        }
    }

    ?>