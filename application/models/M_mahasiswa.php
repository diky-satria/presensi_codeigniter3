<?php 

	class M_mahasiswa extends CI_Model{

		public function get_mahasiswa($email){
			return $this->db->get_where('mahasiswa', ['email_mahasiswa' => $email])->row();
		}

		public function get_jadwal($jurusan, $semester, $kelas){
			$query = "SELECT * FROM jadwal_dosen WHERE jurusan_jadwal='$jurusan' AND semester_jadwal='$semester' AND kelas_jadwal='$kelas'";
			return $this->db->query($query)->result();
		}

		public function get_riwayat($kode, $email){
			$query = "SELECT * FROM riwayat_absen_mhs WHERE nama_mhs='$email' AND kode_jadwal='$kode' ORDER BY tanggal_absen DESC";
			return $this->db->query($query)->result();
		}

		public function get_absensi($kode, $email){
			$query = "SELECT * FROM absen_mahasiswa WHERE nama_mhs='$email' AND kode_jadwal='$kode'";
			return $this->db->query($query)->row();
		}

		public function get_user($email){
			return $this->db->get_where('user', ['email_user' => $email])->row();
		}

		public function ubah_password($konfirmasi_password, $email){
			$this->db->set('password_user', $konfirmasi_password);
			$this->db->where('email_user', $email);
			return $this->db->update('user');
		}

	}

 ?>