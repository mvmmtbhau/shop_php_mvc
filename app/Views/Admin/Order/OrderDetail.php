<h3 class="text-center">Chi tiết đơn hàng</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Code đơn hàng</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        foreach ($orderDetail as $key => $ord) {
            $total += $ord['product_price'] * $ord['product_soluong'];
        ?>
            <tr>
                <td><?php echo $ord['order_code'] ?></td>
                <td><?php echo $ord['product_name'] ?></td>
                <td><img width="100px" height="100px" src="<?php echo BASE_URL ?>/app/public/uploads/product/<?php echo $ord['product_image'] ?>" alt="<?php echo $ord['product_image'] ?>"></td>
                <td><?php echo  $ord['product_soluong'] ?></td>
                <td><?php echo number_format($ord['product_price'], 0, ',', '.') . " Đ" ?></td>
                <td><?php echo number_format(($ord['product_price'] * $ord['product_soluong']), 0, ',', '.') . " Đ" ?></td>
            </tr>
        <?php
        }
        ?>
        <form action="<?php echo BASE_URL ?>OrderController/orderShip/<?php echo $ord['order_code'] ?>" method="POST">
            <tr>
                <td>
                    <input type="submit" class="btn btn-success" value="Giao hàng" name="ship">
                </td>
                <td colspan="6" class="text-end">Tổng tiền : <?php echo number_format($total, 0, ',', '.') . " Đ" ?></td>
            </tr>
        </form>
    </tbody>
</table>

<h3 class="text-center">Thông tin người đặt</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Họ tên</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ giao hàng</th>
            <th scope="col">Email</th>
            <th scope="col">Lời nhắn</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($orderInfo as $key => $ord) {
        ?>
            <tr>
                <td><?php echo $ord['name'] ?></td>
                <td><?php echo $ord['phone'] ?></td>
                <td><?php echo $ord['address'] ?></td>
                <td><?php echo $ord['email'] ?></td>
                <td><?php echo $ord['message'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>