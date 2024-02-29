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
        
        
        <?php
        //approved
        if(isset($_GET['receive_id'])){
            extract($_GET);
            //updating status
            $query="update cart set cart_item_status = 'Received'  where cart_item_id = $receive_id and cart_item_status = 'Reserved' ";
            if(!mysqli_query($link, $query)){
                alert(mysqli_error($link));
            }
            //updating quantity
            
            if($result= mysqli_query($link, "select * from toy where toy_id = $toy_id")){
                $row= mysqli_fetch_array($result);
                $old_qty= $row['toy_quantity'];
            }
            
            $new_qty= $old_qty - $toy_quantity;
            
            $query="update toy set toy_quantity = $new_qty  where toy_id = $toy_id ";
            if(!mysqli_query($link, $query)){
                alert(mysqli_error($link));
            }            
        }
        ?>
        
        
    </head>
    <body>
        
        <div class="container-fluid">
            <?php
                include 'admin_menu.php';
            ?>
        </div> 
            
            
            <div class="col-sm-12 row">
                <h1>User Orders</h1>
                
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>SN</th>
                        <th>User Name</th>
                        <th>Toy Name</th>   
                        <th>Category</th>
                        <th>Age Group</th>
                        <th>Order Quantity</th>
                        <th>Date</th>
                        <th>Status</th>                        
                        <th>Received By User</th>
                        
                    </tr>
                    
                    <?php
                    $query="SELECT * from cart inner JOIN age_group INNER JOIN toy_category INNER JOIN user inner join toy on cart.toy_id=toy.toy_id and toy.toy_category_id=toy_category.toy_category_id and toy.age_group_id=age_group.age_group_id and cart.user_id= user.user_id order by cart.cart_item_id";
                    $result= mysqli_query($link, $query);
                    if($result){
                        if(mysqli_num_rows($result)){
                            $sn=1;
                            while ($row= mysqli_fetch_array($result)){
                                extract($row);
                                ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $user_name; ?></td>                        
                        <td><?php echo $toy_name; ?></td>                        
                        <td><?php echo $toy_category_name ?></td>
                        <td><?php echo $age_group_name ?></td>
                        <td><?php echo $cart_item_quantity ?></td>
                        <td><?php echo date("d-m-Y", $cart_item_time); ?></td>
                        <td><?php echo $cart_item_status; ?></td>
                        <td>
                            <a 
                                <?php
                                if($cart_item_status!='Reserved'){
                                    echo " disabled ";
                                }
                                ?>
                                class="btn btn-primary" href="?toy_id=<?php echo $toy_id;?>&receive_id=<?php echo $cart_item_id; ?>&toy_quantity=<?php echo $cart_item_quantity; ?>">Accept</a>
                        </td>
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