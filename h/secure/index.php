<?php 
session_start();
// ถ้า Login อยู่แล้ว ให้ไปหน้า index2.php ทันที ไม่ต้องกรอกซ้ำ
if (isset($_SESSION['aid'])) {
    header("Location: index2.php");
    exit();
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - นวพล ชุมพล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .login-container { max-width: 400px; margin-top: 100px; }
        .card { border: none; border-radius: 1rem; }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="card shadow-lg">
        <div class="card-body p-5">
            <h2 class="text-center mb-4 fw-bold">ADMIN LOGIN</h2>
            <p class="text-muted text-center mb-4">โดย นวพล (หลุยส์)</p>

            <form method="post" action="">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="auser" class="form-control form-control-lg" placeholder="Username" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="apwd" class="form-control form-control-lg" placeholder="Password" required>
                </div>
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" name="Submit" class="btn btn-primary btn-lg">เข้าสู่ระบบ</button>
                </div>
            </form>

            <?php
            if(isset($_POST['Submit'])) {
                include_once("connectdb.php");
                
                $user = $_POST['auser'];
                $pwd  = $_POST['apwd'];

                $stmt = mysqli_prepare($conn, "SELECT a_id, a_name, a_password FROM admin WHERE a_username = ? LIMIT 1");
                mysqli_stmt_bind_param($stmt, "s", $user);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($data = mysqli_fetch_array($result)) {
                    if (password_verify($pwd, $data['a_password'])) {
                        // ตั้งค่า Session
                        $_SESSION['aid'] = $data['a_id'];
                        $_SESSION['aname'] = $data['a_name'];
                        
                        echo "<div class='alert alert-success mt-3 text-center'>สำเร็จ! กำลังพาท่านเข้าสู่ระบบ...</div>";
                        // ใช้ JavaScript Redirect พร้อมหน่วงเวลา 1.5 วินาทีเพื่อให้ User เห็นข้อความ Success
                        echo "<script>
                                setTimeout(function(){ 
                                    window.location.href = 'index2.php'; 
                                }, 1500);
                              </script>";
                    } else {
                        echo "<div class='alert alert-danger mt-3 text-center small'>รหัสผ่านไม่ถูกต้อง กรุณาลองใหม่</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger mt-3 text-center small'>ไม่พบชื่อผู้ใช้งานนี้ในระบบ</div>";
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