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
    <title>จัดการการยืม-คืนหนังสือ</title>
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- icon -->
<link rel="stylesheet" href="icon/bootstrap-icons.css">

<style>
@font-face {
    font-family: "Prompt";
    src: url(font/Prompt-Regular.ttf);
}

body{
    font-family: "Prompt";
}
</style>
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">ระบบการยืม-คืนหนังสือ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" href="admin.php">จัดการข้อมูลผู้ดูแลระบบ</a>
            </li>
            <li class="nav-item">
            <a class="nav-link"  href="member.php">จัดการข้อมูลสมาชิก</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="borrow_return.php">จัดการการยืม-คืนหนังสือ</a>
            </li>
        </ul>
        <form class="d-flex" method="post" action="borrow_return_search.php">
            <input class="form-control me-2" type="search" name="search" placeholder="ค้นหาข้อมูลที่นี่" aria-label="Search">
            <button class="btn btn-outline-success me-2 w-50" type="submit"> <i class="bi bi-search"></i> ค้นหา </button>
        </form>
        <a class = "btn btn-dark " href="logout.php"> <i class="bi bi-door-closed-fill"></i> ออกจากระบบ </a>    
    </div>
    </div>
        </nav>
    <!-- ส่วนของ tabel -->
        <div calss="containar">
            <div class="row">
                <div class="col-md-12">
                <h1 class=" mt-5">การจัดการข้อมูลการยืม-คืนหนังสือ</h1>
                <a class="btn btn-success float-end md-3 " href="#"> <i class="bi bi-person-fill-add"></i> ข้อมูลสถิติ</a>
                <a class="btn btn-success float-end md-3 me-2" href="#"> <i class="bi bi-person-fill-add"></i> คืนหนังสือ</a>
                <a class="btn btn-success float-end md-3 me-2" href="#"> <i class="bi bi-person-fill-add"></i> ยืมหนังสือ</a>
                
                </div>

                <div class="table-responsive">
                    <table class="table tabel-hover table-bordered text-center">
                            <tr>
                                <th>รหัสหนังสือ</th>
                                <th>ชื่อหนังสือ</th>
                                <th>ชื่อผู้ยืมคืน</th>
                                <th>วันที่ยืม</th>
                                <th>วันที่คืน</th>
                                <th>ค่าปรับ</th>
                            </tr>
                            <?php
                            include 'db_library.php';
                            $search = $_POST['search'];
                            $sql = "SELECT br.b_id, b.b_name, m.m_name, br.br_data_br, br.br_data_rt, br.br_fine 
                            FROM tb_borrow_book AS br
                            INNER JOIN tb_book AS b
                            ON br.b_id = b.b_id
                            INNER JOIN tb_member AS m
                            ON br.m_user = m.m_user 
                            WHERE b.b_name LIKE '%$search%' OR m.m_name LIKE '%$search%' ORDER BY br.br_data_br DESC";
                            $result = mysqli_query($conn, $sql);
                            ?>

                            <?php while($row = mysqli_fetch_array($result)){  ?>
                            <tr>
                                <td><?php echo $row['b_id'];?></td>
                                <td><?php echo $row['b_name'];?></td>
                                <td><?php echo $row['m_name'];?></td>
                                <td><?php echo $row['br_data_br'];?></td>
                                <td><?php echo $row['br_data_rt'];?></td>
                                <td><?php echo $row['br_fine'];?></td>
                            </tr>
                            <?php } ?>

                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
