<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tugas_model extends CI_Model {
	// Fungsi untuk menampilkan semua data siswa
	public function view(){
		return $this->db->get('tugas')->result();
	}

	public function viewe(){
		return $this->db->get('buku')->result();
	}
	
	// Fungsi untuk menampilkan data siswa berdasarkan NIS nya
	public function view_by($kd_tugas){
		$this->db->where('kd_tugas', $kd_tugas);
		return $this->db->get('tugas')->row();
	}

	public function view_x(){
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('makul', 'tugas.kd_makul=makul.kd_makul');
        //$this->db->join('kelas', 'jadwaluas.kd_kelas=kelas.kd_kelas');
        //$this->db->join('prodi', 'jadwaluas.kd_prodi=prodi.kd_prodi','left');
        //$this->db->join('mahasiswa', 'jadwaluas.mahasiswa_fkid=mahasiswa.mahasiswa_id');
        $query = $this->db->get();
        return $query->result();
    }

	public function view_y($kd_keterlambatan){
		$this->db->where('kd_keterlambatan', $kd_keterlambatan);
		return $this->db->get('keterlambatan')->row();
	}

	// Fungsi untuk validasi form tambah dan ubah
	public function validation($mode){
		$this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
		
		// Tambahkan if apakah $mode save atau update
		// Karena ketika update, NIS tidak harus divalidasi
		// Jadi NIS di validasi hanya ketika menambah data siswa saja
		if($mode == "save")
			$this->form_validation->set_rules('input_tgl_tugas', 'tgl_tugas', 'required');
			$this->form_validation->set_rules('input_tema', 'tema', 'required|max_length[50]');

			//$this->form_validation->set_rules('input_ketentuan', 'ketentuan', 'required|max_length[100]');
		
		
			
		if($this->form_validation->run()) // Jika validasi benar
			return TRUE; // Maka kembalikan hasilnya dengan TRUE
		else // Jika ada data yang tidak sesuai validasi
			return FALSE; // Maka kembalikan hasilnya dengan FALSE
	}
	
	// Fungsi untuk melakukan simpan data ke tabel siswa
	public function save(){
		$data = array(
			"kd_tugas" => $this->input->post('input_kd_tugas'),
			"kd_keterlambatan" => $this->input->post('input_kd_keterlambatan'),
			"user_id" => $this->input->post('input_user_id'),
			"kd_makul" => $this->input->post('input_kd_makul'),
			"tgl_keterlambatan" =>date('Y/m/d', strtotime($this->input->post('input_tgl_keterlambatan'))),
			"tgl_tugas" =>date('Y/m/d', strtotime($this->input->post('input_tgl_tugas'))),
			"tema" => $this->input->post('input_tema'),
			//"ketentuan" => $this->input->post('input_ketentuan'),
			//"status" => $this->input->post('input_status'),		
		);
		
		$this->db->insert('tugas', $data); // Untuk mengeksekusi perintah insert data
	}

	// Fungsi untuk melakukan ubah data keterlambatan berdasarkan kd_keterlambatan keterlambatan
	public function ganti($kd_tugas){
		$data = array(
			
			"kd_tugas" => $this->input->post('input_kd_tugas'),
			//"kd_keterlambatan" => $this->input->post('input_kd_keterlambatan'),
			//"user_id" => $this->input->post('input_user_id'),
			"kd_makul" => $this->input->post('input_kd_makul'),
			"tgl_keterlambatan" =>date('Y/m/d', strtotime($this->input->post('input_tgl_keterlambatan'))),
			"tgl_tugas" =>date('Y/m/d', strtotime($this->input->post('input_tgl_tugas'))),
			"tema" => $this->input->post('input_tema'),
			
		);
		
 		$this->db->where('kd_tugas', $kd_tugas);
		$this->db->update('tugas', $data); // Untuk mengeksekusi perintah update data
		
	}
	
		
	// Fungsi untuk melakukan menghapus data siswa berdasarkan NIS siswa
	public function delete($kd_tugas){
		$this->db->where('kd_tugas', $kd_tugas);
		$this->db->delete('tugas'); // Untuk mengeksekusi perintah delete data
	}

	public function getTable(){
        $this->db->select('*');
        $this->db->from('tugas');

        $this->db->join('makul', 'tugas.kd_makul=makul.kd_makul');
        $this->db->join('tbl_user', 'tugas.user_id=tbl_user.user_id');
        //$this->db->join('keterlambatan', 'tugas.kd_keterlambatan=keterlambatan.kd_keterlambatan');
        $this->db->join('buku', 'buku.kd_tugas=tugas.kd_tugas');
        $query = $this->db->get();
        return $query->result();
    }

    public function getTab(){
        $this->db->select('*');
        $this->db->from('tugas');

        $this->db->join('makul', 'tugas.kd_makul=makul.kd_makul','left');
        $this->db->join('tbl_user', 'tugas.user_id=tbl_user.user_id');
        $this->db->join('keterlambatan', 'tugas.kd_keterlambatan=keterlambatan.kd_keterlambatan','left');
        //$this->db->join('buku', 'buku.kd_tugas=tugas.kd_tugas');
        $query = $this->db->get();
        return $query->result();
    }


    public function editAcc($kd_tugas) {
        $this->db->select('status');
        $this->db->from('tugas');
        $this->db->where('kd_tugas',$kd_tugas);
        $row = $this->db->get()->row();
        $stat = '0';
        if ($row->status == '0') {
            $stat = '1';
        }
        $data = array(
            "status" => $stat
        );

        $this->db->where('kd_tugas', $kd_tugas);
        $this->db->update('tugas', $data); // Untuk mengeksekusi perintah update data
    }

    public function getTugas(){
    	$this->db->select('tugas.kd_tugas,makul.nama_makul,tbl_user.id_login,tugas.tema,tugas.status');
    	$this->db->from('tugas');
    	$this->db->join('makul', 'tugas.kd_makul=makul.kd_makul');
    	$this->db->join('tbl_user', 'tugas.user_id=tbl_user.user_id');
    	//$this->db->join('mahasiswa', 'tugas.nim=mahasiswa.nim');
    	$this->db->where('tbl_user.user_id', $this->session->userdata('user_id'));
    	//$this->db->where('tbl_user.user_id',$user_id); //where nim user data
    	$query = $this->db->get();
    	return $query->result();
    }

    // public function getTugas2(){
    // 	$this->db->select('makul.nama_makul');
    // 	$this->db->from('tugas');
    // 	$this->db->join('makul', 'tugas.kd_makul=makul.kd_makul');
    // 	$this->db->join('tbl_user', 'tugas.user_id=tbl_user.user_id');
    // 	//$this->db->join('mahasiswa', 'tugas.nim=mahasiswa.nim');
    // 	//$this->db->where('user_id', $this->session->userdata('user_id'));
    // 	//$this->db->where('tugas.user_id', $user_id); //where nim user data
    // 	$query = $this->db->get();
    // 	return $query->result();
    // }

    public function get_siswa(){
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$query->$this->db->get('tbl_user');
		return $query->result();
		//return $this->db->get('tugas')->row();
	}

    public function get_buku(){
		$this->db->where('id_buku', $id_buku);
		return $this->db->get('buku')->row();
	}

}