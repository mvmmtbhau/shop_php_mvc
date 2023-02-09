<?php
// Trang index khách hàng
class index extends Controller
{
    
    public $table_category = 'tbl_category';
    public $table_cate_post = 'tbl_category_post';
    public $table_product = 'tbl_product';
    public $table_post = 'tbl_post';
    public $table_info = 'tbl_info';
    public $table_slider = 'tbl_slider';

    public function __construct()
    {
        $data = array();
        parent::__construct();
        Session::init();
    }

    public function index()
    {

        $this->homePage();
    }

    public function homePage()
    {
        $IndexModel = $this->load->model('IndexModel');

        $data['category'] = $IndexModel->categoryProduct($this->table_category);
        $data['category_post'] = $IndexModel->categoryPost($this->table_cate_post);
        $data['productHot'] = $IndexModel->listProductHot($this->table_product);
        $data['productHome'] = $IndexModel->listProductHome($this->table_product);
        $data['postHome'] = $IndexModel->postHome($this->table_post);

        Session::set('title','Trang Chủ');

        $this->load->view('Header', $data);
        $this->load->view('Slider', $data);
        $this->load->view('Home', $data);
        $this->load->view('Footer');
    }

    public function search()
    {
        $IndexModel = $this->load->model('IndexModel');

        $data['category'] = $IndexModel->categoryProduct($this->table_category);
        $data['category_post'] = $IndexModel->categoryPost($this->table_cate_post);

        $search = $_POST['search'];
        $cond = "$this->table_product.product_name LIKE '%$search%'";
        $data['search'] = $IndexModel->search($this->table_product, $cond);

        Session::set('title','Tìm Kiếm');

        $this->load->view('Header', $data);
        $this->load->view('Search', $data);
        $this->load->view('Footer');
    }

    public function info()
    {
        $IndexModel = $this->load->model('IndexModel');
        $InfoModel = $this->load->model('InfoModel');

        $data['category'] = $IndexModel->categoryProduct($this->table_category);
        $data['category_post'] = $IndexModel->categoryPost($this->table_cate_post);
        $data['info'] = $InfoModel->info($this->table_info);

        Session::set('title','Thông Tin Web');

        $this->load->view('Header', $data);
        $this->load->view('About', $data);
        $this->load->view('Footer');
    }

    public function notFound()
    {
        $IndexModel = $this->load->model('IndexModel');

        $data['category'] = $IndexModel->categoryProduct($this->table_category);
        $data['category_post'] = $IndexModel->categoryPost($this->table_cate_post);

        Session::set('title','404 Not Found');

        $this->load->view('Header', $data);
        $this->load->view('404');
        $this->load->view('Footer');
    }
}
