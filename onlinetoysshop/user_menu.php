<div class="row hidden-print">
    <div class="main_menu row">
        <i style="float: left">
            <img alt="no img"
                     src="logo.jpeg" class="img img-responsive"
                     style="width: 120px; height: 70px; outline: 2px wheat solid; "
                     >
        </i>
        <span style="float: right">            
            <a href="user_homepage.php">Home</a>      
            <a href="view_orders.php">Orders</a>      
            <a href="view_reports.php">Reports</a>      
            <a href="logout.php">Logout <?php echo $_SESSION['user_role']; ?></a>        
        </span>
    </div>
</div>