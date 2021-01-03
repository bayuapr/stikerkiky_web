<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stiker_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_where($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}

/* End of file stiker_model.php */

?>