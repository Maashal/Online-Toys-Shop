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
        confirm_admin();
        ?>
        
        
               
        
    </head>
    <body>
        
        <div class="container-fluid">
            
            <?php
                include 'admin_menu.php';
            ?> 
            
            <br>
            <a class="btn btn-default" href="view_stock_reports.php">View Inventory Report</a>
            
            <h1>Sale's Report</h1>
            
            <div class="row">
                <form method="post">
                    <div class="col-sm-4 col-sm-offset-2">
                         <input type="date" name="time_from" required="" class="form-control">
                    </div>
                    <div class="col-sm-4">
                         <input type="date" name="time_to" required="" class="form-control">
                    </div>
                    <div class="col-sm-1">
                        <button class="btn btn-primary" name="submit">Proceed</button>
                    </div>                    
                </form>                              
            </div>
            <br>
            
            <div class="col-sm-12 row">
                
                <table class="table table-bordered table-hover">
                   
                    <tr>
                        <th>SN</th>
                        <th>Toy Name</th>   
                        <th>Category</th>
                        <th>Age Group</th>
                        <th>Date</th>
                        <th>Sold Quantity</th>
                    </tr>
                    <?php
                    if(isset($_POST['submit'])){
                        extract($_POST);
                        $time_from= strtotime($time_from);
                        $time_to= strtotime($time_to);
                        $query="SELECT * from cart inner JOIN age_group INNER JOIN toy_category INNER JOIN toy on cart.toy_id=toy.toy_id and toy.toy_category_id=toy_category.toy_category_id and toy.age_group_id=age_group.age_group_id where $time_from <= cart_item_time and $time_to >= cart_item_time  ";
                        $result= mysqli_query($link, $query);  
                        //takign max
                        $query1= "select max(cart_item_quantity) from cart where $time_from <= cart_item_time and $time_to >= cart_item_time";
                        $result1= mysqli_query($link, $query1);
                        $row1= mysqli_fetch_array($result1);
                        $max_quantity= $row1[0];
                       

                    }else{
                        $result= mysqli_query($link, "SELECT * from cart inner JOIN age_group INNER JOIN toy_category INNER JOIN toy on cart.toy_id=toy.toy_id and toy.toy_category_id=toy_category.toy_category_id and toy.age_group_id=age_group.age_group_id ");                       
                        //takign max
                        $query1= "select max(cart_item_quantity) from cart";
                        $result1= mysqli_query($link, $query1);
                        $row1= mysqli_fetch_array($result1);
                        $max_quantity= $row1[0];
 
                    }
                    if($result){
                        if(mysqli_num_rows($result)){
                            $sn=1;
                            while ($row= mysqli_fetch_array($result)){
                                extract($row);                                
                                ?>
               
                    <?php
                        if($max_quantity == $cart_item_quantity){
                            $bg_color = "green";
                        }else{
                            $bg_color="";
                        }                    
                    
                    ?>

                    <tr>
                        <td style="background: <?php echo $bg_color; ?>" ><?php echo $sn++; ?></td>
                        <td style="background: <?php echo $bg_color; ?>" ><?php echo $toy_name; ?></td>                        
                        <td style="background: <?php echo $bg_color; ?>" ><?php echo $toy_category_name; ?></td>                        
                        <td style="background: <?php echo $bg_color; ?>" ><?php echo $age_group_name; ?></td>                        
                        <td style="background: <?php echo $bg_color; ?>" ><?php echo date("d-m-Y", $cart_item_time); ?></td>                        
                        <td style="background: <?php echo $bg_color; ?>" ><?php echo $cart_item_quantity; ?></td>                        
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
                
                
                <span style="outline: 2px white solid; padding: 5px; color: wheat; font-weight: bold; ">
                    <span style="background: green; padding: 5px">Toy Selling</span>
                </span>                    
                
             </div>
            
            
            <div class="row">
                <?php include 'footer.php' ; ?>               
            </div>
        </div>
    </body>
</html>