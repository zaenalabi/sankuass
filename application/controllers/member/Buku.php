<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
       
        $this->load->model('Buku_model');
        $this->load->model('Tugas_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Keterlambatan_model');
    }

    public function index()
    {   
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Buku | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );  

        $data['buku'] = $this->Buku_model->view();
        
        $this->template->load('member/_layout/template', 'member/Buku/buku', $data);
    }

    

    public function create($kd_tugas)
    {   
        //echo $this->input->post('submit');die();
        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Buku_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Buku_model->save(); // Panggil fungsi save() yang ada di SiswaModel.php
                redirect('member/buku');
            }
        }
        //$data['tugas']= $this->Buku_model->view_y($kd_tugas);
        $data['buku'] = $this->Buku_model->getTable();

        //$this->template->load('member/_layout/template', 'member/keterlambatan/tambah_keterlambatan', $data);
        $this->template->load('member/_layout/template', 'member/buku/tambah_buku', $data);
    }

    public function edit($kd_tugas){
   
        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Buku_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE

                $this->Buku_model->save(); // Panggil fungsi edit() yang ada di jadwaluasModel.php
                redirect('member/Home/index');
            }
        }
        

        $data['mahasiswa'] = $this->Keterlambatan_model->get_siswa();
        $data['tugas'] = $this->Tugas_model->view_by($kd_tugas);
        


       // echo print_r($data);  echo die();
        $this->template->load('member/_layout/template','member/buku/tambah_buku', $data);

    }

     // function upload(){
     //    if ($this->form_validation->run() == TRUE) {
     //            // echo "<script>alert('ok');</script>";

     //            $config['upload_path'] = './assets/upload/';
     //            $config['allowed_types'] = 'pdf|doc';
     //            $config['max_size'] = '2048';
     //            $config['file_name'] = 'doc' . time();

     //            //$this->load->library('upload', $config);

     //            if ($this->upload->do_upload('foto')) {
     //                $gbr = $this->upload->data();

     //                // proses insert
     //                $items = array(
     //                    'nama_item' => $this->input->post('nama', TRUE),
     //                    'harga' => $this->input->post('harga', TRUE),
     //                    'berat' => $this->input->post('berat', TRUE),
     //                    'status' => $this->input->post('status', TRUE),
     //                    'gambar' => $gbr['file_name'],
     //                    'deskripsi' => $this->input->post('desk', TRUE)
     //                );

     //                // $this->app_admin->insert('t_items', $items);
     //                // $this->admin->insert('t_items', $items);
     //                $id_item = $this->admin_model->insert_last('t_items', $items);

     //                $this->kategori($id_item, $this->input->post('kategori', TRUE));

     //                // BEGIN: MY EDIT
     //                redirect('item');
     //                // END: MY EDIT
     //            } else {
     //                $this->session->set_flashdata('alert', 'Anda belum memilih foto!');
     //            }
     // } 
    
}
