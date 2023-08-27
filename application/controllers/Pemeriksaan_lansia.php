<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan_lansia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('wpu_helper');
        is_logged_in();

        $this->load->model('Pemeriksaan_model');
    }

    // MULAI MENAMPILKAN
    public function index()
    {
        $data['title'] = 'Pemeriksaan Lansia | Posyandu Anak & Lansia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['d_lansia'] = $this->Pemeriksaan_model->getDataLansia();

        // var_dump($data['d_lansia']);
        // die;
        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('layanan/pemeriksaan-form', $data);
        $this->load->view('templates/footer-datatables');
    }
    // SELESAI MENAMPILKAN

    // MULAI TAMBAH DATA
    public function submit()
    {
        $data['title'] = 'Pemeriksaan Lansia | Posyandu Anak & Lansia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $deteksiValues = $_POST['deteksi'];

        $this->Pemeriksaan_model->add(
            array(
                'lansia_id' => $this->input->post('id_lansia'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'usia' => $this->input->post('usia'),
                'tb' => $this->input->post('tb'),
                'bb' => $this->input->post('bb'),
                'tensi' => $this->input->post('tensi'),
                'keluhan' => $this->input->post('keluhan'),
                'obat_diberikan' => $this->input->post('obat_diberikan'),
                'saran' => $this->input->post('saran'),
                'tgl_skrng' => $this->input->post('tgl_skrng'),

            )
        );

        // $this->db->insert('pemeriksaan', $data);
        $this->session->set_flashdata('msg', ' Data Berhasil Ditambahkan');
        redirect('pemeriksaan_lansia/index');
    }
    // SELESAI TAMBAH DATA
}
