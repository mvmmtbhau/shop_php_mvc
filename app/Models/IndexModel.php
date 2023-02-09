<?php

class IndexModel extends Model {
    public function categoryProduct($table)
    {
        $sql = "SELECT * FROM $table ORDER BY category_id DESC";
        
        return $this->db->select($sql);
    }
    
    public function categoryPost($table)
    {
        $sql = "SELECT * FROM $table ORDER BY category_post_id DESC";
        
        return $this->db->select($sql);
    }

    public function productByCategory($table_category, $table_product, $id){
        $sql = "SELECT * FROM $table_category, $table_product 
        WHERE $table_category.category_id = $table_product.category_id AND $table_product.category_id = '$id'
        ORDER BY $table_product.product_id DESC";
        return $this->db->select($sql);
    }

    public function postByCategory($table_cate_post, $table_post, $id){
        $sql = "SELECT * FROM $table_cate_post, $table_post 
        WHERE $table_cate_post.category_post_id = $table_post.category_post_id AND $table_post.category_post_id = '$id'
        ORDER BY $table_post.post_id DESC";
        return $this->db->select($sql);
    }

    public function listProduct($table_product){
        $sql = "SELECT * FROM $table_product ORDER BY product_id DESC";
        return $this->db->select($sql);
    }

    public function listPost($table_post){
        $sql = "SELECT * FROM $table_post ORDER BY post_id DESC";
        return $this->db->select($sql);
    }

    public function listProductHome($table){
        $sql = "SELECT * FROM $table ORDER BY product_id DESC";
        return $this->db->select($sql);
    }

    public function listProductHot($table){
        $sql = "SELECT * FROM $table WHERE $table.product_hot = 1 ORDER BY product_id DESC LIMIT 5";
        return $this->db->select($sql);
    }

    public function productHot($table){
        $sql = "SELECT * FROM $table WHERE $table.product_hot = 1 ORDER BY product_id DESC";
        return $this->db->select($sql);
    }

    public function detailProduct($table,$table_category, $cond){
        $sql = "SELECT * FROM $table,$table_category WHERE $cond";
        return $this->db->select($sql);
    }

    public function relatedProduct($table,$table_category,$cond_related){
        $sql = "SELECT * FROM $table,$table_category WHERE $cond_related LIMIT 4";
        return $this->db->select($sql);
    }

    public function detailPost($table_post,$table_cate_post,$cond){
        $sql = "SELECT * FROM $table_post,$table_cate_post WHERE $cond";
        return $this->db->select($sql);
    }

    public function postHome($table_post){
        $sql = "SELECT * FROM $table_post ORDER BY post_id DESC LIMIT 3";
        return $this->db->select($sql);
    }

    public function search($table_product, $cond){
        $sql = "SELECT * FROM $table_product WHERE $cond ORDER BY product_id DESC";
        return $this->db->select($sql);
    }
    
    public function info($table_info)
    {
        $sql = "SELECT * FROM $table_info ORDER BY info_id DESC LIMIT 1";
        return $this->db->select($sql);
    }

    public function getSlider($table_slider){
        $sql = "SELECT * FROM $table_slider ORDER BY slider_id DESC LIMIT 4";
        return $this->db->select($sql);
    }
}
