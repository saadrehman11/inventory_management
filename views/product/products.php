<?php
    include '../../includes/header.php';
    include '../../includes/sidebar.php';
?>
<div class="dashboard-wrapper">
    <div class="container" style="height:80vh;">
        <div class="d-flex justify-content-evenly mt-5">
            <div class="mx-1">
                <a class="btn btn-primary" href="add_product.php">Add New Product</a>
            </div>
            <div class="mx-1">
                <a class="btn btn-primary" href="add_product_type.php">Add Product Type</a>
            </div>
            <div class="mx-1">
                <a class="btn btn-primary" href="product_purchase.php">Add Purchase</a>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-12">
            <div class="card">
                <h5 class="card-header">All Products</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Product ID</th>
                                    <th class="border-0">Image</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Product Type</th>
                                    <th class="border-0">Quantity</th>
                                    <th class="border-0">Company Name</th>
                                    <!-- <th class="border-0">Added On</th> -->
                                    <th class="border-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $ret=mysqli_query($con,"select * from product where status = '1'"); 
                            $count=1;
                            while ($row=mysqli_fetch_array($ret)) 
                            {
                                ?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td><?=$row['id']?> </td>
                                    <td>
                                        <div class="m-r-10"><img src="../../<?=$row['product_img_path']?>" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td><?=$row['product_name']?> </td>
                                    <td>
                                        <?php
                                        $prd_type_id = $row['product_type'];
                                        $prd_type_detail=mysqli_fetch_array(mysqli_query($con,"select * from product_type where id = '$prd_type_id'"));
                                        $prd_type_name = $prd_type_detail['product_type_title'];
                                        echo $prd_type_name;
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
                                        $b_id = $row['brand_id'];
                                        $brand_detail=mysqli_fetch_array(mysqli_query($con,"select * from brand where id = '$b_id'"));
                                        $brand_name = $brand_detail['brand_name'];
                                        echo $brand_name;?> 
                                    </td>
                                    <!-- <td><?=$row['created_on']?> </td> -->
                                    <td>
                                        <?php if ($row['status'] == '1') 
                                        { echo '<p class="text-success">Active</p>'; } else{ echo '<p class="text-primary">Inactive</p>'; }?> 
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
    </div>



<?php
    include '../../includes/footer.php';
?>
    <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>