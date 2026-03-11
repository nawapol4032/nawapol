<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>นวพล ชุมพล</title>

    <style>
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            margin: 10px;
            border-radius: 5px;
        }

        .green-btn {
            background-color: green;
            color: white;
        }

        .orange-btn {
            background-color: orange;
            color: white;
        }

        img {
            margin-top: 20px;
            max-width: 300px;
            display: none;
        }
    </style>
</head>
<body>

    <h1>งาน k - 66010914032 นายนวพล ชุมพล</h1>

    <button class="green-btn" onclick="showImage('img1')">เปิดรูปที่ 1</button>
    <button class="orange-btn" onclick="showImage('img2')">เปิดรูปที่ 2</button>

    <br>

    <img id="img1" src="11.jpg" alt="รูปที่ 1">
    <img id="img2" src="22.jpg" alt="รูปที่ 2">

    <script>
        function showImage(id) {
            document.getElementById("img1").style.display = "none";
            document.getElementById("img2").style.display = "none";
            document.getElementById(id).style.display = "block";
        }
    </script>

</body>
</html>