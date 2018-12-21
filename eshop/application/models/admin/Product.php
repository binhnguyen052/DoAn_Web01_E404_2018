<?php
class Product extends CI_Model
{
    public $tb_product = 'product';
    public $tb_product_type = 'product_type';
    public $tb_manufacturer = 'manufacturer';

    public function get_product()
    {
        $query = $this->db->query("SELECT * FROM {$this->tb_product} WHERE 1");

        return $query->result_array();
    }

    public function get_product_type()
    {
        $query = $this->db->query("SELECT * FROM {$this->tb_product_type} WHERE 1");

        return $query->result_array();
    }

    public function get_one_product_type($id = '')
    {
        $query = $this->db->query("SELECT * FROM {$this->tb_product_type} WHERE id = {$id}");

        return $query->result_array();
    }

    public function get_manufacturer()
    {
        $query = $this->db->query("SELECT * FROM {$this->tb_manufacturer} WHERE 1");

        return $query->result_array();
    }

    public function get_one_manufacturer($id = '')
    {
        $query = $this->db->query("SELECT * FROM {$this->tb_manufacturer} WHERE id = {$id}");

        return $query->result_array();
    }

}