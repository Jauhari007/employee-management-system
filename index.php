<?php
require_once 'config.php';
include 'includes/header.php';

// Fetch data for charts
$jk_query = $conn->query("SELECT jenis_kelamin, COUNT(*) as count FROM pegawai GROUP BY jenis_kelamin");
$jk_data = [];
$jk_labels = [];
while($row = $jk_query->fetch_assoc()){
    $jk_labels[] = $row['jenis_kelamin'];
    $jk_data[] = $row['count'];
}

$pend_query = $conn->query("SELECT pendidikan_terakhir, COUNT(*) as count FROM pegawai GROUP BY pendidikan_terakhir");
$pend_data = [];
$pend_labels = [];
while($row = $pend_query->fetch_assoc()){
    $pend_labels[] = $row['pendidikan_terakhir'];
    $pend_data[] = $row['count'];
}

$usia_query = $conn->query("SELECT 
    CASE 
        WHEN usia < 25 THEN '< 25'
        WHEN usia BETWEEN 25 AND 35 THEN '25-35'
        ELSE '> 35'
    END as range_usia, COUNT(*) as count 
    FROM pegawai GROUP BY range_usia");
$usia_data = [];
$usia_labels = [];
while($row = $usia_query->fetch_assoc()){
    $usia_labels[] = $row['range_usia'];
    $usia_data[] = $row['count'];
}
?>

<div class="card">
    <h2 class="card-title">Dashboard PT YOI CODE</h2>
    <p style="color: var(--text-muted); margin-bottom: 20px;">Selamat datang di Sistem Manajemen Data Pegawai PT YOI CODE.</p>
    
    <div class="charts-grid">
        <!-- Chart 1: Jenis Kelamin (Bar Chart) -->
        <div class="card" style="background: rgba(0,0,0,0.1);">
            <h3 class="card-title" style="font-size: 1rem;">Perbandingan Jenis Kelamin</h3>
            <canvas id="jkChart"></canvas>
        </div>
        
        <!-- Chart 2: Pendidikan Terakhir (Pie Chart) -->
        <div class="card" style="background: rgba(0,0,0,0.1);">
            <h3 class="card-title" style="font-size: 1rem;">Distribusi Pendidikan</h3>
            <canvas id="pendChart"></canvas>
        </div>
        
        <!-- Chart 3: Usia (Doughnut Chart) -->
        <div class="card" style="background: rgba(0,0,0,0.1);">
            <h3 class="card-title" style="font-size: 1rem;">Demografi Usia</h3>
            <canvas id="usiaChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    Chart.defaults.color = '#8a8a97';
    
    // Jenis Kelamin Chart
    const jkCtx = document.getElementById('jkChart').getContext('2d');
    new Chart(jkCtx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($jk_labels) ?>,
            datasets: [{
                label: 'Jumlah Pegawai',
                data: <?= json_encode($jk_data) ?>,
                backgroundColor: ['#4361ee', '#f72585'],
                borderWidth: 0,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true, grid: { color: 'rgba(255,255,255,0.05)' } }, x: { grid: { display: false } } },
            plugins: { legend: { display: false } }
        }
    });

    // Pendidikan Chart
    const pendCtx = document.getElementById('pendChart').getContext('2d');
    new Chart(pendCtx, {
        type: 'pie',
        data: {
            labels: <?= json_encode($pend_labels) ?>,
            datasets: [{
                data: <?= json_encode($pend_data) ?>,
                backgroundColor: ['#4cc9f0', '#3f37c9', '#f72585', '#4361ee', '#ffb703'],
                borderWidth: 0
            }]
        }
    });

    // Usia Chart
    const usiaCtx = document.getElementById('usiaChart').getContext('2d');
    new Chart(usiaCtx, {
        type: 'doughnut',
        data: {
            labels: <?= json_encode($usia_labels) ?>,
            datasets: [{
                data: <?= json_encode($usia_data) ?>,
                backgroundColor: ['#7209b7', '#4361ee', '#4cc9f0'],
                borderWidth: 0
            }]
        }
    });
</script>

<?php include 'includes/footer.php'; ?>
