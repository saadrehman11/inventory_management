<?php
    include '../../includes/header.php';
    include '../../includes/sidebar.php';
?>
<div class="dashboard-wrapper">
    <div class="container"  style="height:80vh;">
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
                                    <th class="border-0">Product Image</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Product Type</th>
                                    <th class="border-0">Quantity</th>
                                    <th class="border-0">Company Name</th>
                                    <th class="border-0">No. of Installments</th>
                                    <th class="border-0">Sale Date</th>
                                    <th class="border-0">Last Installment Month</th>
                                    <th class="border-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $ret=mysqli_query($con,"select * from sale where sale_type='installment' AND status = '1'"); 
                            $count=1;
                            while ($row=mysqli_fetch_array($ret)) 
                            {   
                                $sale_id = $row['id'];
                                $prd_id = $row['product_id'];
                                $product_detail=mysqli_fetch_array(mysqli_query($con,"select * from product where id = '$prd_id'"));
                                $product_name = $product_detail['product_name'];
                                $product_image = $product_detail['product_name'];
                                $prd_type_id = $product_detail['product_type'];
                                ?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td>
                                        <div class="m-r-10"><img src="../../<?=$product_image?>" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td><?=$product_name;?> </td>
                                    <td>
                                        <?php
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
                                    <td>
                                        <?php
                                        echo $row['no_of_installments'];
                                        ?>
                                    </td>
                                    <td><?=$row['created_on']?> </td>
                                    <td>
                                    <?php
                                        echo $row['last_installment_month'];
                                        ?>
                                    </td>
                                    
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