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
        ?>
               
        
    </head>
    <body>
        
        <div class="container-fluid">
            
            <h1><?php echo $_SESSION['website_name']; ?></h1>           
            <hr>
            <h1>Feedback</h1>
            
            <div class="col-sm-12 row">
                
                
                <table class="table table-bordered table-hover">
                   
                    <tr>
                        <th>SN</th>
                        <th>User Name</th>   
                        <th>Feedback</th>
                    </tr>
                    <?php
                    extract($_GET);
                    $result= mysqli_query($link, "select * from feedback inner join user on feedback.user_id=user.user_id where feedback.toy_id = $toy_id");
                    if($result){
                        if(mysqli_num_rows($result)){
                            $sn=1;
                            while ($row= mysqli_fetch_array($result)){
                                extract($row);
                                ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $user_name; ?></td>
                        <td><?php echo $feedback_detail; ?></td>                        
                    </tr>
                    <?php
                            }                            
                        }else{
                            echo "<tr><td colspan='9'>No data found</td></tr>";
                        }

                    }else{
                       echo mysqli_error($link);
                       exit(0);
                    }
                    ?>
                    
                </table>
                <a class="btn btn-danger" href="javascript:close()">Close This Window</a>
                
            </div>
            
            
            <div class="row">
                <?php include 'footer.php' ; ?>               
            </div>
        </div>
    </body>
</html>