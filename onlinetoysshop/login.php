<!doctype html>
<html>
    <head>
        <?php
        session_start();
        include 'connection.php';
        $email_val="";
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
        //login
        if(isset($_POST['login'])){
            //User login
            $email=$_POST['email'];
            $email_val=$email;
            $password=$_POST['password'];
            $role=$_POST['role'];
            $query=" select * from user where user_email='$email' and user_password='$password' and user_role = '$role' ";
            if($result= mysqli_query($link, $query)){
                if(mysqli_num_rows($result)){
                    $row= mysqli_fetch_array($result);
                    extract($row);
                    $_SESSION['user_id']=$user_id;
                    $_SESSION['user_name']=$user_name;
                    $_SESSION['user_contact']= $user_contact;
                    $_SESSION['user_email']= $user_email;
                    $_SESSION['user_role']=$user_role;
                    
                    alert($_SESSION['website_name']);
                    $loc=$role."_homepage.php";
                    header("refresh:.1, url=$loc");
                }else{
                    alert("email or passwrod is incorrect");
                }
            }else{
                alert(mysqli_error($link));
            } 
        }
        ?>        

    </head>
    <body>
        
        <div class="container-fluid">
            
            <?php include 'guest_menu.php'; ?>   
            
            <div class="div_form" style="margin-left: 33%; width: 33%">
                <form method="post" action="">
                    <h1>Login</h1>
                    <hr>
                    <label>Email</label>
                    <input autofocus="" value="<?php echo $email_val; ?>" type="email" name="email" required="" placeholder="Enter Email"><br>
                    <label>Password</label>
                    <input type="password" name="password" required="" placeholder="Enter Password" /><br>
                    <label>Role</label>
                    <select name="role" required="">
                        <option value="">Select an option from flowing</option>
                        <option>User</option>
                        <option>Admin</option>
                    </select>
                    <button class="btn btn-success" type="submit" name="login">Submit</button>
                    <button class="btn btn-warning" type="reset">Reset</button>
                </form>
            </div>
            
            
            
            <div class="row">
                <?php include 'footer.php' ; ?>               
            </div>
        </div>
    </body>
</html>