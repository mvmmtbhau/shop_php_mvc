<?php
if (Session::get('message') && Session::get('message') != NULL) {
?>
  <div class="alert alert-<?php echo Session::get('type')?> alert-dismissible fade show" role="alert">
    <strong><?php echo Session::get('message')?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php
  Session::set('message', '');
}
?>
<h3 class="text-center">Thêm sản phẩm</h3>
<div class="col-md-6">
    <form action="<?php echo BASE_URL ?>ProductController/insertProduct" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" name="product_name">
        </div>
        <div class="mb-3">
            <label class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" name="product_image">
        </div>
        <div class="mb-3">
            <label class="form-label">Giá sản phẩm</label>
            <input type="text" class="form-control" name="product_price">
        </div>
        <div class="mb-3">
            <label class="form-label">Số lượng sản phẩm</label>
            <input type="text" class="form-control" name="product_quantity">
        </div>
        <div class="mb-3">
            <label class="form-label">Miêu tả sản phẩm</label>
            <textarea id="editor" style="resize: none;" rows="5" class="form-control" name="product_desc"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Danh mục sản phẩm</label>
            <select class="form-select" name="category_id">
                <option selected>--Chọn danh mục--</option>

                <?php
                foreach ($category as $key => $cate) {
                ?>

                    <option value="<?php echo $cate['category_id'] ?>">
                        <?php echo $cate['category_name'] ?>
                    </option>

                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Sản phẩm hot</label>
            <select class="form-select" name="product_hot">
                <option selected value="0">Không</option>
                <option value="1">Có</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</div>