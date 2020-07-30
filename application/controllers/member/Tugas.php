<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
        $this->load->model('Mahasiswa_model');       
        $this->load->model('Buku_model');
        $this->load->model('Tugas_model');
        $this->load->model('Makul_model');
        $this->load->model('Keterlambatan_model');
        $this->load->model('Tbl_user_model');
    }

    public function index()
    {   
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Tugas | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );        
        $data['tugas'] = $this->Tugas_model->getTugas();
        //$data['tugas'] = $this->Tugas_model->getTugas2();
        $data['tbl_user'] = $this->Tbl_user_model->view();
        //$data['tbl_user'] = $this->Tugas_model->get_siswa();
        
        $this->template->load('member/_layout/template', 'member/tugas/tugas', $data);
    }

    

    public function create()
    {
        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Buku_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Buku_model->save(); // Panggil fungsi save() yang ada di SiswaModel.php
                redirect('member/Home/index');
            }
        }
        
        $this->template->load('member/_layout/template', 'member/Tugas/tambah_tugas');
    }
    
    public function edit($kd_tugas){
   
        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Buku_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Buku_model->save(); // Panggil fungsi edit() yang ada di jadwaluasModel.php
                redirect('member/Home/index');
            }
        }
        
        $data['tugas'] = $this->Tugas_model->view_by($kd_tugas);
        
        $this->template->load('member/_layout/template','member/buku/tambah_buku', $data);

    }
}
