<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title>66010914032 นวพล ชุมพล (หลุยส์)</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
        }

        .container-box {
            max-width: 700px;
            margin-top: 40px;
            padding: 30px;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.08);
        }

        .footer-note {
            margin-top: 40px;
            font-size: 0.9rem;
            text-align: center;
            color: #6c757d;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="container-box">

        <h2 class="mb-4 text-center">แบบฟอร์มลงทะเบียนด้วย ChatGPT 66010914032 นวพล ชุมพล (หลุยส์)</h2>

        <form method="post" action="" class="mt-3">

            <div class="mb-3">
                <label class="form-label">ชื่อ-สกุล *</label>
                <input type="text" name="fullname" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label">เบอร์โทร *</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ส่วนสูง (ซม.) *</label>
                <input type="number" name="height" min="100" max="200" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ที่อยู่ *</label>
                <textarea name="address" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">วันเดือนปีเกิด *</label>
                <input type="date" name="birthday" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">สีที่ชอบ</label>
                <input type="color" name="color" class="form-control form-control-color">
            </div>

            <div class="mb-4">
                <label class="form-label">สาขาวิชา</label>
                <select name="major" class="form-select">
                    <option value="การบัญชี">การบัญชี</option>
                    <option value="การตลาด">การตลาด</option>
                    <option value="การจัดการ">การจัดการ</option>
                    <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                </select>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <button type="submit" name="Submit" class="btn btn-primary">สมัครสมาชิก</button>
                <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                <button type="button" class="btn btn-outline-info" onclick="window.location='https://www.msu.ac.th/';">Go to MSU</button>
                <button type="button" class="btn btn-warning" ondblclick="alert('จ๊ะเอ๋');">Hello</button>
                <button type="button" class="btn btn-dark" onclick="window.print();">พิมพ์</button>
            </div>

        </form>

        <hr class="mt-4">

        <?php
        if (isset($_POST['Submit'])) {
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $height = $_POST['height'];
            $address = $_POST['address'];
            $birthday = $_POST['birthday'];
            $color = $_POST['color'];
            $major = $_POST['major'];

            echo "<h5 class='mt-3'>ข้อมูลที่ส่งมา</h5>";
            echo "<p>ชื่อ-สกุล: $fullname</p>";
            echo "<p>เบอร์โทร: $phone</p>";
            echo "<p>ส่วนสูง: $height ซม.</p>";
            echo "<p>ที่อยู่: $address</p>";
            echo "<p>วันเดือนปีเกิด: $birthday</p>";
            echo "<p>สีที่ชอบ:</p>";
            echo "<div style='background-color:{$color}; width:180px; height:30px; border-radius:6px;'></div>";
            echo "<p class='mt-2'>รหัสสี: $color</p>";
            echo "<p>สาขาวิชา: $major</p>";
        }
        ?>

    </div>

    <div class="footer-note">
        หน้านี้ออกแบบและปรับปรุงด้วยความช่วยเหลือจาก ChatGPT
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
