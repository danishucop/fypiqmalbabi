<form method="POST" action ="test.php">
<table border="1" align="center">
<tr>
<th>Menu ID</th>
<th>Item Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Amount</th>
</tr>
<?php
if(isset($_POST["btnsubmit"])){
  
  }
$conn=mysqli_connect("localhost","root","","fyp");
$i=1;

$sql = "SELECT * FROM menu ORDER BY id ASC";  
                $rs = mysqli_query($conn, $sql);  
                if(mysqli_num_rows($rs))  
                {  
                     while($rows = mysqli_fetch_array($rs))  
                     {  
      if ($i%2==0)
      {
            echo "<tr bgcolor='#ffccff'><td>";
      }
      else
      {      
            echo "<tr bgcolor='#ff99ff'><td>";
      }
      $i++;      
      echo $rows["id"];
      echo "</td>";
      echo "<td>";
      echo $rows["menuname"];
      echo "</td>";
      echo "<td>";
      echo '<input name='.$rows["id"].'type="number" value="0" size=5 style="text-align: center;"';
      echo "</td>";
      echo "<td>";
      echo '<input value="'. $rows["price"].'" size=5 style="text-align: center;" disabled';
      echo "</td>";
      echo "<td>";
      echo $rows["ingredient"];
      echo "</td>";
      echo "<td>";
       
}


}
      
?>
</table>
<br><br>
<center>
<button type="submit" class="btn btn-success" name="btnsubmit">Order Place</button> 
</center>
</form>