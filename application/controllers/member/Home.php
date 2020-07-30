<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
        $this->load->library('session');
        $this->load->model('Home_model');
        $this->load->model('Keterlambatan_model');
        $this->load->model('Tbl_user_model');
    }

    public function index(){
        
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title' => 'Dashboard | ' . $site['nama_website'],
            'favicon' => $site['favicon'],
            'site' => $site
        );
        $this->session->userdata('user_id');
        $data['jadwaluas']     = $this->Home_model->view_x();
        $data['keterlambatan'] = $this->Keterlambatan_model->getTableByUser()->row();
       

        $this->template->load('member/_layout/template', 'member/home/dashboard', $data);
    }

    // public function editAcc($kd_keterlambatan){
    //     $this->Keterlambatan_model->editAcc($kd_keterlambatan); // Panggil fungsi edit() yang ada di jadwaluasModel.php
    //     redirect('admin/keterlambatan/index');
    // }

    public function edit($kd_jadwal){
   
        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Keterlambatan_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Keterlambatan_model->save(); // Panggil fungsi edit() yang ada di jadwaluasModel.php
                redirect('member/Home/index');
            }
        }
        
        $data['jadwaluas'] = $this->Home_model->view_by($kd_jadwal);
        
        $this->template->load('member/_layout/template','member/keterlambatan/ubah_keterlambatan', $data);

    }

    
}
