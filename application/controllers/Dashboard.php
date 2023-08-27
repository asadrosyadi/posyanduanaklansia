<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('wpu_helper');
        is_logged_in();

        $this->load->model('Dashboard_model');
    }

    // MULAI MENAMPILKAN DASHBOARD PETUGAS
    public function index()
    {
        $data['title'] = 'Dashboard | Posyandu Anak & Lansia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $users = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // print_r($data);
        $a = $this->Dashboard_model->dataLansia();
        $b = $this->Dashboard_model->dataAnak();

       

        $data['count_lansia'] = $a;
        $data['count_anak'] = $b;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/petugas', $data);
        $this->load->view('templates/footer');
    }

    
}
