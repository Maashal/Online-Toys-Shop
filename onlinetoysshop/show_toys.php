<div class="row">
    <form class="col-sm-8 col-sm-offset-2" method="post">
        <div class="col-sm-5">
            <select name="age_group_id" class="form-control" required=""> 
                <option value="">Select age group</option>
                <option value=" ">All</option>
                <?php
                if($result= mysqli_query($link, "select * from age_group order by age_group_id")){
                    if(mysqli_num_rows($result)){
                        while($row= mysqli_fetch_array($result)){
                            extract($row);
                            ?>
                <option value="<?php echo $row['age_group_id']; ?>"><?php echo $row['age_group_name']; ?></option>
                <?php
                        }
                    }
                }else{
                    alert(mysqli_error($link));
                }
                ?>
            </select>
        </div>
        <div class="col-sm-5">
            <select name="toy_category_id" class="form-control" required=""> 
                <option value="">Select toy category</option>
                <option value=" ">All</option>
                <?php
                if($result= mysqli_query($link, "select * from toy_category order by toy_category_id")){
                    if(mysqli_num_rows($result)){
                        while($row= mysqli_fetch_array($result)){
                            extract($row);
                            ?>
                <option value="<?php echo $row['toy_category_id']; ?>"><?php echo $row['toy_category_name']; ?></option>
                <?php
                        }
                    }
                }else{
                    alert(mysqli_error($link));
                }
                ?>                
            </select>         
        </div>
        <div class="col-sm-2">
            <input style="float: right" type="submit" name="Search" value="Search" class="btn btn-success">
        </div>
    </form>
</div>
<br>
    
<?php
if(isset($_POST['Search'])){
    extract($_POST);
    if($toy_category_id==" " && $age_group_id==" " ){
       $query="select * from toy inner join age_group inner join toy_category on toy.toy_category_id=toy_category.toy_category_id and toy.age_group_id=age_group.age_group_id  ";
    }elseif($age_group_id!=" " && $toy_category_id!=" " ){
         $query="select * from toy inner join age_group inner join toy_category on toy.toy_category_id=toy_category.toy_category_id and toy.age_group_id=age_group.age_group_id  where toy.toy_category_id= $toy_category_id and toy.age_group_id= $age_group_id ";
    }elseif($age_group_id!=" " && $toy_category_id==" "){
        $query="select * from toy inner join age_group inner join toy_category on toy.toy_category_id=toy_category.toy_category_id and toy.age_group_id=age_group.age_group_id  where toy.age_group_id= $age_group_id  ";
    }elseif($age_group_id==" " && $toy_category_id!=" "){
        $query="select * from toy inner join age_group inner join toy_category on toy.toy_category_id=toy_category.toy_category_id and toy.age_group_id=age_group.age_group_id  where toy_category.toy_category_id= $toy_category_id";
    }
}else{
    $query="select * from toy inner join age_group inner join toy_category on toy.toy_category_id=toy_category.toy_category_id and toy.age_group_id=age_group.age_group_id ";
}

if($result= mysqli_query($link, $query)){
    if(mysqli_num_rows($result)){
        while($row= mysqli_fetch_array($result)){
            extract($row);
            ?>
            <form action="add_to_cart.php?toy_id=<?php echo $toy_id;?>" method="post">
              
                <div class="art_item col-sm-3 text-center ">
                    Product Name: <strong><?php echo $toy_name; ?></strong><br>
                    Price (PKR): <strong><?php echo $toy_price; ?></strong><br>
                    Category: <strong><?php echo $toy_category_name; ?></strong><br>
                    Age Group: <strong><?php echo $age_group_name; ?></strong><br>
                    <a target="_blank" href="<?php echo $toy_picture_path; ?>">
                        <img class="img img-thumbnail img-rounded"
                             src="<?php echo $toy_picture_path; ?>"
                             style="width: 250px; height: 220px"
                             alt="No Images Available">
                    </a>
                    <div style="margin: 5px">
                        Quantity
                        <input style="color: black" name="toy_quantity" type="number" value="1" min="1" max="<?php echo $toy_quantity; ?>">                    
                    </div>
                    <button class="btn btn-default"><span class="fa fa-cart-plus"> Add To Cart</span></button>
                    <a target="_blank" href="view_feedback.php?toy_id=<?php echo $toy_id;?>" class="btn btn-info">Feedback</a>
                </div>
            </form>
<?php
        }
    }else{
        echo "<h1>No Data Exist</h1>";
    }
}else{
    alert(mysqli_error($link));
}

?>