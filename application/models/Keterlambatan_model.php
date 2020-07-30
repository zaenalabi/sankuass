<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keterlambatan_model extends CI_Model {
	// Fungsi untuk menampilkan semua data keterlambatan
	public function view(){
		return $this->db->get('keterlambatan')->result();
	}
	
	// Fungsi untuk menampilkan data keterlambatan berdasarkan kd_keterlambatan nya
	public function view_by($kd_keterlambatan){
		$this->db->where('kd_keterlambatan', $kd_keterlambatan);
		return $this->db->get('keterlambatan')->row();
	}

	public function views(){
        $this->db->select('*');
        $this->db->from('keterlambatan');
    

        $this->db->join('tbl_user', 'keterlambatan.user_id=tbl_user.user_id');
       
        $query = $this->db->get();
        return $query->result();
    }

	public function view_x(){
        $this->db->select('*');
        $this->db->from('keterlambatan');
        $this->db->join('makul', 'keterlambatan.kd_makul=makul.kd_makul');

        $this->db->join('tbl_user', 'keterlambatan.user_id=tbl_user.user_id');
        //$this->db->join('kelas', 'jadwaluas.kd_kelas=kelas.kd_kelas');
        //$this->db->join('prodi', 'jadwaluas.kd_prodi=prodi.kd_prodi','left');
        //$this->db->join('mahasiswa', 'jadwaluas.mahasiswa_fkid=mahasiswa.mahasiswa_id');
        $query = $this->db->get();
        return $query->result();
    }
	
	public function view_y($kd_jadwal){
		$this->db->where('kd_jadwal', $kd_jadwal);
		return $this->db->get('jadwaluas')->row();
	}	

	public function get_siswa(){
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->get('tbl_user')->row();
	}

	public function get_siswa2(){
		$this->db->where('user_id',$user_id);
		return $this->db->get('tbl_user')->row();
	}

	public function get_makul(){
		$this->db->where('kd_makul', $kd_makul);
		return $this->db->get('makul')->row();
	}

	public function view_z(){
		
		return $this->db->get('makul')->result();
	}	
	
	// Fungsi untuk validasi form tambah dan ubah
	public function validation($mode){
		$this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
		
		
		if($mode == "save")
			
			$this->form_validation->set_rules('input_nim', 'required|numeric|max_length[15]');
			$this->form_validation->set_rules('input_keterangan', 'keterangan', 'required|max_length[100]');
			
		
		
		
			
		if($this->form_validation->run()) // Jika validasi benar
			return TRUE; // Maka kembalikan hasilnya dengan TRUE
		else // Jika ada data yang tidak sesuai validasi
			return FALSE; // Maka kembalikan hasilnya dengan FALSE
	}
	
	// Fungsi untuk melakukan simpan data ke tabel keterlambatan
	public function save(){
		$data = array(
			
			"kd_jadwal" => $this->input->post('input_kd_jadwal'),
			"user_id" => $this->session->userdata('user_id'),
			"kd_makul" => $this->input->post('input_kd_makul'),
			"tgl_keterlambatan" =>date('Y/m/d', strtotime($this->input->post('input_tgl_keterlambatan'))),
			"keterangan" => $this->input->post('input_keterangan'),
			//"status"     => $this->input->post('input_status')	

			
		);
		
		$this->db->insert('keterlambatan', $data); // Untuk mengeksekusi perintah insert data
	}

	public function saves(){
		$data = array(
			
			
			"user_id" => $this->input->post('input_user_id'),
			"kd_makul" => $this->input->post('input_kd_makul'),
			"tgl_keterlambatan" =>date('Y/m/d', strtotime($this->input->post('input_tgl_keterlambatan'))),
			"keterangan" => $this->input->post('input_keterangan'),
			//"status"     => $this->input->post('input_status')	

			
		);
		
		$this->db->insert('keterlambatan', $data); // Untuk mengeksekusi perintah insert data
	}
	
	// Fungsi untuk melakukan ubah data keterlambatan berdasarkan kd_keterlambatan keterlambatan
	public function ganti($kd_keterlambatan){
		$data = array(
			
			"kd_jadwal"         => $this->input->post('input_kd_jadwal'),
			//"user_id"           => $this->session->userdata('user_id'),
			//"nim"               => $this->input->post('input_nim'),
			
			"kd_makul"          => $this->input->post('input_kd_makul'),
			"tgl_keterlambatan" =>date('Y/m/d', strtotime($this->input->post('input_tgl_keterlambatan'))),
			"keterangan"        => $this->input->post('input_keterangan'),
			"status"            => $this->input->post('input_status')
			
		);
		
 		$this->db->where('kd_keterlambatan', $kd_keterlambatan);
		$this->db->update('keterlambatan', $data); // Untuk mengeksekusi perintah update data
		
	}
	
	// Fungsi untuk melakukan menghapus data keterlambatan berdasarkan kd_keterlambatan keterlambatan
	public function delete($kd_keterlambatan){
		$this->db->where('kd_keterlambatan', $kd_keterlambatan);
		$this->db->delete('keterlambatan'); // Untuk mengeksekusi perintah delete data
	}

	public function getTable($kd_jadwal){
        $this->db->select('*');
        $this->db->from('keterlambatan');
        $this->db->join('mahasiswa', 'keterlambatan.nim = mahasiswa.nim');
        $this->db->join('makul', 'keterlambatan.kd_makul = makul.kd_makul');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('kd_jadwal', $kd_jadwal);
        $query = $this->db->get();
        return $query->result();
    }

    public function getTableByUser(){
        $this->db->select('keterlambatan.status');
        $this->db->from('keterlambatan');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        //$this->db->join('mahasiswa', 'keterlambatan.nim=mahasiswa.nim');
        //$this->db->where('keterlambatan.nim', $nim);
        $this->db->order_by('tgl_keterlambatan', 'desc');
        //$this->db->where('status', $status);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    public function editAcc($kd_keterlambatan) {
        $this->db->select('status');
        $this->db->from('keterlambatan');
        $this->db->where('kd_keterlambatan',$kd_keterlambatan);
        $row = $this->db->get()->row();
        $stat = 0;
        if ($row->status == 0) {
            $stat = 1;
        }
        $data = array(
            "status" => $stat
        );

        $this->db->where('kd_keterlambatan', $kd_keterlambatan);
        $this->db->update('keterlambatan', $data); // Untuk mengeksekusi perintah update data
    }

    public function telat(){
    	$this->db->select('*');
        $this->db->from('keterlambatan');
        //$this->db->join('jadwaluas', 'keterlambatan.kd_jadwal = jadwaluas.kd_jadwal');
        $this->db->join('makul', 'makul.kd_makul = keterlambatan.kd_makul');
        $query = $this->db->get();
        return $query->result();
    }
    

}