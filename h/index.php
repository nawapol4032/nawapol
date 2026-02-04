<?php 
session_start(); // สำคัญมาก: ต้องอยู่บรรทัดแรกสุดของไฟล์
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>66010914032 นวพล ชุมพล(หลุยส์)</title>
</head>

<body>
<h1>หน้าเข้าสู่ระบบ - นวพล</h1>

<form method="post" action="">
    Username: <input type="text" name="auser" autofocus required> <br>
    Password: <input type="password" name="apwd" required> <br>
    <button type="submit" name="Submit">LOGIN</button>
</form>

<?php
if(isset($_POST['Submit'])) {
    include_once("connectdb.php");
    
    // ตรวจสอบ SQL ให้แน่ใจว่าเครื่องหมาย ' ครบถ้วน
    $sql = "SELECT * FROM admin WHERE a_username='{$_POST['auser']}' AND a_password='{$_POST['apwd']}' LIMIT 1";
    
    $rs = mysqli_query($conn, $sql);
    
    if ($rs) {
        $num = mysqli_num_rows($rs); // เติม ; ที่ขาดไป

        if ($num == 1) {
            $data = mysqli_fetch_array($rs);
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            echo "<script>";
            echo "window.location='index2.php';";
            echo "</script>"; 
        } else {
            echo "<script>";
            echo "alert('Username หรือ Password ไม่ถูกต้อง');";
            echo "</script>";
        }
    } else {
        // แสดง error หาก query มีปัญหา (ช่วยให้ debug ง่ายขึ้น)
        echo "Error: " . mysqli_error($conn);
    }
} // ปิดปีกกาของ if(isset) ที่หายไป
?>

</body>
</html>