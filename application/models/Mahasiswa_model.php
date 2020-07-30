<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {
	// Fungsi untuk menampilkan semua data keterlambatan
	public function view(){
		return $this->db->get('mahasiswa')->result();
	}
}