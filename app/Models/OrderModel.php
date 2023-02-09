<?php

class OrderModel extends Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function insertOrder($table_order,$data_order){
        return $this->db->insert($table_order, $data_order);
        
    }

    public function insertOrderDetail($table_order_detail,$data_detail){
        return $this->db->insert($table_order_detail, $data_detail);
    }

    public function listOrder($table_order){
        $sql = "SELECT * FROM $table_order ORDER BY order_id DESC";
        return $this->db->select($sql);
    }

    public function orderDetail($table_order_detail, $table_product, $cond){
        $sql = "SELECT * FROM $table_order_detail,$table_product WHERE $cond";
        return $this->db->select($sql);
    }

    public function orderInfo($table_order_detail, $table_customer,$table_order, $condInfo){
        $sql = "SELECT * FROM $table_order_detail,$table_customer, $table_order WHERE $condInfo ORDER BY $table_order_detail.order_detail_id DESC LIMIT 1";
        return $this->db->select($sql);
    }

    public function orderShip($table_order,$data, $cond){
        return $this->db->update($table_order,$data,$cond);
    }


    public function deleteOrder($table_order, $cond){
        return $this->db->delete($table_order, $cond);
    }
}

?>