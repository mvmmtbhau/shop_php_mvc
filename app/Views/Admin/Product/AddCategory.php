<?php
if (Session::get('message') && Session::get('message') != NULL) {
?>
    <div class="alert alert-<?php echo Session::get('type') ?> alert-dismissible fade show" role="alert">
        <strong><?php echo Session::get('message') ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    Session::set('message', '');
}
?>
<h3 class="text-center">Thêm danh mục sản phẩm</h3>
<div class="col-md-6">
    <form action="<?php echo BASE_URL ?>CategoryController/insertCategory" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" name="category_name">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Miêu tả danh mục</label>
            <textarea id="editor" style="resize: none;" class="form-control" name="category_desc"></textarea>
        </div>
        <button type="submit" name="addCate" class="btn btn-primary">Thêm danh mục</button>
    </form>
</div>