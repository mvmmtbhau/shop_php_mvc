<?php
// Đăng nhập admin
class LoginController extends Controller
{
    public $table_admin = 'tbl_admin';

    public function __construct()
    {
        
        $message = array();
        $data = array();
        parent::__construct();
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        Session::init();
        if (Session::get("login")) {
            header('Location:' . BASE_URL . "InfoController");
        }
        $this->load->view('Admin/Login');
        
    }

    public function dashboard()
    {
        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Dashboard');
        $this->load->view('Admin/Footer');
    }

    public function authentication_login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $loginmodel = $this->load->model('LoginModel');

        $count = $loginmodel->login($this->table_admin, $username, $password);

        if ($count == 0) {
            $message['msg'] = "User hoặc mật khẩu sai, xin kiểm tra lại";
            header("Location:" . BASE_URL . "LoginController");
        } else {
            $result = $loginmodel->getLogin($this->table_admin, $username, $password);

            Session::init();
            Session::set('login', true);
            Session::set('username', $result[0]['username']);
            Session::set('userid', $result[0]['admin_id']);

            header('Location:' . BASE_URL . "InfoController");
        }
    }

    public function logout()
    {

        Session::init();
        unset($_SESSION['login']);
        header("Location:" . BASE_URL . "LoginController");
    }
}
