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
    <title>ระบบการยืม-คืนหนังสือ</title>
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" >
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
                <a class="nav-link" href="member.php">จัดการข้อมูลสมาชิก</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="borrow_return.php">จัดการการยืม-คืนหนังสือ</a>
                </li>
            </ul>
            <a class = "btn btn-dark " href="logout.php"> <i class="bi bi-door-closed-fill"></i> ออกจากระบบ </a>    
        </div>
        </nav>   
    </div>
    
    
    <!-- ส่วนของ carousel -->  
        <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="img/1.jpg" style="height:100vh;" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="img/2.jpg" style="height:100vh;" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="img/3.jpg" style="height:100vh;" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="img/4.jpg" style="height:100vh;" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div> -->
    <div class="container">
        <div class="row mt-5 align-items-center">
            <div class="col-md-6">
                <h1 class="display-5">ยินดีต้อนรับ</h1>
                <p class="lead">ห้งอสมุดของเราเปิดบริการ 24 ชั่วโมง เรียนรู้ทักษะใหม่ ๆ ไปกับหยังสือชั้นนำทั่วประเทศ หัวงว่าท่านจะได้เรียนรู้อะไรใหม่ ๆ</p>
            </div>
            <div class="col-md-6">
                    <img src="img/1.jpg" alt="img/fluid rounded-3" >
            </div>            
        </div>
    </div>
    
    
    <!-- card -->
    <div class="container-fluid bg-light">
        <div class="row mt-5">
            <h1 class="text-center mt-4">หนังสือมาใหม่</h1>
            <?php
            include "db_library.php";
           $sql = "SELECT * FROM tb_new_book";
            $result = mysqli_query($conn, $sql);
            ?>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col mb-3 sm-5 mt-2">
                <div class="card">
                    <img src="img/<?php echo $row['nb_img']?>" class="card-img-top" height="220px";>
                    <div class="card-body text=center">
                        <h5 class="card-title"> <?php echo $row['nb_name']?> </h5>
                        <p class="card-text"> <?php echo $row['nb_price']?> บาท </p>
                    </div>
                </div>
            </div>    
        <?php } ?>
        </div>
    </div>

</body>
</html>
