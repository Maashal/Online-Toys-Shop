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
        confirm_admin();
        ?>

    </head>
    <body>
        
        <div class="container-fluid">

                <?php include 'admin_menu.php'; ?>

            <div class="col-sm-12 ">
                <h1>Manage Content</h1>
                <a href="add_toy.php">Add New Toy +</a>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Age Group</th>
                        <th>Price (PKR)</th>
                        <th>Quantity</th>
                        <th>Picture</th>
                        <th>Actions</th>
                        
                    </tr>
                    
                    <?php
                    $query="SELECT * from toy INNER JOIN toy_category inner JOIN age_group on toy.toy_category_id=toy_category.toy_category_id and toy.age_group_id= age_group.age_group_id";
                    $result= mysqli_query($link, $query);
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
                        <td><?php echo $toy_price; ?></td>
                        <td><?php echo $toy_quantity; ?></td>
                        <td>
                            <a target="_blank" class="btn btn-primary" href="<?php echo $toy_picture_path; ?>">View</a>
                        </td>
                        <td>
                            <a href="edit_toy_info.php?toy_id=<?php echo $toy_id; ?>"><i class="fa fa-edit fa-2x text-warning"></i></a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="delete.php?table=toy&table_id=toy_id&delete_id=<?php echo $toy_id; ?>"><i class="fa fa-times fa-2x text-danger"></i></a>
                        </td>
                    </tr>
                    <?php
                            }                            
                        }else{
                            echo "<tr><td colspan='22'>No data found</td></tr>";
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