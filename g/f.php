<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>66010914032 นวพล ชุมพล (หลุยส์)</title>
</head>

<body>
<h1>66010914032 นวพล ชุมพล (หลุยส์)</h1>

<table border="1">
<tr>
    <th>เดือน</th>
    <th>ยอดขาย</th>
</tr>

<?php
include_once("connectdb.php");

/* คำสั่ง SQL */
$sql = "SELECT 
            MONTH(p_date) AS Month, 
            SUM(p_amount) AS Total_Sales 
        FROM popsupermarket 
        GROUP BY MONTH(p_date) 
        ORDER BY Month";

$rs = mysqli_query($conn, $sql);

/* กำหนดชื่อเดือนภาษาไทย */
$monthName = [
    1 => "มกราคม",
    2 => "กุมภาพันธ์",
    3 => "มีนาคม",
    4 => "เมษายน",
    5 => "พฤษภาคม",
    6 => "มิถุนายน",
    7 => "กรกฎาคม",
    8 => "สิงหาคม",
    9 => "กันยายน",
    10 => "ตุลาคม",
    11 => "พฤศจิกายน",
    12 => "ธันวาคม"
];

/* แสดงผลข้อมูล */
while ($data = mysqli_fetch_array($rs)) {
?>
<tr>
    <td><?php echo $monthName[$data['Month']]; ?></td>
    <td align="right"><?php echo number_format($data['Total_Sales'], 0); ?></td>
</tr>
<?php
}

mysqli_close($conn);
?>

</table>
</body>
</html>
