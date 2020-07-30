<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
        $this->load->helper(array('url', 'download'));
        //$this->load->helper('download');
        $this->load->model('Buku_model');
        // $this->load->model('Tugas_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Keterlambatan_model');
        $this->load->library('pdf');
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title' => 'Buku | ' . $site['nama_website'],
            'favicon' => $site['favicon'],
            'site' => $site,
        );

        $data['buku'] = $this->Buku_model->view();


        $this->template->load('admin/_layout/template', 'admin/buku/buku', $data);
    }

    public function create($kd_tugas)
    {
        //echo $this->input->post('submit');die();
        if ($this->input->post('submit')) { // Jika user mengklik tombol submit yang ada di form
            if ($this->Buku_model->validation("save")) { // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Buku_model->save(); // Panggil fungsi save() yang ada di SiswaModel.php
                redirect('member/buku');
            }
        }
        //$data['tugas']= $this->Buku_model->view_y($kd_tugas);
        $data['buku'] = $this->Buku_model->getTable();

        //$this->template->load('member/_layout/template', 'member/keterlambatan/tambah_keterlambatan', $data);
        $this->template->load('member/_layout/template', 'member/buku/tambah_buku', $data);
    }

    public function edit($kd_tugas)
    {

        if ($this->input->post('submit')) { // Jika user mengklik tombol submit yang ada di form
            if ($this->Buku_model->validation("save")) { // Jika validasi sukses atau hasil validasi adalah TRUE

                $this->Buku_model->save(); // Panggil fungsi edit() yang ada di jadwaluasModel.php
                redirect('member/Home/index');
            }
        }


        $data['mahasiswa'] = $this->Keterlambatan_model->get_siswa();
        $data['tugas'] = $this->Tugas_model->view_by($kd_tugas);


        // echo print_r($data);  echo die();
        $this->template->load('member/_layout/template', 'member/buku/tambah_buku', $data);

    }

    public function download($id_buku)
    {
        $this->load->helper('download');
        $filename = $this->Buku_model->view_by($id_buku);
        $file = './assets/upload/tugas/' . $filename->review;
        if (file_exists($file)) {
            $download = force_download($file, NULL);
        } else {
            echo "File 404";
            echo '<script language="javascript">' .
                'setTimeout(function(){ window.location.href = "../"; }, 3000);' .
                '</script>';
        }
    }

    public function cetak(){
        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'E-SANKUAS FASTIKOM UNSIQ',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'Daftar tugas yang mengikuti sanksi keterlambatan UAS',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'id buku',1,0);
        $pdf->Cell(55,6,'judul buku',1,0);
        $pdf->Cell(60,6,'review',1,1);
        
        $pdf->SetFont('Arial','',10);
        $buku = $this->db->get('buku')->result();
        foreach ($buku as $row){
            $pdf->Cell(20,6,$row->id_buku,1,0);
            $pdf->Cell(55,6,$row->judul,1,0);
            $pdf->Cell(60,6,$row->review,1,1);
             
        }
        $pdf->Output();
    }

    public function delete($id_buku){
        $this->Buku_model->delete($id_buku); // Panggil fungsi delete() yang ada di SiswaModel.php
        redirect('admin/buku/index');
    }
}