<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
        <div class="row justify-content-center mt-5" >
            <div class="col-md-6">
                <div class="card p-4">
                    
                <form method="post" action="chk_login.php"> 
                    <h1 class="text-center mt-3">เข้าสู่ระบบ</h1>
                    
                    <label for="user" class="form-label">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control mb-3" name="m_user" autofocus required>

                    <label for="pass" class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control mb-3" name="m_pass" required>

                    <input type="submit" name="submit" value="ตกลง" class="btn btn-danger mb-1 w-100">
                    <input type="reset" name="reset" value="ยกเลิก" class="btn btn-danger mb-1 w-100">
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>