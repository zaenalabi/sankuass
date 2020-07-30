<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Petunjuk extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }

       $this->load->model('Petunjuk_model');
    }

    public function index()
    {   
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Petunjuk | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );        
        
        $data['petunjuk'] = $this->Petunjuk_model-> view();

        $this->template->load('admin/_layout/template', 'admin/petunjuk/petunjuk', $data);
    }

    public function edit($id){
           if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Petunjuk_model->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Petunjuk_model->ganti($id); // Panggil fungsi edit() yang ada di jadwaluasModel.php
                redirect('admin/Petunjuk/index');
            }
        }
        
        $data['petunjuk'] = $this->Petunjuk_model->view_by($id);
        
        $this->template->load('admin/_layout/template','admin/petunjuk/ubah_petunjuk', $data);

    }
}    