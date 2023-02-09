<?php
// Danh mục sản phẩm admin
class CategoryController extends Controller
{
    public  $table = 'tbl_category';

    public function __construct()
    {
        $data = array();
        $message = array();
        parent::__construct();
        Session::init();
    }

    public function index()
    {
        $this->addCategory();
    }

    public function categoryList()
    {
        $CategoryModel = $this->load->model('CategoryModel');
        $data['category'] = $CategoryModel->category($this->table);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Product/ListCategory', $data);
        $this->load->view('Admin/Footer');
    }

    public function addCategory()
    {
        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Product/AddCategory');
        $this->load->view('Admin/Footer');
    }

    public function insertCategory()
    {
        $CategoryModel = $this->load->model('CategoryModel');
        $category_name = $_POST['category_name'];
        $category_desc = $_POST['category_desc'];

        $data = array(
            'category_name' => $category_name,
            'category_desc' => $category_desc
        );

        $check = $CategoryModel->check($this->table, $category_name);
        if (!$check) {
            $result = $CategoryModel->insertCategory($this->table, $data);
            Session::set('message',"Thêm danh mục thành công!");
            Session::set('type','success');
            header('Location:' . BASE_URL . 'CategoryController/Categorylist');
        } else {
            Session::set('message',"Danh mục đã tồn tại!");
            Session::set('type','danger');
            header('Location:' . BASE_URL . 'CategoryController');
        }
    }

    public function categoryById($id)
    {
        $CategoryModel = $this->load->model('CategoryModel');
        $cond = "$this->table.category_id ='$id'";
        $data['categoryById'] = $CategoryModel->categoryById($this->table, $cond);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Product/EditCategory', $data);
        $this->load->view('Admin/Footer');
    }
    public function updateCategory($id)
    {
        $CategoryModel = $this->load->model('CategoryModel');
        $cond = "$this->table.category_id='$id'";

        $category_name = $_POST['category_name'];
        $category_desc = $_POST['category_desc'];

        $data = array(
            'category_name' => $category_name,
            'category_desc' => $category_desc
        );

        $check = $CategoryModel->check($this->table, $category_name,$id);
        if (!$check) {
            $result = $CategoryModel->updateCategory($this->table, $data, $cond);
            Session::set('message',"Cập nhật danh mục thành công!");
            Session::set('type','success');
            header('Location:' . BASE_URL . 'CategoryController/Categorylist');
        } else {
            Session::set('message',"Cập nhật danh mục thất bại! Danh mục đã tồn tại");
            Session::set('type','danger');
            header('Location:' . BASE_URL . 'CategoryController/CategoryById/'.$id);
        }
    }

    public function deleteCategory($id)
    {
        $CategoryModel = $this->load->model('CategoryModel');

        $cond = "$this->table.category_id='$id'";

        $result = $CategoryModel->deleteCategory($this->table, $cond);


        if ($result) {
            Session::set('message',"Xóa danh mục thành công!");
            Session::set('type','success');
            header('Location:' . BASE_URL . 'CategoryController/Categorylist');
        } else {
            Session::set('message',"Danh mục không tồn tại!");
            Session::set('type','danger');
            header('Location:' . BASE_URL . 'CategoryController/Categorylist');
        }
    }
}
