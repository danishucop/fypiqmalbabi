<?php
include  "headerpublic.template.php";
include "dbconnect.php";
?>
<?php 
$sql= "SELECT menu.*,userid,username FROM menu 
       JOIN users 
       ON orders.orderuserid=userid WHERE id= 0";
// $sql="SELECT id,menuname,price,ingredient
  //FROM menu WHERE id ";  
$rs=mysqli_query($conn, $sql);

?>

<section class="pricing py-5">
  <div class="container">
    <div class="row">

      <?php
                $sql = "SELECT * FROM menu ORDER BY id ASC";  
                $rs = mysqli_query($conn, $sql);  
                if(mysqli_num_rows($rs) > 0)  
                {  
                     while($row = mysqli_fetch_array($rs))  
                     {  
                ?>  
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
        <img class="img-thumbnail" src="adminimage/<?=$row["menuimage"]?>" enctype="multipart/form-data">
          <div class="card-body">
            <h5 class="card-title"><?=$row['menuname']?></h5>
          <p class="card-text"><?=$row['price']?></p>
           <p class="card-text"><?=$row['ingredient']?></p>
            <input type="text" name="quantity" class="form-control" value="1" />  
            <hr>
            
            <a href="#" class="btn btn-block btn-primary text-uppercase">Button</a>
          </div>
        </div>
      </div>
</section>


<?php
}
}

include "footer.template.php";

?>

