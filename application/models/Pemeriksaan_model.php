<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan_model extends CI_Model
{
    public $table = "pemeriksaan";

    // MULAI GET, ADD DATA ANAK IBU
    public function getDataLansia()
    {
        $query = "SELECT * FROM lansia ORDER BY id_lansia  DESC";
        

        return $this->db->query($query)->result_array();
    }

    function add($data)
    {
        $this->db->insert($this->table, $data);
    }
    // SELESAI GET, ADD DATA ANAK IBU
}
