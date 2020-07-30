<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	// Fungsi untuk menampilkan semua data jadwaluas
	public function view(){
		
		return $this->db->get('jadwaluas')->result();

	}

	public function view_x(){
        $this->db->select('*');
        $this->db->from('jadwaluas');
        $this->db->join('makul', 'jadwaluas.kd_makul=makul.kd_makul','left');
        $this->db->join('prodi', 'jadwaluas.kd_prodi=prodi.kd_prodi','left');
        //$this->db->join('mahasiswa', 'jadwaluas.mahasiswa_fkid=mahasiswa.mahasiswa_id');
        $query = $this->db->get();
        return $query->result();
    }
	
	// Fungsi untuk menampilkan data jadwaluas berdasarkan NIS nya
	public function view_by($kd_jadwal){
		$this->db->where('kd_jadwal', $kd_jadwal);
		return $this->db->get('jadwaluas')->row();
	}
	
	// Fungsi untuk validasi form tambah dan ubah
	public function validation($mode){
		$this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
		
		// Tambahkan if apakah $mode save atau update
		// Karena ketika update, NIS tidak harus divalidasi
		// Jadi NIS di validasi hanya ketika menambah data jadwaluas saja
		if($mode == "save")
			
			$this->form_validation->set_rules('input_kd_prodi', 'kd_prodi', 'required|max_length[40]');
			$this->form_validation->set_rules('input_kd_makul', 'kd_makul', 'required|max_length[40]');
			//$this->form_validation->set_rules('input_tgl_keterlambatan', 'tgl_keterlambatan', 'required|max_length[40]');
			$this->form_validation->set_rules('input_waktu', 'waktu', 'required|max_length[20]');
			//$this->form_validation->set_rules('input_waktu_mulai', 'waktu_mulai', 'required|max_length[40]');
			//$this->form_validation->set_rules('input_waktu_selesai', 'waktu_selesai', 'required|max_length[40]');
			$this->form_validation->set_rules('input_ruang', 'ruang', 'required|max_length[40]');
			
		if($this->form_validation->run()) // Jika validasi benar
			return TRUE; // Maka kembalikan hasilnya dengan TRUE
		else // Jika ada data yang tidak sesuai validasi
			return FALSE; // Maka kembalikan hasilnya dengan FALSE
	}
	
	// Fungsi untuk melakukan simpan data ke tabel jadwaluas
	public function save(){
		$data = array(
			"kd_jadwal" => $this->input->post('input_kd_jadwal'),
			"kd_prodi" => $this->input->post('input_kd_prodi'),
			"kd_makul" => $this->input->post('input_kd_makul'),
			//"semester" => $this->input->post('input_semester'),
			//"tgl_keterlambatan" => $this->input->post('input_tgl_keterlambatan'),
			"tgl_keterlambatan" =>date('Y/m/d', strtotime($this->input->post('input_tgl_keterlambatan'))),
			
			"waktu" => $this->input->post('input_waktu'),
			// "waktu_mulai" => $this->input->post('input_waktu_mulai'),
			// "waktu_selesai" => $this->input->post('input_waktu_selesai'),
			"ruang" => $this->input->post('input_ruang'),
			
		);
		
		$this->db->insert('jadwaluas', $data); // Untuk mengeksekusi perintah insert data
	}
	public function ubahTanggal($tgl_keterlambatan){
		$data = array(
				"tgl_keterlambatan"=>$tgl_keterlambatan
			);

        $pisah = explode('/',$tgl_keterlambatan);
        $array = array($pisah[2],$pisah[0],$pisah[1]);
        $satukan = implode('-',$array);
        return $satukan;
}
	
	// Fungsi untuk melakukan ubah data jadwaluas berdasarkan NIS jadwaluas
	public function ganti($kd_jadwal){
		$data = array(
			"kd_jadwal" => $this->input->post('input_kd_jadwal'),
			"kd_prodi" => $this->input->post('input_kd_prodi'),
			"kd_makul" => $this->input->post('input_kd_makul'),
			//"semester" => $this->input->post('input_semester'),
 			"tgl_keterlambatan" =>date('Y/m/d', strtotime($this->input->post('input_tgl_keterlambatan'))),
			"waktu" => $this->input->post('input_waktu'),
			// "waktu_mulai" => $this->input->post('input_waktu_mulai'),
			// "waktu_selesai" => $this->input->post('input_waktu_selesai'),
			"ruang" => $this->input->post('input_ruang'),
		);
		
		$this->db->where('kd_jadwal', $kd_jadwal);
		//$this->db->update('jadwaluas', $data); // Untuk mengeksekusi perintah update data
		$this->db->insert('keterlambatan', $data);
	}

	public function mlebu($kd_jadwal){
		$data = array(
			
			"kd_prodi" => $this->input->post('input_kd_prodi'),
			"kd_makul" => $this->input->post('input_kd_makul'),
			//"semester" => $this->input->post('input_semester'),
			"tgl_keterlambatan" =>date('Y/m/d', strtotime($this->input->post('input_tgl_keterlambatan'))),
			"waktu" => $this->input->post('input_waktu'),
			// "waktu_mulai" => $this->input->post('input_waktu_mulai'),
			// "waktu_selesai" => $this->input->post('input_waktu_selesai'),
			"ruang" => $this->input->post('input_ruang'),
		);
		
		$this->db->where('kd_jadwal', $kd_jadwal);
		
		$this->db->update('jadwaluas', $data);
	}
	
	// Fungsi untuk melakukan menghapus data jadwaluas berdasarkan NIS jadwaluas
	public function delete($kd_jadwal){
		$this->db->where('kd_jadwal', $kd_jadwal);
		$this->db->delete('jadwaluas'); // Untuk mengeksekusi perintah delete data
	}

	public function get_by_id($id)
    {
        $this->db->select('
            tbl_user.*, tbl_role.id AS id_role, tbl_role.name, tbl_role.description,
            ');
        $this->db->join('tbl_role', 'tbl_user.id_role = tbl_role.id');
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getTable(){
        $this->db->select('jadwaluas.*', 'makul.kd_makul');
        $this->db->from('jadwaluas', 'makul');
        $this->db->join('makul', 'jadwaluas.kd_makul = makul.kd_makul','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function telat(){
    	$this->db->select('keterlambatan.*, jadwaluas.*');
        $this->db->from('keterlambatan');
        $this->db->join('jadwaluas', 'keterlambatan.kd_jadwal = jadwaluas.kd_jadwal');
        $query = $this->db->get();
        return $query->result();
    }

    //GET JADWAL UAS BAY LOGIN USER 
    public function get_jadwal(){
    	$this->db->select('
    		ju.kode_jadwal,
    		ju.tgl_keterlambatan,
    		ju.ruang,
    		k.prodi,
    		mk.kode,
    		mk.nama_makul,
    		'
    	);
    	$this->db->from('jadwaluas ju');
    	$this->db->join('makul mk', 'mk.kd_makul = ju.kd_makul', 'left');
    	$this->db->where('ju.', $Value);
    }
}