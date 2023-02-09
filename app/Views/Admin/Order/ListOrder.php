<?php
if (Session::get('message') && Session::get('message') != NULL) {
?>
  
  <div class="alert alert-<?php echo Session::get('type')?> alert-dismissible fade show" role="alert">
    <strong><?php echo Session::get('message')?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
  Session::set('message', '');
  ?>
<?php
}
?>
<h3 class="text-center">Đơn hàng</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Code đơn hàng</th>
      <th scope="col">Ngày đặt</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
    foreach ($order as $key => $ord) {
      $i++;
    ?>
      <tr>
        <th scope="row"><?php echo $i ?></th>
        <td><?php echo $ord['order_code'] ?></td>
        <td><?php echo $ord['order_date'] ?></td>
        <td>
          <?php
          if ($ord['order_status'] == 0) {
            echo 'Đơn hàng mới';
          } else {
            echo 'Khách đã nhận được hàng';
          }
          ?>
        </td>
        <td>
          <?php
          if ($ord['order_status'] == 0) {
          ?>
            <a href="<?php echo BASE_URL ?>OrderController/OrderDetail/<?php echo $ord['order_code'] ?>" class="btn btn-info">Xem</a>
          <?php
          } else {
          ?>
            <a href="<?php echo BASE_URL ?>OrderController/deleteOrder/<?php echo $ord['order_code'] ?>"
            onclick="return confirm('Bạn có muốn xóa đơn hàng <?php echo $ord['order_code']?>?')" class="btn btn-danger"> Xóa</a>
          <?php
          }
          ?>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>