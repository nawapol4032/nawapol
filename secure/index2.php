<?php 
session_start();
// ตรวจสอบว่าได้ Login มาจริงไหม ถ้าไม่มี Session ให้เด้งกลับไปหน้า login.php
if (!isset($_SESSION['aid'])) {
    header("Location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - นวพล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f7f6; }
        .sidebar { min-height: 100vh; background: #212529; color: white; }
        .nav-link { color: rgba(255,255,255,0.8); margin-bottom: 10px; border-radius: 8px; }
        .nav-link:hover { background: #343a40; color: #fff; }
        .nav-link.active { background: #0d6efd; color: #fff; }
        .card-menu { transition: transform 0.2s; cursor: pointer; text-decoration: none; color: inherit; }
        .card-menu:hover { transform: translateY(-5px); }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="text-center mb-4">
                <i class="bi bi-person-circle fs-1"></i>
                <h5 class="mt-2 text-truncate"><?php echo $_SESSION['aname']; ?></h5>
                <span class="badge bg-success">Online</span>
            </div>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link active" href="index2.php"><i class="bi bi-speedometer2 me-2"></i> แผงควบคุม</a></li>
                <li class="nav-item"><a class="nav-link" href="product.php"><i class="bi bi-box-seam me-2"></i> จัดการสินค้า</a></li>
                <li class="nav-item"><a class="nav-link" href="orders.php"><i class="bi bi-cart-check me-2"></i> จัดการออเดอร์</a></li>
                <li class="nav-item"><a class="nav-link" href="customers.php"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a></li>
                <li class="nav-item mt-4"><a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ</a></li>
            </ul>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">หน้าหลักแอดมิน - นวพล</h1>
            </div>

            <div class="row g-4">
                <div class="col-12 col-sm-6 col-xl-3">
                    <a href="product.php" class="card card-menu border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-box-seam text-primary fs-1"></i>
                            <h5 class="card-title mt-3">จัดการสินค้า</h5>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <a href="orders.php" class="card card-menu border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-cart-check text-success fs-1"></i>
                            <h5 class="card-title mt-3">จัดการออเดอร์</h5>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <a href="customers.php" class="card card-menu border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-people text-info fs-1"></i>
                            <h5 class="card-title mt-3">จัดการลูกค้า</h5>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <a href="logout.php" class="card card-menu border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-door-open text-danger fs-1"></i>
                            <h5 class="card-title mt-3">ออกจากระบบ</h5>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="mt-5 p-4 bg-white rounded shadow-sm">
                <h4>ยินดีต้อนรับ, คุณ <?php echo $_SESSION['aname']; ?></h4>
                <p class="text-muted">เลือกเมนูจากแถบด้านซ้าย หรือคลิกการ์ดด้านบนเพื่อเริ่มต้นจัดการระบบ</p>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>