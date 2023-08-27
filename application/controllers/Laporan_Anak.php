<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_Anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('wpu_helper');
        is_logged_in();

        $this->load->model('Laporan_model');
    }

    // MULAI MENAMPILKAN
    public function index()
    {
        $data['title'] = 'Laporan Anak | Posyandu Anak dan Lansia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['d_anak'] = $this->Laporan_model->getDataAnak();

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/daftar_data', $data);
        $this->load->view('templates/footer-datatables');
    }
    // SELESAI MENAMPILKAN

    function Cetak_Laporan()
    {
        $this->load->model('Laporan_model');
        $idanak = $this->input->post('id_anak');
        $tgllahir = $this->input->post('tgl_lahir');
        $filter = array();

        if ($idanak != '0')
            $filter['h.anak_id'] = $idanak;
            $filter['i.tgl_lahir'] = $tgllahir;


        $data['laporan'] = $this->Laporan_model->get($filter);

        if ($this->input->is_ajax_request())
            $this->load->view('laporan/daftar_data_table', $data);
        // die;
        else {
            // echo 'print';
            // $html = $this->load->view('laporan/daftar_data_table', $data, true);
            // $mpdf = new \Mpdf\Mpdf();
            // $mpdf->WriteHTML($html);
            // $mpdf->Output();

            // $header = $this->ModLaporan->LaporanHeader($id_penilaian);
            // $detail = $this->ModLaporan->LaporanDetail($id_penilaian);
            $idanak = $this->input->post('id_anak');
            $tgllahir = $this->input->post('tgl_lahir');
            $filter = array();

            $filter['h.anak_id'] = $idanak;
            $filter['i.tgl_lahir'] = $tgllahir;

            $dt = $this->Laporan_model->get($filter);
            $dtId = $this->Laporan_model->getId($filter);
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

            $html = "<h1 align='center' style='margin-bottom:1px'>Laporan Perkembangan Anak</h1>";

            $html = $html . "<p align='left'><b>Tanggal Cetak  : " . tanggal() . "</b></p>";

            //MUlai Data Anak
            $html = $html . "<h3>DATA ANAK</h3>";
            $html = $html . "<table>";
            foreach ($dtId as $i) {
                $html = $html . "<tr>";
                $html = $html . "<td style='width:150px'>Nama</td><td>:</td><td>" . $i->nama_anak . "</td>";
                $html = $html . "</tr>";
                $html = $html . "<tr>";
                $html = $html . "<td style='width:150px'>NIK</td><td>:</td><td>" . $i->nik_anak . "</td>";
                $html = $html . "</tr>";
                $html = $html . "<tr>";
                $html = $html . "<td style='width:150px'>No. KK</td><td>:</td><td>" . $i->kk_anak . "</td>";
                $html = $html . "</tr>";
                $html = $html . "<tr>";
                $html = $html . "<td style='width:150px'>Tanggal Lahir</td><td>:</td><td>" .  $i->tempat_lahir . ', '. date_format(date_create($i->tgl_lahir), "j F Y") . "</td>";
                $html = $html . "</tr>";
                $html = $html . "<tr>";
                $html = $html . "<td style='width:150px'>Jenis Kelamin</td><td>:</td><td>" . $i->jenis_kelamin . "</td>";
                $html = $html . "</tr>";
                $html = $html . "<tr>";
                $html = $html . "<td style='width:150px'>Nama Orang Tua</td><td>:</td><td>" . $i->nama_orang_tua . "</td>";
                $html = $html . "</tr>";

            }
            $html = $html . "</table>";
            //Selesai Data Anak

            $html = $html . "<br>";
            $html = $html . "<h3>REKAP DATA PENIMBANGAN ANAK</h3>";
            $html = $html . "<table border='1' cellspacing='0' cellpading='0' >";
            $html = $html . "<thead>";
            $html = $html . "<tr>";
            $html = $html . "<th>Tanggal</th>";
            $html = $html . "<th>Usia</th>";
            $html = $html . "<th>Berat Badan</th>";
            $html = $html . "<th>Tinggi Badan</th>";
            $html = $html . "<th>Lingkar Kepala</th>";
            $html = $html . "<th>Lingkar Lengan	</th>";
            $html = $html . "<th>Ket.</th>";
            $html = $html . "</tr>";
            $html = $html . "</thead>";
            $html = $html . "<tbody>";
            foreach ($dt as $rows) {
                $html = $html . "<tr>";
                $html = $html . "<td align='center'>" . date_format(date_create($rows->tgl_skrng), "j F Y") . "</td><td align='center'>" . $rows->usia . ' Tahun' . "</td><td align='center'>" . $rows->bb . ' kg' . "</td><td align='center'>" . $rows->tb . ' cm' . "</td><td align='center'>" . $rows->lingkar_kepala . ' cm' . "</td><td align='center'>" . $rows->lingkar_lengan . ' cm' . "</td><td align='center'>" . $rows->ket . "</td>" ;
                $html = $html . "</tr>";
            }
            $html = $html . "</tbody>";
            $html = $html . "</table>";
            $mpdf->WriteHTML($html);
            $mpdf->Output('Laporan Anak.pdf', 'I');
        }
    }
}
