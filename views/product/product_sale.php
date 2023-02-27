<?php
    include '../../includes/header.php';
    include '../../includes/sidebar.php';
?>
<div class="dashboard-wrapper">
    <div class="container">
        <div class="row mt-5">
              <!-- ============================================================== -->
              <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Record a Sale</h5>
                    <div class="card-body">
                        <form  id="product_sale_form"  method="post" action="#" onsubmit="add_sale_db();return false">
                        <div class="row">
                            <div class="form-group col-12 col-md-6 py-2">
                                <div>
                                    <label for="product_name">Select Manufacturer</label>
                                    <select class="form-control chosen-select" name="select_manufacturer" id="select_manufacturer" onchange="show_brand_products(this.value)">
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
                            <div class="form-group col-12 col-md-6 py-2">
                                <label for="product_quantity">Product Quantity</label>
                                <input id="product_quantity" type="number" name="product_quantity" data-parsley-trigger="change" required="" placeholder="Enter product quantity" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group col-12 col-md-6 py-2">
                                <label for="per_item_price">Per Item Price</label>
                                <input id="per_item_price" type="number" name="per_item_price" onkeyup="calculate_total_purchase()" data-parsley-trigger="change" required="" placeholder="Enter Single Item Price" autocomplete="off" class="form-control">
                            </div>
                                                        <!--===============-->
                            <div class="form-group col-12 col-md-6 py-2">
                            <label for="customer_name">Customer Name</label>
                            <input id="customer_name" type="text" name="customer_name" data-parsley-trigger="change" required="" placeholder="Enter Customer Name" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group col-12 col-md-6 py-2">
                                <label for="customer_cnic">Customer CNIC</label>
                                <input id="customer_cnic" name="customer_cnic" type="text" class="form-control"  placeholder="Enter Remaining Balance" autocomplete="off">
                            </div>
                            <div class="form-group col-12 col-md-6 py-2">
                                <label for="customer_phone">Customer Phone Number</label>
                                <input id="customer_phone" name="customer_phone" type="text" class="form-control" required="" placeholder="Enter Phone Number" autocomplete="off">
                            </div>
                            <!--===============-->
                            <div class="form-group col-12 col-md-6 py-2">
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="cash" name="sale_type" checked=""  onchange="payment_type_view(this.value)" class="custom-control-input"><span class="custom-control-label">Cash Payment</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="installment" name="sale_type"  onchange="payment_type_view(this.value)"class="custom-control-input"><span class="custom-control-label">Installments</span>
                                </label>
                            </div>
                            
                            

                            <div class="row col-12" id="installment_plan_div"></div>
                            <div class="form-group col-12 d-flex justify-content-between py-2">
                                <h4 id="total_price">Grand Total: 0.00</h4>
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