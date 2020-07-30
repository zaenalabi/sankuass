<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keterlambatan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
        $this->load->model('Jadwaluas_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Tugas_model');
        $this->load->model('Makul_model');
        $this->load->model('Home_model');
        $this->load->model('Keterlambatan_model');
        $this->load->model('Tbl_user_model');
        
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Keterlambatan | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['keterlambatan'] = $this->Keterlambatan_model->telat();

        $this->template->load('member/_layout/template', 'member/keterlambatan/keterlambatan', $data);
    }

    public function create()
    {
        // echo $this->input->post('submit');die();
        if ($this->input->post('submit')) { // Jika user mengklik tombol submit yang ada di form
            if ($this->Keterlambatan_model->validation("save")) { // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Keterlambatan_model->save(); // Panggil fungsi save() yang ada di jadwaluasModel.php
                redirect('member/home/index');
            }
        }
        //$data['jadwaluas'] = $this->Home_model->view();
        $data['keterlambatan'] = $this->Keterlambatan_model->telat();
        $this->template->load('member/_layout/template', 'member/keterlambatan/tambah_keterlambatan', $data);
    }

    public function edit($kd_jadwal){

        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Keterlambatan_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Keterlambatan_model->save(); // Panggil fungsi edit() yang ada di jadwaluasModel.php
                redirect('member/Home/index');
            }
        }
        //$data['jadwaluas'] = $this->Keterlambatan_model->getTable($kd_jadwal);
        $data['jadwaluas'] = $this->Jadwaluas_model->view();
        $data['jadwaluas'] = $this->Keterlambatan_model->view_y($kd_jadwal);
        $data['tbl_user'] = $this->Keterlambatan_model->get_siswa();
        //$data['makul']     = $this->Keterlambatan_model->get_makul($kd_makul);
        // print_r($this->session->userdata());die();
        //$data['makul'] = $this->Keterlambatan_model->view_z();
        //$data['keterlambatan'] = $this->Keterlambatan_model->telat();
        $this->template->load('member/_layout/template','member/keterlambatan/ubah_keterlambatan', $data);

    }

}
