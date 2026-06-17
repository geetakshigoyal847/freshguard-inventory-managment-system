<?php
session_start(); include "includes/db.php"; include "includes/model.php"; requireLogin();
$store=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM store_profile WHERE id=1"));
$cf=mysqli_query($conn,"SELECT * FROM customer_forecast");
?><!DOCTYPE html><html><head><title>Store Profile</title><link rel="stylesheet" href="assets/style.css"></head><body><div class="layout"><?php include "includes/sidebar.php"; ?><main class="main">
<div class="page-title"><h1>FreshGuard Supermarket Profile</h1><p>Store demand and customer forecast overview</p></div>
<div class="grid grid-4"><div class="card stat"><h3>Store Name</h3><strong><?= $store["store_name"] ?></strong></div><div class="card stat"><h3>Suburb</h3><strong><?= $store["suburb"] ?></strong></div><div class="card stat"><h3>Last Month Avg Daily Customers</h3><strong><?= number_format($store["avg_daily_customers_last_month"]) ?></strong></div><div class="card stat"><h3>Next Month Predicted Daily Customers</h3><strong><?= number_format($store["predicted_daily_customers_next_month"]) ?></strong></div></div><br>
<div class="card table-wrap"><h2>Monthly Customer Forecast</h2><br><table><tr><th>Week</th><th>Past Month Customers</th><th>Future Month Predicted Customers</th><th>Change</th></tr>
<?php while($c=mysqli_fetch_assoc($cf)){ $change=$c["predicted_next_month_customers"]-$c["past_month_customers"]; ?><tr><td><?= $c["week_label"] ?></td><td><?= number_format($c["past_month_customers"]) ?></td><td><?= number_format($c["predicted_next_month_customers"]) ?></td><td>+<?= number_format($change) ?></td></tr><?php } ?>
</table></div></main></div></body></html>