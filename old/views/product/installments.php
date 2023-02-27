<?php
    include '../../includes/header.php';
    include '../../includes/sidebar.php';
?>
<div class="dashboard-wrapper">
    <div class="container-fluid" >
    <div class="row mt-4">
            <div class="col-12">
            <div class="card">
                <h5 class="card-header">All Installments</h5>
                <div class="card-body p-0">
                    <div class="table-responsive p-2">
                        <table class="table" id="all_installments_table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Product Image</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Product Type</th>
                                    <th class="border-0">Quantity</th>
                                    <th class="border-0">Company Name</th>
                                    <th class="border-0">Customer Name</th>
                                    <th class="border-0">No. of Installments</th>
                                    <th class="border-0">Sale Date</th>
                                    <th class="border-0">Last Date</th>
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
                                        $customer_detail=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `customer` WHERE `sale_id` = '$sale_id'"));
                                        $customer_name = $customer_detail['customer_name'];
                                        echo $customer_name;?> 
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary" data-toggle="modal"  type="button" onclick="load_all_installments(<?=$sale_id?>)" data-target="#all_installments"><?=$row['no_of_installments']?></a>
                                    </td>
                                    <td><?=$row['created_on']?> </td>
                                    <td>
                                    <?php
                                        echo $row['last_installment_month'];
                                        ?>
                                    </td>
                                    
                                    <td>
                                        <?php
                                        $check_installments = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `installment` WHERE `sale_id` = '$sale_id' AND `status` = 0"));

                                        if ($check_installments == 0) 
                                        { echo '<p class="text-success">Completed</p>'; } else{ echo '<p class="text-primary">Ongoing</p>'; }?> 
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


<!-- Modal -->
<div class="modal fade" id="all_installments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">All Installments</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body" id="installment_modal_div">
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

<?php
    include '../../includes/footer.php';
?>
   <!-- bootstap bundle js -->
   <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>

    <script src="../../controller/product/js/product_controller.js"></script>
<script>
    //      $('#purchases_table_body').DataTable({
    //     scrollY: '480px',
    //      scrollX: true,
    //     // scrollCollapse: true,
    //     paging: false,
    //     searching: true,
    // });      
    $('#all_installments_table').DataTable({

    });
    </script>