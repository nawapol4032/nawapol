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
    <title>จัดการออเดอร์ - นวพล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Sarabun', sans-serif; }
        .main-card { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .table thead { background-color: #495057; color: white; }
        .status-badge { width: 100px; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold"><i class="bi bi-cart-check-fill text-primary"></i> รายการสั่งซื้อสินค้า</h2>
            <p class="text-muted">ตรวจสอบและจัดการออเดอร์จากลูกค้า</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="index2.php" class="btn btn-dark shadow-sm"><i class="bi bi-house-door"></i> กลับหน้าหลัก</a>
        </div>
    </div>

    <div class="card main-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="py-3 ps-4">เลขที่สั่งซื้อ</th>
                            <th class="py-3">วันที่สั่งซื้อ</th>
                            <th class="py-3">ลูกค้า</th>
                            <th class="py-3">ราคารวม</th>
                            <th class="py-3">สถานะ</th>
                            <th class="py-3 text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // 2. ใช้ Prepared Statement เพื่อดึงข้อมูลออเดอร์ (รวมชื่อลูกค้าด้วย