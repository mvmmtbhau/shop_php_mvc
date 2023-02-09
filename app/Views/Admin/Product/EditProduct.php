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
<h3 class="text-center">Cập nhật sản phẩm</h3>
<div class="col-md-6">
    <?php
    foreach ($productById as $key => $pro) {
    ?>
        <form action="<?php echo BASE_URL ?>ProductController/updateProduct/<?php echo $pro['product_id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="product_name" value="<?php echo $pro['product_name'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" name="product_image">
                <p><img width="100px" height="100px" src="<?php echo BASE_URL ?>/app/public/uploads/product/<?php echo $pro['product_image'] ?>"></p>
            </div>
            <div class="mb-3">
                <label class="form-label">Giá sản phẩm</label>
                <input type="text" class="form-control" name="product_price" value="<?php echo $pro['product_price'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Số lượng sản phẩm</label>
                <input type="text" class="form-control" name="product_quantity" value="<?php echo $pro['product_quantity'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Miêu tả sản phẩm</label>
                <textarea id="editor" style="resize: none;" rows="5" class="form-control" name="product_desc"><?php echo $pro['product_desc'] ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Danh mục sản phẩm</label>
                <select class="form-select" name="category_id">
                    <option selected>--Chọn danh mục--</option>

                    <?php
                    foreach ($category as $key => $cate) {
                    ?>
                        <option <?php
                                if ($cate['category_id'] == $pro['category_id']) {
                                    echo 'selected';
                                } ?> value="<?php echo $cate['category_id'] ?>">
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
                    <?php
                    if ($pro['product_hot'] == 0) {
                    ?>
                        <option selected value="0">Không</option>
                        <option value="1">Có</option>
                    <?php
                    } else {
                    ?>
                        <option value="0">Không</option>
                        <option selected value="1">Có</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
        </form>
    <?php
    }
    ?>
</div>