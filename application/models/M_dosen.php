<?php 
 
	class M_dosen extends CI_Model{

		public function get_absensi($email){
			$query = "SELECT * FROM jadwal_dosen WHERE nama_dosen='$email' AND status_jadwal=1";
			return $this->db->query($query)->result();
		}

		public function absen_dosen($data){
			return $this->db->insert('absen_dosen', $data);
		}

		public function jadwal_dosen($email){
			return $this->db->get_where('jadwal_dosen', ['nama_dosen' => $email])->result();
		}

		public function detail_jadwal_dosen($kode){
			return $this->db->get_where('jadwal_dosen', ['kode_jadwal' => $kode])->row();
		}

		public function buka_absensi($kode){
			$this->db->set('status_mahasiswa', 1);
			$this->db->where('kode_jadwal', $kode);
			return $this->db->update('jadwal_dosen');
		}

		public function buka_mahasiswa($kode){
			$this->db->set('status_absensi', 1);
			$this->db->where('kode_jadwal', $kode);
			return $this->db->update('absen_mahasiswa');
		}

		public function tutup_absensi($kode){
			$this->db->set('status_mahasiswa', 0);
			$this->db->where('kode_jadwal', $kode);
			return $this->db->update('jadwal_dosen');
		}

		public function tutup_mahasiswa($kode){
			$this->db->set('status_absensi', 0);
			$this->db->where('kode_jadwal', $kode);
			return $this->db->update('absen_mahasiswa');
		}

		public function get_absensi_mahasiswa_by_kode($kode){
			$query = "SELECT * FROM absen_mahasiswa 
					JOIN mahasiswa ON absen_mahasiswa.nama_mhs=mahasiswa.email_mahasiswa
					WHERE absen_mahasiswa.kode_jadwal='$kode' ORDER BY mahasiswa.nama_mahasiswa ASC";
			return $this->db->query($query)->result();
		}

		public function get_riwayat_dosen($kode){
			$query = "SELECT * FROM absen_dosen
					JOIN jadwal_dosen ON absen_dosen.kode_jadwal_dosen=jadwal_dosen.kode_jadwal
					WHERE absen_dosen.kode_jadwal_dosen='$kode' 
					ORDER BY absen_dosen.tanggal_absen DESC";
			return $this->db->query($query)->result();
		}

		public function get_absen($kode){
			return $this->db->get_where('absen_dosen_riwayat', ['kode_jadwal' => $kode])->row();
		}

		public function get_mahasiswa($kode){
			$query = "SELECT * FROM absen_mahasiswa 
					JOIN mahasiswa ON absen_mahasiswa.nama_mhs=mahasiswa.email_mahasiswa
					WHERE absen_mahasiswa.kode_jadwal='$kode'
					AND absen_mahasiswa.status_absensi=1
					ORDER BY mahasiswa.nama_mahasiswa ASC";
			return $this->db->query($query)->result();
		}

		public function hadir_mahasiswa($data){
			return $this->db->insert('riwayat_absen_mhs', $data);
		}

		public function update_hadir($kode, $nama){
			$query = "UPDATE absen_mahasiswa SET hadir=(hadir+1),status_absensi=0 WHERE kode_jadwal='$kode' AND nama_mhs='$nama'";
			return $this->db->query($query);
		}

		public function sakit_mahasiswa($data){
			return $this->db->insert('riwayat_absen_mhs', $data);
		}

		public function update_sakit($kode, $nama){
			$query = "UPDATE absen_mahasiswa SET sakit=(sakit+1),status_absensi=0 WHERE kode_jadwal='$kode' AND nama_mhs='$nama'";
			return $this->db->query($query);
		}

		public function izin_mahasiswa($data){
			return $this->db->insert('riwayat_absen_mhs', $data);
		}

		public function update_izin($kode, $nama){
			$query = "UPDATE absen_mahasiswa SET izin=(izin+1),status_absensi=0 WHERE kode_jadwal='$kode' AND nama_mhs='$nama'";
			return $this->db->query($query);
		}

		public function alpha_mahasiswa($data){
			return $this->db->insert('riwayat_absen_mhs', $data);
		}

		public function update_alpha($kode, $nama){
			$query = "UPDATE absen_mahasiswa SET alpha=(alpha+1),status_absensi=0 WHERE kode_jadwal='$kode' AND nama_mhs='$nama'";
			return $this->db->query($query);
		}

		public function riwayat($kode, $email){
			$query = "SELECT * FROM riwayat_absen_mhs WHERE kode_jadwal='$kode' AND nama_mhs='$email' ORDER BY tanggal_absen DESC";
			return $this->db->query($query)->result();
		}

	}

 ?>