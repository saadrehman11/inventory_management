<?php

 include '../../includes/header.php';
 include '../../includes/sidebar.php';
if($user_email != 'fazalsaid492@gmail.com' && $user_email != 'admin@admin.com'){
    
    $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    // echo $root."views/product/product_sale.php";
    
    echo "<script>window.top.location='".$root."views/product/product_sale.php'</script>";
    // header("location: ".$root."views/product/product_sale.php", true);
}
 ?>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Dashboard </h2>
                                <div class="page-breadcrumb">
                                    <!-- <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template</li>
                                        </ol>
                                    </nav> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
<?php 
date_default_timezone_set("Asia/Karachi");
$current_date = date('Y-m-d'); // get current date
$current_month = date('m');
?>
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Purchases</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                                <?php
                                                $check_total_purchases = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `purchase` "));
                                                echo $check_total_purchases;
                                                ?>
                                                </h1>
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Amount For Purchases</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                                <?php
                                                $check_total_purchase = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(`total_price`) as sum_purchase FROM `purchase`"));
                                                echo 'Rs. '.$check_total_purchase['sum_purchase'];
                                                ?>
                                                </h1>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Purchases This Month</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                                <?php
                                                $check_month_purchases = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `purchase` WHERE  MONTH(purchased_on) = '$current_month' "));
                                                echo $check_month_purchases;
                                                ?>
                                                </h1>
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Amount For Purchases This Month</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                                <?php
                                                $check_totalmonth_purchase = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(`total_price`) as sum_purchase FROM `purchase` WHERE  MONTH(purchased_on) = '$current_month' "));
                                                echo 'Rs. '.$check_totalmonth_purchase['sum_purchase'];
                                                ?>
                                                </h1>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Sales This Month</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                                <?php
                                                $check_month_sales = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `sale` WHERE  MONTH(created_on) = '$current_month'"));
                                                echo $check_month_sales;
                                                ?>
                                                </h1>
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Sales Amount (This Month)</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                            <?php
                                                $check_month_sum_revenue = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(`total_price`) as month_sum FROM `sale`  WHERE  MONTH(created_on) = '$current_month'"));
                                                echo 'Rs. '.$check_month_sum_revenue['month_sum'];
                                                ?>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Sales</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                                <?php
                                                $check_total_sales = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `sale`"));
                                                echo $check_total_sales;
                                                ?>
                                                </h1>
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Revenue</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                            <?php
                                                $check_total_revenue = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(`total_price`) as sum FROM `sale`"));
                                                echo 'Rs. '.$check_total_revenue['sum'];
                                                ?>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Sales Today</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                            <?php 
                                            

                                            $check_total_sales_today = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `sale` WHERE DATE(created_on) = '$current_date' "));

                                            echo $check_total_sales_today;
                                            ?>    
                                            </h1>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Sales Amount (Today)</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                            <?php
                                                $check_today_revenue = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(`total_price`) as today_sum FROM `sale` WHERE DATE(created_on) = '$current_date' "));
                                                echo 'Rs. '.$check_today_revenue['today_sum'];
                                                ?>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class=" col-12">
                                <div class="card">
                                    <h5 class="card-header">Orders Placed Today</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                        <table class="table" id="sales_table_body">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Sale ID</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Brand Name</th>
                                    <th class="border-0">Quantity</th>
                                    <th class="border-0">Per Item Price</th>
                                    <th class="border-0">Total Price</th>
                                    <th class="border-0">Sale Type</th>
                                    <th class="border-0">Customer Name</th>
                                    <th class="border-0">Sale On</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $ret=mysqli_query($con,"SELECT * FROM `sale` WHERE `status` = '1' AND DATE(created_on) = '$current_date'  ORDER BY `created_on` DESC LIMIT 10 "); 
                            $count=1;
                            while ($row=mysqli_fetch_array($ret)) 
                            {
                                $sale_id = $row['id'];
                                ?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td><?=$row['id']?> </td>
                                    
                                    <td>
                                        <?php
                                        $prd_id = $row['product_id'];
                                        $product_detail=mysqli_fetch_array(mysqli_query($con,"select product_name from product where id = '$prd_id'"));
                                        $product_name = $product_detail['product_name'];
                                        echo $product_name;?> 
                                    </td>
                                    <td>
                                    <?php
                                        $b_id = $row['brand_id'];
                                        $brand_detail=mysqli_fetch_array(mysqli_query($con,"select * from brand where id = '$b_id'"));
                                        $brand_name = $brand_detail['brand_name'];
                                        echo $brand_name;
                                        ?> 
                                    </td>
                                    <td><?php
                                        if(empty($row['quantity'])){
                                            echo '0';
                                        }else{
                                            echo $row['quantity'];
                                        }
                                        ?> 
                                    </td>
                                    <td>
                                        <?php
                                        if(empty($row['per_item_price'])){
                                            echo '0';
                                        }else{
                                            echo $row['per_item_price'];
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if(empty($row['total_price'])){
                                            echo '0';
                                        }else{
                                            echo $row['total_price'];
                                        }
                                        ?>
                                    </td>
                                    <td> 
                                        <?=$row['sale_type']?> 
                                    </td> 
                                    <td> 
                                    <?php
                                        $customer_detail_count=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `customer` WHERE `sale_id` = '$sale_id'"));
                                        if($customer_detail_count ==0){
                                            echo 'Not Available';
                                        }else{
                                            $customer_detail=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `customer` WHERE `sale_id` = '$sale_id'"));
                                            $customer_name = $customer_detail['customer_name'];
                                            echo $customer_name;
                                        }
                                        ?> 
                                    </td> 
                                    <td> 
                                        <?=$row['created_on']?> 
                                    </td> 
                                </tr>
                                <?php
                                $count++; 
                            }
                            ?>
                            </tbody>
                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                          
                        </div>
                        
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- Installments-->
                            <!-- ============================================================== -->
                            <div class=" col-12">
                                <div class="card">
                                    <h5 class="card-header">Installments for this Month</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                        <table class="table" id="sales_table_body">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Sale ID</th>
                                    <th class="border-0">Installment No.</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Quantity</th>
                                    <th class="border-0">Total Price</th>
                                    <th class="border-0">Installment Amount</th>
                                    <th class="border-0">Customer Name</th>
                                    <th class="border-0">Sale On</th>
                                    <th class="border-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $ret2=mysqli_query($con,"SELECT *,sale.id as sale_id,sale.created_on as sale_createdon ,installment.status as inst_status FROM `installment`
                            LEFT JOIN sale on installment.sale_id = sale.id
                            WHERE  MONTH(month) = '$current_month' ORDER BY installment.created_on DESC"); 
                            $counting=1;
                            while ($row2=mysqli_fetch_array($ret2)) 
                            {
                                $sale_id = $row2['sale_id'];
                                ?>
                                <tr>
                                    <td><?=$counting?></td>
                                    <td><?=$sale_id?> </td>
                                    <td><?=$row2['sequence']?> </td>
                                    
                                    <td>
                                        <?php
                                        $prd_id = $row2['product_id'];
                                        $product_detail2=mysqli_fetch_array(mysqli_query($con,"select product_name from product where id = '$prd_id'"));
                                        $product_name2 = $product_detail2['product_name'];
                                        echo $product_name2;?> 
                                    </td>
                                    <td><?=$row2['quantity']?> </td>
                                    <td><?=$row2['total_price']?> </td>
                                    <td><?=$row2['single_installment']?> </td>
                                    <td>
                                    <?php
                                        $customer_detail=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `customer` WHERE `sale_id` = '$sale_id'"));
                                        $customer_name = $customer_detail['customer_name'];
                                        echo $customer_name;?> 
                                    </td>
                                    <td> 
                                        <?=$row2['sale_createdon']?> 
                                    </td> 
                                    <td> 
                                        <?php
                                        if($row2['inst_status'] =='0'){
                                            echo '<p class="text-danger">Unpaid</p>';
                                        }elseif($row2['inst_status'] =='1'){
                                            echo '<p class="text-success">Paid</p>';
                                        }
                                        ?> 
                                    </td> 
                                </tr>
                                <?php
                                $counting++; 
                            }
                            ?>
                            </tbody>
                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
 <?php
 include '../../includes/footer.php';
 
 ?>
     <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <!-- bootstap bundle js -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <!-- <script src="../../assets/libs/js/main-js.js"></script> -->
    <!-- chart chartist js -->
    <!-- <script src="../../assets/vendor/charts/chartist-bundle/chartist.min.js"></script> -->
    <!-- sparkline js -->
    <!-- <script src="../../assets/vendor/charts/sparkline/jquery.sparkline.js"></script> -->
    <!-- morris js -->
    <!-- <script src="../../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../../assets/vendor/charts/morris-bundle/morris.js"></script> -->
    <!-- chart c3 js -->
    <!-- <script src="../../assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="../../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="../../assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="../../assets/libs/js/dashboard-ecommerce.js"></script> -->