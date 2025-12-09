<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                Thông Tin Sản Phẩm
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Tên Sản Phẩm</label>
                    <input type="email" class="form-control" id="title" placeholder="Nhap tên sản phẩm">
                </div>

                <div class="mb-3">
                    <label for="froala-editor" class="form-label">Mô Tả Sản Phẩm</label>
                    <textarea class="form-control" id="editor" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Cài Đặt Sản Phẩm
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">
                                Giá Gốc
                            </label>
                            <input type="number" name="" id="" class="form-contrl">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">
                                Giá Khuyến Mãi
                            </label>
                            <input type="number" name="" id="" class="form-contrl">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">
                                Cân Nặng (kg)
                            </label>
                            <input type="number" name="" id="" class="form-contrl">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">
                                Loại Giống
                            </label>
                            <input type="number" name="" id="" class="form-contrl">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group mb-3">
            <form action="/target" class="dropzone" id="my-great-dropzone"></form>
        </div>

        <div class="form-group mb-3">
            <label for="category_id" class="form-label">Danh Mục Sản Phẩm</label>
            <select name="form-select" aria-label="Default select example">
                <option selected>Chọn Danh Mục</option>
                <option value="1">Danh Mục 1</option>
                <option value="2">Danh Mục 2</option>
                <option value="3">Danh Mục 3</option>
            </select>
        </div>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="isFreatured" checked>
            <label class="form-check-label" for="isFreatured">Sản Phẩm Nổi Bật</label>
        </div>
        <button class="btn btn-primary">Lưu Lại</button>
    </div>
</div>