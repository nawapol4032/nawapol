<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>66010914032 นวพล ชุมพล</title>
</head>

<body>
<h1>งาน i- 66010914032 นวพล ชุมพล</h1>

<?php
include_once("connectdb.php"); 

$sql = "SELECT * FROM regions";
$rs = mysqli_query($conn, $sql);
?>

<table border="1">
    <tr>
        <th>รหัสภาค</th>
        <th>ชื่อภาค</th>
    </tr>
<?php
while ($data = mysqli_fetch_array($rs)) {
?>
    <tr>
        <td><?php echo $data['r_id']; ?></td>
        <td><?php echo $data['r_name']; ?></td>
    </tr>
<?php 
}

mysqli_close($conn);
?>
</table>

</body>
</html>