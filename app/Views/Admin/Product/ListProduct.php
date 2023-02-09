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
<h3 class="text-center">Liệt kê sản phẩm</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Tên</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Sản phẩm hot</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
    foreach ($product as $key => $pro) {
      $i++;
    ?>
      <tr>
        <th scope="row"><?php echo $i ?></th>
        <td><?php echo $pro['product_name'] ?></td>
        <td><?php echo $pro['category_name'] ?></td>
        <td><img width="100px" height="100px" src="<?php echo BASE_URL ?>/app/public/uploads/product/<?php echo $pro['product_image'] ?>" alt="<?php echo $pro['product_image'] ?>"></td>
        <td><?php echo number_format($pro['product_price'], 0, ',', '.') . ' VND' ?></td>
        <td><?php echo $pro['product_quantity'] ?></td>
        <td>
          <?php
          if ($pro['product_hot'] == 1) {
            echo 'Có';
          } else {
            echo 'Không';
          }
          ?>
        </td>
        <td>
          <a href="<?php echo BASE_URL ?>ProductController/deleteProduct/<?php echo $pro['product_id'] ?>"
          onclick="return confirm('Bạn có muốn xóa <?php echo $pro['product_name']?>?')" class="btn btn-danger">Xóa</a>
          <a href="<?php echo BASE_URL ?>ProductController/ProductById/<?php echo $pro['product_id'] ?>" class="btn btn-info">Cập nhật</a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>