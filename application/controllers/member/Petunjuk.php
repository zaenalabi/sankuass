<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Petunjuk extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
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
         $data['petunjuk'] = $this->Petunjuk_model->view();
        
        $this->template->load('member/_layout/template', 'member/petunjuk/petunjuk', $data);
    }

   
}    