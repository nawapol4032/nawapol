<?php 
session_start();
include_once("connectdb.php");

// 1. ตรวจสอบสิทธิ์ (Security Check)
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
    <title>จัดการสินค้า - นวพล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Sarabun', sans-serif; }
        .main-card { border: none; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .table img { object-fit: cover; border-radius: 5px; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">📦 จัดการสินค้า</h2>
            <p class="text-muted">แอดมิน: <span class="badge bg-primary"><?php echo $_SESSION['aname']; ?></span></p>
        </div>
        <div class="btn-group">
            <a href="add_product.php" class="btn btn-success"><i class="bi bi-plus-circle me-1"></i> เพิ่มสินค้าใหม่</a>
            <a href="index2.php" class="btn btn-outline-secondary"><i class="bi bi-house me-1"></i> กลับหน้าหลัก</a>
        </div>
    </div>

    <div class="card main-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">รหัสสินค้า</th>
                            <th>รูปภาพ</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>สต็อก</th>
                            <th class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // 2. ใช้ Prepared Statement เพื่อดึงข้อมูล (ปลอดภัยจาก SQL Injection)
                        $sql = "SELECT * FROM products ORDER BY p_id DESC";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td class="ps-4 align-middle"><?php echo $row['p_id']; ?></td>
                            <td class="align-middle">
                                <img src="images/<?php echo $row['p_img']; ?>" width="50" height="50" alt="product">
                            </td>
                            <td class="align-middle fw-bold"><?php echo htmlspecialchars($row['p_name']); ?></td>
                            <td class="align-middle"><?php echo number_format($row['p_price'], 2); ?> ฿</td>
                            <td class="align-middle"><?php echo $row['p_stock']; ?> ชิ้น</td>
                            <td class="text-center align-middle">
                                <a href="edit_product.php?id=<?php echo $row['p_id']; ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i> แก้ไข
                                </a>
                                <a href="delete_product.php?id=<?php echo $row['p_id']; ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('ยืนยันการลบข้อมูล?')">
                                    <i class="bi bi-trash"></i> ลบ
                                </a>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center py-4 text-muted'>ไม่มีข้อมูลสินค้า</td></tr>";
                        }
                        mysqli_stmt_close($stmt);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>