<?php
// Admin product
class ProductController extends Controller
{
    public $table_category = 'tbl_category';
    public $table_product = 'tbl_product';

    public function __construct()
    {
        $data = array();
        parent::__construct();
        Session::init();
    }

    public function index()
    {
        $this->addProduct();
    }

    public function addProduct()
    {
        $CategoryModel = $this->load->model('CategoryModel');
        $data['category'] = $CategoryModel->category($this->table_category);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Product/AddProduct', $data);
        $this->load->view('Admin/Footer');
    }

    public function productList()
    {
        $ProductModel = $this->load->model('ProductModel');
        $data['product'] = $ProductModel->product($this->table_product, $this->table_category);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Product/ListProduct', $data);
        $this->load->view('Admin/Footer');
    }

    public function insertProduct()
    {
        $ProductModel = $this->load->model('ProductModel');

        $product_name = $_POST['product_name'];
        $product_desc = $_POST['product_desc'];
        $product_price = $_POST['product_price'];
        $product_hot = $_POST['product_hot'];
        $product_quantity = $_POST['product_quantity'];
        $category_id = $_POST['category_id'];

        $product_image = $_FILES['product_image']['name'];
        $tmp_image = $_FILES['product_image']['tmp_name'];

        $div = explode('.', $product_image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;
        $path_uploads = $_SERVER['DOCUMENT_ROOT'] . "/MVC_SHOP/app/public/uploads/product/" . $unique_image;

        $data = array(
            'product_name' => $product_name,
            'product_desc' => $product_desc,
            'product_price' => $product_price,
            'product_hot' => $product_hot,
            'product_quantity' => $product_quantity,
            'category_id' => $category_id,
            'product_image' => $unique_image
        );

        $result = $ProductModel->insertProduct($this->table_product, $data);
        if ($result) {
            Session::set('message', "Thêm sản phẩm thành công!");
            Session::set('type', 'success');
            move_uploaded_file($tmp_image, $path_uploads);
            header("Location:" . BASE_URL . "ProductController/ProductList");
        } else {
            Session::set('message', "Thêm sản phẩm thất bại");
            Session::set('type', 'danger');
            header("Location:" . BASE_URL . "ProductController");
        }
    }

    public function productById($id)
    {
        $ProductModel = $this->load->model('ProductModel');
        $CategoryModel = $this->load->model('CategoryModel');

        $cond = "$this->table_product.product_id ='$id'";

        $data['productById'] = $ProductModel->productById($this->table_product, $cond);
        $data['category'] = $CategoryModel->category($this->table_category);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Product/EditProduct', $data);
        $this->load->view('Admin/Footer');
    }

    public function updateProduct($id)
    {
        $ProductModel = $this->load->model('ProductModel');
        $cond = "$this->table_product.product_id='$id'";

        $product_name = $_POST['product_name'];
        $product_desc = $_POST['product_desc'];
        $product_price = $_POST['product_price'];
        $product_hot = $_POST['product_hot'];
        $product_quantity = $_POST['product_quantity'];
        $category_id = $_POST['category_id'];

        $product_image = $_FILES['product_image']['name'];
        $tmp_image = $_FILES['product_image']['tmp_name'];

        $div = explode('.', $product_image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;
        $path_uploads = $_SERVER['DOCUMENT_ROOT'] . "/MVC_SHOP/app/public/uploads/product/" . $unique_image;

        if ($product_image) {
            $data['productById'] = $ProductModel->productById($this->table_product, $cond);
            foreach ($data['productById'] as $key => $pro) {
                if ($pro['product_image']) {
                    $path_unlink = $_SERVER['DOCUMENT_ROOT'] . "/MVC_SHOP/app/public/uploads/product/";
                    unlink($path_unlink . $pro['product_image']);
                }
            };
            $data = array(
                'product_name' => $product_name,
                'product_desc' => $product_desc,
                'product_price' => $product_price,
                'product_hot' => $product_hot,
                'product_quantity' => $product_quantity,
                'category_id' => $category_id,
                'product_image' => $unique_image
            );
            move_uploaded_file($tmp_image, $path_uploads);
        } else {
            $data = array(
                'product_name' => $product_name,
                'product_desc' => $product_desc,
                'product_price' => $product_price,
                'product_hot' => $product_hot,
                'product_quantity' => $product_quantity,
                'category_id' => $category_id
            );
        }

        $result = $ProductModel->updateProduct($this->table_product, $data, $cond);
        if ($result) {
            Session::set('message', "Cập nhật sản phẩm thành công!");
            Session::set('type', 'success');
            header("Location:" . BASE_URL . "ProductController/ProductList");
        } else {
            Session::set('message', "Cập nhật sản phẩm thất bại!");
            Session::set('type', 'danger');
            header("Location:" . BASE_URL . "ProductController/productById/".$id);
        }
    }

    public function deleteProduct($id)
    {
        $ProductModel = $this->load->model('ProductModel');

        $cond = "$this->table_product.product_id='$id'";

        $result = $ProductModel->deleteProduct($this->table_product, $cond);

        if ($result) {
            Session::set('message', "Xóa sản phẩm thành công!");
            Session::set('type', 'success');
            header("Location:" . BASE_URL . "ProductController/ProductList");
        } else {
            Session::set('message', "Sản phẩm không tồn tại!");
            Session::set('type', 'danger');
            header("Location:" . BASE_URL . "ProductController/ProductList");
        }
    }
}
