<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ใบสมัครงาน - 66010914032 นวพล ชุมพล (หลุยส์)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f0f4f8; }
        .card-application { border: none; border-radius: 1rem; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05); }
        .form-section-title { border-left: 4px solid #0d6efd; padding-left: 1rem; font-weight: 600; color: #6c757d; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            
            <?php
            // 1. เชื่อมต่อฐานข้อมูล 4032db
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "4032db";

            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->exec("set names utf8mb4");

                // 2. ตรวจสอบว่ามีการกดปุ่ม Submit หรือไม่
                if (isset($_POST['Submit'])) {
                    // รับค่าจากฟอร์ม
                    $job = $_POST['job_position'];
                    $pronoun = $_POST['prefix'];
                    $name = $_POST['fullname'];
                    $dob = $_POST['dob'];
                    $edu = $_POST['education'];
                    $skills = $_POST['skills'];
                    $exp = $_POST['experience'];

                    // บันทึกลงฐานข้อมูลในตาราง application
                    $sql = "INSERT INTO application (a_position, a_pronoun, a_name, a_birthday, a_education, a_skills, a_exp) 
                            VALUES (:a_position, :a_pronoun, :a_name, :a_birthday, :a_education, :a_skills, :a_exp)";
                    
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([
                        ':a_position' => $job,
                        ':a_pronoun' => $pronoun,
                        ':a_name' => $name,
                        ':a_birthday' => $dob,
                        ':a_education' => $edu,
                        ':a_skills' => $skills,
                        ':a_exp' => $exp
                    ]);

                    // --- แสดงหน้าสรุปข้อมูล (เหมือนในรูปภาพที่ 2) ---
                    ?>
                    <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2 fs-4"></i>
                        <div>
                            <h5 class="alert-heading mb-0 text-dark fw-bold">การสมัครสำเร็จ!</h5>
                            <small>ข้อมูลใบสมัครงานของคุณถูกบันทึกเรียบร้อยแล้ว รายละเอียดดังนี้:</small>
                        </div>
                    </div>

                    <div class="card card-application p-4 p-md-5">
                        <h4 class="text-primary mb-4 fw-bold"><i class="bi bi-file-text me-2"></i> สรุปข้อมูลการสมัคร</h4>
                        
                        <div class="table-responsive">
                            <table class="table table-borderless align-middle">
                                <tr class="table-light"><th colspan="2" class="form-section-title py-2">ตำแหน่งที่สนใจสมัคร</th></tr>
                                <tr><th style="width: 30%;">ตำแหน่งงาน</th><td><?php echo htmlspecialchars($job); ?></td></tr>

                                <tr class="table-light"><th colspan="2" class="form-section-title py-2">ข้อมูลส่วนตัว</th></tr>
                                <tr><th>ชื่อ-สกุล</th><td><?php echo htmlspecialchars($pronoun . " " . $name); ?></td></tr>
                                <tr><th>วันเดือนปีเกิด</th><td><?php echo htmlspecialchars($dob); ?></td></tr>
                                <tr><th>ระดับการศึกษาสูงสุด</th><td><?php echo htmlspecialchars($edu); ?></td></tr>

                                <tr class="table-light"><th colspan="2" class="form-section-title py-2">ความสามารถและประสบการณ์</th></tr>
                                <tr><th>ความสามารถพิเศษ</th><td><?php echo nl2br(htmlspecialchars($skills)); ?></td></tr>
                                <tr><th>ประสบการณ์ทำงาน</th><td><?php echo nl2br(htmlspecialchars($exp)); ?></td></tr>
                            </table>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a href="" class="btn btn-outline-primary"><i class="bi bi-house-door me-1"></i> กลับหน้าหลัก</a>
                        </div>
                    </div>
                    <?php
                    // จบการทำงานในส่วนแสดงผลลัพธ์ ไม่ต้องแสดงฟอร์มด้านล่าง
                    exit(); 
                }
            } catch(PDOException $e) {
                echo '<div class="alert alert-danger">ข้อผิดพลาดฐานข้อมูล: ' . $e->getMessage() . '</div>';
            }
            ?>

            <header class="text-center mb-5">
                <h1 class="display-6 fw-bold text-primary">66010914032 นวพล ชุมพล (หลุยส์)</h1>
                <p class="lead text-muted">แบบฟอร์มรับสมัครงานออนไลน์</p>
            </header>

            <div class="card card-application p-4 p-md-5">
                <form method="post" action="">
                    <h3 class="form-section-title mb-3">1. ตำแหน่งที่สมัคร</h3>
                    <div class="mb-4">
                        <select class="form-select" name="job_position" required>
                            <option value="" selected disabled>--- เลือกตำแหน่งงาน ---</option>
                            <option value="Software Developer">Software Developer</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="Accountant">Accountant</option>
                        </select>
                    </div>

                    <h3 class="form-section-title mb-3">2. ข้อมูลส่วนตัว</h3>
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label class="form-label small fw-bold">คำนำหน้า</label>
                            <select class="form-select" name="prefix" required>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-md-9">
                            <label class="form-label small fw-bold">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" name="fullname" required placeholder="กรอกชื่อและนามสกุลจริง">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">วันเกิด</label>
                            <input type="date" class="form-control" name="dob" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">วุฒิการศึกษา</label>
                            <select class="form-select" name="education" required>
                                <option value="ปริญญาตรี">ปริญญาตรี</option>
                                <option value="ปริญญาโท">ปริญญาโท</option>
                                <option value="ปวส.">ปวส.</option>
                            </select>
                        </div>
                    </div>

                    <h3 class="form-section-title mb-3">3. ข้อมูลเพิ่มเติม</h3>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">ความสามารถพิเศษ</label>
                        <textarea class="form-control" name="skills" rows="2"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold">ประสบการณ์การทำงาน</label>
                        <textarea class="form-control" name="experience" rows="3"></textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" name="Submit" class="btn btn-primary btn-lg shadow-sm fw-bold">ส่งใบสมัครงาน</button>
                    </div>
                </form>
            </div>

            <footer class="mt-5 text-center text-muted small">
                <p>Designed with Gemini | Database: 4032db (Table: application)</p>
            </footer>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>