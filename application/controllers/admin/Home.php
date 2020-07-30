<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }

        $this->load->model('Home_model');
        $this->load->model('Makul_model');
        $this->load->model('Prodi_model');
        $this->load->model('Mahasiswa_model');
    }

    public function index()
    {   
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Home | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );        
        $data['jadwaluas'] = $this->Home_model->view_x();
        //$testanggal = $value->tgl_keterlambatan;
        $this->template->load('admin/_layout/template', 'admin/home/dashboard', $data);
    }

    public function create()
    {

        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Home_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
            //if(true){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Home_model->save(); // Panggil fungsi save() yang ada di jadwaluasModel.php
                redirect('admin/home/index');
            }
        }
        //$this->Home_model->ubahTanggal($tgl_keterlambatan);
        $data["Prodi_model"] = $this->Prodi_model->view();
        $data["Makul_model"] = $this->Makul_model->view();
        //echo $this->input->post('submit');die();
        $this->template->load('admin/_layout/template', 'admin/home/tambah_jadwal', $data);
    }
        

    public function edit($kd_jadwal){
   
        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Home_model->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Home_model->mlebu($kd_jadwal); // Panggil fungsi edit() yang ada di jadwaluasModel.php
                redirect('admin/Home/index');
            }
        }
        $data["Prodi_model"] = $this->Prodi_model->view();
        $data["Makul_model"] = $this->Makul_model->view();
        $data['jadwaluas'] = $this->Home_model->view_by($kd_jadwal);
        
        $this->template->load('admin/_layout/template','admin/home/ubah_jadwal', $data);

    }
    
    public function delete($kd_jadwal){
        $this->Home_model->delete($kd_jadwal); // Panggil fungsi delete() yang ada di jadwaluasModel.php
        redirect('admin/home/index');
    }
}
