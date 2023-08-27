<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lansia_model extends CI_Model
{
    // MULAI CRUD DATA ANAK
    public function getDatalansia()
    {
        $query = "SELECT * FROM lansia ORDER BY id_lansia  DESC";

        return $this->db->query($query)->result_array();
    }

    public function delDataLansia($id)
    {
        $this->db->where('id_lansia', $id);
        $this->db->delete('lansia');
    }
    
}
