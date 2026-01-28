<?php
$host = "localhost";
$user = "root";
$pwd = "";
$db = "4032db";

$conn = new mysqli($host, $user, $pwd, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a_position   = $_POST['a_position'];
    $a_pronoun    = $_POST['a_pronoun'];
    $a_name       = $_POST['a_fullname'];
    $a_birthday   = $_POST['a_birthday'];
    $a_education  = $_POST['a_education'];
    $a_skills     = $_POST['a_skills'];
    $a_exp        = $_POST['a_experience'];

    $sql = "INSERT INTO application (a_position, a_pronoun, a_name, a_birthday, a_education, a_skills, a_exp)
            VALUES ('$a_position', '$a_pronoun', '$a_name', '$a_birthday', '$a_education', '$a_skills', '$a_exp')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว'); window.location='index.html';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>