<?php
include '../../../includes/dbconnection.php';
$type= $_REQUEST['type'];

// add product type
if($type=='100'){
    print_r($_POST);
    date_default_timezone_set('Asia/Karachi');
    $date_and_time = date("Y-m-d H:i:s");
    try{
        $stmt = $pconn->prepare("INSERT INTO product_type (product_type_title,created_on)
        VALUES (:product_type_title, :created_on)");
        
        $stmt->bindParam(':product_type_title', $product_type_title);
        $stmt->bindParam(':created_on', $date_and_time);
      
        // insert a row
        $product_type_title = mysqli_escape_string($con,$_POST['product_type_title']);
        if($stmt->execute()){
            echo json_encode(['Status_Code'=>100,'msg'=>'Success']);
        }
    }
    catch(PDOException $e) {
        echo json_encode(['Status_Code'=>200,'msg'=>$e->getMessage()]);
    }

}

// add product
if($type=='101'){
    $msg = "";
    date_default_timezone_set('Asia/Karachi');
    $date_and_time = date("Y-m-d H:i:s");
    $date_time_file_name = date("Y_m_d_h_i_s");
    if(!empty($_FILES['product_image']['name'])){
        $target_dir = "../../../assets/images/products/";
        $product_img_path = "assets/images/products/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $msg =  "Sorry, your file was not uploaded.";
            $file_Status_Code = 200;
        } else {
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], ($target_dir.$date_time_file_name.'.'.$imageFileType))) {
            $file_Status_Code = 100;
            $msg .=  "The file ". htmlspecialchars( basename( $_FILES["product_image"]["name"])). " has been uploaded.";
        } else {
            $msg .=  "Sorry, there was an error uploading your file.";
            $file_Status_Code = 200;
        }
        }
    }
    try{
        $stmt = $pconn->prepare("INSERT INTO product ( `product_img_path`,`product_name`, `product_description`, `product_type`, `brand_id`, `created_on`)
        VALUES (:product_img_path,:product_name, :product_description, :product_type, :brand_id, :created_on)");
        
        $stmt->bindParam(':product_img_path', $img_path);
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':product_description', $product_description);
        $stmt->bindParam(':product_type', $product_type);
        $stmt->bindParam(':brand_id', $brand_id);
        $stmt->bindParam(':created_on', $date_and_time);
      
        // insert a row
        $img_path = $product_img_path.$date_time_file_name.'.'.$imageFileType;
        $product_name = mysqli_escape_string($con,$_POST['product_name']);
        $product_description = mysqli_escape_string($con,$_POST['product_description']);
        $product_type = mysqli_escape_string($con,$_POST['product_type']);
        $brand_id = mysqli_escape_string($con,$_POST['brand_id']);
        if($stmt->execute()){
            echo json_encode(['Status_Code'=>100,'msg'=>'Success','file_Status_Code'=>$file_Status_Code,'file_msg'=>$msg]);
        }
    }
    catch(PDOException $e) {
        echo json_encode(['Status_Code'=>200,'msg'=>$e->getMessage(),'file_Status_Code'=>$file_Status_Code,'file_msg'=>$msg]);
    }

}

// create products for specific brands
if($type=='102'){
    $brand_id = $_POST['brand_id'];
    echo '<label for="product_name">Select Product</label>';
    echo '<select class="form-control" id="purchasing_product_id" name="purchasing_product_id">';
    echo '<option value="">--Select Product--</option>';
    
    $ret_brand_products=mysqli_query($con,"SELECT * FROM `product` WHERE `brand_id` = '$brand_id' AND `status`='1'"); 
    while ($ret_brand_products_row=mysqli_fetch_array($ret_brand_products)) 
    {
        ?>
        <option value="<?=$ret_brand_products_row['id']?>"><?=$ret_brand_products_row['product_name']?></option>
        <?php
    }
    echo '</select>';
}

// add purchase
if($type=='103'){
    $product_id = $_POST['purchasing_product_id'];
    $brand_id = $_POST['select_manufacturer'];
    $product_quantity = intval($_POST['product_quantity']);
    $per_item_price = intval($_POST['per_item_price']);
    $total_price = $product_quantity*$per_item_price;
    date_default_timezone_set('Asia/Karachi');
    $date_and_time = date("Y-m-d H:i:s");
    try {
        $stmt = $pconn->prepare("INSERT INTO purchase (`product_id`, `brand_id`, `product_quantity`, `per_item_price`, `total_price`, `purchased_on`)
        VALUES (:product_id,:brand_id, :product_quantity, :per_item_price, :total_price, :purchased_on)");
        
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':brand_id', $brand_id);
        $stmt->bindParam(':product_quantity', $product_quantity);
        $stmt->bindParam(':per_item_price', $per_item_price);
        $stmt->bindParam(':total_price', $total_price);
        $stmt->bindParam(':purchased_on', $date_and_time);
        if($stmt->execute()){
            $check_prev_quantity = mysqli_fetch_array(mysqli_query($con,"select quantity from product where id ='$product_id'"));
            $prev_prd_quantity = $check_prev_quantity['quantity'];
            if(!empty($prev_prd_quantity)){
                $total_products_available = $prev_prd_quantity + $product_quantity;
            } else {
                $total_products_available = $product_quantity;
            }
            $update_prd_quantity =mysqli_query($con, "update product set quantity='$total_products_available' where id ='$product_id'");
            echo json_encode(['Status_Code'=>100,'msg'=>'Successfully Added']);
        }
    }
    catch(PDOException $e){
        echo json_encode(['Status_Code'=>200,'msg'=>$e->getMessage()]);
    }
}

// installments_form view
if($type=='104'){
    $sale_type = $_POST['sale_type'];
    $per_item_price = $_POST['per_item_price'];
    $total_quantity = $_POST['total_quantity'];
    if ($sale_type == 'installment') {
        ?>
                                    <!-- Installment Form -->
        <div class="form-group col-12 d-flex justify-content-center pt-2 "><h4>Installment Form</h4></div>
        <div class="form-group col-12 py-2">
            <label for="total_price_calculated">Total Calculated Price</label>
            <input id="total_price_calculated" value="<?=($per_item_price*$total_quantity)?>" type="number" disabled class="form-control">
        </div>
        <div class="form-group col-12 col-md-6 py-2">
            <label for="advance">Advance Payment</label>
            <input id="advance" type="number" name="advance" data-parsley-trigger="change" required="" placeholder="Enter Advance Payment" autocomplete="off" class="form-control">
        </div>
        <div class="form-group col-12 col-md-6 py-2">
            <label for="remaining_balance">Remaining balance</label>
            <input id="remaining_balance" name="remaining_balance" type="number" class="form-control" required="" placeholder="Enter Remaining Balance" autocomplete="off">
        </div>
       <div class="form-group col-12 col-md-6 py-2">
            <label for="no_of_installments">Number Of Installments</label>
            <input id="no_of_installments" name="no_of_installments" type="number" class="form-control" required="" placeholder="Enter Number Of Installments" autocomplete="off">
        </div>
        <div class="form-group col-12 col-md-6 py-2">
            <label for="single_installment">Single Installment(Rs)</label>
            <input id="single_installment" name="single_installment" type="number" class="form-control" required="" placeholder="Enter Single Installment(Rs)" autocomplete="off">
        </div>
        <div class="form-group col-12 col-md-6 py-2">
            <label for="single_installment">Last Installment Month</label>
            <input id="last_installment_month" name="last_installment_month" type="date" class="form-control" required="" placeholder="Last Installment Month" autocomplete="off">
        </div>
        <hr>
                                    <!-- Customer Detail Form -->
        <!--<div class="form-group col-12 d-flex justify-content-center pt-2"><h4>Customer Detail Form</h4></div>-->
   
        <!--<div class="form-group col-12 col-md-6 py-2">-->
        <!--    <label for="customer_name">Customer Name</label>-->
        <!--    <input id="customer_name" type="text" name="customer_name" data-parsley-trigger="change" required="" placeholder="Enter Customer Name" autocomplete="off" class="form-control">-->
        <!--</div>-->
        <!--<div class="form-group col-12 col-md-6 py-2">-->
        <!--    <label for="customer_cnic">Customer CNIC</label>-->
        <!--    <input id="customer_cnic" name="customer_cnic" type="text" class="form-control"  placeholder="Enter Remaining Balance" autocomplete="off">-->
        <!--</div>-->
        <!--<div class="form-group col-12 col-md-6 py-2">-->
        <!--    <label for="customer_phone">Customer Phone Number</label>-->
        <!--    <input id="customer_phone" name="customer_phone" type="text" class="form-control" required="" placeholder="Enter Phone Number" autocomplete="off">-->
        <!--</div>-->
        <!--<hr>-->
                                <!-- Guarantor 1 Detail Form -->
        <div class="form-group col-12 d-flex justify-content-center pt-2 "><h4>Guarantor 1 Form</h4></div>
        
        <div class="form-group col-12 col-md-6 py-2">
            <label for="guarantorOne_name">Guarantor 1 Name</label>
            <input id="guarantorOne_name" type="text" name="guarantorname[]" data-parsley-trigger="change" required="" placeholder="Enter Guarantor 1 Name" autocomplete="off" class="form-control">
        </div>
        <div class="form-group col-12 col-md-6 py-2">
            <label for="guarantorOne_cnic">Guarantor 1 CNIC</label>
            <input id="guarantorOne_cnic" name="guarantorcnic[]" type="text" class="form-control" required="" placeholder="Enter Guarantor 1 CNIC" autocomplete="off">
        </div>
        <div class="form-group col-12 col-md-6 py-2">
            <label for="guarantorOne_phn">Guarantor 1 Phone Number</label>
            <input id="guarantorOne_phn" name="guarantorphn[]" type="text" class="form-control" required="" placeholder="Enter Guarantor 1 CNIC" autocomplete="off">
        </div>
        <hr>
                                <!-- Guarantor 2 Detail Form -->
        <div class="form-group col-12 d-flex justify-content-center pt-2"><h4>Guarantor 2 Form</h4></div>
        
        <div class="form-group col-12 col-md-6 py-2">
            <label for="guarantorTwo_name">Guarantor 2 Name</label>
            <input id="guarantorTwo_name" type="text" name="guarantorname[]" data-parsley-trigger="change" required="" placeholder="Enter Guarantor 2 Name" autocomplete="off" class="form-control">
        </div>
        <div class="form-group col-12 col-md-6 py-2">
            <label for="guarantorTwo_cnic">Guarantor 2 CNIC</label>
            <input id="guarantorTwo_cnic" name="guarantorcnic[]" type="text" class="form-control" required="" placeholder="Enter Guarantor 2 CNIC" autocomplete="off">
        </div>
        <div class="form-group col-12 col-md-6 py-2">
            <label for="guarantorTwo_phn">Guarantor 2 Phone Number</label>
            <input id="guarantorTwo_phn" name="guarantorphn[]" type="text" class="form-control" required="" placeholder="Enter Guarantor 2 CNIC" autocomplete="off">
        </div>


        <?php
    } 

}


// add sale
if($type=='105'){

    $product_id = $_POST['purchasing_product_id'];
    $brand_id = $_POST['select_manufacturer'];
    $product_quantity = intval($_POST['product_quantity']);
    $per_item_price = intval($_POST['per_item_price']);
    $total_price = $product_quantity*$per_item_price;
    $sale_type = $_POST['sale_type'];
    date_default_timezone_set('Asia/Karachi');
    $date_and_time = date("Y-m-d H:i:s");

    $check_prev_quantity = mysqli_fetch_array(mysqli_query($con,"select quantity from product where id ='$product_id'"));
    $prev_prd_quantity = $check_prev_quantity['quantity'];
    
    if($prev_prd_quantity >= $product_quantity){
        $total_products_available = $prev_prd_quantity - $product_quantity;
        try {
            if($sale_type == 'installment'){
                $advance = $_POST['advance'];
                $remaining_balance = $_POST['remaining_balance'];
                $no_of_installments = $_POST['no_of_installments'];
                $single_installment = $_POST['single_installment'];
                $last_installment_month = $_POST['last_installment_month'];
                
                $stmt = $pconn->prepare("INSERT INTO sale ( `product_id`, `brand_id`, `quantity`, `per_item_price`, `total_price`, `sale_type`, `advance`, `remaining_balance`, `no_of_installments`, `single_installment`, `last_installment_month`,  `created_on`)
                VALUES (:product_id,:brand_id, :quantity, :per_item_price, :total_price, :sale_type, :advance, :remaining_balance, :no_of_installments, :single_installment, :last_installment_month, :created_on)");
            
            }else{
                $stmt = $pconn->prepare("INSERT INTO sale ( `product_id`, `brand_id`, `quantity`, `per_item_price`, `total_price`, `sale_type`,  `created_on`)
                VALUES (:product_id,:brand_id, :quantity, :per_item_price, :total_price, :sale_type, :created_on)");
            }
            
            $stmt->bindParam(':product_id', $product_id);
            $stmt->bindParam(':brand_id', $brand_id);
            $stmt->bindParam(':quantity', $product_quantity);
            $stmt->bindParam(':per_item_price', $per_item_price);
            $stmt->bindParam(':total_price', $total_price);
            $stmt->bindParam(':sale_type', $sale_type);
            
            if($sale_type == 'installment'){
                $stmt->bindParam(':advance', $advance);
                $stmt->bindParam(':remaining_balance', $remaining_balance);
                $stmt->bindParam(':no_of_installments', $no_of_installments);
                $stmt->bindParam(':single_installment', $single_installment);
                $stmt->bindParam(':last_installment_month', $last_installment_month);
            }   

            $stmt->bindParam(':created_on', $date_and_time);
            if($stmt->execute()){
                $id = $pconn->lastInsertId();
                $update_prd_quantity =mysqli_query($con, "update product set quantity='$total_products_available' where id ='$product_id'");
                
                $customer_name = $_POST['customer_name'];
                    $customer_cnic = $_POST['customer_cnic'];
                    $customer_phone = $_POST['customer_phone'];
                    $addCustomer=mysqli_query($con, "INSERT INTO customer(customer_name,customer_phone,cnic,sale_id,created_on) 
                    values('$customer_name','$customer_phone','$customer_cnic','$id','$date_and_time')");
                if($sale_type == 'installment'){

                    // $customer_name = $_POST['customer_name'];
                    // $customer_cnic = $_POST['customer_cnic'];
                    // $customer_phone = $_POST['customer_phone'];
                    // $addCustomer=mysqli_query($con, "INSERT INTO customer(customer_name,customer_phone,cnic,sale_id,created_on) 
                    // values('$customer_name','$customer_phone','$customer_cnic','$id','$date_and_time')");
                    
                    $guarantorname = $_POST['guarantorname'];
                    $guarantorcnic = $_POST['guarantorcnic'];
                    $guarantorphn = $_POST['guarantorphn'];
                    for ($i=0; $i<sizeof($guarantorname); $i++) {
                        $addGuarantor=mysqli_query($con, "INSERT INTO guarantor(guarantor_name,guarantor_phone,guarantor_cnic,sale_id,created_on) 
                        values('$guarantorname[$i]','$guarantorphn[$i]','$guarantorcnic[$i]','$id','$date_and_time')");
                    }
                    $monthsAhead = $no_of_installments; 

                    $currentDate = new DateTime();
                    $currentDate->modify('first day of next month'); // move to the first day of next month
                    $endDate = (new DateTime())->modify('+' . $monthsAhead . ' months');

                    $interval = DateInterval::createFromDateString('1 month');
                    $dateRange = new DatePeriod($currentDate, $interval, $endDate);

                    $months = array();
                    $j = 1;    
                    foreach ($dateRange as $date) {
                        $formattedDate = $date->format('Y-m-d');
                        $months[] = $formattedDate;
                        $addimage=mysqli_query($con, "INSERT INTO `installment`( `sale_id`, `sequence`, `month`, `created_on`) VALUES ('$id','$j','$formattedDate','$date_and_time')");
                        $j++;
                    }
                    
                }
                
                echo json_encode(['Status_Code'=>100,'msg'=>'Sale Successful','sale_id'=>$id]);
            }
        }
        catch(PDOException $e){
            echo json_encode(['Status_Code'=>200,'msg'=>$e->getMessage()]);
        }
    }else{
        echo json_encode(['status_Code'=>400,'msg'=>'Product out of stock.Only '.$prev_prd_quantity.' available']);
    }
}


if($type=='106'){
    $sale_id = $_POST['sale_id'];
    ?>
    <table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Months</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
   </thead>
   <tbody>

    <?php
    $counter = 1;
    $ret=mysqli_query($con,"SELECT * FROM `installment` WHERE `sale_id` = '$sale_id'"); 
    while ($row=mysqli_fetch_array($ret)) 
    {
?>
     <tr>
       <td><?=$counter?></td>
       <td><?=$row['month']?></td>
       <td><div id="inst_status<?=$row['id']?>">
       <?php
       if($row['status']=='0'){
        echo '<p class="text-danger" >Unpaid</p>';
       }elseif($row['status']=='1'){
        echo '<p class="text-success">Paid</p>';
       }
       ?>
       </div>
        </td>
        <td><div id="btn_div<?=$row['id']?>">
       <?php
       if($row['status']=='0'){
        echo '<button class="btn btn-sm btn-success" onclick="update_status('.$row['id'].',1)">Mark Paid</button>';
       }elseif($row['status']=='1'){
        echo '<button class="btn btn-sm btn-danger" onclick="update_status('.$row['id'].',0)">Mark UnPaid</button>';
       }
       ?>
       </div>
        </td>
     </tr>
<?php
$counter++;
    }
    ?>
        
  </tbody>
</table>
<?php
}


if($type=='107'){
    $installment_id = $_POST['installment_id'];
    $status = $_POST['status'];

    $updatequery=mysqli_query($con, "update installment set status='$status' where id='$installment_id'");
    if($updatequery){
        echo json_encode(['Status_Code'=>100]);
    }
    else{
        json_encode(['Status_Code'=>200]);
    }

}

// delete product
if($type=='108'){
    // print_r($_POST);
    $product_id = $_POST['product_id'];
    // die();
    $deleteProductquery=mysqli_query($con, "DELETE FROM `product` WHERE `id` = '$product_id'");
    if($deleteProductquery){
        echo json_encode(['Status_Code'=>100]);
    }
    else{
        json_encode(['Status_Code'=>200]);
    }

}

// delete purchase
if($type=='109'){
    // print_r($_POST);
    $purchase_id = $_POST['purchase_id'];
    // die();
    $deletePurchasequery=mysqli_query($con, "DELETE FROM `purchase` WHERE `id` = '$purchase_id'");
    if($deletePurchasequery){
        echo json_encode(['Status_Code'=>100]);
    }
    else{
        json_encode(['Status_Code'=>200]);
    }

}


// delete sale
if($type=='110'){
    // print_r($_POST);
    $sale_id = $_POST['sale_id'];
    // die();
    $deleteSalequery=mysqli_query($con, "DELETE FROM `sale` WHERE `id` = '$sale_id'");
    if($deleteSalequery){
        echo json_encode(['Status_Code'=>100]);
    }
    else{
        json_encode(['Status_Code'=>200]);
    }

}

// upload image
if($type=='111'){
    // print_r($_FILES);
    // print_r($_POST);
    // die();
    $product_id = $_POST['product_id'];
    date_default_timezone_set('Asia/Karachi');
    $date_time_file_name = date("Y_m_d_h_i_s");
    if(!empty($_FILES['img']['name'])){
        $target_dir = "../../../assets/images/products/";
        $product_img_path = "assets/images/products/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $msg =  "Sorry, your file was not uploaded.";
            $file_Status_Code = 200;
        } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], ($target_dir.$date_time_file_name.'.'.$imageFileType))) {
            $file_Status_Code = 100;
            $msg .=  "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
            $img_path = $product_img_path.$date_time_file_name.'.'.$imageFileType;
            $update_path=mysqli_query($con, "UPDATE `product` SET `product_img_path`='$img_path' WHERE `id` = '$product_id'");
            if($update_path){
                echo json_encode(['Status_Code'=>100,'msg'=>'Success','file_Status_Code'=>$file_Status_Code,'file_msg'=>$msg]);
            }} else {
            $msg .=  "Sorry, there was an error uploading your file.";
            $file_Status_Code = 200;
        }
        }
    }
    
    
    
}






?>