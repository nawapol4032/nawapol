<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>66010914032 นวพล ชุมพล (หลุยส์)</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    /* ปรับสีพื้นหลังให้ดูสบายตาและเป็น Minimal */
    body {
        background-color: #f0f4f8; /* โทนสีเทาอ่อน/ฟ้าอ่อน */
    }
    .card-application {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
    }
    .form-section-title {
        border-left: 4px solid #007bff; /* สีฟ้าอ่อน/Primary สำหรับเน้นส่วน */
        padding-left: 1rem;
        font-weight: 600;
        color: #6c757d; /* text-secondary */
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

            <div class="card card-application p-4 p-md-5">
                <form method="post" action="submit_application.php">
                    
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
                                <div class="form-text text-secondary">ตัวอย่าง: 01/01/1990</div>
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
                            <div class="form-text text-secondary">โปรดระบุทักษะที่โดดเด่นและเกี่ยวข้องกับตำแหน่ง</div>
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
            
            <footer class="mt-4 text-center text-muted small">
                <p>ออกแบบฟอร์มโดยใช้ Bootstrap v5.3<br>
                สร้างและตกแต่งด้วยความช่วยเหลือจาก Gemini</p>
            </footer>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>