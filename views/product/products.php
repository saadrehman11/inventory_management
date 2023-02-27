<?php
    include '../../includes/header.php';
    include '../../includes/sidebar.php';
?>
<div class="dashboard-wrapper">
    <div class="container-fluid">
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
                    <div class="table-responsive p-2">
                        <table class="table" id="all_products_table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Product ID</th>
                                    <th class="border-0">Image</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Product Type</th>
                                    <th class="border-0">Quantity</th>
                                    <th class="border-0">Company Name</th>
                                     <th class="border-0">Image Upload</th> 
                                    <th class="border-0">Delete</th>
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
                                        <form id="product_img_form<?=$row['id']?>">
                                            <input type="file" name="img" id="img" accept="image/x-png,image/gif,image/jpeg"/>
                                        </form>
                                        <button type="button" class="btn btn-info btn-sm" onclick="upload_image('<?=$row['id']?>')">Upload Image</button>
                                    </td> 
                                    <td>
                                        <button class="btn btn-danger" onclick="delete_product('<?=$row['id']?>')">Delete</button>
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
    
    function upload_image(product_id){
        f_name = "product_img_form"+product_id;
        var formdata = new FormData(document.getElementById(f_name))
        formdata.append('product_id',product_id)
        $.ajax({
            url: "../../controller/product/php/product_controller.php?type=111",
            type: "POST",
            data: formdata,
            contentType: false,
            processData:false,
            cache: false,
            success: function(dataResult){
              console.log(dataResult);
              var res = JSON.parse(dataResult);
            if(res.Status_Code == 100){
                alert('Success');
                location.reload();
            }
            }
        }); 
        
    }
    
       
    $('#all_products_table').DataTable({

    });
    
    function delete_product(product_id){
    let text = "Are you sure you want to delete?";
    if (confirm(text) == true) {
        $.ajax({
            url: "../../controller/product/php/product_controller.php?",
            type: "POST",
            data:  {
                product_id:product_id,
                type:108,
            },
            success: function(dataResult){
                // console.log(dataResult)
                var re = JSON.parse(dataResult);
                if(re.Status_Code == 100){
                    location.reload();
                }
            }
        });
    } 
    else {
    }

}
    </script>