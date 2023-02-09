<?php

class Model {

    protected $db = array();

    public function __construct()
    {
        $connect = 'mysql:dbname=mvc_shop; host:localhost';
        $user = 'user';
        $password = '123456';
        $this->db = new Database($connect,$user,$password);
    }

}
?>