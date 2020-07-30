<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public $table = 'tbl_user';
    public $id = 'tbl_user.user_id';

    public function __construct()
    {
        parent::__construct();
    }

    public function login($id_login, $password)
    {
        $query = $this->db->get_where('tbl_user', array('id_login' => $id_login, 'password' => $password));
        return $query->row_array();
    }

    public function check_account($id_login)
    {
        //cari id_login lalu lakukan validasi
        $this->db->where('id_login', $id_login);
        $query = $this->db->get($this->table)->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }
        //jika bernilai 2 maka user tidak aktif
        if ($query->active == 0) {
            return 2;
        }
        //jika bernilai 3 maka password salah
        if (!hash_verified($this->input->post('password'), $query->password)) {
            return 3;
        }

        return $query;
    }

    public function update($data, $id)
    {
        //echo ('sukses'); die();
        $this->db->where('user_id', $id);
        $this->db->update('tbl_user', $data);
        return true;
    }

    public function get_by_id($id)
    {
        $this->db->select('
            tbl_user.*, tbl_role.id AS id_role, tbl_role.name, tbl_role.description');
        $this->db->join('tbl_role', 'tbl_user.id_role = tbl_role.id');
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function logout($date, $id)
    {
        $this->db->where('tbl_user.user_id', $id);
        $this->db->update('tbl_user', $date);
    }

    public function reg()
    {
        date_default_timezone_set('ASIA/JAKARTA');
        $data = array(
            'id_login' => $this->input->post('id_login'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'id_role' => $this->input->post('input_kd_pengawasUas'),
            'created_on' => date('Y-m-d H:i:s'),
            'password' => get_hash($this->input->post('password'))
        );
        return $this->db->insert('tbl_user', $data);
    }

    // lupa password
    public function getUserInfo($id)
    {
        $q = $this->db->get_where('tbl_user', array('user_id' => $id), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $id . ')');
            return false;
        }
    }

    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('tbl_user', array('email' => $email), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    public function insertToken($user_id)
    {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
            'token' => $token,
            'user_id' => $user_id,
            'created' => $date
        );
        $query = $this->db->insert_string('tokens', $string);
        $this->db->query($query);
        return $token . $user_id;

    }

    public function isTokenValid($token)
    {
        $tkn = substr($token, 0, 30);
        $uid = substr($token, 30);

        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn,
            'tokens.user_id' => $uid), 1);

        if ($this->db->affected_rows() > 0) {
            $row = $q->row();

            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

            if ($createdTS != $todayTS) {
                return false;
            }

            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;

        } else {
            return false;
        }

    }

    public function updatePassword($post)
    {
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('tbl_user', array('password' => $post['password']));
        return true;
    }
    //End: method tambahan untuk reset code

}
