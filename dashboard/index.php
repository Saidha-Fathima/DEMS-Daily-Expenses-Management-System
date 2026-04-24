<?php
session_start();
include('../config/db.php');

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

/* =========================
   SUMMARY DATA
========================= */

$q1 = mysqli_query($conn,"SELECT SUM(ecost) as total FROM table1 WHERE user_id='$user_id' AND edate=CURDATE()");
$r1 = mysqli_fetch_assoc($q1);

$q2 = mysqli_query($conn,"SELECT SUM(ecost) as total FROM table1 WHERE user_id='$user_id'");
$r2 = mysqli_fetch_assoc($q2);

$q3 = mysqli_query($conn,"SELECT COUNT(*) as total FROM table1 WHERE user_id='$user_id'");
$r3 = mysqli_fetch_assoc($q3);

$q4 = mysqli_query($conn,"SELECT COUNT(*) as total FROM table1 WHERE user_id='$user_id' AND edate=CURDATE()");
$r4 = mysqli_fetch_assoc($q4);

/* =========================
   CATEGORY CHART
========================= */

$catQ = mysqli_query($conn,"
SELECT edisc, SUM(ecost) as total 
FROM table1 
WHERE user_id='$user_id'
GROUP BY edisc
");

$catLabels = array();
$catData = array();

while($row = mysqli_fetch_assoc($catQ)){
    $catLabels[] = $row['edisc'];
    $catData[] = $row['total'];
}

/* =========================
   DATE CHART
========================= */

$dateQ = mysqli_query($conn,"
SELECT edate, SUM(ecost) as total 
FROM table1 
WHERE user_id='$user_id'
GROUP BY edate
ORDER BY edate ASC
");

$dateLabels = array();
$dateData = array();

while($row = mysqli_fetch_assoc($dateQ)){
    $dateLabels[] = $row['edate'];
    $dateData[] = $row['total'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://localhost/dems/css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<?php include('../includes/sidebar.php'); ?>

<div class="main">

<?php include('../includes/header.php'); ?>

<!-- =========================
     CARDS
========================= -->
<div class="cards">

    <div class="card">
        <h3>Today's Expense</h3>
        <p><?php echo $r1['total'] ? $r1['total'] : 0; ?></p>
    </div>

    <div class="card">
        <h3>Total Expense</h3>
        <p><?php echo $r2['total'] ? $r2['total'] : 0; ?></p>
    </div>

    <div class="card">
        <h3>Total Entries</h3>
        <p><?php echo $r3['total']; ?></p>
    </div>

    <div class="card">
        <h3>Today Entries</h3>
        <p><?php echo $r4['total']; ?></p>
    </div>

</div>

<!-- =========================
     CHARTS
========================= -->

<div class="charts">

    <div class="chart-box">
        <h3>Category Wise Expense</h3>
        <canvas id="catChart"></canvas>
    </div>

    <div class="chart-box">
        <h3>Date Wise Expense</h3>
        <canvas id="dateChart"></canvas>
    </div>

</div>

</div>

<!-- =========================
     CHART SCRIPT
========================= -->

<script>

// CATEGORY CHART
var catLabels = <?php echo json_encode($catLabels); ?>;
var catData = <?php echo json_encode($catData); ?>;

new Chart(document.getElementById("catChart"), {
    type: "bar",
    data: {
        labels: catLabels,
        datasets: [{
            label: "Expense",
            data: catData,
            backgroundColor: "#ff3473"
        }]
    }
});

// DATE CHART
var dateLabels = <?php echo json_encode($dateLabels); ?>;
var dateData = <?php echo json_encode($dateData); ?>;

new Chart(document.getElementById("dateChart"), {
    type: "line",
    data: {
        labels: dateLabels,
        datasets: [{
            label: "Daily Expense",
            data: dateData,
            borderColor: "#12a4d9",
            fill: false,
            tension: 0.3
        }]
    }
});

</script>

</body>
</html>