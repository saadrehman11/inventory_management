<?php
    include '../../includes/header.php';
    include '../../includes/sidebar.php';
?>
<div class="dashboard-wrapper">
    <div class="container" style="height:80vh;">
        <div class="d-flex justify-content-end mt-5">
            <div class="">
                <a class="btn btn-primary" href="add_product.php">Add Product</a>
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
                                    <th class="border-0">Added On</th>
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
                                        <div class="m-r-10"><img src="../../assets/images/product-pic.jpg" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td><?=$row['product_name']?> </td>
                                    <td><?=$row['product_type']?> </td>
                                    <td><?=$row['quantity']?> </td>
                                    <td>
                                        <?php
                                        $b_id = $row['brand_id'];
                                        $brand_detail=mysqli_fetch_array(mysqli_query($con,"select * from brand where id = '$b_id'"));
                                        $brand_name = $brand_detail['brand_name'];
                                        echo $brand_name;?> 
                                    </td>
                                    <td><?=$row['created_on']?> </td>
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