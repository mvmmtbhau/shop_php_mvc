<?php
class ProductModel extends Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function product($table_product,$table_category)
    {
        $sql = "SELECT * FROM $table_product, $table_category
        WHERE $table_product.category_id = $table_category.category_id ORDER BY $table_product.product_id DESC";

        return $this->db->select($sql);
    }

    public function productById($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";

        return $this->db->select($sql);
    }

    public function insertProduct($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function updateProduct($table,$data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }

    public function deleteProduct($table, $cond)
    {
        return $this->db->delete($table, $cond);
    
    }
}
?>