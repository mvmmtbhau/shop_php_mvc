<?php
// Tin tức client
class Post extends Controller{
    
    public $table_category = 'tbl_category';
    public $table_cate_post = 'tbl_category_post';
    public $table_post = 'tbl_post';
    
    public function __construct()
    {
        $data = array();
       parent::__construct();
       Session::init();
    }

    public function index(){
        $this->allPost();
    }
    public function categoryPost($id){
        $IndexModel = $this->load->model('IndexModel');
        
        
        $data['category'] = $IndexModel->categoryProduct($this->table_category);
        $data['category_post'] = $IndexModel->categoryPost($this->table_cate_post);
        $data['postByCategory'] = $IndexModel->postByCategory($this->table_cate_post,$this->table_post,$id);

        Session::set('title','Post By Category');
        
        $this->load->view('Header',$data);
        $this->load->view('CategoryPost',$data);
        $this->load->view('Footer');
    }

    public function detailPost($id){
        $IndexModel = $this->load->model('IndexModel');

        $cond = "$this->table_post.category_post_id = $this->table_cate_post.category_post_id
        AND $this->table_post.post_id='$id'";

        $data['category'] = $IndexModel->categoryProduct($this->table_category);
        $data['category_post'] = $IndexModel->categoryPost($this->table_cate_post);
        $data['detailPost'] = $IndexModel->detailPost($this->table_post,$this->table_cate_post,$cond);

        Session::set('title','Post Detail');

        $this->load->view('Header',$data);
        $this->load->view('DetailPost',$data);
        $this->load->view('Footer');
    }

    public function allPost(){
        $IndexModel = $this->load->model('IndexModel');
        
        $data['category'] = $IndexModel->categoryProduct($this->table_category);
        $data['category_post'] = $IndexModel->categoryPost($this->table_cate_post);
        $data['listPost'] = $IndexModel->listPost($this->table_post);

        Session::set('title','List Post');
        
        $this->load->view('Header',$data);
        $this->load->view('ListPost',$data);
        $this->load->view('Footer');
    }

}
