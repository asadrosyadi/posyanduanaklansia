<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model_lansia extends CI_Model
{
    // MULAI GET DATA ANAK
    public function getDataLansia()
    {
        $query = "SELECT * FROM lansia ORDER BY id_lansia  DESC";

        return $this->db->query($query)->result_array();
    }
    // SELESAI GET DATA ANAK IBU

    // MULAI GET DATA UTK CETAK LAPORAN
    function get($where = array())
    {

        $this->db->select('i.nik_lansia, h.tgl_lahir, h.tgl_skrng, h.usia, h.bb, h.tb, h.bb, h.tensi, h.keluhan, h.obat_diberikan, h.saran, i.nama_lansia')
            ->from('pemeriksaan h')
            ->join('lansia i', 'i.id_lansia = h.lansia_id');
        if (count($where) > 0)
            $this->db->where($where);

        $this->db->order_by('h.tgl_skrng asc');
        // var_dump($res->result());
        // die;

        $res = $this->db->get();
        // echo $this->db->last_query();
        return $res->result();
    }

    function getId($where = array())
    {

        $this->db->select('i.nik_lansia, i.kk_lansia, i.tempat_lahir, i.jenis_kelamin, h.tgl_lahir, h.tgl_skrng, h.usia, h.bb, h.tb, h.bb, i.nama_lansia')
            ->from('pemeriksaan h')
            ->join('lansia i', 'i.id_lansia = h.lansia_id');
        if (count($where) > 0)
            $this->db->where($where);

        $this->db->group_by('h.lansia_id');
        $this->db->order_by('h.tgl_skrng asc');
        // var_dump($res->result());
        // die;

        $res = $this->db->get();
        // echo $this->db->last_query();
        return $res->result();
    }
    // SELESAI GET DATA UTK CETAK LAPORAN
}
