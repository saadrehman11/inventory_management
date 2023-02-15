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
                    <h5 class="card-header">Add New Product Type</h5>
                    <div class="card-body">
                        <form  id="new_productType_form"  method="post" action="#" onsubmit="add_producttype_db();return false">
                        <div class="row">
                            <div class="form-group col-12 py-2">
                                <label for="product_type_title">Product Type Title</label>
                                <input id="product_type_title" type="text" name="product_type_title" data-parsley-trigger="change" required="" placeholder="Enter product Type Title" autocomplete="off" class="form-control">
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