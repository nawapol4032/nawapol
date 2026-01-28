<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>66010914032 นวพล ชุมพล (หลุยส์)</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    body {
        background-color: #f0f4f8; /* โทนสีเทาอ่อน/ฟ้าอ่อน */
    }
    .card-application {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
    }
    .form-section-title {
        border-left: 4px solid #007bff;
        padding-left: 1rem;
        font-weight: 600;
        color: #6c757d;
    }
    .result-table th, .result-table td {
        padding: 0.75rem;
    }
    .result-table th {
        width: 35%;
        color: #495057; /* Darker text for labels */
    }
</style>
</head>

<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            
            <header class="text-center mb-5">
                <h1 class="display-6 fw-bold text-primary">66010914032 นวพล ชุมพล (หลุยส์)</h1>
                <p class="lead text-muted">แบบฟอร์มใบสมัครงาน</p>
            </header>

            <?php
            // ตรวจสอบว่ามีการส่งข้อมูลฟอร์มมาหรือไม่
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // 1. รับและทำความสะอาดข้อมูลด้วย htmlspecialchars
                $job_position = htmlspecialchars($_POST['job_position'] ?? ' - ');
                $prefix = htmlspecialchars($_POST['prefix'] ?? ' - ');
                $fullname = htmlspecialchars($_POST['fullname'] ?? ' - ');
                $dob = htmlspecialchars($_POST['dob'] ?? ' - ');
                $education = htmlspecialchars($_POST['education'] ?? ' - ');
                $skills = htmlspecialchars($_POST['skills'] ?? ' - ');
                $experience = htmlspecialchars($_POST['experience'] ?? ' - ');

                // 2. แสดงผลลัพธ์ในรูปแบบ Card และ Alert เพื่อความสวยงาม
                echo '<div class="alert alert-success d-flex align-items-center" role="alert">';
                echo '  <i class="bi bi-check-circle-fill me-2 fs-4"></i>';
                echo '  <div>';
                echo '    <h4 class="alert-heading mb-1">การสมัครสำเร็จ!</h4>';
                echo '    <p class="mb-0">ข้อมูลใบสมัครงานของคุณถูกบันทึกเรียบร้อยแล้ว รายละเอียดดังนี้:</p>';
                echo '  </div>';
                echo '</div>';
                
                // Card แสดงรายละเอียดข้อมูล
                echo '<div class="card card-application p-4 p-md-5 mt-4">';
                echo '  <h4 class="text-primary mb-4"><i class="bi bi-file-text me-2"></i> สรุปข้อมูลการสมัคร</h4>';
                
                // ใช้ตาราง Bootstrap เพื่อจัดเรียงข้อมูล
                echo '  <table class="table table-sm result-table">';
                
                // ส่วนที่ 1: ตำแหน่ง
                echo '    <thead><tr class="table-light"><th colspan="2" class="form-section-title">ตำแหน่งที่สนใจสมัคร</th></tr></thead>';
                echo '    <tbody>';
                echo '      <tr><th>ตำแหน่งงาน</th><td>' . $job_position . '</td></tr>';
                echo '    </tbody>';

                // ส่วนที่ 2: ข้อมูลส่วนตัว
                echo '    <thead><tr class="table-light"><th colspan="2" class="form-section-title">ข้อมูลส่วนตัว</th></tr></thead>';
                echo '    <tbody>';
                echo '      <tr><th>ชื่อ-สกุล</th><td>' . $prefix . ' ' . $fullname . '</td></tr>';
                echo '      <tr><th>วันเดือนปีเกิด</th><td>' . $dob . '</td></tr>';
                echo '      <tr><th>ระดับการศึกษาสูงสุด</th><td>' . $education . '</td></tr>';
                echo '    </tbody>';

                // ส่วนที่ 3: ความสามารถและประสบการณ์
                echo '    <thead><tr class="table-light"><th colspan="2" class="form-section-title">ความสามารถและประสบการณ์</th></tr></thead>';
                echo '    <tbody>';
                // ใช้ nl2br() เพื่อให้การขึ้นบรรทัดใหม่ใน textarea แสดงผลถูกต้อง
                echo '      <tr><th>ความสามารถพิเศษ</th><td>' . nl2br($skills) . '</td></tr>';
                echo '      <tr><th>ประสบการณ์ทำงาน</th><td>' . nl2br($experience) . '</td></tr>';
                echo '    </tbody>';
                
                echo '  </table>';
                echo '</div>';

                // เพิ่มปุ่มกลับไปยังหน้าฟอร์ม (ถ้ามีการแยกไฟล์) หรือหน้าหลัก
                echo '<div class="text-center mt-4">';
                echo '  <button type="button" class="btn btn-outline-primary" onclick="history.back()">';
                echo '    <i class="bi bi-arrow-left me-1"></i> กลับไปหน้าฟอร์ม';
                echo '  </button>';
                echo '</div>';
                
            } else {
                // ถ้าไม่มีการส่งข้อมูล POST มา ให้แสดงฟอร์ม
            ?>
            <div class="card card-application p-4 p-md-5">
                <form method="post" action=""> 
                    
                    <div class="mb-4">
                        <h3 class="form-section-title mb-3">1. ตำแหน่งที่สนใจสมัคร</h3>
                        <div class="row">
                            <div class="col-12">
                                <label for="job_position" class="form-label">ตำแหน่งที่ต้องการสมัคร <span class="text-danger">*</span></label>
                                <select class="form-select" id="job_position" name="job_position" required>
                                    <option value="" selected disabled>--- กรุณาเลือกตำแหน่งงานที่สนใจ ---</option>
                                    <option value="Software Developer">Software Developer (แผนกพัฒนา)</option>
                                    <option value="Digital Marketing Specialist">Digital Marketing Specialist (แผนกการตลาด)</option>
                                    <option value="Financial Analyst">Financial Analyst (แผนกการเงิน)</option>
                                    <option value="HR Recruiter">HR Recruiter (แผนกบุคคล)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="text-secondary-subtle">

                    <div class="mb-4">
                        <h3 class="form-section-title mb-3">2. ข้อมูลส่วนตัว</h3>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="prefix" class="form-label">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                                <select class="form-select" id="prefix" name="prefix" required>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <label for="fullname" class="form-label">ชื่อ-สกุล <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" required>
                            </div>
                            <div class="col-md-6">
                                <label for="dob" class="form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>
                            <div class="col-md-6">
                                <label for="education" class="form-label">ระดับการศึกษาสูงสุด <span class="text-danger">*</span></label>
                                <select class="form-select" id="education" name="education" required>
                                    <option value="" selected disabled>--- เลือก ---</option>
                                    <option value="ปวส.">ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)</option>
                                    <option value="ปริญญาตรี">ปริญญาตรี</option>
                                    <option value="ปริญญาโท">ปริญญาโท</option>
                                    <option value="ปริญญาเอก">ปริญญาเอก</option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="text-secondary-subtle">

                    <div class="mb-5">
                        <h3 class="form-section-title mb-3">3. ความสามารถและประสบการณ์</h3>
                        
                        <div class="mb-3">
                            <label for="skills" class="form-label">ความสามารถพิเศษ (โปรแกรม/ภาษา/ทักษะอื่นๆ)</label>
                            <textarea class="form-control" id="skills" name="skills" rows="3" placeholder="ตัวอย่าง: ภาษาอังกฤษดีเยี่ยม, Python, Adobe Photoshop"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="experience" class="form-label">ประสบการณ์ทำงาน (โดยสรุป)</label>
                            <textarea class="form-control" id="experience" name="experience" rows="5" placeholder="โปรดระบุชื่อบริษัท ตำแหน่ง ระยะเวลา และหน้าที่รับผิดชอบโดยสังเขป"></textarea>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                            <i class="bi bi-send-fill me-2"></i> ส่งใบสมัคร
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            ล้างข้อมูลในฟอร์ม
                        </button>
                    </div>

                </form>
            </div>
            <?php
            } // ปิด if
            ?>
            <footer class="mt-4 text-center text-muted small">
                <p><br>
                สร้างและประมวลผลด้วยความช่วยเหลือจาก Gemini</p>
            </footer>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>