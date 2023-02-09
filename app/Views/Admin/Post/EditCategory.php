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
<h3 class="text-center">Cập nhật danh mục bài viết</h3>
<div class="col-md-6">
    <?php
    foreach ($categoryPostById as $key => $cate) {

    ?>
        <form action="<?php echo BASE_URL ?>PostController/updateCategory/<?php echo $cate['category_post_id'] ?>" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                <input type="text" value="<?php echo $cate['category_post_name'] ?>" class="form-control" name="category_post_name">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Miêu tả danh mục</label>
                <textarea id="editor" style="resize: none;" class="form-control" name="category_post_desc"><?php echo $cate['category_post_desc'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
        </form>
    <?php
    }
    ?>
</div>