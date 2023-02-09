<?php
// Admin post
class PostController extends Controller
{
    public $table_cate_post = 'tbl_category_post';
    public $table_post = 'tbl_post';

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

        $data['category'] = $CategoryModel->categoryPost($this->table_cate_post);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Post/ListCategory', $data);
        $this->load->view('Admin/Footer');
    }

    public function addCategory()
    {
        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Post/AddCategory');
        $this->load->view('Admin/Footer');
    }

    public function insertCategory()
    {
        $CategoryModel = $this->load->model('CategoryModel');

        $category_post_name = $_POST['category_post_name'];
        $category_post_desc = $_POST['category_post_desc'];

        $data = array(
            'category_post_name' => $category_post_name,
            'category_post_desc' => $category_post_desc
        );

        $check = $CategoryModel->checkCatePost($this->table_cate_post, $category_post_name);
        if (!$check) {
            $result = $CategoryModel->insertCategoryPost($this->table_cate_post, $data);
            Session::set('message', "Thêm danh mục thành công!");
            Session::set('type', 'success');
            header('Location:' . BASE_URL . 'PostController/Categorylist');
        } else {
            Session::set('message', "Danh mục đã tồn tại");
            Session::set('type', 'danger');
            header('Location:' . BASE_URL . 'PostController');
        }
    }

    public function categoryById($id)
    {
        $CategoryModel = $this->load->model('CategoryModel');
        $cond = "$this->table_cate_post.category_post_id ='$id'";

        $data['categoryPostById'] = $CategoryModel->categoryPostById($this->table_cate_post, $cond);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Post/EditCategory', $data);
        $this->load->view('Admin/Footer');
    }

    public function updateCategory($id)
    {
        $CategoryModel = $this->load->model('CategoryModel');

        $cond = "$this->table_cate_post.category_post_id='$id'";

        $category_post_name = $_POST['category_post_name'];
        $category_post_desc = $_POST['category_post_desc'];

        $data = array(
            'category_post_name' => $category_post_name,
            'category_post_desc' => $category_post_desc
        );

        $check = $CategoryModel->checkCatePost($this->table_cate_post, $category_post_name,$id);
        if (!$check) {
            $result = $CategoryModel->updateCategoryPost($this->table_cate_post, $data, $cond);
            Session::set('message', "Cập nhật danh mục thành công!");
            Session::set('type', 'success');
            header('Location:' . BASE_URL . 'PostController/Categorylist');
        } else {
            Session::set('message', "Cập nhật danh mục thất bại! Danh mục đã tồn tại");
            Session::set('type', 'danger');
            header('Location:' . BASE_URL . 'PostController/CategoryById/'.$id);
        }
    }

    public function deleteCategory($id)
    {
        $CategoryModel = $this->load->model('CategoryModel');

        $cond = "$this->table_cate_post.category_post_id='$id'";

        $result = $CategoryModel->deleteCategoryPost($this->table_cate_post, $cond);

        if ($result) {
            Session::set('message', "Xóa danh mục thành công!");
            Session::set('type', 'success');
            header("Location:" . BASE_URL . "PostController/CategoryList");
        } else {
            Session::set('message', "Danh mục không tồn tại!");
            Session::set('type', 'danger');
            header("Location:" . BASE_URL . "PostController/CategoryList");
        }
    }

    public function addPost()
    {
        $CategoryModel = $this->load->model('CategoryModel');

        $data['category'] = $CategoryModel->categoryPost($this->table_cate_post);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Post/AddPost', $data);
        $this->load->view('Admin/Footer');
    }

    public function insertPost()
    {
        $PostModel = $this->load->model('PostModel');

        $post_title = $_POST['post_title'];
        $post_content = $_POST['post_content'];
        $category_id = $_POST['category_id'];

        $post_image = $_FILES['post_image']['name'];
        $tmp_image = $_FILES['post_image']['tmp_name'];

        $div = explode('.', $post_image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;
        $path_uploads = $_SERVER['DOCUMENT_ROOT'] . "/MVC_SHOP/app/public/uploads/post/" . $unique_image;

        $data = array(
            'post_title' => $post_title,
            'post_content' => $post_content,
            'category_post_id' => $category_id,
            'post_image' => $unique_image
        );

        $check = $PostModel->checkPost($this->table_post, $post_title);
        if (!$check) {
            $result = $PostModel->insertPost($this->table_post, $data);
            Session::set('message', "Thêm bài viết thành công!");
            Session::set('type', 'success');
            move_uploaded_file($tmp_image, $path_uploads);
            header("Location:" . BASE_URL . "PostController/PostList");
        } else {
            Session::set('message', "Tiêu đề bài viết đã tồn tại!");
            Session::set('type', 'danger');
            header("Location:" . BASE_URL . "PostController/addPost");
        }
    }

    public function postList()
    {
        $PostModel = $this->load->model('PostModel');

        $data['post'] = $PostModel->post($this->table_post, $this->table_cate_post);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Post/ListPost', $data);
        $this->load->view('Admin/Footer');
    }

    public function deletePost($id)
    {
        $PostModel = $this->load->model('PostModel');
        $cond =  "$this->table_post.post_id='$id'";

        $result = $PostModel->deletePost($this->table_post, $cond);
        if ($result == 1) {
            Session::set('message', "Xóa bài viết thành công!");
            Session::set('type', 'success');
            header("Location:" . BASE_URL . "PostController/PostList");
        } else {
            Session::set('message', "Bài viết không tồn tại!");
            Session::set('type', 'danger');
            header("Location:" . BASE_URL . "PostController/PostList");
        }
    }

    public function postById($id)
    {
        $PostModel = $this->load->model('PostModel');
        $cond = "$this->table_post.post_id ='$id'";

        $data['postById'] = $PostModel->postById($this->table_post, $cond);

        $CategoryModel = $this->load->model('CategoryModel');
        $data['category'] = $CategoryModel->categoryPost($this->table_cate_post);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Menu');
        $this->load->view('Admin/Post/EditPost', $data);
        $this->load->view('Admin/Footer');
    }

    public function updatePost($id)
    {
        $PostModel = $this->load->model('PostModel');
        $cond = "$this->table_post.post_id='$id'";

        $post_title = $_POST['post_title'];
        $post_content = $_POST['post_content'];
        $category_id = $_POST['category_id'];

        $post_image = $_FILES['post_image']['name'];
        $tmp_image = $_FILES['post_image']['tmp_name'];

        $div = explode('.', $post_image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;
        $path_uploads = $_SERVER['DOCUMENT_ROOT'] . "/MVC_SHOP/app/public/uploads/post/" . $unique_image;

        if ($post_image) {
            $data['postById'] = $PostModel->postById($this->table_post, $cond);
            foreach ($data['postById'] as $key => $pos) {
                if ($pos['post_image']) {
                    $path_unlink = $_SERVER['DOCUMENT_ROOT'] . "/MVC_SHOP/app/public/uploads/post/";
                    unlink($path_unlink . $pos['post_image']);
                }
            };
            $data = array(
                'post_title' => $post_title,
                'post_content' => $post_content,
                'category_post_id' => $category_id,
                'post_image' => $unique_image
            );
            move_uploaded_file($tmp_image, $path_uploads);
        } else {
            $data = array(
                'post_title' => $post_title,
                'post_content' => $post_content,
                'category_post_id' => $category_id
            );
        }
        $check = $PostModel->checkPost($this->table_post, $post_title,$id);
        
        if (!$check) {
            $result = $PostModel->updatePost($this->table_post, $data, $cond);
            Session::set('message', "Cập nhật bài viết thành công!");
            Session::set('type', 'success');
            move_uploaded_file($tmp_image, $path_uploads);
            header("Location:" . BASE_URL . "PostController/PostList");
        } else {
            Session::set('message', "Cập nhật bài viết thất bại! Tiêu đề bài viết đã tồn tại");
            Session::set('type', 'danger');
            header("Location:" . BASE_URL . "PostController/postById/".$id);
        }

    }
}
