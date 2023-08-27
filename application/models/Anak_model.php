<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak_model extends CI_Model
{
    // MULAI CRUD DATA ANAK
    public function getDataAnak()
    {
        $query = "SELECT * FROM anak ORDER BY id_anak  DESC";

        return $this->db->query($query)->result_array();
    }

    public function delDataAnak($id)
    {
        $this->db->where('id_anak', $id);
        $this->db->delete('anak');
    }
    
}
