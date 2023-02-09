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
<h3 class="text-center">Cập nhật bài viết</h3>
<div class="col-md-6">
    <?php
    foreach($postById as $key => $pos){
    ?>
    <form action="<?php echo BASE_URL ?>PostController/updatePost/<?php echo $pos['post_id']?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Tên bài viết</label>
            <input type="text" class="form-control" name="post_title" value="<?php echo $pos['post_title']?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" name="post_image">
            <p><img width="100px" height="100px" src="<?php echo BASE_URL?>/app/public/uploads/post/<?php echo $pos['post_image']?>"></p>
        </div>
        <div class="mb-3">
            <label class="form-label">Chi tiết bài viết</label>
            <textarea id="editor" style="resize: none;" class="form-control" name="post_content"><?php echo $pos['post_content']?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Danh mục bài viết</label>
            <select class="form-select" name="category_id">
                <option selected>--Chọn danh mục--</option>

                <?php
                foreach ($category as $key => $cate) {
                ?>
                    <option <?php 
                    if($cate['category_post_id']==$pos['category_post_id']) {
                        echo 'selected';
                    } ?> 

                    value="<?php echo $cate['category_post_id'] ?>">
                        <?php echo $cate['category_post_name'] ?>
                    </option>

                <?php
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
    </form>
    <?php
    }
    ?>
</div>