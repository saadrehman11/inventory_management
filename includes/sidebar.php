
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <?php
                            if($user_email == 'fazalsaid492@gmail.com' || $user_email == 'admin@admin.com'){
                            
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link active" href="../dashboard/dashboard.php"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="../product/products.php"><i class="fa fa-fw fa-user-circle"></i>Products</a>
                            </li>
                             <li class="nav-item ">
                                <a class="nav-link" href="../brand/brands.php"><i class="fa fa-fw fa-user-circle"></i>Brands</a>
                            </li>
                             <li class="nav-item ">
                                <a class="nav-link" href="../product/purchases.php"><i class="fa fa-fw fa-user-circle"></i>Purchase</a>
                            </li>
                            
                            <?php
                                
                            }
                            
                            ?>
                             <li class="nav-item ">
                                <a class="nav-link" href="../product/sales.php"><i class="fa fa-fw fa-user-circle"></i>Sale</a>
                            </li>
                             <?php
                            if($user_email == 'fazalsaid492@gmail.com' || $user_email == 'admin@admin.com'){
                            
                            ?>
                             <li class="nav-item ">
                                <a class="nav-link" href="../product/installments.php"><i class="fa fa-fw fa-user-circle"></i>All Installments</a>
                            </li>
                             <li class="nav-item ">
                                <a class="nav-link" href="../customer/customers.php"><i class="fa fa-fw fa-user-circle"></i>All Customers</a>
                            </li>
                            <?php
                                
                            }
                            
                            ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->