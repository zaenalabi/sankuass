<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }

       $this->load->model('Tentang_model');
    }

    public function index()
    {   
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Tentang | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );        
        
        $data['tentang'] = $this->Tentang_model->view();

        $this->template->load('admin/_layout/template', 'admin/tentang/tentang', $data);
    }

    public function edit($id){
           if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Tentang_model->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Tentang_model->ganti($id); // Panggil fungsi edit() yang ada di jadwaluasModel.php
                redirect('admin/Tentang/index');
            }
        }
        
        $data['tentang'] = $this->Tentang_model->view_by($id);
        
        $this->template->load('admin/_layout/template','admin/tentang/ubah_tentang', $data);

    }
}    