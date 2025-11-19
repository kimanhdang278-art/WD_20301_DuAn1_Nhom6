<h1>Sản phẩm liên quan</h1>

<div class="d-flex align-items-center justify-content-between mt-4 mx-2">
    <h4>Sản phẩm nổi bật</h4>
    <button class="btn btn-outline-success">View</button>
  </div>
  <div class="row mx-2">
    <div v-for="item in products":key="item.id" class="col-lg-3 col-md-6 mt-3">
      <div class="card" >
        <img :src="item.image" class="card-img-top" alt="..." style="height: 250px;">
        <div class="card-body">
          <h5 class="card-title">Dâu tây </h5>
          <p class="card-price">
           200.000.vnd
          </p>
          <a href="#" class="btn btn-brown">Mua ngay</a>
        </div>
      </div>
    </div>
  </div>