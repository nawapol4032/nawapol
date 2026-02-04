<?php 
session_start();
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - นวพล ชุมพล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .login-container { max-width: 400px; margin-top: 100px; }
    </style>
</head>

<body>

<div class="container login-container">
    <div class="card shadow-sm">
        <div class="card-body p-5">
            <h2 class="text-center mb-4">เข้าสู่ระบบ</h2>
            <h6 class="text-muted text-center mb-4">โดย นวพล (หลุยส์)</h6>

            <form method="post" action="">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="auser" class="form-control" placeholder="กรอกชื่อผู้ใช้" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="apwd" class="form-control" placeholder="กรอกรหัสผ่าน" required>
                </div>
                <div class="d-grid">
                    <button type="submit" name="Submit" class="btn btn-primary">LOGIN</button>
                </div>
            </form>

            <?php
            if(isset($_POST['Submit'])) {
                include_once("connectdb.php");
                
                $user = $_POST['auser'];
                $pwd  = $_POST['apwd'];

                // 1. ใช้ Prepared Statement ป้องกัน SQL Injection
                $stmt = mysqli_prepare($conn, "SELECT a_id, a_name, a_password FROM admin WHERE a_username = ? LIMIT 1");
                mysqli_stmt_bind_param($stmt, "s", $user);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($data = mysqli_fetch_array($result)) {
                    // 2. ตรวจสอบรหัสผ่านที่เข้ารหัส (Hash)
                    // หมายเหตุ: ใน DB คอลัมน์ a_password ต้องเก็บค่าที่ได้จาก password_hash()
                    if (password_verify($pwd, $data['a_password'])) {
                        $_SESSION['aid'] = $data['a_id'];
                        $_SESSION['aname'] = $data['a_name'];
                        
                        echo "<div class='alert alert-success mt-3'>ยินดีต้อนรับ! กำลังไปหน้าหลัก...</div>";
                        echo "<script>setTimeout(function(){ window.location='index2.php'; }, 1500);</script>";
                    } else {
                        echo "<div class='alert alert-danger mt-3 text-center'>รหัสผ่านไม่ถูกต้อง</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger mt-3 text-center'>ไม่พบชื่อผู้ใช้นี้</div>";
                }
                mysqli_stmt_close($stmt);
            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>