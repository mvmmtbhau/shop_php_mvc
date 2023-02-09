<?php
// Đơn hàng admin
class OrderController extends Controller
{
    public $table_order = 'tbl_order';
    public $table_order_detail = 'tbl_order_detail';
    public $table_product = 'tbl_product';
    public $table_customer = 'tbl_customer';

    public function __construct()
    {
        Session::init();
        $data = array();
        parent::__construct();
    }

    public function index()
    {
        $this->order();
    }

    public function order()
    {
        $OrderModel = $this->load->model('OrderModel');

        $data['order'] = $OrderModel->listOrder($this->table_order);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Order/ListOrder', $data);
        $this->load->view('Admin/Footer');
    }

    public function orderDetail($orderCode)
    {
        $OrderModel = $this->load->model('OrderModel');

        $cond = "$this->table_order_detail.order_code = '$orderCode' 
        AND $this->table_order_detail.product_id = $this->table_product.product_id ";

        $condInfo = "$this->table_order_detail.order_code = '$orderCode' 
        AND $this->table_order.customer_id = $this->table_customer.customer_id";

        $data['orderDetail'] = $OrderModel->orderDetail($this->table_order_detail, $this->table_product, $cond);
        $data['orderInfo'] = $OrderModel->orderInfo($this->table_order_detail,$this->table_customer,$this->table_order, $condInfo);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Order/OrderDetail', $data);
        $this->load->view('Admin/Footer');
    }

    public function deleteOrder($orderCode)
    {
        $OrderModel = $this->load->model('OrderModel');

        $cond = "$this->table_order.order_code ='$orderCode'";

        $result = $OrderModel->deleteOrder($this->table_order, $cond);
        
        if ($result) {
            Session::set('message',"Xóa đơn hàng thành công!");
            Session::set('type','success');
            header('Location:' . BASE_URL . "OrderController");
        } else {
            Session::set('message',"Xóa đơn hàng thành công!");
            Session::set('type','danger');
            header('Location:' . BASE_URL . "OrderController");
        }
    }

    public function orderShip($orderCode)
    {
        $OrderModel = $this->load->model('OrderModel');
        $cond = "$this->table_order.order_code = '$orderCode'";

        $data = array(
            'order_status' => 1
        );
        $data['orderShip'] = $OrderModel->orderShip($this->table_order, $data, $cond);
        if ($data['orderShip']) {
            Session::set('message',"Giao hàng thành công!");
            Session::set('type','success');
            header('Location:' . BASE_URL . "OrderController");
        } else {
            Session::set('message',"Đơn hàng đã giao!");
            Session::set('type','danger');
            header('Location:' . BASE_URL . "OrderController");
        }
    }

    
}
