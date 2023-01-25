<?php
    include_once "../db_library.php";
    session_start();
    if(!$_SESSION['login']){
        session_destroy();
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pretest</title>
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <link rel="stylesheet"href="css/style.css"> -->

<style>
@font-face {
    font-family: "Prompt";
    src: url(../font/Prompt-Regular.ttf);
}

body{
    font-family: "Prompt";
    background-image:url(../img/a.jpg);
    background-size: cover ;
    height: 100vh;
}
</style>


</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card p-4">
                    
                <form method="post" action="insert_db.php"> 
                    <h1 class="text-center mt-3">เพิ่มข้อมูลสมาชิก</h1>
                    
                    <label for="user" class="form-label">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control mb-3" name="user" autofocus required>

                    <label for="pass" class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control mb-3" name="pass" required>

                    <label for="firstname" class="form-label">ชื่อจริง</label>
                    <input type="text" class="form-control mb-3" name="firstname" required>

                    <label for="lastname" class="form-label">นามสกุล</label>
                    <input type="text" class="form-control mb-3" name="lastname" required>

                    <label for="email" class="form-label">อีเมล</label>
                    <input type="text" class="form-control mb-3" name="email" required>

                    <label for="phoe" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control mb-3" mexlength="10" name="phone" required>

                    <div class="d-flex gap-3" >
                        <input type="submit" name="submit" value="เพิ่มสมาชิก" class="btn btn-primary mt-3 mb-3 w-100 ">
                        <a class = "btn btn-primary mt-3 mb-3 w-100" href="member.php">ย้อนกลับ</a>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>