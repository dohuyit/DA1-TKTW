<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Common/assets/css/reset.css" />
  <link rel="stylesheet" href="Common/assets/css/category.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>BEKAT - NHÓM 3</title>
</head>

<body>
    <div class="wrapper">
    <?php require_once "layout/header.php" ?>
    <main>
      <section id="title-main">
        <div class="container">
          <h1>
          <span>Trang Chủ</span> <span>/</span><strong>Tất cả sản phẩm</strong>
          </h1>
        </div>
      </section>
      <section id="carousel-brand">
        <div class="container">
          <div class="wrapper-brand">
            <div class="container-brand">
              <div class="list-brand">
                <div class="item-brand">
                  <img src="Common/assets/image/adidas-chinh-hang-tai-Sneaker-Daily.jpg.webp" alt="" />
                </div>
                <div class="item-brand">
                  <img src="Common/assets/image/Nike-chinh-hang-tai-Sneaker-Daily.jpg" alt="" />
                </div>
                <div class="item-brand">
                  <img src="Common/assets/image/Jordan-chinh-hang-tai-Sneaker-Daily.jpg.webp" alt="" />
                </div>
                <div class="item-brand">
                  <img src="Common/assets/image/mlb-chinh-hang-tai-Sneaker-Daily.jpg.webp" alt="" />
                </div>
                <div class="item-brand">
                  <img src="Common/assets/image/puma.jpg" alt="" />
                </div>
                <div class="item-brand">
                  <img src="Common/assets/image/mcqueen.jpg" alt="" />
                </div>
                <div class="item-brand">
                  <img src="Common/assets/image/converse.jpg" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="section-category-main">
        <div class="container">
          <div class="body-category-products">
            <!-- Sidebar Filters -->
            <aside class="sidebar">
              <h2>Category</h2>
              <ul class="list-cate">
                <li><a href="#">Nike</a></li>
                <li><a href="#">Addidas</a></li>
                <li><a href="#">Puma</a></li>
                <li><a href="#">MLB</a></li>
              </ul>

              <h2>Size</h2>
              <ul class="list-size">
                <li><a href="#">36</a></li>
                <li><a href="#">37</a></li>
                <li><a href="#">38</a></li>
                <li><a href="#">39</a></li>
                <li><a href="#">40</a></li>
                <li><a href="#">41</a></li>
                <li><a href="#">41</a></li>
                <li><a href="#">43</a></li>
              </ul>

              <h2>Color</h2>
              <div class="color-options">
                <span class="color black"></span>
                <span class="color white"></span>
                <span class="color red"></span>
                <!-- Add more colors as needed -->
              </div>
            </aside>

            <!-- Product Listing Section -->
            <div class="product-list">
              <!-- Toolbar for View Toggle and Sort Options -->
              <div class="toolbar">
                <div class="group-btn-layout">
                  <div class="btn-grid-layout" id="btn-four">
                    <img src="./image/four.svg" alt="">
                  </div>
                  <div class="btn-grid-layout" id="btn-three">
                    <img src="./image/three.svg" alt="">
                  </div>
                  <div class="btn-grid-layout" id="btn-two">
                    <img src="./image/two.svg" alt="">
                  </div>
                </div>
                <select>
                  <option value="" hidden selected>Sắp xếp</option>
                  <option>Bán chạy nhất</option>
                  <option>Mới nhất</option>
                  <option>Giá giảm dần</option>
                  <option>Giá tăng dần</option>
                </select>
              </div>

              <!-- Product Cards -->
              <div class="products-body columns-4" id="products-body">
              <?php foreach ($listSanPhamTimKiem as $key => $sanPham) : ?>
                <div class="card-product">
                  <div class="img-product">
                  <a href="<?=BASE_URL.'?act=chi-tiet-san-pham&id_san_pham=' .$sanPham['id']?>">
                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                  </a>
                    <div class="badge-product">
                      <?php 
                      $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                      $ngayHienTai = new DateTime();
                      $tinhNgay = $ngayHienTai->diff($ngayNhap);
                      if ($tinhNgay->days <= 7) {    ?>

                          <div class="product-label new">
                              <span>Mới</span>
                          </div>
                      <?php } ?>
                      <?php if($sanPham['gia_khuyen_mai'] >0) { ?>
                      <div class="product-label discount">
                          <span>Giảm giá</span>
                      </div>
                      <?php }?>
                    </div>
                  <div class="content-product">
                    <div class="top-content">
                    <a href="<?=BASE_URL.'?act=chi-tiet-san-pham&id_san_pham=' .$sanPham['id']?>"><?= $sanPham['ten_san_pham']?></a>
                    </div>
                    <div class="main-content">
                      <?php if($sanPham['gia_khuyen_mai'] >0){ ?>
                        <span class="price-regular"><?=  formatPrice($sanPham['gia_khuyen_mai']).'đ';?></span>
                        <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']). 'đ';?></del></span>
                      <?php }else{ ?>
                        <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']).'đ'?></span>
                                                        
                                                        
                      <?php }    ?>
                    </div>
                  </div>
                  </div>
                </div>
              <?php endforeach;?>
              </div>
              

                  
                
              
            </div>
          
        </div>
      </section>
    </main>
    <?php require_once "layout/footer.php" ?>
    </div>
    
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script type="module" src="./js/category.js"></script>
</body>

</html>