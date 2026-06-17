<aside class="sidebar">
    <div class="brand">
        <div class="logo-icon">🌿</div>
        <div>
            <h2>FreshGuard</h2>
            <p>Supermarket Waste Control</p>
        </div>
    </div>

    <div class="userbox">
        <strong><?php echo $_SESSION["name"]; ?></strong>
        <small><?php echo $_SESSION["role"]; ?></small>
    </div>

    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="store.php">Store Profile</a>
        <a href="add_stock.php">Add Stock</a>
        <a href="track_stock.php">Track Stock</a>
        <a href="expiry_alerts.php">Expiry Alerts</a>
        <a href="forecasting.php">AI Forecasting</a>
        <a href="reports.php">Reports</a>
        <a href="report_recipients.php">Report Emails</a>
        <a href="staff.php">Staff Access</a>
        <a href="logout.php">Sign Out</a>
    </nav>
</aside>