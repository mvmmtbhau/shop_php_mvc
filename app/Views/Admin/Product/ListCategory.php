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
<h3 class="text-center">Danh mục sản phẩm</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
    foreach ($category as $key => $cate) {
      $i++;
    ?>
      <tr>
        <th scope="row"><?php echo $i ?></th>
        <td><?php echo $cate['category_name'] ?></td>
        <td><?php echo $cate['category_desc'] ?></td>
        <td>
          <a href="<?php echo BASE_URL ?>CategoryController/deleteCategory/<?php echo $cate['category_id'] ?>"
          onclick="return confirm('Bạn có muốn xóa <?php echo $cate['category_name']?>?')" class="btn btn-danger">Xóa</a>
          <a href="<?php echo BASE_URL ?>CategoryController/CategoryById/<?php echo $cate['category_id'] ?>" class="btn btn-info">Cập nhật</a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>