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
<h3 class="text-center">Liệt kê bài viết</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Tên</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
    foreach($post as $key => $pos){
        $i++;
    ?>
    <tr>
      <th scope="row"><?php echo $i?></th>
      <td><?php echo $pos['post_title']?></td>
      <td><img width="100px" height="100px" src="<?php echo BASE_URL?>/app/public/uploads/post/<?php echo $pos['post_image']?>" alt=""></td>
      <td><?php echo $pos['category_post_name']?></td>
      <td>
        <a href="<?php echo BASE_URL?>PostController/deletePost/<?php echo $pos['post_id']?>" 
        onclick="return confirm('Bạn có muốn xóa <?php echo $pos['post_title']?>?')" class="btn btn-danger">Xóa</a>
        <a href="<?php echo BASE_URL?>PostController/postById/<?php echo $pos['post_id']?>" class="btn btn-info">Cập nhật</a>
      </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>