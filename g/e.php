<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>66010914032 นวพล ชุมพล (หลุยส์)</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    body { font-family: 'Sarabun', sans-serif; padding: 20px; color: #333; background: #f9f9f9; }
    .container { max-width: 900px; margin: auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    .chart-box { display: flex; gap: 20px; margin-bottom: 40px; flex-wrap: wrap; }
    .chart-container { flex: 1; min-width: 300px; height: 300px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 12px; border: 1px solid #eee; text-align: left; }
    th { background-color: #fcfcfc; }
    h1 { text-align: center; font-size: 1.5rem; margin-bottom: 30px; }
</style>
</head>

<body>
<div class="container">
    <h1>66010914032 นวพล ชุมพล (หลุยส์)</h1>

    <div class="chart-box">
        <div class="chart-container">
            <canvas id="myBarChart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="myPieChart"></canvas>
        </div>
    </div>

    <table>
        <tr>
            <th>ประเทศ</th>
            <th style="text-align: right;">ยอดขาย</th>
        </tr>
        <?php
        include_once("connectdb.php");
        $sql = "SELECT `p_country`, SUM(`p_amount`) AS total FROM `popsupermarket` GROUP BY `p_country`";
        $rs = mysqli_query($conn, $sql);
        
        $countries = [];
        $totals = [];

        while ($data = mysqli_fetch_array($rs)) { 
            // เก็บข้อมูลไว้ใน Array สำหรับใช้ใน JavaScript
            $countries[] = $data['p_country'];
            $totals[] = $data['total'];
        ?>
        <tr>
            <td><?php echo $data['p_country'];?></td>
            <td align="right"><?php echo number_format($data['total'], 0);?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<script>
// 4. เตรียมข้อมูลจาก PHP ส่งให้ JavaScript
const labels = <?php echo json_encode($countries); ?>;
const dataValues = <?php echo json_encode($totals); ?>;

// ตั้งค่าสีแบบ Minimal (Pastel Tone)
const backgroundColors = [
    'rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 
    'rgba(255, 206, 86, 0.7)', 'rgba(75, 192, 192, 0.7)', 
    'rgba(153, 102, 255, 0.7)'
];

const commonOptions = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        legend: { position: 'bottom' }
    }
};

// วาด Bar Chart
new Chart(document.getElementById('myBarChart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'ยอดขายรายประเทศ',
            data: dataValues,
            backgroundColor: backgroundColors,
            borderRadius: 5
        }]
    },
    options: commonOptions
});

// วาด Pie Chart
new Chart(document.getElementById('myPieChart'), {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            data: dataValues,
            backgroundColor: backgroundColors,
            borderWidth: 2
        }]
    },
    options: commonOptions
});
</script>

</body>
</html>