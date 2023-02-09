<?php
// Trang login người dùng
class User extends Controller
{

    public $table_category = 'tbl_category';
    public $table_cate_post = 'tbl_category_post';
    public $table_customer = 'tbl_customer';
    public $table_order = 'tbl_order';
    public $table_order_detail = 'tbl_order_detail';

    public function __construct()
    {
        $data = array();
        $message = array();
        parent::__construct();
        Session::init();
    }

    public function index()
    {
        if (!Session::get('customer')) {
            $this->loginForm();
        } else {
            $this->getInfo(Session::get('customer_id'));
        }
    }

    public function loginForm()
    {
        $IndexModel = $this->load->model('IndexModel');

        $data['category'] = $IndexModel->categoryProduct($this->table_category);
        $data['category_post'] = $IndexModel->categoryPost($this->table_cate_post);

        Session::set('title','Tài Khoản');

        $this->load->view('Header', $data);
        $this->load->view('Login');
        $this->load->view('Footer');
    }

    public function getInfo($id)
    {
        $IndexModel = $this->load->model('IndexModel');
        $CustomerModel = $this->load->model('CustomerModel');

        $condOrder = "$this->table_order.customer_id = '$id'";

        $condInfo = "$this->table_customer.customer_id = $id";

        $data['category'] = $IndexModel->categoryProduct($this->table_category);
        $data['category_post'] = $IndexModel->categoryPost($this->table_cate_post);
        $data['getInfo'] = $CustomerModel->getInfo($this->table_customer, $condInfo);
        $data['getOrder'] = $CustomerModel->getOrder($this->table_order, $condOrder);

        Session::set('title','Info Account');

        $this->load->view('Header', $data);
        if (Session::get('customer')) {
            $this->load->view('InfoUser', $data);
        } else {
            $this->load->view('404');
        }
        $this->load->view('Footer');
    }

    public function updateForm($id)
    {
        $IndexModel = $this->load->model('IndexModel');
        $CustomerModel = $this->load->model('CustomerModel');

        $condInfo = "$this->table_customer.customer_id = $id";

        $data['getInfo'] = $CustomerModel->getInfo($this->table_customer, $condInfo);
        $data['category'] = $IndexModel->categoryProduct($this->table_category);
        $data['category_post'] = $IndexModel->categoryPost($this->table_cate_post);

        Session::set('title','Update Account');

        $this->load->view('Header', $data);
        $this->load->view('UpdateInfo', $data);
        $this->load->view('Footer');
    }

    public function updateInfo($id)
    {
        $CustomerModel = $this->load->model('CustomerModel');

        $customer_name = $_POST['customer_name'];
        $customer_phone = $_POST['customer_phone'];
        $customer_address = $_POST['customer_address'];

        $cond = "$this->table_customer.customer_id = '$id'";

        $data = array(
            'customer_name' => $customer_name,
            'customer_phone' => $customer_phone,
            'customer_address' => $customer_address,
        );

        $result = $CustomerModel->updateInfo($this->table_customer, $data, $cond);
        if ($result) {
            Session::set('customer_name', $customer_name);
            Session::set('message', "Cập nhật thông tin tài khoản thành công!");
            Session::set('type', 'success');
            header("Location:" . BASE_URL . "User/getInfo/" . Session::get('customer_id'));
        } else {
            Session::set('message', "Cập nhật thông tin tài khoản thất bại!");
            Session::set('type', 'success');
            header("Location:" . BASE_URL . "User/getInfo" . Session::get('customer_id'));
        }
    }

    public function changePassForm()
    {
        $IndexModel = $this->load->model('IndexModel');

        $data['category'] = $IndexModel->categoryProduct($this->table_category);
        $data['category_post'] = $IndexModel->categoryPost($this->table_cate_post);

        Session::set('title','Change Password');

        $this->load->view('Header', $data);
        $this->load->view('ChangePassword', $data);
        $this->load->view('Footer');
    }

    public function changePassword($id)
    {
        $CustomerModel = $this->load->model('CustomerModel');

        $customer_password = $_POST['customer_password'];
        $new_pass = $_POST['new_password'];
        $confirm_pass = $_POST['confirm_password'];

        $cond = "$this->table_customer.customer_id = '$id'
        AND $this->table_customer.customer_password = '$customer_password'";

        $data = array(
            'customer_password' => $new_pass
        );

        $check = $CustomerModel->checkPass($this->table_customer, $customer_password, $id);

        if ($check) {
            $result = $CustomerModel->changePassword($this->table_customer, $data, $cond);

            if ($new_pass == $confirm_pass) {
                Session::set('message', "Đổi mật khẩu thành công!");
                Session::set('type', 'success');
                header("Location:" . BASE_URL . "User/getInfo/" . Session::get('customer_id'));
            } else {
                Session::set('message', "Mật khẩu mới không khớp, vui lòng nhập lại!");
                Session::set('type', 'danger');
                header("Location:" . BASE_URL . "User/changePassForm/" . Session::get('customer_id'));
            }
        } else {
            Session::set('message', "Mật khẩu không đúng, vui lòng nhập lại!");
            Session::set('type', 'danger');
            header("Location:" . BASE_URL . "User/changePassForm/" . Session::get('customer_id'));
        }
    }

    public function signIn()
    {

        $CustomerModel = $this->load->model('CustomerModel');

        $customer_email = $_POST['customer_email'];
        $customer_password = $_POST['customer_password'];

        $count = $CustomerModel->signIn($this->table_customer, $customer_email, $customer_password);

        if ($count == 0) {
            Session::set('message', 'Email hoặc mật khẩu không đúng! Vui lòng nhập lại');
            Session::set('type', 'danger');
            header("Location:" . BASE_URL . "User");
        } else {

            $result = $CustomerModel->getSignIn($this->table_customer, $customer_email, $customer_password);

            Session::set('customer', TRUE);
            Session::set('customer_name', $result[0]['customer_name']);
            Session::set('customer_id', $result[0]['customer_id']);
            header("Location:" . BASE_URL);
        }
    }

    public function signUp()
    {
        $CustomerModel = $this->load->model('CustomerModel');

        $customer_name = $_POST['customer_name'];
        $customer_phone = $_POST['customer_phone'];
        $customer_address = $_POST['customer_address'];
        $customer_email = $_POST['customer_email'];
        $customer_password = $_POST['customer_password'];

        $data = array(
            'customer_name' => $customer_name,
            'customer_phone' => $customer_phone,
            'customer_address' => $customer_address,
            'customer_email' => $customer_email,
            'customer_password' => $customer_password
        );

        $count = $CustomerModel->check($this->table_customer, $customer_email);

        if (!$count) {
            $result = $CustomerModel->signUp($this->table_customer, $data);
            Session::set('message', "Đăng ký tài khoản thành công!");
            Session::set('type', 'success');

            header("Location:" . BASE_URL . "User");
        } else {
            Session::set('message', "Tài khoản đã tồn tại, vui lòng đăng ký tài khoản khác!");
            Session::set('type', 'danger');
            header("Location:" . BASE_URL . "User");
        }
    }

    public function signOut()
    {
        $user = Session::get('customer');
        unset($_SESSION['customer']);
        header('Location:' . BASE_URL . "User");
    }
}
