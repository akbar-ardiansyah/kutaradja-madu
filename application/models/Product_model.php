<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    #------------------------------------------
    // input data global
    # -----------------------------------------
    function input_data($data, $table)
    {
        return $this->db->insert($table, $data);
    }

    public function upload_image($insert, $data)
    {
        $this->db->insert_batch('product_image', $insert);
        $this->db->set('main_image', 1);
        $this->db->where('image', $data);
        $this->db->update('product_image');
        return $this->db->affected_rows();
    }

    #------------------------------------------
    // get data
    # -----------------------------------------
    // getById
    public function get_product_id($id)
    {
        // return $this->db->get_where('product', ['id_product' => $id])->row_array();
        $query = $this->db->query('SELECT * FROM product  JOIN product_image WHERE product_image.id_product = ' . $id . ' AND product.id_product = ' . $id . '  AND main_image = 1 ');
        return $query->row();
    }
    public function get_product()
    {
        $query = $this->db->query('SELECT * FROM product JOIN product_image WHERE product_image.id_product = product.id_product AND main_image = 1  GROUP BY group_image');
        return $query->result_array();
        // $this->db->where('main_image =', 1);
        // $this->db->group_by('group_image');
        // return $this->db->get('product_image')->result_array();
    }

    public function id_product()
    {
        // $query = $this->db->query('SELECT id_product FROM product ORDER BY id_product ASC');
        // return $query->row_array();
        $this->db->select_max('id_product')->get('product')->row()->id_product + 1;
    }
    public function check_data()
    {
        $this->db->limit(1);
        $this->db->order_by('group_image', 'DESC');
        return $this->db->get('product_image')->row_array();
    }
    #------------------------------------------
    // update data
    # -----------------------------------------
    function update_data($data, $table)
    {
        return $this->db->update($table, $data);
    }
    public function update_image($insert, $data)
    {
        $this->db->update_batch('product_image', $insert);
        $this->db->set('main_image', 1);
        $this->db->where('image', $data);
        $this->db->update('product_image');
        return $this->db->affected_rows();
    }
}
