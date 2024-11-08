<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/category.css" />
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
                        <span>Trang Chủ</span> <span>/</span><strong>Nike</strong>
                    </h1>
                </div>
            </section>
            <section id="carousel-brand">
                <div class="container">
                    <div class="wrapper-brand">
                        <div class="container-brand">
                            <div class="list-brand">
                                <div class="item-brand">
                                    <img src="./image/adidas-chinh-hang-tai-Sneaker-Daily.jpg.webp" alt="" />
                                </div>
                                <div class="item-brand">
                                    <img src="./image/Nike-chinh-hang-tai-Sneaker-Daily.jpg" alt="" />
                                </div>
                                <div class="item-brand">
                                    <img src="./image/Jordan-chinh-hang-tai-Sneaker-Daily.jpg.webp" alt="" />
                                </div>
                                <div class="item-brand">
                                    <img src="./image/mlb-chinh-hang-tai-Sneaker-Daily.jpg.webp" alt="" />
                                </div>
                                <div class="item-brand">
                                    <img src="./image/puma.jpg" alt="" />
                                </div>
                                <div class="item-brand">
                                    <img src="./image/mcqueen.jpg" alt="" />
                                </div>
                                <div class="item-brand">
                                    <img src="./image/converse.jpg" alt="" />
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
                                <div class="card-product">
                                    <div class="img-product">
                                        <div class="badge-product">
                                            <span>H</span>
                                            <span>O</span>
                                            <span>T</span>
                                        </div>
                                        <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                    </div>
                                    <div class="content-product">
                                        <div class="top-content">
                                            <span>Nike</span>
                                            <span>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                            </span>
                                        </div>
                                        <div class="main-content">
                                            <h3 class="heading-card">
                                                <a href="#">Nike G.T. Cut Academy EP</a>
                                            </h3>
                                            <div class="box-price">
                                                <span>2,649,000đ</span>
                                                <span>6,500,000đ</span>
                                            </div>
                                            <div class="tag-card">
                                                <img src="./image/sale-online 1.svg" alt="" />
                                                <p>Giá độc quyền online</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-product">
                                    <div class="img-product">
                                        <div class="badge-product">
                                            <span>H</span>
                                            <span>O</span>
                                            <span>T</span>
                                        </div>
                                        <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                    </div>
                                    <div class="content-product">
                                        <div class="top-content">
                                            <span>Nike</span>
                                            <span>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                            </span>
                                        </div>
                                        <div class="main-content">
                                            <h3 class="heading-card">
                                                <a href="#">Nike G.T. Cut Academy EP</a>
                                            </h3>
                                            <div class="box-price">
                                                <span>2,649,000đ</span>
                                                <span>6,500,000đ</span>
                                            </div>
                                            <div class="tag-card">
                                                <img src="./image/sale-online 1.svg" alt="" />
                                                <p>Giá độc quyền online</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-product">
                                    <div class="img-product">
                                        <div class="badge-product">
                                            <span>H</span>
                                            <span>O</span>
                                            <span>T</span>
                                        </div>
                                        <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                    </div>
                                    <div class="content-product">
                                        <div class="top-content">
                                            <span>Nike</span>
                                            <span>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                            </span>
                                        </div>
                                        <div class="main-content">
                                            <h3 class="heading-card">
                                                <a href="#">Nike G.T. Cut Academy EP</a>
                                            </h3>
                                            <div class="box-price">
                                                <span>2,649,000đ</span>
                                                <span>6,500,000đ</span>
                                            </div>
                                            <div class="tag-card">
                                                <img src="./image/sale-online 1.svg" alt="" />
                                                <p>Giá độc quyền online</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-product">
                                    <div class="img-product">
                                        <div class="badge-product">
                                            <span>H</span>
                                            <span>O</span>
                                            <span>T</span>
                                        </div>
                                        <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                    </div>
                                    <div class="content-product">
                                        <div class="top-content">
                                            <span>Nike</span>
                                            <span>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                            </span>
                                        </div>
                                        <div class="main-content">
                                            <h3 class="heading-card">
                                                <a href="#">Nike G.T. Cut Academy EP</a>
                                            </h3>
                                            <div class="box-price">
                                                <span>2,649,000đ</span>
                                                <span>6,500,000đ</span>
                                            </div>
                                            <div class="tag-card">
                                                <img src="./image/sale-online 1.svg" alt="" />
                                                <p>Giá độc quyền online</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-product">
                                    <div class="img-product">
                                        <div class="badge-product">
                                            <span>H</span>
                                            <span>O</span>
                                            <span>T</span>
                                        </div>
                                        <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                    </div>
                                    <div class="content-product">
                                        <div class="top-content">
                                            <span>Nike</span>
                                            <span>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                            </span>
                                        </div>
                                        <div class="main-content">
                                            <h3 class="heading-card">
                                                <a href="#">Nike G.T. Cut Academy EP</a>
                                            </h3>
                                            <div class="box-price">
                                                <span>2,649,000đ</span>
                                                <span>6,500,000đ</span>
                                            </div>
                                            <div class="tag-card">
                                                <img src="./image/sale-online 1.svg" alt="" />
                                                <p>Giá độc quyền online</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-product">
                                    <div class="img-product">
                                        <div class="badge-product">
                                            <span>H</span>
                                            <span>O</span>
                                            <span>T</span>
                                        </div>
                                        <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                    </div>
                                    <div class="content-product">
                                        <div class="top-content">
                                            <span>Nike</span>
                                            <span>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                            </span>
                                        </div>
                                        <div class="main-content">
                                            <h3 class="heading-card">
                                                <a href="#">Nike G.T. Cut Academy EP</a>
                                            </h3>
                                            <div class="box-price">
                                                <span>2,649,000đ</span>
                                                <span>6,500,000đ</span>
                                            </div>
                                            <div class="tag-card">
                                                <img src="./image/sale-online 1.svg" alt="" />
                                                <p>Giá độc quyền online</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-product">
                                    <div class="img-product">
                                        <div class="badge-product">
                                            <span>H</span>
                                            <span>O</span>
                                            <span>T</span>
                                        </div>
                                        <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                    </div>
                                    <div class="content-product">
                                        <div class="top-content">
                                            <span>Nike</span>
                                            <span>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                            </span>
                                        </div>
                                        <div class="main-content">
                                            <h3 class="heading-card">
                                                <a href="#">Nike G.T. Cut Academy EP</a>
                                            </h3>
                                            <div class="box-price">
                                                <span>2,649,000đ</span>
                                                <span>6,500,000đ</span>
                                            </div>
                                            <div class="tag-card">
                                                <img src="./image/sale-online 1.svg" alt="" />
                                                <p>Giá độc quyền online</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-product">
                                    <div class="img-product">
                                        <div class="badge-product">
                                            <span>H</span>
                                            <span>O</span>
                                            <span>T</span>
                                        </div>
                                        <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                    </div>
                                    <div class="content-product">
                                        <div class="top-content">
                                            <span>Nike</span>
                                            <span>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                            </span>
                                        </div>
                                        <div class="main-content">
                                            <h3 class="heading-card">
                                                <a href="#">Nike G.T. Cut Academy EP</a>
                                            </h3>
                                            <div class="box-price">
                                                <span>2,649,000đ</span>
                                                <span>6,500,000đ</span>
                                            </div>
                                            <div class="tag-card">
                                                <img src="./image/sale-online 1.svg" alt="" />
                                                <p>Giá độc quyền online</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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