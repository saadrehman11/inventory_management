<?php
    include '../../includes/header.php';
    include '../../includes/sidebar.php';
?>
<div class="dashboard-wrapper">
    <div class="container" style="height:80vh;">
        <div class="d-flex justify-content-evenly mt-5">
            <div class="mx-1">
                <a class="btn btn-primary" href="product_sale.php">Add New Sale</a>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-12">
            <div class="card p-5">
                <h5 class="card-header">All Sales</h5>
                <div class="card-body py-4">
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
                                    <th class="border-0">Sale On</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $ret=mysqli_query($con,"SELECT * FROM `sale` WHERE `status` = '1' ORDER BY `created_on` DESC"); 
                            $count=1;
                            while ($row=mysqli_fetch_array($ret)) 
                            {
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
    </div>

<?php
    include '../../includes/footer.php';
?>

    <!-- bootstap bundle js -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>


    <script>
    //      $('#purchases_table_body').DataTable({
    //     scrollY: '480px',
    //      scrollX: true,
    //     // scrollCollapse: true,
    //     paging: false,
    //     searching: true,
    // });      
    $('#sales_table_body').DataTable({

    });
    </script>