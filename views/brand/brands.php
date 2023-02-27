<?php
    include '../../includes/header.php';
    include '../../includes/sidebar.php';
?>
<div class="dashboard-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-end mt-3">
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
                                    <th class="border-0">Upload Image</th>
                                    <th class="border-0">Delete</th>
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
                                    <td> 
                                        <form id="brand_img_form<?=$row['id']?>">
                                            <input type="file" name="img" id="img" accept="image/x-png,image/gif,image/jpeg"/>
                                        </form>
                                        <button type="button" class="btn btn-info btn-sm" onclick="upload_image('<?=$row['id']?>')">Upload Image</button>
                                    </td> 
                                    <td> 
                                        <button class="btn btn-danger" onclick="delete_brand('<?=$row['id']?>')">Delete</button>
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
    
    function upload_image(brand_id){
        f_name = "brand_img_form"+brand_id;
        var formdata = new FormData(document.getElementById(f_name))
        formdata.append('brand_id',brand_id)
        $.ajax({
            url: "../../controller/brand/php/brand_controller.php?type=102",
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
    
    
    function delete_brand(brand_id){
        let text = "Are you sure you want to delete?";
        if (confirm(text) == true) {
            $.ajax({
                url: "../../controller/brand/php/brand_controller.php",
                type: "POST",
                data:  {
                    brand_id:brand_id,
                    type:101,
                },
                success: function(dataResult){
                    console.log(dataResult)
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
        
    $('#all_brands_table').DataTable({

    });
    </script>