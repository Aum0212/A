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


<link rel="stylesheet" href="../icon/bootstrap-icons.css">

<style>
@font-face {
    font-family: "Prompt";
    src: url(../font/Prompt-Regular.ttf);
}

body{
    font-family: "Prompt";
}
</style>
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="member.php">pretest</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <li class="nav-item">
            <a class="nav-link active" href="member.php">จัดการข้อมูลสมาชิก</a>
            </li>
            
        </ul>
        
        <form class="d-flex" method="post" action="member_search.php">
            <input class="form-control me-2" type="search" name="search" placeholder="ค้นหาข้อมูลที่นี่" aria-label="Search">
            <button class="btn btn-outline-success me-2 " type="submit">ค้นหา</button>
        </form>
        <a class = "btn btn-dark " href="logout.php"> ออกจากระบบ </a>    
    </div>
    </div>
        </nav>
    <!-- ส่วนของ tabel -->
        <div calss="containar">
            <div class="row">
                <div class="col-md-12">
                <h1 class=" mt-5">ตารางข้อมูลสมาชิก</h1>
                <a class="btn btn-success float-end md-3" href="insert.php">เพิ่มข้อมูลสมาชิก</a>
                </div>

                <div class="table-responsive">
                    <table class="table tabel-hover table-bordered text-center">
                            <tr>
                                <th>ชื่อผู้ใช้</th>
                                <th>รหัสผ่าน</th>
                                <th>ชื่อจริง</th>
                                <th>นามสกุล</th>
                                <th>อีเมล</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>จัดการ</th>
                            </tr>
                            <?php
                            include '../db_library.php';
                            $search = $_POST['search'];
                            $sql = "SELECT * FROM tb_test01 WHERE t_user LIKE '%$search%'OR t_first LIKE '%$search%' ";
                            $result = mysqli_query($conn, $sql);
                            ?>

                            <?php while($row = mysqli_fetch_array($result)){ 
                                
                                ?>
                            <tr>
                                <td><?php echo $row['t_user'];?></td>
                                <td><?php echo $row['t_pass'];?></td>
                                <td><?php echo $row['t_first'];?></td>
                                <td><?php echo $row['t_last'];?></td>
                                <td><?php echo $row['t_email'];?></td>
                                <td><?php echo $row['t_phone'];?></td>
                                <td class="d-flex gap-2">
                                    <a class ="btn btn-dark text-white w-50" href="member_edit.php?id=<?php echo $row['t_id'];?>">แก้ไข</a>
                                    <a onclick="return confirm('คุณต้องการลบผู้ใช้งานใช่หรือไม่ ?'); "class ="btn btn-dark w-50" href="member_delete.php?id=<?php echo $row['t_id'];?>">ลบ</a>
                                </td>
                            </tr>
                            <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
