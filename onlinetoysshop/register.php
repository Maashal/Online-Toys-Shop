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
        
        <?php

        if(isset($_POST['submit'])){
        extract($_POST);
            $query="insert into user values ('', '$name', '$email', '$password', '$contact', '$role' )";
            $result= mysqli_query($link, $query);
            if($result){
                alert("Registration Successful.");
                header("refresh:1, url=login.php");
            }else{
                alert(mysqli_error($link));
            }               
        }
        ?>        

    </head>
    
    
    <body>
        
        <div class="container-fluid">

            <?php include 'guest_menu.php'; ?>
            
            <div class="div_form" style="margin-left: 20%; width: 60%">
                <form method="post" action="">
                    <h1>Register New User</h1>
                    <hr>
                    <label>Name</label>
                    <input autofocus="" type="text" name="name" required="" placeholder="Enter Full Name"><br>
                    <label>Email</label>
                    <input type="email" name="email" required="" placeholder="Enter Email"><br>
                    <label>Password</label>
                    <input type="password" name="password" required="" placeholder="Enter Password"><br>
                    <label>Contact</label>
                    <input type="number" name="contact" required="" placeholder="Enter Contact Number" /><br>
                    <label>Role</label>
                    <input type="text" readonly="" value="User" name="role" required="">
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    <button class="btn btn-warning" type="reset">Reset</button>
                </form>
            </div>
            
            
            
            <div class="row">
                <?php include 'footer.php' ; ?>               
            </div>
        </div>
    </body>
</html>