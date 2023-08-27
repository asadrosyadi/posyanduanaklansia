<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function dataAnak()
    {
        $res = $this->db->count_all_results('anak');
        return $res;
    }

    public function dataLansia()
    {
        $res = $this->db->count_all_results('lansia');
        return $res;
    }

    // SELESAI KONTEN CARD
}
