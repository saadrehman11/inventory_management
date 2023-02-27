<?php
    include '../../includes/header.php';
    include '../../includes/sidebar.php';
?>
<div class="dashboard-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-end mt-5">
            <div class="">
                <a class="btn btn-primary" href="add_brand.php">Add Brand</a>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-12">
            <div class="card">
                <h5 class="card-header">All Brands</h5>
                <div class="card-body p-0">
                    <div class="table-responsive p-2">
                        <table class="table" id="all_brands_table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Brand ID</th>
                                    <th class="border-0">Image</th>
                                    <th class="border-0">Brand Name</th>
                                    <th class="border-0">Added On</th>
                                    <th class="border-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $ret=mysqli_query($con,"select * from brand where status = '1'"); 
                            $count=1;
                            while ($row=mysqli_fetch_array($ret)) 
                            {
                                ?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td><?=$row['id']?> </td>
                                    <td>
                                        <div class="m-r-10"><img src="../../<?=$row['brand_img_path']?>" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td><?=$row['brand_name']?> </td>
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
    $('#all_brands_table').DataTable({

    });
    </script>