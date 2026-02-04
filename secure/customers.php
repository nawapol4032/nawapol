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
    <title>จัดการลูกค้า - นวพล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Sarabun', sans-serif; }
        .customer-card { border: none; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .table thead { background: #0d6efd; color: white; }
        .avatar-circle { width: 40px; height: 40px; background: #e9ecef; border-radius: 50%; display: flex; align-items: center; justify-content: center; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h2 class="fw-bold"><i class="bi bi-people-fill text-primary"></i> ข้อมูลลูกค้า</h2>
            <p class="text-muted">ตรวจสอบและจัดการรายชื่อสมาชิกในระบบ</p>
        </div>
        <div class="col-md-6 text-md-end">
            <div class="btn-group">
                <a href="index2.php" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> กลับหน้าหลัก</a>
                <button class="btn btn-primary" onclick="window.print()"><i class="bi bi-printer"></i> พิมพ์รายงาน</button>
            </div>