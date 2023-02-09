<?php

class PostModel extends Model {
    public function insertPost($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function checkPost($table_post, $post_title,$id = ''){
        if(isset($id)){      
            $sql = "SELECT * FROM $table_post WHERE post_title = ? AND post_id <> '$id'";
            return $this->db->check($sql, $post_title);
        } else {
            $sql = "SELECT * FROM $table_post WHERE post_title = ?";
            return $this->db->check($sql, $post_title);
        }
    }

    public function post($table,$table_category)
    {
        $sql = "SELECT * FROM $table, $table_category
        WHERE $table.category_post_id = $table_category.category_post_id ORDER BY $table.post_id DESC";

        return $this->db->select($sql);
    }

    public function deletePost($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }

    public function postById($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }

    public function updatePost($table,$data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }
}

?>