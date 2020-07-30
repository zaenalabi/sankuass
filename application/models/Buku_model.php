<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

	public function view(){
		return $this->db->get('buku')->result();
	} 


	public function view_by($id_buku){
		$this->db->where('id_buku', $id_buku);
		return $this->db->get('buku')->row();
	}

	public function view_y($kd_tugas){
		$this->db->where('kd_tugas', $kd_tugas);
		return $this->db->get('tugas')->row();
	}
	
	// Fungsi untuk validasi form tambah dan ubah
	public function validation($mode){
		$this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
		
		// Tambahkan if apakah $mode save atau update
		// Karena ketika update, NIS tidak harus divalidasi
		// Jadi NIS di validasi hanya ketika menambah data jadwaluas saja
		if($mode == "save")
			
			$this->form_validation->set_rules('input_kd_tugas', 'kd_tugas', 'required|max_length[50]');

			$this->form_validation->set_rules('input_judul', 'judul', 'required|max_length[50]');
			// $this->form_validation->set_rules('input_review', 'review', 'required|max_length[50]');
			
			
		if($this->form_validation->run()) // Jika validasi benar
			return TRUE; // Maka kembalikan hasilnya dengan TRUE
		else // Jika ada data yang tidak sesuai validasi
			return FALSE; // Maka kembalikan hasilnya dengan FALSE
	}
	
	// Fungsi untuk melakukan simpan data ke tabel jadwaluas
	public function save(){
		$config['upload_path'] = './assets/upload/tugas';
        $config['allowed_types'] = 'pdf|doc';
        $config['max_size'] = '2048';
        $config['file_name'] = '';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('doc')) {
            $doc = $this->upload->data();

			$data = array(
				"id_buku" => $this->input->post('input_id_buku'),
				
				"kd_tugas" => $this->input->post('input_kd_tugas'),
				
				"judul" => $this->input->post('input_judul'),
				"review" => $doc['file_name']
				
				

			);
			
			$this->db->insert('buku', $data); // Untuk mengeksekusi perintah insert data
		}
	}

	public function get_siswa(){
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->get('mahasiswa')->row();
	}

	public function ganti($kd_tugas){
		$data = array(
			"kd_tugas" => $this->input->post('input_kd_tugas'),
			"tema" => $this->input->post('input_tema'),
			//"ketentuan" => $this->input->post('input_ketentuan'),
			"status" => $this->input->post('input_status'),	
		);
		
		$this->db->where('kd_tugas', $kd_tugas);
		$this->db->update('tugas', $data); // Untuk mengeksekusi perintah update data
	}

	public function getTable(){
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('tugas', 'tugas.kd_tugas=buku.kd_tugas','left');
        //$this->db->join('mahasiswa', 'buku.nim=mahasiswa.nim');
        $query = $this->db->get();
        return $query->result();
    }

    // public function download($id_buku){
    //  	$this->db->select('*');
    //     $this->db->from('buku');
    //     //$this->db->join('tugas', 'tugas.kd_tugas=buku.kd_tugas','left');
    // 	$this->db->where('id_buku', $id_buku);
    // 	$query = $this->db->get();
    //     return $query;
    //  }

    public function get_file_byid($id_buku){
		$hsl=$this->db->query("SELECT id_buku,kd_tugas,judul,review 
			FROM buku WHERE id_buku");
		return $hsl;
	}

	public function download($id_buku){
		$data = array(
            "id_buku" => $this->input->post('input_id_buku')
            
        );

		$query = $this->db->get_where('buku',array('id_buku', $id_buku));
		return $query->row_array();		
	}

	public function delete($id_buku){
		$this->db->where('id_buku', $id_buku);
		$this->db->delete('buku'); // Untuk mengeksekusi perintah delete data
	}
  	
}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */