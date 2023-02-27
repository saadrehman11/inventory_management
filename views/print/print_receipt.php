
<?php

 include '../../includes/header.php';
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<?php


date_default_timezone_set('Asia/Karachi');
$date_and_time = date("Y-m-d H:i:s");
?>
<style>
  @media print {
  #myForm {
    display: none;
  }

  #receipt {
    display: block !important;
  }
}

</style>
<!--<div class="container mt-5">-->
<!--  <form id="myForm">-->
<!--    <label for="name">Name:</label>-->
<!--    <input type="text" class="form-control" id="name" name="name" required>-->

<!--    <label for="email">Email:</label>-->
<!--    <input type="email" class="form-control" id="email" name="email" required>-->

<!--    <label for="address">Address:</label>-->
<!--    <input type="text" class="form-control" id="address" name="address" required>-->

<!--    <button type="submit" class="btn btn-primary mt-3">Submit</button>-->
<!--  </form>-->

<!--  <div id="receipt" class="mt-5" style="display: none;">-->
<!--    <div class="d-flex justify-content-center"><h2 class="mb-4">Fazal Electronics</h2></div>-->
<!--    <hr>-->
<!--    <div class="row">-->
<!--      <h4>Contact Numbers: 090078601 / 090078601</h4>-->
<!--    </div>-->
<!--    <hr>-->
<!--    <div class="card p-3">-->
<!--      <div class="row">-->
<!--        <div class="col-2">-->
<!--          <p><strong>Name:</strong> <span id="receipt-name"></span></p>-->
<!--        </div>-->
<!--        <div class="col-8">-->
<!--          <p><strong>Email:</strong> <span id="receipt-email"></span></p>-->
<!--        </div>-->
<!--        <div class="col-2">-->
<!--          <p><strong>Address:</strong> <span id="receipt-address"></span></p>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<script>
  const form = document.getElementById('myForm');
const receipt = document.getElementById('receipt');
const receiptName = document.getElementById('receipt-name');
const receiptEmail = document.getElementById('receipt-email');
const receiptAddress = document.getElementById('receipt-address');

form.addEventListener('submit', function(event) {
  event.preventDefault(); // prevent form submission

  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const address = document.getElementById('address').value;

  // Submit the form data to a server-side script
  // const xhttp = new XMLHttpRequest();
  // xhttp.onreadystatechange = function() {
  //   if (this.readyState == 4 && this.status == 200) {
  //     console.log(this.responseText); // log the server response
  //   }
  // };
  // xhttp.open('POST', 'submit.php', true);
  // xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  // xhttp.send(`name=${name}&email=${email}&address=${address}`);

  receiptName.textContent = name;
  receiptEmail.textContent = email;
  receiptAddress.textContent = address;

  receipt.style.display = 'block';

  window.print();
});

</script>




<?php
$sale_id = $_GET['sale_id'];
$check_sale_detail = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `sale` WHERE `id` = '$sale_id'"));
$created_on = $check_sale_detail['created_on'];
$product_id = $check_sale_detail['product_id'];
$brand_id = $check_sale_detail['brand_id'];
$total_price = $check_sale_detail['total_price'];
$quantity = $check_sale_detail['quantity'];
$per_item_price = $check_sale_detail['per_item_price'];
$sale_type = $check_sale_detail['sale_type'];
$advance = $check_sale_detail['advance'];
$remaining_balance = $check_sale_detail['remaining_balance'];
$no_of_installments = $check_sale_detail['no_of_installments'];
$single_installment = $check_sale_detail['single_installment'];


$check_product_detail = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `product` WHERE `id` = '$product_id'"));
$product_name = $check_product_detail['product_name'];
$check_brand_detail = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `brand` WHERE `id` = '$brand_id'"));
$brand_name = $check_brand_detail['brand_name'];
$check_customer_detail = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `customer` WHERE `sale_id` = '$sale_id'"));
$customer_name = $check_customer_detail['customer_name'];
$customer_phone = $check_customer_detail['customer_phone'];

?>

<div class="d-flex justify-content-center bg-warning pb-3">
    <h2><?php echo 'Fazal Electronics'; ?></h2>
</div>

<div class="d-flex justify-content-between py-3">
    <h5><?php echo 'Shabqadar, KPK Pakistan' ?></h5>
    <h5><?php echo '0300-5668873' ?></h5>
</div>

<div class="d-flex justify-content-between py-3">
    <div>   
      <?php echo "Customer Name: ".$customer_name; ?><br/>  
      <?= "Customer Phone: ".$customer_phone ?><br/>
    </div>
    <th colspan="2" rowspan="1"><?php echo "Sale time: ". $created_on; ?></th>
</div>

<div class="py-3">
    <table class="table table-bordered" align="center" width="100%" height='100%'>
    <thead>
        <tr>
            <th colspan="5" rowspan="2" style="padding-left: 15px;">Sale ID</th>
            <th colspan="5" rowspan="2" style="padding-left: 15px;">Sale Type</th>
            <?php
            if($sale_type=="installment"){
                echo '<th colspan="5" rowspan="2" style="padding-left: 15px;">Installment Detail</th>';
            }
            ?>
            <th colspan="5" rowspan="2" style="padding-left: 15px;">Product Name</th>
            <th colspan="5" rowspan="2" style="padding-left: 15px;">Product Quantity</th>
            <th colspan="5" rowspan="2" style="padding-left: 15px;">Single unit Price</th>
            <th colspan="5" rowspan="2" style="padding-left: 15px;">Grand Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
          <td  colspan="5" rowspan="2" style="padding-left: 15px;"><?=$sale_id?></td>
          <td  colspan="5" rowspan="2" style="padding-left: 15px;"><?= $sale_type; ?></td>
          <?php
            if($sale_type=="installment"){
                ?>
          <td  colspan="5" rowspan="2" style="padding-left: 15px;"><?= "Advance:". $advance; ?>
            <br> <?= "Remaining Balance:". $remaining_balance; ?>
            <br> <?= "No. of Installments:". $no_of_installments; ?>
            <br> <?= "Single Installment Amount:". $single_installment; ?>
          </td>
          <?php
          }
            ?>
          <td  colspan="5" rowspan="2" style="padding-left: 15px;"><?= $product_name; ?></td>
          <td  colspan="5" rowspan="2" style="padding-left: 15px;"><?= $quantity; ?></td>
          <td  colspan="5" rowspan="2" style="padding-left: 15px;"><?= $per_item_price; ?></td>
          <td  colspan="5" rowspan="2" style="padding-left: 15px;"><?= $total_price; ?></td>
        </tr>
    </tbody>

</table>
</div>


<?php
    if($sale_type=="installment"){
?>
<div class="py-3">
    <table class="table table-bordered" align="center" width="100%" height='100%'>
        <thead>
            <tr>
                <th style="padding-left: 15px;">Guarantor Name</th>
                <th style="padding-left: 15px;">Guarantor Phone</th>
       
            </tr>
        </thead>
        <tbody>
                <?php
                $ret=mysqli_query($con,"SELECT * FROM `guarantor` WHERE `sale_id` = '$sale_id'"); 
                while ($row=mysqli_fetch_array($ret)) 
                {
                    ?>
                    <tr>
                    <td  style="padding-left: 15px;"><?= $row['guarantor_name']; ?></td>
                    <td  style="padding-left: 15px;"><?= $row['guarantor_phone']; ?></td>
                    </tr>
                    
                    <?php
                }
                ?>
        </tbody>
    </table>
</div>
<?php
  }
?>


<div style="position:absolute; bottom:-450px">Fazal Electronics </div>
<script>
      window.print();
</script>
