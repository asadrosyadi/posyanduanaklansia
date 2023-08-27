<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('wpu_helper');
        is_logged_in();
        $this->load->model('Anak_model');
    }

    // MULAI INDEX DATA ANAK
    public function index()
    {
        $data['title'] = 'Data Anak | Posyandu Anak & Lansia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['anak'] = $this->Anak_model->getDataAnak();

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('anak/index', $data);
        $this->load->view('templates/footer-datatables');
    }
    // SELESAI INDEX DATA ANAK

    // MULAI CREATE DATA ANAK
    public function createDataAnak()
    {
        $data = [
            'nama_anak' => $this->input->post('nama-anak'),
            'nik_anak' => $this->input->post('nik-anak'),
            'kk_anak' => $this->input->post('kk_anak'),
            'tempat_lahir' => $this->input->post('tmt-lahir'),
            'tgl_lahir' => $this->input->post('tgl-lahir'),
            'jenis_kelamin' => $this->input->post('jenis-kelamin'),
            'nama_orang_tua' => $this->input->post('nama_orang_tua'),
        ];

        $this->db->insert('anak', $data);
        $this->session->set_flashdata('msg', 'Berhasil Ditambahkan');

        redirect('anak');
    }

    // MULAI DELETE DATA ANAK
    public function deleteDataAnak($id)
    {
        $this->Anak_model->delDataAnak($id);
        $this->session->set_flashdata('msg', 'Berhasil Dihapus');

        redirect('anak/index');
    }
    // SELESAI DELETE DATA ANAK
}
