<?php
    include '../../includes/header.php';
    include '../../includes/sidebar.php';
?>
<div class="dashboard-wrapper">
    <div class="container"  style="height:80vh;">
        <div class="row mt-5">
              <!-- ============================================================== -->
              <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Add New Product</h5>
                    <div class="card-body">
                        <form  id="new_product_form"  method="post" action="#" onsubmit="add_product_db();return false">
                        <div class="row">
                            <div class="form-group col-12 py-2">
                                <label for="product_name">Product Name</label>
                                <input id="product_name" type="text" name="product_name" data-parsley-trigger="change" required="" placeholder="Enter product name" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group col-12 ">
                                <label for="product_description">Product Description</label>
                                <textarea id="product_description" name="product_description" placeholder="Product description" autocomplete="off" class="form-control" rows="5"></textarea>
                            </div>
                            
                                <div class="form-group col-12 col-md-6 py-2">
                                    <div>
                                        <label for="product_name">Product Type</label>
                                        <select class="form-control chosen-select" name="product_type" id="product_type">
                                        <option value="">--Select Product Type--</option>
                                            <?php
                                            $ret=mysqli_query($con,"select * from product_type where status = '1'"); 
                                            while ($row=mysqli_fetch_array($ret)) 
                                            {
                                                ?>
                                                <option value="<?=$row['id']?>"><?=$row['product_type_title']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="form-group col-12 col-md-6 py-2">
                                    <div>
                                        <label for="product_name">Product Company</label>
                                        <select class="form-control chosen-select" name="product_company" id="product_company">
                                            <option value="">--Select Product Company--</option>
                                            <?php
                                            $ret=mysqli_query($con,"select * from brand where status = '1'"); 
                                            while ($row2=mysqli_fetch_array($ret)) 
                                            {
                                                ?>
                                                <option value="<?=$row2['id']?>"><?=$row2['brand_name']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-12 py-2">
                                    <label for="product_image">Product Image</label>
                                    <input id="product_image" type="file" name="product_image" class="form-control">
                                </div>
                            <div class="form-group col-12 d-flex justify-content-end py-2">
                                <p class="text-right">
                                    <button class="btn btn-space btn-primary" type="submit" >Submit</button>
                                </p>
                                
                            </div>
                            </div>
                        </form>
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

    <script src="../../controller/product/js/product_controller.js"></script>
    <script>
         $(".chosen-select").chosen({
              no_results_text: "Oops, nothing found!"
            })
    </script>