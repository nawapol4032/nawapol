<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>66010914032 นวพล ชุมพล (หลุยส์)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f4f7f6; /* สีพื้นหลังนวลตา */
            color: #333;
        }
        .container {
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .header-title {
            background: #ffffff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
            margin-bottom: 25px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .table thead th {
            background-color: #fcfcfc;
            border-bottom: 2px solid #eee;
            color: #666;
            font-weight: 500;
            padding: 15px;
        }
        .product-img {
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #f0f0f0;
            transition: transform 0.2s;
        }
        .product-img:hover {
            transform: scale(1.1);
        }
        /* ปรับแต่ง DataTables ให้ดู Minimal */
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 20px;
            padding: 5px 15px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="header-title text-center">
        <h2 class="mb-0 text-primary">🛒 Pop Supermarket System</h2>
        <small class="text-muted">66010914032 นวพล ชุมพล (หลุยส์)</small>
    </div>

    <div class="card p-4 bg-white">
        <div class="table-responsive">
            <table id="myTable" class="table table-hover w-100">
                <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th>ชื่อสินค้า</th>
                        <th>ประเภท</th>
                        <th>วันที่บันทึก</th>
                        <th>ประเทศ</th>
                        <th class="text-end">จำนวนเงิน</th>
                        <th class="text-center">รูปภาพ</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include_once("connectdb.php");
                
                // แก้ไข SQL: เพิ่ม +0 เพื่อให้เรียงลำดับตัวเลขได้ถูกต้อง (1, 2, ..., 10)
                $sql = "SELECT * FROM `popsupermarket` ORDER BY p_order_id + 0 ASC";
                $rs = mysqli_query($conn, $sql);
                
                if ($rs) {
                    while ($data = mysqli_fetch_array($rs)) {   
                ?>
                <tr class="align-middle">
                    <td><span class="fw-bold text-secondary"><?php echo $data['p_order_id'];?></span></td>
                    <td>
                        <div class="fw-medium text-dark"><?php echo $data['p_product_name'];?></div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><?php echo $data['p_category'];?></span></td>
                    <td class="text-muted" style="font-size: 0.9rem;">
                        <?php echo date('d M Y', strtotime($data['p_date']));?>
                    </td>
                    <td><?php echo $data['p_country'];?></td>
                    <td align="right" class="text-dark fw-bold">
                        ฿<?php echo number_format($data['p_amount'], 2);?>
                    </td>
                    <td align="center">
                        <img src="images/<?php echo $data['p_product_name'];?>.jpg" 
                             class="product-img"
                             width="45" height="45"
                             onerror="this.src='https://ui-avatars.com/api/?name=<?php echo urlencode($data['p_product_name']);?>&background=random'">
                    </td>
                </tr>
                <?php 
                    }
                    mysqli_close($conn);
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json"
            },
            "pageLength": 10,
            "order": [], // ปิดการเรียงอัตโนมัติของ JS เพื่อใช้ค่าที่เรียงมาจาก SQL โดยตรง
            "columnDefs": [
                { "type": "num", "targets": 0 } // กำหนด Column แรกให้เป็นแบบตัวเลขเสมอ
            ]
        });
    });
</script>

</body>
</html>