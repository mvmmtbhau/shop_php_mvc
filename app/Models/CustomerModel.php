<?php

class CustomerModel extends Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function signUp($table_customer,$data){
        return $this->db->insert($table_customer, $data);
        
    }

    public function signIn($table_customer, $customer_email,$customer_password){
        $sql = "SELECT * FROM $table_customer WHERE customer_email = ? AND customer_password = ?";
        return $this->db->affectedRow($sql, $customer_email, $customer_password);
    }

    public function getSignIn($table_customer, $customer_email, $customer_password){
        $sql = "SELECT * FROM $table_customer WHERE customer_email = ? AND customer_password = ?";
        return $this->db->selectUser($sql, $customer_email, $customer_password);
    }

    public function getInfo($table_customer, $cond){
        $sql = "SELECT * FROM $table_customer WHERE $cond";
        return $this->db->select($sql);
    }

    public function getOrder($table_order, $cond){
        $sql = "SELECT * FROM $table_order WHERE $cond ORDER BY $table_order.order_id DESC ";
        return $this->db->select($sql);
    }

    public function cartCustomerInfo($table_customer,$cond){
        $sql = "SELECT * FROM $table_customer WHERE $cond";
        return $this->db->select($sql);
    }

    public function updateInfo($table_customer,$data, $cond){
        return $this->db->update($table_customer, $data, $cond);
    }

    public function changePassword($table_customer,$data, $cond){
        return $this->db->update($table_customer, $data, $cond);
    }

    public function check($table_customer, $customer_email){
        $sql = "SELECT * FROM $table_customer WHERE customer_email = ?";
        return $this->db->check($sql, $customer_email);
    }

    public function checkPass($table_customer, $customer_password, $id){
        $sql = "SELECT * FROM $table_customer WHERE customer_password = ? AND customer_id = '$id'";
        return $this->db->check($sql, $customer_password);
    }

    // public function insertOrderDetail($table_order_detail,$data_detail){
    //     return $this->db->insert($table_order_detail, $data_detail);
    // }

    // public function listOrder($table_order){
    //     $sql = "SELECT * FROM $table_order ORDER BY order_id DESC";
    //     return $this->db->select($sql);
    // }

    // public function orderDetail($table_order_detail, $table_product, $cond){
    //     $sql = "SELECT * FROM $table_order_detail,$table_product WHERE $cond";
    //     return $this->db->select($sql);
    // }

    // public function orderInfo($table_order_detail, $condInfo){
    //     $sql = "SELECT * FROM $table_order_detail WHERE $condInfo LIMIT 1";
    //     return $this->db->select($sql);
    // }

    // public function orderShip($table_order,$data, $cond){
    //     return $this->db->update($table_order,$data,$cond);
    // }

    // public function deleteOrder($table_order, $cond){
    //     return $this->db->delete($table_order, $cond);
    // }
}

?>