<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
          <?php foreach ($product as $p) {?>
        <div class="col-lg-12">
          <div class="product_img_slide align-content-center">
            <div class="single_product_img">
              <center><img src="<?= base_url('assets/img/products/').$p['prod_image']?>" alt="#" class="img-fluid"></center>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="single_product_text text-center">
            <h3><?= $p['prod_name'] ?></h3>
            <p>
                <?= $p['prod_desc'] ?>
            </p>
            <div class="card_area">
                <div class="product_count_area">
                    <p>Quantity</p>
                    <div class="product_count d-inline-block">
                        <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                        <input class="product_count_item input-number" type="text" value="1" min="1" max="10">
                        <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                    </div>
                    <p>Price &nbsp;<?= number_format($p['prod_price'],2,',','.')?></p>
                </div>
              <div class="add_to_cart">
                  <a href="<?= base_url('beranda/addtocart/').$p['prod_id'] ?>" class="btn_3">add to cart</a>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->