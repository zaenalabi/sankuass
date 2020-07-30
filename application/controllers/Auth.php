<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Auth_model');
        $this->load->model('Tbl_role_model');
        $this->load->model('Mahasiswa_model');
    }

    public function check_account()
    {
        //validasi login
        $id_login = $this->input->post('id_login');
        $password = $this->input->post('password');

        //ambil data dari database untuk validasi login
        $query = $this->Auth_model->check_account($id_login, $password);
        if ($query === 1) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>id_login yang Anda masukkan tidak terdaftar.</div>
        			</div>
        			</p>
            ');
        } elseif ($query === 2) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box alert-info">
              <div class="info-box-icon">
              <i class="fa fa-info-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">GAGAL</b><br>Akun yang Anda masukkan tidak aktif, silakan hubungi Administrator.</div>
              </div>
              </p>'
            );
        } elseif ($query === 3) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Password yang Anda masukkan salah.</div>
        			</div>
        			</p>
              ');
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
                'is_login' => true,
                'user_id' => $query->user_id,
                'password' => $query->password,
                'id_role' => $query->id_role,
                'id_login' => $query->id_login,
                'first_name' => $query->first_name,
                'last_name' => $query->last_name,
                'email' => $query->email,
                'phone' => $query->phone,
                'photo' => $query->photo,
                'created_on' => $query->created_on,
                'last_login' => $query->last_login
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }

    public function login()
    {

        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title' => 'Login | ' . $site['nama_website'],
            'favicon' => $site['favicon'],
            'site' => $site
        );
        //melakukan pengalihan halaman sesuai dengan levelnya
        if ($this->session->userdata('id_role') == "1") {
            redirect('admin/home');
        }
        if ($this->session->userdata('id_role') == "2") {
            redirect('member/home');
        }
        if ($this->session->userdata('id_role') == "3") {
            redirect('admin/home');
        }
        if ($this->session->userdata('id_role') == "4") {
            redirect('admin/keterlambatan/keterlambatan');
        }

        //proses login dan validasi nya
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('id_login', 'id_login', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');
            $error = $this->check_account();

            if ($this->form_validation->run() && $error === true) {
                $data = $this->Auth_model->check_account($this->input->post('id_login'), $this->input->post('password'));

                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
                if ($data->id_role == '1') {
                    redirect('admin/home', 'refresh');
                } elseif ($data->id_role == '2') {
                    redirect('member/home', 'refresh');
                }
            } else {
                $this->template->load('authentication/layout/template', 'authentication/login', $data);
            }
        } else {
            $this->template->load('authentication/layout/template', 'authentication/login', $data);
        }
    }

    public function profile()
    {
        $data = konfigurasi('Profile');
        $data['get_all_userdata'] = $this->Auth_model->get_by_id($this->session->userdata('user_id'));
        //print_r($data['get_all_userdata']->id); die();
        $this->template->load('admin/_layout/template', 'authentication/profile', $data);
    }

    public function updateProfile()
    {
        $this->form_validation->set_rules('id_login', 'id_login', 'trim|required|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('first_name', 'Nama Depan', 'trim|required|min_length[2]|max_length[15]');
        $this->form_validation->set_rules('last_name', 'Nama Belakang', 'trim|required|min_length[2]|max_length[15]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[8]|max_length[50]');
        $this->form_validation->set_rules('phone', 'Telp', 'trim|required|min_length[11]|max_length[12]');

        $id = $this->session->userdata('id');
        $data = array(
            'id_login' => $this->input->post('id_login'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
        );
        // print_r($data);die();
        if ($this->form_validation->run() == true) {
            if (!empty($_FILES['photo']['name'])) {
                $upload = $this->_do_upload();

                //delete file
                $user = $this->Auth_model->get_by_id($this->session->userdata('user_id'));
                if (file_exists('assets/upload/images/foto_profil/' . $user->photo) && $user->photo) {
                    unlink('assets/upload/images/foto_profil/' . $user->photo);
                }

                $data['photo'] = $upload;
            }
            $result = $this->Auth_model->update($data, $id);
            // echo $this->db->last_query();die();
            if ($result === true) {
                // $this->updateProfil();
                $this->session->set_flashdata('msg', 'Data Profile Berhasil diubah');
                redirect('auth/profile');
            } else {
                $this->session->set_flashdata('msg', 'Data Profile Gagal diubah');
                redirect('auth/profile');
            }
        } else {
            $this->session->set_flashdata('msg', validation_errors());
            redirect('auth/profile');
        }
    }

    public function updatePassword()
    {
        $this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required|min_length[5]|max_length[25]');

        $id = $this->session->userdata('id');
        if ($this->form_validation->run() == true) {
            if (password_verify($this->input->post('passLama'), $this->session->userdata('password'))) {
                if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
                    $this->session->set_flashdata('msg', show_err_msg('Password Baru dan Konfirmasi Password harus sama'));
                    redirect('auth/profile');
                } else {
                    $data = ['password' => get_hash($this->input->post('passBaru'))];
                    $result = $this->Auth_model->update($data, $id);
                    if ($result > 0) {
                        $this->updateProfil();
                        $this->session->set_flashdata('msg', show_succ_msg('Password Berhasil diubah'));
                        redirect('auth/profile');
                    } else {
                        $this->session->set_flashdata('msg', show_err_msg('Password Gagal diubah'));
                        redirect('auth/profile');
                    }
                }
            } else {
                $this->session->set_flashdata('msg', show_err_msg('Password Salah'));
                redirect('auth/profile');
            }
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/profile');
        }
    }

    private function _do_upload()
    {
        $config['upload_path'] = 'assets/upload/images/foto_profil/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100; //set max size allowed in Kilobyte
        $config['max_width'] = 1000; // set max width image allowed
        $config['max_height'] = 1000; // set max height allowed
        $config['file_name'] = round(microtime(true) * 1000);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('auth/profile');
        }
        return $this->upload->data('file_name');
    }

    public function register()
    {

        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title' => 'Register | ' . $site['nama_website'],
            'favicon' => $site['favicon'],
            'site' => $site,
        );
        $data["Mahasiswa_model"]= $this->Mahasiswa_model->view();
        $data["Tbl_role_model"] = $this->Tbl_role_model->view();
        $this->template->load('authentication/layout/template', 'authentication/register', $data);
    }

    public function check_register()
    {
        $data = konfigurasi('Register');
        $this->form_validation->set_rules('id_login', 'id_login', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('first_name', 'first_name', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('last_name', 'last_name', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('id_login', 'id_login', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[20]');
        if ($this->form_validation->run() == false) {
            $this->register();
        } else {
            $this->Auth_model->reg();
            redirect('auth/login', 'refresh', $data);
        }
    }


    public function logout()
    {
        date_default_timezone_set("ASIA/JAKARTA");
        $date = array('last_login' => date('Y-m-d H:i:s'));
        $id = $this->session->userdata('user_id');
        $this->Auth_model->logout($date, $id);
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    // reset password
    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Halaman Reset Password | Tutorial reset password CodeIgniter @ https://recodeku.blogspot.com';
            $this->load->view('authentication/forgot_password', $data);
        } else {
            $email = $this->input->post('email');
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->Auth_model->getUserInfoByEmail($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('sukses', 'email address salah, silakan coba lagi.');
                redirect('auth/login');
            }

            //build token

            $token = $this->Auth_model->insertToken($userInfo->user_id);
            $qstring = $this->base64url_encode($token);
            $url = site_url() . '/Auth/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>';

            $message = '';
            $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
                 password anda.</strong><br>';
            $message .= '<strong>Silakan klik link ini:</strong> ' . $link;

            echo $message; //send this through mail
            exit;

        }

    }

    public function reset_password()
    {
        $token = $this->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->Auth_model->isTokenValid($cleanToken); //either false or array();

        if (!$user_info) {
            $this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');
            redirect('auth/login');
        }

        $data = array(
            'title' => 'Halaman Reset Password | Tutorial reset password CodeIgniter @ https://recodeku.blogspot.com',
            'nama' => $user_info->id_login,
            'email' => $user_info->email,
            'token' => $this->base64url_encode($token)
        );

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('authentication/reset_password', $data);
        } else {

            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $hashed = md5($cleanPost['password']);
            $cleanPost['password'] = $hashed;
            $cleanPost['user_id'] = $user_info->user_id;
            unset($cleanPost['passconf']);
            if (!$this->Auth_model->updatePassword($cleanPost)) {
                $this->session->set_flashdata('sukses', 'Update password gagal.');
            } else {
                $this->session->set_flashdata('sukses', 'Password anda sudah  
             diperbaharui. Silakan login.');
            }
            redirect('auth/login');
        }
    }

    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}