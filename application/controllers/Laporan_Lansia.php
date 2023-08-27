<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_Lansia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('wpu_helper');
        is_logged_in();

        $this->load->model('Laporan_model_lansia');
    }

    // MULAI MENAMPILKAN
    public function index()
    {
        $data['title'] = 'Laporan Lansia | Posyandu Anak dan Lansia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['d_lansia'] = $this->Laporan_model_lansia->getDataLansia();

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/daftar_data_lansia', $data);
        $this->load->view('templates/footer-datatables');
    }
    // SELESAI MENAMPILKAN

    function Cetak_Laporan()
    {
        $this->load->model('Laporan_model_lansia');
        $idlansia = $this->input->post('id_lansia');
        $tgllahir = $this->input->post('tgl_lahir');
        $filter = array();

        if ($idlansia != '0')
            $filter['h.lansia_id'] = $idlansia;
            $filter['i.tgl_lahir'] = $tgllahir;


        $data['laporan'] = $this->Laporan_model_lansia->get($filter);

        if ($this->input->is_ajax_request())
            $this->load->view('laporan/daftar_data_table_lansia', $data);
        // die;
        else {
            // echo 'print';
            // $html = $this->load->view('laporan/daftar_data_lansia_table_lansia', $data, true);
            // $mpdf = new \Mpdf\Mpdf();
            // $mpdf->WriteHTML($html);
            // $mpdf->Output();

            // $header = $this->ModLaporan->LaporanHeader($id_penilaian);
            // $detail = $this->ModLaporan->LaporanDetail($id_penilaian);
            $idlansia = $this->input->post('id_lansia');
            $tgllahir = $this->input->post('tgl_lahir');
            $filter = array();

            $filter['h.lansia_id'] = $idlansia;
            $filter['i.tgl_lahir'] = $tgllahir;

            $dt = $this->Laporan_model_lansia->get($filter);
            $dtId = $this->Laporan_model_lansia->getId($filter);
            // var_dump($dt);
            // die;

            $mpdf = new \Mpdf\Mpdf();
            // $watermark = base_url('assets/images/icon.png');
            // $logo = base_url('build/img/icon-posyandu.png');

            // $mpdf->SetHeader("<table width='100%'>
            // <tr>
            // </tr>
            // </table>");
            $mpdf->SetFooter("Posyandu Anak dan Lansia | By: MA| {PAGENO}");
            $mpdf->SetMargins(0, 0, 10);

            $html = "<h1 align='center' style='margin-bottom:1px'>Laporan Pemeriksaan Lansia</h1>";

            $html = $html . "<p align='left'><b>Tanggal Cetak  : " . tanggal() . "</b></p>";

            //MUlai Data Lansia
            $html = $html . "<h3>DATA LANSIA</h3>";
            $html = $html . "<table>";
            foreach ($dtId as $i) {
                $html = $html . "<tr>";
                $html = $html . "<td style='width:150px'>Nama</td><td>:</td><td>" . $i->nama_lansia . "</td>";
                $html = $html . "</tr>";
                $html = $html . "<tr>";
                $html = $html . "<td style='width:150px'>NIK</td><td>:</td><td>" . $i->nik_lansia . "</td>";
                $html = $html . "</tr>";
                $html = $html . "<tr>";
                $html = $html . "<td style='width:150px'>No. KK</td><td>:</td><td>" . $i->kk_lansia . "</td>";
                $html = $html . "</tr>";
                $html = $html . "<tr>";
                $html = $html . "<td style='width:150px'>Tanggal Lahir</td><td>:</td><td>" .  $i->tempat_lahir . ', '. date_format(date_create($i->tgl_lahir), "j F Y") . "</td>";
                $html = $html . "</tr>";
                $html = $html . "<tr>";
                $html = $html . "<td style='width:150px'>Jenis Kelamin</td><td>:</td><td>" . $i->jenis_kelamin . "</td>";
                $html = $html . "</tr>";

            }
            $html = $html . "</table>";
            //Selesai Data lansia

            $html = $html . "<br>";
            $html = $html . "<h3>REKAP DATA PEMERIKSAAN LANSIA</h3>";
            $html = $html . "<table border='1' cellspacing='0' cellpading='0' >";
            $html = $html . "<thead>";
            $html = $html . "<tr>";
            $html = $html . "<th>Tanggal</th>";
            $html = $html . "<th>Usia</th>";
            $html = $html . "<th>Berat Badan</th>";
            $html = $html . "<th>Tinggi Badan</th>";
            $html = $html . "<th>Tensi</th>";
            $html = $html . "<th>Keluhan</th>";
            $html = $html . "<th>Obat Diberikan</th>";
            $html = $html . "<th>Saran</th>";
            $html = $html . "</tr>";
            $html = $html . "</thead>";
            $html = $html . "<tbody>";
            foreach ($dt as $rows) {
                $html = $html . "<tr>";
                $html = $html . "<td align='center'>" . date_format(date_create($rows->tgl_skrng), "j F Y") . "</td><td align='center'>" . $rows->usia . ' Tahun' . "</td><td align='center'>" . $rows->bb . ' kg' . "</td><td align='center'>" . $rows->tb . ' cm' . "</td><td align='center'>" . $rows->tensi . ' mmHg' . "</td><td align='center'>" . $rows->keluhan . "</td><td align='center'>" . $rows->obat_diberikan . "</td><td align='center'>" . $rows->saran . "</td>" ;
                $html = $html . "</tr>";
            }
            $html = $html . "</tbody>";
            $html = $html . "</table>";
            $mpdf->WriteHTML($html);
            $mpdf->Output('Laporan Lansia.pdf', 'I');
        }
    }
}
