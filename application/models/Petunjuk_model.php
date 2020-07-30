<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Petunjuk_model extends CI_Model {
	// Fungsi untuk menampilkan semua data siswa
	public function view(){
		return $this->db->get('petunjuk')->result();
	}
	
	// Fungsi untuk menampilkan data siswa berdasarkan NIS nya
	public function view_by($id){
		$this->db->where('id', $id);
		return $this->db->get('petunjuk')->row();
	}
	
	// Fungsi untuk validasi form tambah dan ubah
	public function validation($mode){
		$this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
		
		// Tambahkan if apakah $mode save atau update
		// Karena ketika update, NIS tidak harus divalidasi
		// Jadi NIS di validasi hanya ketika menambah data siswa saja
		if($mode == "save")
			//$this->form_validation->set_rules('input_id', 'id', 'required|max_length[50]');
			$this->form_validation->set_rules('input_judul', 'judul', 'required|max_length[50]');
			$this->form_validation->set_rules('input_konten', 'konten', 'required|max_length[1000]');
		
		
			
		if($this->form_validation->run()) // Jika validasi benar
			return TRUE; // Maka kembalikan hasilnya dengan TRUE
		else // Jika ada data yang tidak sesuai validasi
			return FALSE; // Maka kembalikan hasilnya dengan FALSE
	}
	
	
	// Fungsi untuk melakukan ubah data siswa berdasarkan NIS siswa
	public function ganti($id){
		$data = array(
			"judul" => $this->input->post('input_judul'),
			"konten" => $this->input->post('input_konten'),
		);
		
		$this->db->where('id', $id);
		$this->db->update('petunjuk', $data); // Untuk mengeksekusi perintah update data
	}
	
	
}