<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penimbangan_model extends CI_Model
{
    public $table = "penimbangan";

    // MULAI GET, ADD DATA ANAK IBU
    public function getDataAnak()
    {
        $query = "SELECT * FROM anak ORDER BY id_anak  DESC";
        

        return $this->db->query($query)->result_array();
    }

    function add($data)
    {
        $this->db->insert($this->table, $data);
    }
    // SELESAI GET, ADD DATA ANAK IBU
}
