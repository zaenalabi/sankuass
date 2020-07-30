<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keterlambatan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }

        $this->load->model('Keterlambatan_model');
        $this->load->model('PengawasUas_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Tbl_user_model');
        $this->load->model('Makul_model');
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Keterlambatan | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        //$this->session->userdata('user_id');
        $data['keterlambatan'] = $this->Keterlambatan_model->view_x();
        $data['tbl_user'] = $this->Tbl_user_model->view();

        $this->template->load('admin/_layout/template', 'admin/keterlambatan/keterlambatan', $data);
    }

    public function create(){
        // echo $this->input->post('submit');die();
        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Keterlambatan_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                     $this->Keterlambatan_model->saves(); // Panggil fungsi save() yang ada di jadwaluasModel.php
                redirect('admin/Keterlambatan/index');
            }
        }
        $data["Makul_model"] = $this->Makul_model->view();
        $data["Tbl_user_model"] = $this->Tbl_user_model->view();
        //$data['pengawasUas'] = $this->PengawasUas_model->view();
        $this->template->load('admin/_layout/template', 'admin/keterlambatan/tambah_keterlambatan', $data);
    }

    public function edit($kd_keterlambatan){

        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Keterlambatan_model->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Keterlambatan_model->ganti($kd_keterlambatan); // Panggil fungsi edit() yang ada di jadwaluasModel.php
                redirect('admin/Keterlambatan/index');
            }
        }
        $data["Makul_model"] = $this->Makul_model->view();
        $data["Tbl_user_model"] = $this->Tbl_user_model->view();
        $data['keterlambatan'] = $this->Keterlambatan_model->view_by($kd_keterlambatan);
     
		//$data['tbl_user'] = $this->Keterlambatan_model->get_siswa2();
        $this->template->load('admin/_layout/template','admin/keterlambatan/ubah_keterlambatan', $data);

    }

    public function delete($nis){
        $this->Keterlambatan_model->delete($nis); // Panggil fungsi delete() yang ada di jadwaluasModel.php
        redirect('admin/keterlambatan/index');
    }

    public function editAcc($kd_keterlambatan){
        $this->Keterlambatan_model->editAcc($kd_keterlambatan); // Panggil fungsi edit() yang ada di jadwaluasModel.php
        redirect('admin/keterlambatan/index');
    }
}
