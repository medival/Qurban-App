<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model
{

    public $table   = 'tb_konfigurasi';
    public $id      = 'id_konfigurasi';
    public $order   = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row_array();
    }
}

/* End of file: Konfigurasi_model.php */
