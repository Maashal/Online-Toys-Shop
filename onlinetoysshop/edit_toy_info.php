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
        $toy_id=$_GET['toy_id'];
        if($result= mysqli_query($link, "SELECT * from toy INNER JOIN toy_category inner JOIN age_group on toy.toy_category_id=toy_category.toy_category_id and toy.age_group_id= age_group.age_group_id where toy.toy_id = $toy_id ")){
            $row= mysqli_fetch_array($result);
            extract($row);
        }else{
            alert(mysqli_error($link));
        }
        ?>
        

        <?php
        if(isset($_POST['submit'])){
            extract($_POST);
            extract($_GET);
            if($_FILES['pic']['error']==0){
                if(move_uploaded_file($_FILES['pic']['tmp_name'], "images/".$_FILES['pic']['name'])){
                    $toy_picture_path="images/".$_FILES['pic']['name'];
                }else{
                    $toy_picture_path="N/A";
                }
            }else{
                $toy_picture_path=$_POST['old_pic'];
            }
            
            $query="update  toy set toy_name='$toy_name', toy_category_id='$toy_category_id', age_group_id='$age_group_id', toy_price='$toy_price', toy_quantity='$toy_quantity', toy_picture_path='$toy_picture_path'  where toy_id = $toy_id ";
            $result= mysqli_query($link, $query);
            if($result){
                if(mysqli_affected_rows($link)){
                    alert("Record Updated");
                }
                header("refresh:.1, url=manage_toy.php");
            }else{
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
            
            <div class="col-sm-8 col-sm-offset-2 row">
                
                <div class="div_form" >
                    <form method="post" action="" enctype="multipart/form-data">
                        <h1>Edit Toy Info</h1>
                        <hr>
                        
                        <label>Name</label>
                        <input type="text" value="<?php echo $toy_name; ?>" name="toy_name" required="" placeholder="Enter Toy Name"><br>                            
                        
                        <label>Type</label>
                        <select name="toy_category_id" id="toy_category_id" required="">
                            <option value="">Select Toy Category </option>
                            <?php
                            if($result= mysqli_query($link, "select * from toy_category")){
                                if(mysqli_num_rows($result)){
                                    while($row= mysqli_fetch_array($result)){
                                        ?>
                            <option value="<?php echo $row['toy_category_id']; ?>"><?php echo $row['toy_category_name']; ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                        
                        <script>
                        document.getElementById("toy_category_id").value="<?php echo $toy_category_id; ?>";
                        </script>

                        <label>Age Group</label>
                        <select name="age_group_id" id="age_group_id" required="" >
                            <option value="">Select Age Group</option>
                            <?php
                            if($result= mysqli_query($link, "select * from age_group")){
                                if(mysqli_num_rows($result)){
                                    while($row= mysqli_fetch_array($result)){
                                        ?>
                            <option value="<?php echo $row['age_group_id']; ?>"><?php echo $row['age_group_name']; ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                        
                        <script>
                        document.getElementById("age_group_id").value="<?php echo $age_group_id; ?>";
                        </script>                        
                        
                        <label>Price (PKR)</label>
                        <input type="number" value="<?php echo $toy_price; ?>" name="toy_price" min="1" required="" placeholder="Enter Toy Price (PKR)"><br>      
                        <label>Quantity</label>
                        <input type="number"  value="<?php echo $toy_quantity; ?>" name="toy_quantity" min="1" required="" placeholder="Enter Toy Qauntity"><br>      
                        <label>Picture</label>
                        <input type="hidden" name="old_pic" value="<?php echo $toy_picture_path; ?>">
                        <input type="file" name="pic" >
                        <button class="btn btn-success" type="submit" name="submit">Submit</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                    </form>
                </div>
                
            </div>
            
            
            <div class="row">
                <?php include 'footer.php' ; ?>               
            </div>
        </div>
    </body>
</html>