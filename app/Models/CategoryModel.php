<?php

class CategoryModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function category($table)
    {
        $sql = "SELECT * FROM $table ORDER BY category_id DESC";

        return $this->db->select($sql);
    }

    public function categoryById($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";

        return $this->db->select($sql);
    }

    public function insertCategory($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function check($table, $category_name,$id = ''){
        $sql = "SELECT * FROM $table WHERE category_name = ? AND category_id <> '$id'";
        return $this->db->check($sql, $category_name);
    }

    public function updateCategory($table,$data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }

    public function deleteCategory($table, $cond)
    {
        return $this->db->delete($table, $cond);
    
    }
    // End Category product //
    
    //Category Post
    public function insertCategoryPost($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function checkCatePost($table_cate_post, $category_post_name,$id=''){
        $sql = "SELECT * FROM $table_cate_post WHERE category_post_name = ? AND category_post_id <> '$id'";
        return $this->db->check($sql, $category_post_name);
    }

    public function categoryPost($table)
    {
        $sql = "SELECT * FROM $table ORDER BY category_post_id DESC";
        return $this->db->select($sql);
    }

    public function deleteCategoryPost($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }

    public function categoryPostById($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }

    public function updateCategoryPost($table,$data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }

}
