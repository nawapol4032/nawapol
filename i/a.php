<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>66010914032 นวพล ชุมพล</title>
</head>

<body>
<h1>งาน i- 66010914032 นวพล ชุมพล</h1>

<?php
include_once("connectdb_php")
$sql = "SELECT * FROM 'regions'";
$rs = mysqli_query($conn, $sql)
while ($data - mysqli_fetch_arry($rs)){
    echo $data['r_id']."<br>"
    echo $data['r_name']."<br>"
}

mysqli_closer($conn);
?>

</body>
</html>
