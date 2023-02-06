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
                    <h5 class="card-header">Add New Brand</h5>
                    <div class="card-body">
                        <form  id="new_brand_form"  method="post" action="#" onsubmit="add_brand_db();return false">
                            <div class="form-group">
                                <label for="brand_name">Brand Name</label>
                                <input id="brand_name" type="text" name="brand_name" data-parsley-trigger="change" required="" placeholder="Enter brand name" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="brand_description">Brand Description</label>
                                <textarea id="brand_description" name="brand_description" placeholder="Brand description" autocomplete="off" class="form-control" rows="5"></textarea>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6 pl-0">
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
    <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>

    <script src="../../controller/brand/js/brand_controller.js"></script>