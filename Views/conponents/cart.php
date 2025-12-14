<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Giỏ hàng</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="#">Trang</a></li>
        <li class="breadcrumb-item active text-white">Giỏ hàng</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Têm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng</th>
                        <th scope="col">Xử lý</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $total = 0;
                    foreach ($cartItems as $Items):
                        $total += $Items['quatity'] * (!empty($item['sela_price']) ? $item['sela_price'] : $item['price']);
                        ?>
                        <tr>
                            <th scope="row">
                                <p class="mb-0 mt-4"><?= $Items['title'] ?></p>
                            </th>
                            <td>
                                <img src="<?= $Items['image'] ?>" width="50" alt="">
                            </td>
                            <td>
                                <p class="mb-0 py-4">
                                    <?php if (!empty($item['sale_price'])): ?>
                                        <del class="me-2 fs-5"><?= htmlspecialchars(number_format($item['price'])) ?></del>
                                        <span
                                            class="text-primary fs-5"><?= htmlspecialchars(number_format($item['sale_price'])) ?></span>
                                    <?php else: ?>
                                        <span
                                            class="text-primary fs-5"><?= htmlspecialchars(number_format($item['price'])) ?></span>
                                    <?php endif; ?>
                                </p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4"  style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button data-price="<?=  (!empty($item['sela_price']) ? $item['sela_price'] : $item['price'])?>"  data-id="<?= $item['product_id'] ?>"
                                            class="btn btn-sm btn-minus rounded-circle bg-light border"><i
                                                class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0"
                                        value="<?= $Items['quantity'] ?>">
                                    <div class="input-group-btn">
                                        <button data-price="<?=  (!empty($item['sela_price']) ? $item['sela_price'] : $item['price'])?>"  data-id="<?= $item['product_id'] ?>"
                                            class="btn btn-sm btn-plus rounded-circle bg-light border"><i
                                                class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="sud-total">
                                <p class="mb-0 mt-4">
                                    <?= $item['quatity'] * (!empty($item['sela_price']) ? $item['sela_price'] : $item['price']) ?>
                                </p>

                            </td>
                            <td>
                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Táo</button>
        </div>
        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Giỏ hàng <span class="fw-normal">Tổng</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4"> Tổng tiền:</h5>
                            <p class="mb-0"><?= number_format($total) ?></p>
                        </div>
                        <p class="mb-0 text-end">Shipping ở Việt Nam</p>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Tổng</h5>
                        <p class="mb-0 pe-4 total"><?= number_format($total) ?></p>
                    </div>
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                        type="button">Thanh toán</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->

<script>
    jQuery(document).ready(function () {
        $('.btn-plus').click(function () {

            let price = $(this).data('price');
            let inputQty = parseInt($(this).closest('.input-group').find('input').val());
            let sudTotal = $(this).closest('tr').find('.sud-total');

            sudTotal.text(((inputQty + 1) * price).toLocaleString());
            //đơn giá + số lượng
        });
        $('.btn-minus').click(function () {

            let price = $(this).data('price');

            let inputQty = $(this).closest('.input-group').find('input');

            if (parseInt(inputQty.val()) <= 1) {
                //xử lý cho xóa sản phẩm ra khỏi giỏ hàng

                return                
            }
            let sudTotal = $(this).closest('tr').find('.sud-total');
            sudTotal.text(((parseInt(inputQty.val()) - 1) * price).toLocaleString());
        });
        
        function updataTotal(){
            let total = 0;
            $('.sud-total').each(function(){
                total += parseFloat($(this).text().replace(/,/g,''));
            });
            // cập nhật tổng tiền hiển thị ở phần tổng giỏ hàng
            $('.total').text(total.toLocaleString());
        }
    });
    
</script>