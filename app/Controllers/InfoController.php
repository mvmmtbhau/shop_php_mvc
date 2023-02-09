<?php
// Trang thông tin website
class InfoController extends Controller
{
    public $table_info = 'tbl_info';

    public function __construct()
    {
        $data = array();
        parent::__construct();
        Session::init();
    }

    public function index()
    {
        $this->info();
    }

    public function info()
    {
        $InfoModel = $this->load->model('InfoModel');

        $data['info'] = $InfoModel->info($this->table_info);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Dashboard', $data);
        $this->load->view('Admin/Footer');
    }

    public function insertInfo()
    {
        $InfoModel = $this->load->model('InfoModel');
        $info_content = $_POST['info_content'];

        $data = array(
            'info_content' => $info_content
        );

        $result = $InfoModel->insert($this->table_info, $data);
        if($result){
            Session::set('message', "Cập nhật thông tin web thành công!");
            Session::set('type', 'success');
            header("Location:" . BASE_URL . "InfoController");
        } else {
            Session::set('message',"Cập nhật thông tin web thất bại!");
            Session::set('type', 'success');
            header("Location:" . BASE_URL . "InfoController");
        }
    }
}
