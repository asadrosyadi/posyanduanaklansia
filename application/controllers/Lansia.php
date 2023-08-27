<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lansia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('wpu_helper');
        is_logged_in();
        $this->load->model('Lansia_model');
    }

    // MULAI INDEX DATA ANAK
    public function index()
    {
        $data['title'] = 'Data Anak | Posyandu Anak & Lansia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['lansia'] = $this->Lansia_model->getDataLansia();

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('lansia/index', $data);
        $this->load->view('templates/footer-datatables');
    }
    // SELESAI INDEX DATA ANAK

    // MULAI CREATE DATA ANAK
    public function createDataLansia()
    {
        $data = [
            'nama_lansia' => $this->input->post('nama-lansia'),
            'nik_lansia' => $this->input->post('nik-lansia'),
            'kk_lansia' => $this->input->post('kk_lansia'),
            'tempat_lahir' => $this->input->post('tmt-lahir'),
            'tgl_lahir' => $this->input->post('tgl-lahir'),
            'jenis_kelamin' => $this->input->post('jenis-kelamin'),
        ];

        $this->db->insert('lansia', $data);
        $this->session->set_flashdata('msg', 'Berhasil Ditambahkan');

        redirect('lansia');
    }

    // MULAI DELETE DATA ANAK
    public function deleteDataLansia($id)
    {
        $this->Lansia_model->delDataLansia($id);
        $this->session->set_flashdata('msg', 'Berhasil Dihapus');

        redirect('lansia/index');
    }
    // SELESAI DELETE DATA ANAK
}
