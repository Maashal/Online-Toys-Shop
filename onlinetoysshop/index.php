<!doctype html>
<html>
    <head>
        <?php
        $message="";
        session_start();
        include 'connection.php';
        $_SESSION['website_name']="kidZone Online Toy Shop";
        ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1:">
        <title><?php echo $_SESSION['website_name']; ?></title>
        <link rel="icon" type="image/x-jpeg" href="logo.jpeg"  />
        <link rel="stylesheet" type="text/css" href="res/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="res/stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="res/font-awesome/css/font-awesome.css">
            
        <script type="text/javascript" src="res/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="res/bootstrap/js/bootstrap.js"></script>   
        <script type="text/javascript" src="res/functions.js"></script>
        <?php include 'res/functions.php'; ?>
    </head>
    <body>
        
        <div class="container-fluid">
            
            <?php include 'guest_menu.php'; ?>
            
            <h1>Welcome To <?php echo $_SESSION['website_name']; ?></h1>
            
            <?php
                    include_once 'show_toys.php';            
            ?>
 
            <div class="row">
                <?php include 'footer.php' ; ?>               
            </div>
            
        </div>
    </body>
</html>