<header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
               
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                                <div class="logo">
                                  <a href="index.html"><img src="<?= base_url('')?>assets/images/stars.png"width=70 height=70 alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>                                                
                                        <ul id="navigation">                                                                                                                                     
                                            <li><a href="<?= base_url('');?>">Home</a></li>
                                            <li><a href="<?= base_url('beranda');?>/catalog">Catalog</a></li>
                                            <li><a href="#">Shop</a>
                                                <ul class="submenu">
                                                    <li><a href="confirmation.html">Confirmation</a></li>
                                                    <li><a href="<?= base_url('beranda/keranjang')?>">Shopping Cart</a></li>
                                                    <li><a href="checkout.html">Product Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?= base_url('beranda/contact')?>">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div> 
                            <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                    <li class="d-none d-xl-block">
                                        <div class="form-box f-right ">
                                            <input type="text" name="Search" placeholder="Search">
                                            <div class="search-icon">
                                                <i class="fas fa-search special-tag"></i>
                                            </div>
                                        </div>
                                     </li>
                                    <li>
                                        <div class="shopping-card">
                                            <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </li>
                                    <?php if ($username != null && $username != "user") {?>
                                    <li class=" d-none d-xl-block">
                                        <a class="d-none d-lg-block text-dark" href='<?= base_url('dashboard') ?>'>Admin</a>
                                    </li>
                                    <?php } if ($username == null) {?>
                                   <li class="d-none d-lg-block"> <a href="<?= base_url('login')?>" class="btn header-btn">Sign in</a></li>
                                    <?php }else {?>
                                        <li class="d-none d-lg-block"> <a href="<?= base_url('login/logout')?>" class="btn header-btn">Sign out</a></li>
                                    <?php }?>
                                </ul>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>