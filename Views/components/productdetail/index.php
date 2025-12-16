   <!-- Single Page Header start -->
   <div class="container-fluid page-header py-5">
       <h1 class="text-center text-white display-6">Chi tiết sản phẩm</h1>
       <ol class="breadcrumb justify-content-center mb-0">
           <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
           <li class="breadcrumb-item"><a href="#">Trang</a></li>
           <li class="breadcrumb-item active text-white">Sản phẩm chi tiết</li>
       </ol>
   </div>
   <!-- Single Page Header End -->


   <!-- Single Product Start -->
   <div class="container-fluid py-5 mt-5">
       <div class="container py-5">
           <div class="row g-4 mb-5">
               <div class="col-lg-8 col-xl-9">
                   <div class="row g-4">
                       <div class="col-lg-6">
                           <div class="border rounded">
                               <a href="#">
                                   <img src="uploads/<?= $productOne['image'] ?>" class="img-fluid rounded" alt="Image">
                               </a>
                           </div>
                       </div>
                       <div class="col-lg-6">

                           <h4 class="fw-bold mb-3"><?= $productOne['name'] ?></h4>
                           <p class="mb-3">Danh mục: Trái cây</p>
                           <h5 class="fw-bold mb-3"><?= number_format($productOne['price']) ?>vnd</h5>
                           <div class="d-flex mb-4">
                               <i class="fa fa-star text-secondary"></i>
                               <i class="fa fa-star text-secondary"></i>
                               <i class="fa fa-star text-secondary"></i>
                               <i class="fa fa-star text-secondary"></i>
                               <i class="fa fa-star"></i>
                           </div>
                           <p class="mb-4">Sản phẩm hữu cơ 100%, không chất bảo quản, giữ trọn hương vị tự nhiên và giá trị dinh dưỡng.</p>
                           <p class="mb-4"><?= $productOne['description'] ?></p>
                           <div class="input-group quantity mb-5" style="width: 100px;">
                               <div class="input-group-btn">
                                   <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                       <i class="fa fa-minus"></i>
                                   </button>
                               </div>
                               <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                               <div class="input-group-btn">
                                   <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                       <i class="fa fa-plus"></i>
                                   </button>
                               </div>
                           </div>
                           <a href="?view=cart&action=add&id=<?= $productOne['id'] ?>" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Thêm giỏ hàng</a>

                       </div>
                       <div class="col-lg-12">
                           <nav>
                               <div class="nav nav-tabs mb-3">
                                   <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                       id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                       aria-controls="nav-about" aria-selected="true">Mô tả</button>
                                   <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                       id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                       aria-controls="nav-mission" aria-selected="false">Đánh giá</button>
                               </div>
                           </nav>
                           <div class="tab-content mb-5">
                               <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                   <p>Sản phẩm hữu cơ được sản xuất từ nguồn nguyên liệu tự nhiên 100%, không sử dụng hóa chất tổng hợp, thuốc trừ sâu độc hại hay phân bón hóa học. </p>
                                   <p>Quy trình nuôi trồng và chế biến tuân thủ nghiêm ngặt các tiêu chuẩn an toàn, thân thiện với môi trường và tốt cho sức khỏe người tiêu dùng.</p>
                                   <div class="px-2">
                                       <div class="row g-4">
                                           <div class="col-6">
                                               <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                   <div class="col-6">
                                                       <p class="mb-0">Trọng lượng</p>
                                                   </div>
                                                   <div class="col-6">
                                                       <p class="mb-0">1 kg</p>
                                                   </div>
                                               </div>
                                               <div class="row text-center align-items-center justify-content-center py-2">
                                                   <div class="col-6">
                                                       <p class="mb-0">Xuất khẩu</p>
                                                   </div>
                                                   <div class="col-6">
                                                       <p class="mb-0">Việt Nam</p>
                                                   </div>
                                               </div>
                                               <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                   <div class="col-6">
                                                       <p class="mb-0">Sản phẩm</p>
                                                   </div>
                                                   <div class="col-6">
                                                       <p class="mb-0">Táo</p>
                                                   </div>
                                               </div>
                                               <div class="row text-center align-items-center justify-content-center py-2">
                                                   <div class="col-6">
                                                       <p class="mb-0">Kiểm tra</p>
                                                   </div>
                                                   <div class="col-6">
                                                       <p class="mb-0">An toàn sức khỏe</p>
                                                   </div>
                                               </div>

                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                   <?php foreach ($reviews as $review): ?>
                                       <div class="d-flex mb-4">
                                           <img src="assets/img/avatar.jpg"
                                               class="img-fluid rounded-circle p-3"
                                               style="width: 100px; height: 100px;">

                                           <div>
                                               <p class="mb-2" style="font-size: 14px;">
                                                   <?= date('d/m/Y', strtotime($review['created_at'])) ?>
                                               </p>

                                               <div class="d-flex justify-content-between">
                                                   <h5>Khách vãng lai</h5>

                                                   <div class="d-flex mb-3">
                                                       <?php for ($i = 1; $i <= 5; $i++): ?>
                                                           <i class="fa fa-star <?= $i <= $review['rating'] ? 'text-secondary' : '' ?>"></i>
                                                       <?php endfor; ?>
                                                   </div>
                                               </div>

                                               <p><?= htmlspecialchars($review['comment']) ?></p>
                                           </div>
                                       </div>
                                   <?php endforeach; ?>

                                   <div class="d-flex">
                                       <img src="assets/img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                       <div class="">
                                           <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                           <div class="d-flex justify-content-between">
                                               <h5>Sam Peters</h5>
                                               <div class="d-flex mb-3">
                                                   <i class="fa fa-star text-secondary"></i>
                                                   <i class="fa fa-star text-secondary"></i>
                                                   <i class="fa fa-star text-secondary"></i>
                                                   <i class="fa fa-star"></i>
                                                   <i class="fa fa-star"></i>
                                               </div>
                                           </div>
                                           <p class="text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                                               words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                       </div>
                                   </div>
                               </div>
                               <div class="tab-pane" id="nav-vision" role="tabpanel">
                                   <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                       amet diam et eos labore. 3</p>
                                   <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                       Clita erat ipsum et lorem et sit</p>
                               </div>
                           </div>
                       </div>
                       <form method="post" action="?view=review">

                           <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                           <input name="name" placeholder="Tên *" required>
                           <input name="email" placeholder="Email *" required>
                           <!-- Rating -->
                           <div class="mb-3">
                               <label class="form-label">Đánh giá *</label>
                               <select name="rating" class="form-select" required>
                                   <option value="">Chọn sao</option>
                                   <option value="5">★★★★★</option>
                                   <option value="4">★★★★☆</option>
                                   <option value="3">★★★☆☆</option>
                                   <option value="2">★★☆☆☆</option>
                                   <option value="1">★☆☆☆☆</option>
                               </select>
                           </div>

                           <!-- Comment -->
                           <div class="mb-3">
                               <textarea name="comment" class="form-control" rows="4"
                                   placeholder="Your Review *" required></textarea>
                           </div>

                           <button class="btn btn-primary">Gửi bình luận</button>
                       </form>
                   </div>
               </div>
               <div class="col-lg-4 col-xl-3">
                   <div class="row g-4 fruite">
                       <div class="col-lg-12">
                           <div class="input-group w-100 mx-auto d-flex mb-4">
                               <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                               <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                           </div>
                           <div class="mb-4">
                               <h4>Danh mục sản phẩm</h4>
                               <ul class="list-unstyled fruite-categorie">
                                   <?php foreach ($categoryAll['data'] as $category): ?>
                                       <li>
                                           <div class="d-flex justify-content-between fruite-name">
                                               <a href="#"><i class="fas fa-apple-alt me-2"><?= htmlspecialchars($category['name']) ?></i></a>
                                               <span>(3)</span>
                                           </div>
                                       </li>
                                   <?php endforeach; ?>
                               </ul>
                           </div>
                       </div>
                       <div class="col-lg-12">
                           <h4 class="mb-4">Sản phẩm mới</h4>
                           <div class="d-flex align-items-center justify-content-start">
                               <?php

                                foreach (array_splice($productsAll['data'], 0, 4) as $product):
                                ?>

                                   <div class="rounded mt-3" style="width: 100px; height: 100px;">
                                       <img src="uploads/<?= htmlspecialchars($product['image']) ?>" class="img-fluid rounded" alt="Image">
                                   </div>
                                   <div>
                                       <h6 class="mb-2"><?= htmlspecialchars($product['name']) ?></h6>
                                       <div class="d-flex mb-2">
                                           <i class="fa fa-star text-secondary"></i>
                                           <i class="fa fa-star text-secondary"></i>
                                           <i class="fa fa-star text-secondary"></i>
                                           <i class="fa fa-star text-secondary"></i>
                                           <i class="fa fa-star"></i>
                                       </div>
                                       <div class="d-flex mb-2">
                                           <h5 class="fw-bold me-2"><?= htmlspecialchars(number_format($product['price'])) ?></h5>

                                       </div>
                                   </div>
                           </div>
                       <?php
                                endforeach;

                        ?>
                       </div>
                       <div class="col-lg-12">
                           <div class="position-relative">
                               <img src="assets/img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                               <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                   <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <h1 class="fw-bold mb-0">Sản phẩm liên quan</h1>
           <div class="vesitable">
               <div class="owl-carousel vegetable-carousel justify-content-center">
                   <?php

                    foreach ($productsAll['data'] as $product):
                    ?>
                       <div class="border border-primary rounded position-relative vesitable-item">
                           <div class="vesitable-img">
                               <img src="uploads/<?= htmlspecialchars($product['image']) ?>" class="img-fluid w-100 rounded-top" alt="">
                           </div>
                           <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Rau hữu cơ</div>
                           <div class="p-4 pb-0 rounded-bottom">
                               <h4><?= htmlspecialchars($product['name']) ?></h4>
                               <p><?= htmlspecialchars($product['description']) ?></p>
                               <div class="d-flex justify-content-between flex-lg-wrap">
                                   <p class="text-dark fs-5 fw-bold"><?= htmlspecialchars($product['price']) ?>vnd</p>
                                   <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Mua ngay</a>
                               </div>
                           </div>
                       </div>
                   <?php
                    endforeach;

                    ?>
               </div>
           </div>
       </div>
   </div>
   <!-- Single Product End -->