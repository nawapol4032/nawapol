<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>66010914032 นวพล ชุมพล (หลุยส์) - Minimal Form</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    /* ปรับสีพื้นหลังของ body ให้ดูสบายตา */
    body {
        background-color: #f8f9fa; /* bg-light */
    }
    /* ปรับปรุงการแสดงผลสีที่ชอบ */
    .color-display {
        display: inline-block;
        width: 150px;
        height: 38px;
        border: 1px solid #ced4da; /* สีขอบแบบ form-control */
        border-radius: 0.375rem; /* รัศมีมุมแบบ form-control */
        vertical-align: middle;
        text-align: center;
        line-height: 38px;
        font-weight: bold;
    }
</style>
</head>

<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            
            <h1 class="text-center mb-4 text-secondary">
                <span class="d-block fw-light">แบบฟอร์มลงทะเบียนด้วย Gemini</span>
                66010914032 นวพล ชุมพล (หลุยส์)
            </h1>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">

                    <form method="post" action="">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="fullname" class="form-label">ชื่อ-สกุล <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" autofocus required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">เบอร์โทร <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="height" class="form-label">ส่วนสูง (ซม.) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="height" name="height" min="100" max="200" required>
                                    <span class="input-group-text">ซม.</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="birthday" class="form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="birthday" name="birthday" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">ที่อยู่ <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="major" class="form-label">สาขาวิชา</label>
                                <select class="form-select" id="major" name="major">
                                    <option value="การบัญชี">การบัญชี</option>
                                    <option value="การตลาด">การตลาด</option>
                                    <option value="การจัดการ">การจัดการ</option>
                                    <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="color" class="form-label">สีที่ชอบ</label>
                                <input type="color" class="form-control form-control-color" id="color" name="color" value="#563d7c" title="เลือกสี">
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 pt-3">
                            <button type="submit" name="Submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i> สมัครสมาชิก
                            </button>
                            <button type="reset" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-counterclockwise me-1"></i> ยกเลิก
                            </button>
                            <button type="button" onClick="window.location='https://www.msu.ac.th/';" class="btn btn-outline-info">
                                Go to MSU
                            </button>
                            <button type="button" onDblClick="alert('จ๊ะเอ๋');" class="btn btn-outline-dark">
                                Hello
                            </button>
                            <button type="button" onClick="window.print();" class="btn btn-outline-secondary">
                                พิมพ์
                            </button>
                        </div>

                    </form>
                </div>
            </div>
            
            <hr class="my-5">

            <?php
            if (isset($_POST['Submit'])) {
                $fullname = htmlspecialchars($_POST['fullname']);
                $phone = htmlspecialchars($_POST['phone']);
                $height = htmlspecialchars($_POST['height']);
                $address = htmlspecialchars($_POST['address']);
                $birthday = htmlspecialchars($_POST['birthday']);
                $color = htmlspecialchars($_POST['color']);
                $major = htmlspecialchars($_POST['major']);
                
                // ใช้ alert-info/light หรือ card เพื่อแสดงผลลัพธ์ให้เข้ากับธีม
                echo "<div class='alert alert-light border' role='alert'>";
                echo "<h4 class='alert-heading text-primary'>ข้อมูลที่คุณได้กรอกสำเร็จแล้ว!</h4>";
                echo "<p>";
                echo "<strong>ชื่อ-สกุล:</strong> " . $fullname . "<br>";
                echo "<strong>เบอร์โทร:</strong> " . $phone . "<br>";
                echo "<strong>ส่วนสูง:</strong> " . $height . " ซม.<br>";
                echo "<strong>ที่อยู่:</strong> " . nl2br($address) . "<br>"; // ใช้ nl2br เพื่อให้ขึ้นบรรทัดใหม่ในที่อยู่
                echo "<strong>วันเดือนปีเกิด:</strong> " . $birthday . "<br>";
                echo "<strong>สาขาวิชา:</strong> " . $major . "<br>";
                echo "<strong>สีที่ชอบ:</strong> ";
                // แสดงผลสีที่ชอบด้วย div ที่มีสไตล์
                echo "<div class='color-display' style='background-color:{$color}; color: " . (hexdec(substr($color, 1, 2)) + hexdec(substr($color, 3, 2)) + hexdec(substr($color, 5, 2)) > 382 ? '#000' : '#fff') . ";'>{$color}</div>";
                echo "</p>";
                echo "</div>";
            }
            ?>

            <footer class="mt-5 text-center text-muted small">
                <p>สร้างและตกแต่งด้วยความช่วยเหลือจาก Gemini</p>
            </footer>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>