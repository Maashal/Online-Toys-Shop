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
        if(isset($_POST['add'])){
            extract($_POST);
            $query="insert into toy_category values ('', '$keyword' ) ";
            $result=mysqli_query($link, $query);
            if(!$result){
                alert(mysqli_error($link));
            }
        }
        ?>
            
        <?php
        if(isset($_POST['update'])){
            extract($_POST);
            $query="update toy_category set toy_category_name= '$keyword' where toy_category_id = $update_id   ";
            $result=mysqli_query($link, $query);
            if(!$result){
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
            
            
            <div class="col-sm-12 row">
                <h1>Toy Category</h1>
                <div class="row">
                    <form method="post">
                        
                         <input type="hidden" name="update_id" id="update_id" value="0">
                        
                        <div class="col-sm-6 col-sm-offset-3">
                            <input type="text" name="keyword" id="keyword" required="" placeholder="Enter Toy Category" class="form-control"> 
                        </div>
                       
                        <button name="search" class="btn btn-primary">Search</button>
                        <button name="add" class="btn btn-primary">Add</button>
                        <button name="update" class="btn btn-primary">Update</button>
                        
                    </form>
                 </div>
                <br>
                <table class="table table-bordered table-hover">
                   
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                    </tr>
                    
                    <?php
                    if(isset($_POST['search'])){
                        $keyword=$_POST['keyword'];
                        $query="select * from toy_category where toy_category_name like '%$keyword%' ";
                    }else{
                        $query="select * from toy_category ";
                    }
          
                        
               

                    $result= mysqli_query($link, $query);
                    if($result){
                        if(mysqli_num_rows($result)){
                            $sn=1;
                            while ($row= mysqli_fetch_array($result)){
                                extract($row);
                                ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $toy_category_name; ?></td>
                         <td>
                             <a href="#" onclick="update('<?php echo $toy_category_name; ?>', '<?php echo $toy_category_id; ?>')"><i class="fa fa-edit fa-2x text-warning"></i></a>
                        </td>
                       
                        <td>
                            <a href="delete.php?table=toy_category&table_id=toy_category_id&delete_id=<?php echo $toy_category_id; ?>"><i class="fa fa-times fa-2x text-danger"></i></a>
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
            
            
            <script>
            function update(input, update_id){
                document.getElementById("keyword").value=input;
                document.getElementById("update_id").value=update_id;
            }
            </script>
            
            
            <div class="row">
                <?php include 'footer.php' ; ?>               
            </div>
        </div>
    </body>
</html>