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
                    <h5 class="card-header">Record a Purchase</h5>
                    <div class="card-body">
                        <form  id="product_purchase_form"  method="post" action="#" onsubmit="add_purchase_db();return false">
                        <div class="row">
                            <div class="form-group col-12 col-md-6 py-2">
                                <div>
                                    <label for="product_name">Select Manufacturer</label>
                                    <select class="form-control" name="select_manufacturer" id="select_manufacturer" onchange="show_brand_products(this.value)">
                                    <option value="">--Select Manufacturer--</option>
                                        <?php
                                        $ret=mysqli_query($con,"select * from brand where status = '1'"); 
                                        while ($row=mysqli_fetch_array($ret)) 
                                        {
                                            ?>
                                            <option value="<?=$row['id']?>"><?=$row['brand_name']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                                <div class="form-group col-12 col-md-6 py-2">
                                    <div id="products_div"></div>
                                </div>
                                <div class="form-group col-12 py-2">
                                    <label for="product_quantity">Product Quantity</label>
                                    <input id="product_quantity" type="number" name="product_quantity" data-parsley-trigger="change" required="" placeholder="Enter product quantity" autocomplete="off" class="form-control">
                                </div>
                                <div class="form-group col-12 py-2">
                                    <label for="per_item_price">Per Item Price</label>
                                    <input id="per_item_price" type="number" name="per_item_price" onkeyup="calculate_total_purchase()" data-parsley-trigger="change" required="" placeholder="Enter Single Item Price" autocomplete="off" class="form-control">
                                </div>
                            <div class="form-group col-12 d-flex justify-content-between py-2">
                                <h4 id="total_price">Total: 0.00</h4>
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