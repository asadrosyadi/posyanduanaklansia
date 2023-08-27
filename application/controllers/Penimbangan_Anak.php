<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penimbangan_Anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('wpu_helper');
        is_logged_in();

        $this->load->model('Penimbangan_model');
    }

    // MULAI MENAMPILKAN
    public function index()
    {
        $data['title'] = 'Penimbangan Anak | Posyandu Anak & Lansia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['d_anak'] = $this->Penimbangan_model->getDataAnak();

        // var_dump($data['d_anak']);
        // die;
        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('layanan/penimbangan-form', $data);
        $this->load->view('templates/footer-datatables');
    }
    // SELESAI MENAMPILKAN

    // MULAI TAMBAH DATA
    public function submit()
    {
        $data['title'] = 'Penimbangan Anak | Posyandu Anak & Lansia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $deteksiValues = $_POST['deteksi'];

        $this->Penimbangan_model->add(
            array(
                'anak_id' => $this->input->post('id_anak'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'usia' => $this->input->post('usia'),
                'tb' => $this->input->post('tb'),
                'bb' => $this->input->post('bb'),
                'lingkar_kepala' => $this->input->post('lingkar_kepala'),
                'lingkar_lengan' => $this->input->post('lingkar_lengan'),
                'tgl_skrng' => $this->input->post('tgl_skrng'),
                'ket' => $this->input->post('keterangan'),
            )
        );

        // $this->db->insert('penimbangan', $data);
        $this->session->set_flashdata('msg', ' Data Berhasil Ditambahkan');
        redirect('penimbangan_anak/index');
    }
    // SELESAI TAMBAH DATA
}
