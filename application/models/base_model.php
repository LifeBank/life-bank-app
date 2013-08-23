<?php

/**
 * Description of Base_model
 *
 * @author kayfun
 */
class Base_model extends CI_Model {

    protected $table_name = "";
    protected $vo_name = "";
    protected $errors = array();
    protected $all = array();
    protected $_data = array();

    public function __construct() {
        parent::__construct();
    }

    public function getErrors() {
        return $this->errors;
    }

    public function addError($error) {
        $this->errors[] = $error;
    }

    public function get($id) {
        $query = $this->db->get_where($this->table_name, array('id' => $id));

        $this->_data = $query->row_array();
        return row_to_vo($this->_data, $this->vo_name);
    }

    public function get_row_where($condition) {
        $query = $this->db->get_where($this->table_name, $condition);

        $this->_data = $query->row_array();
        return row_to_vo($this->_data, $this->vo_name);
    }

    public function getCount() {
        $this->db->from($this->table_name);
        return $this->db->count_all_results();
    }

    public function getAll($where = null, $limit = 0, $offset = 0) {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        if ($where) {
            $query = $this->db->get_where($this->table_name, $where);
        } else {
            $query = $this->db->get($this->table_name);
        }

        // echo $this->db->last_query();
        $this->_data = $query->result_array();
        $this->all = resultset_to_vo($this->_data, $this->vo_name); //_to_vo($query->row_array(), "User"); 

        return $this->all;
    }

    public function get_random() {
        $this->db->order_by("rand()");

        $query = $this->db->get($this->table_name);
        $this->_data = $query->row_array();
        return row_to_vo($this->_data, $this->vo_name); //_to_vo($query->row_array(), "User"); 
    }

    public function getIDIndexedList() {
        if (empty($this->all))
            return $this->all;

        $list = array();
        foreach ($this->all as $row) {
            $list[$row->getId()] = $row;
        }

        return $list;
    }

    public function update($data, $condition) {
        return $this->db->update($this->table_name, $data, $condition);
    }

    public function add($data) {
        return $this->db->insert($this->table_name, $data);
    }

    public function delete($where) {
        return $this->db->delete($this->table_name, $where);
    }

    public function getLastInsertId() {
        return $this->db->insert_id();
    }

    public function getDataAsArray() {
        return $this->_data;
    }

}

?>
