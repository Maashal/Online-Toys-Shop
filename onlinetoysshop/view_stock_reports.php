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
            <a class="btn btn-default" href="view_sales_reports.php">View Sales Report</a>
            
            <h1>Inventory Report</h1>
            
            <div class="col-sm-12 row">
                
                <table class="table table-bordered table-hover">
                   
                    <tr>
                        <th>SN</th>
                        <th>Toy Name</th>   
                        <th>Category</th>
                        <th>Age Group</th>
                        <th>Current Stock</th>
                    </tr>
                    <?php
                    $result= mysqli_query($link, "SELECT * from toy inner JOIN age_group INNER JOIN toy_category  on toy.toy_category_id=toy_category.toy_category_id and toy.age_group_id=age_group.age_group_id ");
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
                        <td><?php echo $toy_quantity; ?></td>                        
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