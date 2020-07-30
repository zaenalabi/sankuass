<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
        
        $this->load->model('Tugas_model');
        $this->load->model('Keterlambatan_model');
        $this->load->model('Buku_model');
        $this->load->model('Makul_model');
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
        $data['tugas'] = $this->Tugas_model->getTab();
        $data['buku'] = $this->Buku_model->view();
        $data['tbl_user'] = $this->Tbl_user_model->view();
        //$data['tugas'] = $this->Tugas_model->view();
        //$data['makul'] = $this->Makul_model->view();
        //$data['buku'] =$this->Tugas_model->get_siswa($id_buku=0);
        // echo print_r($data);  echo die();
        
        $this->template->load('admin/_layout/template', 'admin/tugas/tugas', $data);
    }

    public function create()
    {
        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Tugas_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Tugas_model->save(); // Panggil fungsi save() yang ada di SiswaModel.php
                redirect('admin/tugas/index');
            }
        }
        
        $this->template->load('admin/_layout/template', 'admin/Tugas/tambah_tugas');
    }

    public function edit($kd_tugas){
        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Tugas_model->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Tugas_model->ganti($kd_tugas); // Panggil fungsi edit() yang ada di SiswaModel.php
                redirect('admin/tugas/index');
            }
        }
        
        $data['tugas'] = $this->Tugas_model->view_by($kd_tugas);
        //echo print_r($data);  echo die();
        $this->template->load('admin/_layout/template','admin/tugas/ubah_tugas', $data);

    }

    public function edite($kd_keterlambatan){

        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Tugas_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Tugas_model->save(); // Panggil fungsi edit() yang ada di jadwaluasModel.php
                redirect('admin/Tugas/index');
            }
        }
        $data['tbl_user'] = $this->Tbl_user_model->view();
        $data['keterlambatan'] = $this->Tugas_model->view_y($kd_keterlambatan);
        //$data['keterlambatan'] = $this->Keterlambatan_model->telat();
        $this->template->load('admin/_layout/template','admin/tugas/buat_tugas', $data);

    }
    
    public function delete($kd_tugas){
        $this->Tugas_model->delete($kd_tugas); // Panggil fungsi delete() yang ada di SiswaModel.php
        redirect('admin/tugas/index');
    }

    

    public function tugas_m()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Tugas | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['tugas'] = $this->Tugas_model->getTable();
        //$data['buku'] = $this->Buku_model->view();
        //$data['tbl_user'] = $this->Tbl_user_model->view();
        //$data['tugas'] = $this->Tugas_model->editAcc();

        //echo print_r($data);  echo die();
        $this->template->load('admin/_layout/template', 'admin/tugas/tugas_acc', $data);
    }



    public function editAcc($kd_tugas){
        $this->Tugas_model->editAcc($kd_tugas); // Panggil fungsi edit() yang ada di jadwaluasModel.php
        redirect('admin/Tugas/tugas_m');
    }

    
}
