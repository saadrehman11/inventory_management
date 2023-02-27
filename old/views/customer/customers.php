<?php
    include '../../includes/header.php';
    include '../../includes/sidebar.php';
?>
<div class="dashboard-wrapper">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
            <div class="card">
                <h5 class="card-header">All Customers</h5>
                <div class="card-body p-0">
                    <div class="table-responsive p-2">
                        <table class="table" id="all_customers_table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Customer ID</th>
                                    <th class="border-0">Customer Name</th>
                                    <th class="border-0">Customer CNIC</th>
                                    <th class="border-0">Customer Phone</th>
                                    <th class="border-0">Sale ID</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $ret=mysqli_query($con,"SELECT * FROM `customer` ORDER BY id DESC"); 
                            $count=1;
                            while ($row=mysqli_fetch_array($ret)) 
                            {
                                ?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td><?=$row['id']?> </td>
                                    <td><?=$row['customer_name']?> </td>
                                    <td><?=$row['cnic']?> </td>
                                    <td><?=$row['customer_phone']?> </td>
                                    <td><?=$row['sale_id']?> </td>
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
    $('#all_customers_table').DataTable({

    });
    </script>