<?php
    include_once "db_library.php";
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
    <title>แก้ไขข้อมูลสมาชิก</title>
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <link rel="stylesheet"href="css/style.css"> -->

<style>
@font-face {
    font-family: "Prompt";
    src: url(font/Prompt-Regular.ttf);
}

body{
    font-family: "Prompt";
    background-image:url(img/a.jpg);
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
                
            <?php
                        include_once "db_library.php";
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM tb_member WHERE m_id = '$id'";
                        $result = mysqli_query($conn, $sql);
                        ?>
            <?php while($row = mysqli_fetch_array($result)){  ?>
            <form method="post" action="member_edit_db.php"> 
                <h1 class="text-center mt-3">แก้ไขข้อมูลสมาชิก</h1>
        
                <!-- ส่ง id ด้วยวิธี hidden  -->
                <input type="hidden" name="id" value="<?php echo $row['m_id'];?>">

                <label for="user" class="form-label">ชื่อผู้ใช้</label>
                <input type="text" class="form-control mb-3" name="m_user" autofocus required value="<?php echo $row['m_user'];?>">

                <label for="pass" class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control mb-3" name="m_pass" required value="<?php echo $row['m_pass'];?>">

                <label for="surname" class="form-label">ชื่อ-สกุล</label>
                <input type="text" class="form-control mb-3" name="m_name" required value="<?php echo $row['m_name'];?>">

                <label for="phoe" class="form-label">เบอร์โทรศัพท์</label>
                <input type="text" class="form-control mb-3" name="m_phone" required value="<?php echo $row['m_phone'];?>">

                
            <div class="d-flex gap-3" >
                <input type="submit" name="submit" value="ตกลง" class="btn btn-primary mt-3 mb-3 w-100 ">
                <a class = "btn btn-primary mt-3 mb-3 w-100" href="member.php">ย้อนกลับ</a>
            </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
</body>
</html>