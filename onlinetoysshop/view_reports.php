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
        
        
               
        
    </head>
    <body>
        
        <div class="container-fluid">
            
            <?php
                include 'user_menu.php';
            ?> 
            
            
            <h1>10 Last Reports</h1>
            
            <div class="col-sm-12 row">
                
                <table class="table table-bordered table-hover">
                   
                    <tr>
                        <th>SN</th>
                        <th>Toy Name</th>   
                        <th>Category</th>
                        <th>Age Group</th>
                        <th>Order Quantity</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $user_id=$_SESSION['user_id'];
                    $result= mysqli_query($link, "SELECT * from cart inner JOIN age_group INNER JOIN toy_category INNER JOIN toy on cart.toy_id=toy.toy_id and toy.toy_category_id=toy_category.toy_category_id and toy.age_group_id=age_group.age_group_id WHERE cart.user_id = $user_id and cart.cart_item_status= 'Received' limit 10 ");
                    if($result){
                        if(mysqli_num_rows($result)){
                            $sn=1;
                            while ($row= mysqli_fetch_array($result)){
                                extract($row);
                                ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $toy_name; ?></td>                        
                        <td><?php echo $toy_category_name; ?></td>                        
                        <td><?php echo $age_group_name; ?></td>                        
                        <td><?php echo $cart_item_quantity; ?></td>                        
                        <td><?php echo date("d-m-Y", $cart_item_time); ?></td>    
                        <td><?php echo $cart_item_status; ?></td>  
                        

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
             </div>
            
            
            <div class="row">
                <?php include 'footer.php' ; ?>               
            </div>
        </div>
    </body>
</html>