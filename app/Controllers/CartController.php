<?php
// Giỏ hàng client
class CartController extends Controller
{
    public $table = 'tbl_category';
    public $table_cate_post = 'tbl_category_post';
    public $table_order = 'tbl_order';
    public $table_order_detail = 'tbl_order_detail';
    public $table_customer = 'tbl_customer';

    public function __construct()
    {
        $data = array();
        parent::__construct();
        Session::init();
    }

    public function index()
    {
        $this->cart();
    }

    public function cart()
    {
        $IndexModel = $this->load->model('IndexModel');
        $CustomerModel = $this->load->model('CustomerModel');
        $id = Session::get('customer_id');
        $cond = "$this->table_customer.customer_id = '$id'";

        $data['category'] = $IndexModel->categoryProduct($this->table);
        $data['category_post'] = $IndexModel->categoryPost($this->table_cate_post);
        $data['customer'] = $CustomerModel->cartCustomerInfo($this->table_customer,$cond);

        Session::set('title','Giỏ Hàng');

        $this->load->view('Header', $data);
        $this->load->view('Cart',$data);
        $this->load->view('Footer');
    }

    public function addCart()
    {
        if (isset($_SESSION['cart'])) {
            $avaiable = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($_SESSION['cart'][$key]['product_id'] == $_POST['product_id']) {
                    $avaiable++;
                    $_SESSION['cart'][$key]['product_quantity'] += $_POST['product_quantity'];
                }
            }
            if ($avaiable == 0) {
                $item = array(
                    'product_id' => $_POST['product_id'],
                    'product_name' => $_POST['product_name'],
                    'product_price' => $_POST['product_price'],
                    'product_image' => $_POST['product_image'],
                    'product_quantity' => $_POST['product_quantity']
                );
                $_SESSION['cart'][] = $item;
            }
        } else {
            $item = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity' => $_POST['product_quantity']
            );
            $_SESSION['cart'][] = $item;
        }
        header("Location:" . BASE_URL . "CartController");
    }

    public function updateCart()
    {
        if (isset($_POST['delete_cart'])) {

            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($_SESSION['cart'][$key]['product_id'] == $_POST['delete_cart']) {
                        unset($_SESSION['cart'][$key]);
                    }
                }
                header("Location:" . BASE_URL . "CartController");
            } else {
                header("Location:" . BASE_URL);
            }
        } elseif (isset($_POST['update_cart'])) {
            foreach ($_POST['qty'] as $key => $qty) {
                foreach ($_SESSION['cart'] as $session => $value) {
                    if ($value['product_id'] == $key && $qty >= 1) {
                        $_SESSION['cart'][$session]['product_quantity'] = $qty;
                    } elseif ($value['product_id'] == $key && $qty <= 0) {
                        unset($_SESSION['cart'][$session]);
                    }
                }
            }
            header("Location:" . BASE_URL . "CartController");
        }
    }

    public function order()
    {
        $OrderModel = $this->load->model('OrderModel');

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $order_code = rand(0, 9999);
        $customer_id = Session::get('customer_id');

        $data_order = array(
            'order_code' => $order_code,
            'customer_id' => $customer_id,
            'order_status' => 0
        );
        $result_order = $OrderModel->insertOrder($this->table_order, $data_order);

        if (Session::get('cart') == TRUE) {
            foreach (Session::get('cart') as $key => $value) {
                $data_detail = array(
                    'order_code' => $order_code,
                    'product_id' => $value['product_id'],
                    'product_soluong' => $value['product_quantity'],
                    'name' => $name,
                    'phone' => $phone,
                    'address' => $address,
                    'email' => $email,
                    'message' => $message
                );

                $result_order_detail = $OrderModel->insertOrderDetail($this->table_order_detail, $data_detail);
            }
            unset($_SESSION['cart']);
        }
        
        if($result_order){
            Session::set('message', "Đặt hàng thành công!");
            Session::set('type', 'success');
            header("Location:" . BASE_URL . "CartController");
        } else {
            Session::set('message', "Đặt hàng thất bại!");
            Session::set('type', 'success');
            header("Location:" . BASE_URL . "CartController");
        }
        
    }
}
