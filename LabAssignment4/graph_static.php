<!DOCTYPE html>
<html>
<head>
    <title>Domestic Tourists Expenditure (2010 & 2011)</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            padding: 20px;
        }

        .wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
        }

        .chart-wrapper {
            width: 100%;
            max-width: 700px;
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2, h3 {
            text-align: center;
        }

        .chart-container {
            position: relative;
            height: 400px;
            margin-top: 20px;
        }

        canvas {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
</head>
<body>

<h2>Domestic Tourists Expenditure Comparison (2010 vs 2011)</h2>
<div class="wrapper">
    <!-- Bar Chart 2010 -->
    <div class="chart-wrapper">
        <h3>Year 2010</h3>
        <div class="chart-container">
            <canvas id="barChart2010"></canvas>
        </div>
    </div>

    <!-- Bar Chart 2011 -->
    <div class="chart-wrapper">
        <h3>Year 2011</h3>
        <div class="chart-container">
            <canvas id="barChart2011"></canvas>
        </div>
    </div>
</div>

<script>
    const labels = [
        'Food & beverages',
        'Transport',
        'Accommodation',
        'Shopping',
        'Expenditure before trip',
        'Other activities'
    ];

    const values2010 = [6448, 6220, 6096, 2603, 595, 1722];
    const values2011 = [7756, 7417, 4985, 3801, 801, 2249];

    const tickOptions = {
        autoSkip: false,
        maxRotation: 0,
        minRotation: 0,
        font: {
            size: 10
        },
        padding: 5
    };

    // Bar Chart 2010
    new Chart(document.getElementById('barChart2010').getContext('2d'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Expenditure (RM million)',
                data: values2010,
                backgroundColor: '#76C893',
                borderColor: '#40916C',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Expenditure (RM million)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Category'
                    },
                    ticks: tickOptions
                }
            }
        }
    });

    // Bar Chart 2011
    new Chart(document.getElementById('barChart2011').getContext('2d'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Expenditure (RM million)',
                data: values2011,
                backgroundColor: '#FFD6A5',
                borderColor: '#FFADAD',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Expenditure (RM million)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Category'
                    },
                    ticks: tickOptions
                }
            }
        }
    });
</script>

</body>
</html>