<!doctype html>
<html>
    <head>
        <?php
        $message="";
        session_start();
        include 'connection.php';    
        ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1:">
        <title><?php echo $_SESSION['website_name']; ?></title>
        <link rel="icon" type="image/x-jpeg" href="uploads/icon.png"  />
        <link rel="stylesheet" type="text/css" href="res/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="res/stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="res/font-awesome/css/font-awesome.css">
        <link rel="icon" type="image/x-jpeg" href="res/icon.ico"  />    
        <script type="text/javascript" src="res/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="res/bootstrap/js/bootstrap.js"></script>   
        <script type="text/javascript" src="res/functions.js"></script>
        
        <?php 
        include 'res/functions.php';
        confirm_user();
        ?>
       
        
        <?php
        //saving cart items
        if(isset($_GET['toy_id'])){
            extract($_POST);
            extract($_GET);
            extract($_SESSION);
            $query0="select * from cart where user_id = $user_id and cart_item_status= 'Reserved' ";
            if($result0= mysqli_query($link, $query0)){
                if(mysqli_num_rows($result0)<3){
                    //adding new item in cart
                    $cart_item_time=time();
                    $query="insert into cart values ('', '$user_id', '$toy_id', '$toy_quantity', '$cart_item_time', 'Reserved' )";
                    if($result= mysqli_query($link, $query)){
                        if(mysqli_insert_id($link)){
                            alert("Item Added To Cart");
                        }else{
                            alert("Item Not Added To Cart");
                        }
                    }else{
                        alert(mysqli_error($link));
                    } 
                }else{
                    alert("Only 3 Item Allow at a time");                  
                }
            }else{
                alert(mysqli_error($link));
            }
            
             header("refresh:.1, url=user_homepage.php");

        }
        
        ?>
               
        <div class="row">
            <?php include 'footer.php' ; ?>               
        </div>
    </body>
</html>