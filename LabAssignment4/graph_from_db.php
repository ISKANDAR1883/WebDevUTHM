<?php
include 'connect.php';

$data = [];
$sql = "SELECT component, expenditure_2011 FROM domestic_visitors";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Expenditure by Domestic Visitors (2010 and 2011)</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@2.0.1"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #1a1a2e;
            color: #ffffff;
            margin: 0;
            padding: 40px 20px;
        }

        .chart-container {
            width: 95%;
            max-width: 850px;
            margin: 0 auto;
            background: #16213e;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
            height: 500px;
        }

        #lineChart {
            width: 100% !important;
            height: 100% !important;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            color: #f0f0f0;
        }
    </style>
</head>
<body>

<div class="chart-container">
    <h2>Expenditure by Domestic Visitors (2010 and 2011)</h2>
    <canvas id="lineChart"></canvas>
</div>

<script>
    const ctx = document.getElementById('lineChart').getContext('2d');

    const labels = <?php echo json_encode(array_column($data, 'component')); ?>;
    const data2011 = <?php echo json_encode(array_column($data, 'expenditure_2011')); ?>;
    const data2010 = <?php
        $conn = new mysqli("localhost", "root", "", "expenditure_db");
        $result2 = $conn->query("SELECT expenditure_2010 FROM domestic_visitors");
        $data2010 = [];
        while ($row = $result2->fetch_assoc()) $data2010[] = $row['expenditure_2010'];
        echo json_encode($data2010);
    ?>;

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: '2010 (RM million)',
                    data: data2010,
                    borderColor: 'rgba(255, 206, 86, 1)',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 4,
                    pointBackgroundColor: 'rgba(255, 206, 86, 1)'
                },
                {
                    label: '2011 (RM million)',
                    data: data2011,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 4,
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: '#ffffff'
                    }
                },
                zoom: {
                    zoom: {
                        wheel: { enabled: true },
                        pinch: { enabled: true },
                        mode: 'x'
                    },
                    pan: {
                        enabled: true,
                        mode: 'x'
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Expenditure (RM millions)',
                        color: '#ffffff'
                    },
                    ticks: {
                        color: '#ffffff'
                    },
                    grid: {
                        color: '#333'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Component',
                        color: '#ffffff'
                    },
                    ticks: {
                        color: '#ffffff'
                    },
                    grid: {
                        color: '#333'
                    }
                }
            }
        }
    });
</script>

</body>
</html>
