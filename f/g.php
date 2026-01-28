<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>66010914032 นวพล ชุมพล (หลุยส์) โปรแกรมแม่สูตรคูณ</title>
</head>

<body>
<h1>66010914032 นวพล ชุมพล (หลุยส์) - โปรแกรมแม่สูตรคูณ</h1>
<hr>

<form method="post" action="">
	แม่สูตร<input type="number" min"2" max="1000" name="a" autofocus required>
    <button type="submit" name="Submit">OK</button>
</form>

<?php
if (isset($_POST['Submit'])){
	$m = $_POST['a'];
for($i=1; $i<=12; $i++){
	$x = $m * $i ;
	echo "{$m} x {$i} = {$x}<br>";
	}
}
?>


</body>
</html>