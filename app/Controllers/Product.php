<?php
// Sản phẩm client
class Product extends Controller{
    
    public function __construct()
    {
        $data = array();
       parent::__construct();
       Session::init();
    }

    public function index(){
        $this->allProduct();
    }

    public function categoryProduct($id){
        $IndexModel = $this->load->model('IndexModel');
        $table_category = 'tbl_category';
        $table_product = 'tbl_product';
        $table_cate_post = 'tbl_category_post';
        
        $data['category'] = $IndexModel->categoryProduct($table_category);
        $data['category_post'] = $IndexModel->categoryPost($table_cate_post);
        $data['productByCategory'] = $IndexModel->productByCategory($table_category,$table_product,$id);

        Session::set('title','Product By Category');

        $this->load->view('Header',$data);
        $this->load->view('CategoryProduct',$data);
        $this->load->view('Footer');
    }

    public function detailProduct($id){
        $IndexModel = $this->load->model('IndexModel');
        $table_category = 'tbl_category';
        $table_cate_post = 'tbl_category_post';
        $table = 'tbl_product';

        $cond = "$table.category_id = $table_category.category_id AND $table.product_id ='$id'";
        
        $data['category'] = $IndexModel->categoryProduct($table_category);
        $data['category_post'] = $IndexModel->categoryPost($table_cate_post);
        $data['detailProduct'] = $IndexModel->detailProduct($table,$table_category,$cond);
        
        foreach($data['detailProduct'] as $key => $cate){
            $category_id = $cate['category_id'] ;
        };
        $cond_related = "$table.category_id = $table_category.category_id 
        AND $table_category.category_id ='$category_id' AND $table.product_id NOT IN('$id')";
        $data['related'] = $IndexModel->relatedProduct($table,$table_category,$cond_related);

        Session::set('title','Product Detail');

        $this->load->view('Header',$data);
        $this->load->view('DetailProduct',$data);
        $this->load->view('Footer');
    }

    public function allProduct(){
        $IndexModel = $this->load->model('IndexModel');
        $table_category = 'tbl_category';
        $table_product = 'tbl_product';
        $data['category'] = $IndexModel->categoryProduct($table_category);

        $table_cate_post = 'tbl_category_post';
        $data['category_post'] = $IndexModel->categoryPost($table_cate_post);
        $data['listProduct'] = $IndexModel->listProduct($table_product);

        Session::set('title','List Product');

        $this->load->view('Header',$data);
        $this->load->view('ListProduct',$data);
        $this->load->view('Footer');
    }

    public function productHot(){
        $IndexModel = $this->load->model('IndexModel');
        $table_category = 'tbl_category';
        $table_product = 'tbl_product';
        $table_cate_post = 'tbl_category_post';
        
        $data['category'] = $IndexModel->categoryProduct($table_category);
        $data['category_post'] = $IndexModel->categoryPost($table_cate_post);
        $data['productHot'] = $IndexModel->productHot($table_product);

        $this->load->view('Header',$data);
        $this->load->view('ProductHot',$data);
        $this->load->view('Footer');
    }
}
