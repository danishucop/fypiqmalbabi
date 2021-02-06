<?php
 session_start();
 include "headeradmin.template.php";
 include "dbconnect.php";

$orderid=$_GET['orderid'];
$sql="SELECT * FROM orders
    WHERE orderid='$orderid' ";
$rs=mysqli_query($conn, $sql);
if (mysqli_error($conn)==true){
    echo mysqli_error($conn);
  }//sql error
$record=mysqli_fetch_array($rs);
?>

 <!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
      <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="NKElogo.jpg" data-holder-rendered="true" />
                            </a>
                    </div>
                    
                          <div class="w3-container" id="printableArea">
                          <h2>Receipt Order</h2>
                          <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank">
                            NASI KANDAR EXPRESS 
                            </a>
                        </h2>
                        <div>Bangi, 62, Jalan Seri Putra 1/4, Bandar Seri Putra, 43000 Kajang, Selangor</div>
                        <div> 03-8912 6234/013-593 9518</div>
                        <div>nasikandarexpress@gmail.com</div>
                    

                          <div class="col-25">
    <div class="container">
      <h4>Cart <span class="quantity" style="color:black"><i class="fa fa-shopping-cart"></i>
                           <form method="post" action=""> 
                            <br>
                            User Id :<?php echo $record["orderuserid"];?>
                            <br>
                            <?php echo "";?>
                            <br>
                            Order ID : <?php echo $record["orderid"]?>
                            <br>
                         Menu Name :<?php echo $record["ordermenu"];?> 
                          <br>
                         Quantity Order :<?php echo $record["quantity"];?>
                          <br>  
                           Price Order : RM <?php echo $record["orderprice"];?>
                          <p>Total :  RM<?php echo $record["totalorder"];?></p>
                          <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
            
                Invoice was created on a computer and is valid without the signature and seal.
          
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
    </div>
    </div>
</div>
          <div id="printableArea">
          <input type="button" onclick="printDiv('printableArea')" value="print order!" />
          <script type="text/javascript">
          function printDiv(divName) {
          var printContents = document.getElementById(divName).innerHTML;
          var originalContents = document.body.innerHTML;

          document.body.innerHTML = printContents;

          window.print();

          document.body.innerHTML = originalContents;
}

</script>
</div>
                          </form>

                          <?php
                        include "footer.template.php";
                      ?>