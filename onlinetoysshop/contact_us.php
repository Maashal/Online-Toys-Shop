<!doctype html>
<html>
    <head>
        <?php
        session_start();
        include 'connection.php';       
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
            
                <h1>Contact Us</h1>
                
                <div class="text text-muted" style="font-size: 24px; padding: 10px">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.               </div>

                <br><br>
                <a target="_blank" href="https://wa.me/923000000000"><span class="fa fa-whatsapp fa-2x"> Contact Via WhatsApp</span></a>
                <br><br>
                <a target="_blank" href="https://www.facebook.com/abcd"><span class="fa fa-facebook fa-2x"> Contact Via Facebook</span></a>
                <br><br>
                <a target="_blank" href="https://www.instagram.com/abcd"><span class="fa fa-instagram fa-2x"> Contact Via Instgram</span></a>

            
            
            
            <div class="row">
                <?php include 'footer.php' ; ?>               
            </div>
        </div>
    </body>
</html>