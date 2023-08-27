<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    // MULAI GET DATA ANAK
    public function getDataAnak()
    {
        $query = "SELECT * FROM anak ORDER BY id_anak  DESC";

        return $this->db->query($query)->result_array();
    }
    // SELESAI GET DATA ANAK IBU

    // MULAI GET DATA UTK CETAK LAPORAN
    function get($where = array())
    {

        $this->db->select('i.nik_anak, h.tgl_lahir, h.tgl_skrng, h.usia, h.bb, h.tb, h.bb, h.lingkar_kepala, h.lingkar_lengan, h.ket, i.nama_anak')
            ->from('penimbangan h')
            ->join('anak i', 'i.id_anak = h.anak_id');
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

        $this->db->select('i.nik_anak, i.kk_anak, i.tempat_lahir, i.jenis_kelamin, i.nama_orang_tua, h.tgl_lahir, h.tgl_skrng, h.usia, h.bb, h.tb, h.bb, i.nama_anak')
            ->from('penimbangan h')
            ->join('anak i', 'i.id_anak = h.anak_id');
        if (count($where) > 0)
            $this->db->where($where);

        $this->db->group_by('h.anak_id');
        $this->db->order_by('h.tgl_skrng asc');
        // var_dump($res->result());
        // die;

        $res = $this->db->get();
        // echo $this->db->last_query();
        return $res->result();
    }
    // SELESAI GET DATA UTK CETAK LAPORAN
}
