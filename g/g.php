<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>66010914032 นวพล ชุมพล (หลุยส์)</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    /* ตั้งค่าตัวแปรสีสำหรับ Light และ Dark Mode */
    :root {
        --bg-body: #f8f9fa;
        --bg-card: #ffffff;
        --text-main: #333333;
        --text-sub: #666666;
        --border-color: #eeeeee;
        --table-header: #f1f3f5;
    }

    [data-theme="dark"] {
        --bg-body: #121212;
        --bg-card: #1e1e1e;
        --text-main: #e0e0e0;
        --text-sub: #b0b0b0;
        --border-color: #333333;
        --table-header: #2d2d2d;
    }

    body { font-family: 'Sarabun', sans-serif; background-color: var(--bg-body); color: var(--text-main); padding: 30px; transition: all 0.3s ease; }
    .container { max-width: 1000px; margin: auto; background: var(--bg-card); padding: 25px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
    
    /* ปุ่มสลับโหมด */
    .mode-switch { text-align: right; margin-bottom: 20px; }
    .btn-toggle { padding: 8px 16px; cursor: pointer; border-radius: 20px; border: 1px solid var(--border-color); background: var(--bg-card); color: var(--text-main); font-size: 0.8rem; }

    h1 { text-align: center; color: var(--text-main); font-size: 1.4rem; margin-bottom: 30px; }
    .chart-box { display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 40px; }
    .chart-item { flex: 1; min-width: 300px; height: 350px; }
    
    table { width: 100%; border-collapse: collapse; margin-top: 20px; border-radius: 8px; overflow: hidden; }
    th { background-color: var(--table-header); color: var(--text-main); padding: 12px; text-align: left; border-bottom: 2px solid var(--border-color); }
    td { padding: 12px; border-bottom: 1px solid var(--border-color); color: var(--text-sub); }
</style>
</head>

<body>
<div class="container">
    <div class="mode-switch">
        <button class="btn-toggle" onclick="toggleTheme()">สลับโหมด 🌓</button>
    </div>

    <h1>66010914032 นวพล ชุมพล (หลุยส์)</h1>

    <div class="chart-box">
        <div class="chart-item">
            <canvas id="barChart"></canvas>
        </div>
        <div class="chart-item">
            <canvas id="doughnutChart"></canvas>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>เดือน</th>
                <th style="text-align: right;">ยอดขาย (บาท)</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include_once("connectdb.php");
        $sql = "SELECT MONTH(p_date) AS Month, SUM(p_amount) AS Total_Sales FROM popsupermarket GROUP BY MONTH(p_date) ORDER BY Month";
        $rs = mysqli_query($conn, $sql);
        $monthName = [1=>"มกราคม", 2=>"กุมภาพันธ์", 3=>"มีนาคม", 4=>"เมษายน", 5=>"พฤษภาคม", 6=>"มิถุนายน", 7=>"กรกฎาคม", 8=>"สิงหาคม", 9=>"กันยายน", 10=>"ตุลาคม", 11=>"พฤศจิกายน", 12=>"ธันวาคม"];
        $labels = []; $values = [];
        while ($data = mysqli_fetch_array($rs)) {
            $labels[] = $monthName[$data['Month']];
            $values[] = (float)$data['Total_Sales'];
        ?>
            <tr>
                <td><?php echo $monthName[$data['Month']]; ?></td>
                <td align="right"><?php echo number_format($data['Total_Sales'], 0); ?></td>
            </tr>
        <?php } mysqli_close($conn); ?>
        </tbody>
    </table>
</div>

<script>
const labels = <?php echo json_encode($labels); ?>;
const dataValues = <?php echo json_encode($values); ?>;

// สี Pastel ที่มองเห็นชัดทั้งในโหมดสว่างและมืด
const colors = ['#FF8A8A', '#FFB38E', '#FFF5A5', '#A5E1AD', '#94DAFF', '#99A7FB', '#D4ADFC', '#FFC7C7'];

// กำหนด Font Color เริ่มต้นให้ Chart.js
Chart.defaults.color = '#666';

const configBar = {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'ยอดขายรายเดือน',
            data: dataValues,
            backgroundColor: colors,
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
            y: { grid: { color: 'rgba(150, 150, 150, 0.1)' } },
            x: { grid: { display: false } }
        }
    }
};

const configDoughnut = {
    type: 'doughnut',
    data: {
        labels: labels,
        datasets: [{
            data: dataValues,
            backgroundColor: colors,
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '70%',
        plugins: { legend: { position: 'bottom' } }
    }
};

let barChart = new Chart(document.getElementById('barChart'), configBar);
let doughnutChart = new Chart(document.getElementById('doughnutChart'), configDoughnut);

// ฟังก์ชันสลับโหมด
function toggleTheme() {
    const body = document.body;
    const currentTheme = body.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    body.setAttribute('data-theme', newTheme);
    
    // ปรับสีตัวอักษรในกราฟตามโหมด
    const newTextColor = newTheme === 'dark' ? '#e0e0e0' : '#666';
    const newGridColor = newTheme === 'dark' ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.05)';
    
    [barChart, doughnutChart].forEach(chart => {
        chart.options.plugins.legend.labels.color = newTextColor;
        if(chart.options.scales) {
            chart.options.scales.y.ticks.color = newTextColor;
            chart.options.scales.x.ticks.color = newTextColor;
            chart.options.scales.y.grid.color = newGridColor;
        }
        chart.update();
    });
}
</script>
</body>
</html>