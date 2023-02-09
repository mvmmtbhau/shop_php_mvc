<?php
class InfoModel extends Model {

    public function info($table_info)
    {
        $sql = "SELECT * FROM $table_info ORDER BY info_id DESC LIMIT 1";

        return $this->db->select($sql);
    }

    public function insert($table_info, $data){
        return $this->db->insert($table_info,$data);
    }
}
?>