<?php
session_start(); include "includes/db.php"; include "includes/model.php"; requireLogin(); requirePermission("can_view_reports");
$msg="";
if(isset($_GET["disable"])){ mysqli_query($conn,"UPDATE report_recipients SET status='Disabled' WHERE id=".intval($_GET["disable"])); header("Location: report_recipients.php"); exit(); }
if(isset($_GET["enable"])){ mysqli_query($conn,"UPDATE report_recipients SET status='Active' WHERE id=".intval($_GET["enable"])); header("Location: report_recipients.php"); exit(); }

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=mysqli_real_escape_string($conn,$_POST["recipient_name"]);
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $role=mysqli_real_escape_string($conn,$_POST["role"]);
    $freq=mysqli_real_escape_string($conn,$_POST["report_frequency"]);
    mysqli_query($conn,"INSERT INTO report_recipients(recipient_name,email,role,report_frequency,status) VALUES('$name','$email','$role','$freq','Active')");
    $msg="Report recipient added.";
}
$rec=mysqli_query($conn,"SELECT * FROM report_recipients ORDER BY status ASC, role ASC");
?><!DOCTYPE html><html><head><title>Report Emails</title><link rel="stylesheet" href="assets/style.css"></head><body><div class="layout"><?php include "includes/sidebar.php"; ?><main class="main">
<div class="page-title"><h1>Report Email Settings</h1><p>Manage staff and manager emails for daily, weekly or monthly reports</p></div>

<div class="card">
<h2>Add Report Recipient</h2><br>
<?php if($msg) echo "<p style='color:green'>$msg</p><br>"; ?>
<form method="POST" class="form-grid">
<input name="recipient_name" placeholder="Recipient name" required>
<input type="email" name="email" placeholder="Email address" required>
<input name="role" placeholder="Role e.g. Manager, Staff, Supervisor" required>
<select name="report_frequency"><option>Daily</option><option>Weekly</option><option>Monthly</option></select>
<button>Add Recipient</button>
</form>
</div><br>

<div class="card table-wrap">
<h2>Current Report Recipients</h2><br>
<table><tr><th>Name</th><th>Email</th><th>Role</th><th>Frequency</th><th>Status</th><th>Action</th></tr>
<?php while($x=mysqli_fetch_assoc($rec)){ ?>
<tr><td><?= $x["recipient_name"] ?></td><td><?= $x["email"] ?></td><td><?= $x["role"] ?></td><td><?= $x["report_frequency"] ?></td><td><?= $x["status"] ?></td><td><?php if($x["status"]=="Active"){ ?><a class="btn btn-danger" href="?disable=<?= $x["id"] ?>">Disable</a><?php } else { ?><a class="btn btn-light" href="?enable=<?= $x["id"] ?>">Enable</a><?php } ?></td></tr>
<?php } ?>
</table>
</div>

<div class="note"><strong>Daily report workflow:</strong> In a real production server this page would connect to a scheduled cron job and SMTP mail server. For XAMPP demonstration, the system generates reports and stores the delivery record in Report History.</div>
</main></div></body></html>