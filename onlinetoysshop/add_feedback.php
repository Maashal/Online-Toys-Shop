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
       
        <?php 
        include 'res/functions.php';
        confirm_user();
        ?>
        
        <?php
        if(isset($_POST['add'])){
            $keyword=$_POST['keyword'];
            $toy_id=$_GET['toy_id'];
            $user_id=$_SESSION['user_id'];
            $query="insert into feedback values ('', '$toy_id', '$user_id', '$keyword' ) ";
            $result=mysqli_query($link, $query);
            if($result){
                alert("Added Successfuly");
                header("refresh:.1, url=view_orders.php");
            }else{
                alert(mysqli_error($link));
            }
        }
        ?>                
        
    </head>
    <body>
        
        <div class="container-fluid">
            
            <?php
                include 'user_menu.php';
            ?> 
            
            
            <h1>Add Feedback</h1>
            
            <div class="col-sm-12 row">
                <?php 
                if(isset($_SESSION['user_id'])){
                  ?>
                <div class="row">
                    <form method="post">                       
                        <div class="col-sm-8 col-sm-offset-2">
                            <input type="text" name="keyword" id="keyword" required="" placeholder="Enter Feedback" class="form-control"> 
                        </div>
                        <div class="col-sm-2">
                            <button name="add" class="btn btn-primary">Add Feedback</button>
                        </div>                        
                    </form>
                 </div>    
                <br>                
                <?php
                }
                ?>
                
            </div>
            
            
            <div class="row">
                <?php include 'footer.php' ; ?>               
            </div>
        </div>
    </body>
</html>                