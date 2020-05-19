<?php 

	class M_admin extends CI_Model{

		public function tambah_admin($data){
			return $this->db->insert('admin', $data);
		}

		public function get_admin(){
			return $this->db->get('admin')->result();
		}

		public function get_admin_id($id){
			return $this->db->get_where('admin', ['id_admin' => $id])->row();
		}

		public function ubah_admin($data, $id){
			$this->db->where('id_admin', $id);
			return $this->db->update('admin', $data);
		}

		public function hapus_admin($id){
			return $this->db->delete('admin', ['id_admin' => $id]);
		}

		public function count_admin(){
			return $this->db->get('admin')->num_rows();
		}

		public function tambah_dosen($data){
			return $this->db->insert('dosen', $data);
		}

		public function get_dosen(){
			return $this->db->get('dosen')->result();
		}

		public function get_dosen_by_nama(){
			$query = "SELECT * FROM dosen ORDER BY nama_dosen ASC";
			return $this->db->query($query)->result();
		}

		public function get_dosen_id($id){
			return $this->db->get_where('dosen', ['id_dosen' => $id])->row();
		}

		public function ubah_dosen($data, $id){
			$this->db->where('id_dosen', $id);
			return $this->db->update('dosen', $data);
		}

		public function hapus_dosen($id){
			return $this->db->delete('dosen', ['id_dosen' => $id]);
		}

		public function buka_access_dosen($id){
			$this->db->set('status', 1);
			$this->db->where('id_dosen', $id);
			return $this->db->update('dosen');
		}

		public function count_dosen(){
			return $this->db->get('dosen')->num_rows();
		}

		public function tambah_jurusan($data){
			return $this->db->insert('jurusan', $data);
		}

		public function get_jurusan(){
			$query = "SELECT * FROM jurusan ORDER BY nama_jurusan ASC";
			return $this->db->query($query)->result();
		}

		public function get_jurusan_id($id){
			return $this->db->get_where('jurusan', ['id_jurusan' => $id])->row();
		}

		public function ubah_jurusan($data, $id){
			$this->db->set('nama_jurusan', $data);
			$this->db->where('id_jurusan', $id);
			return $this->db->update('jurusan');
		}

		public function hapus_jurusan($id){
			return $this->db->delete('jurusan', ['id_jurusan' => $id]);
		}

		public function count_jurusan(){
			return $this->db->get('jurusan')->num_rows();
		}

		public function get_mahasiswa(){
			return $this->db->get('mahasiswa')->result();
		}

		public function get_mahasiswa_id($id){
			return $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id])->row();
		}

		public function get_mahasiswa_by_nama(){
			$query = "SELECT * FROM mahasiswa ORDER BY nama_mahasiswa ASC";
			return $this->db->query($query)->result();
		}

		public function tambah_mahasiswa($data){
			return $this->db->insert('mahasiswa', $data);
		}

		public function ubah_mahasiswa($data, $id){
			$this->db->where('id_mahasiswa', $id);
			return $this->db->update('mahasiswa', $data);
		}

		public function hapus_mahasiswa($id){
			return $this->db->delete('mahasiswa', ['id_mahasiswa' => $id]);
		}

		public function count_mahasiswa(){
			return $this->db->get('mahasiswa')->num_rows();
		}

		public function buka_access_mahasiswa($id){
			$this->db->set('status', 1);
			$this->db->where('id_mahasiswa', $id);
			return $this->db->update('mahasiswa');
		}

		public function get_ruangan(){
			$query = "SELECT * FROM ruangan ORDER BY no_ruangan ASC";
			return $this->db->query($query)->result();
		}

		public function tambah_ruangan($data){
			return $this->db->insert('ruangan', $data);
		}

		public function hapus_ruangan($id){
			return $this->db->delete('ruangan', ['id_ruangan' => $id]);
		}

		public function count_ruangan(){
			return $this->db->get('ruangan')->num_rows();
		}

		public function get_matkul(){
			return $this->db->get('mata_kuliah')->result();
		}

		public function get_matkul_by_nama(){
			$query = "SELECT * FROM mata_kuliah ORDER BY nama_matkul ASC";
			return $this->db->query($query)->result();
		}

		public function tambah_matkul($data){
			return $this->db->insert('mata_kuliah', $data);
		}

		public function hapus_matkul($id){
			return $this->db->delete('mata_kuliah', ['id_matkul' => $id]);
		}

		public function count_matkul(){
			return $this->db->get('mata_kuliah')->num_rows();
		}

		public function get_jadwal_dosen(){
			$query = "SELECT * FROM jadwal_dosen
					JOIN dosen ON jadwal_dosen.nama_dosen=dosen.email_dosen
					ORDER BY jadwal_dosen.matkul ASC";
			return $this->db->query($query)->result();
		}

		public function tambah_jadwal_dosen($data){
			return $this->db->insert('jadwal_dosen', $data);
		}

		public function tambah_dosen_riwayat($dosen){
			return $this->db->insert('absen_dosen_riwayat', $dosen);
		}

		public function get_jadwal_dosen_id($id){
			$query = "SELECT * FROM jadwal_dosen
					JOIN dosen ON jadwal_dosen.nama_dosen=dosen.email_dosen
					WHERE jadwal_dosen.id_jadwal_dosen='$id'";
			return $this->db->query($query)->row();
		}

		public function ubah_jadwal_dosen($data, $id){
			$this->db->where('id_jadwal_dosen', $id);
			return $this->db->update('jadwal_dosen', $data);
		}

		public function ubah_dosen_riwayat($dosen, $kode){
			$this->db->where('kode_jadwal', $kode);
			return $this->db->update('absen_dosen_riwayat', $dosen);
		}

		public function hapus_jadwal($id){
			return $this->db->delete('jadwal_dosen', ['id_jadwal_dosen' => $id]);
		}

		public function hapus_absensi_mhs($kode){
			return $this->db->delete('absen_mahasiswa', ['kode_jadwal' => $kode]);
		}

		public function hapus_dos($kode){
			return $this->db->delete('absen_dosen', ['kode_jadwal_dosen' => $kode]);
		}

		public function hapus_riwayat_dosen($kode){
			return $this->db->delete('absen_dosen_riwayat', ['kode_jadwal' => $kode]);
		}

		public function buka_jadwal($id){
			$this->db->set('status_jadwal', 1);
			$this->db->where('id_jadwal_dosen', $id);
			return $this->db->update('jadwal_dosen');
		}

		public function tutup_jadwal($id){
			$this->db->set('status_jadwal', 0);
			$this->db->where('id_jadwal_dosen', $id);
			return $this->db->update('jadwal_dosen');
		}

		public function update_jadwal($email){
			$this->db->set('status_jadwal', 0);
			$this->db->where('nama_dosen', $email);
			return $this->db->update('jadwal_dosen');
		}

		public function get_absensi_mahasiswa_by_kode($kode){
			$query = "SELECT * FROM absen_mahasiswa 
					JOIN mahasiswa ON absen_mahasiswa.nama_mhs=mahasiswa.email_mahasiswa
					WHERE absen_mahasiswa.kode_jadwal='$kode' ORDER BY mahasiswa.nama_mahasiswa ASC";
			return $this->db->query($query)->result();
		}

		public function tambah_absensi_mahasiswa($data){
			return $this->db->insert('absen_mahasiswa', $data);
		}

		public function hapus_absensi_mahasiswa($id){
			return $this->db->delete('absen_mahasiswa', ['id_absen_mahasiswa' => $id]);
		}

		public function count_jadwal_dosen(){
			return $this->db->get('jadwal_dosen')->num_rows();
		}

		public function get_absensi_dosen($kode){
			$query = "SELECT * FROM absen_dosen WHERE kode_jadwal_dosen='$kode' ORDER BY tanggal_absen DESC";
			return $this->db->query($query)->result();
		}

		public function get_riwayat_dosen($kode){
			return $this->db->get_where('absen_dosen_riwayat', ['kode_jadwal' => $kode])->row();
		}

		public function count_konfirmasi_dosen(){
			return $this->db->get_where('absen_dosen', ['status_absen_dosen' => 0])->num_rows();
		}

		public function get_konfirmasi_absen_dosen(){
			$query = "SELECT * FROM absen_dosen
					JOIN jadwal_dosen ON absen_dosen.kode_jadwal_dosen=jadwal_dosen.kode_jadwal
					JOIN dosen ON absen_dosen.email_dosen_absen=dosen.email_dosen
					WHERE absen_dosen.status_absen_dosen=0";
			return $this->db->query($query)->result();
		}

		public function konfir_absen_dosen($id){
			$this->db->set('status_absen_dosen', 2);
			$this->db->where('id_absen_dosen', $id);
			return $this->db->update('absen_dosen');
		}

		public function konfirmasi_riwayat_dosen($kode){
			$query = "UPDATE absen_dosen_riwayat SET disetujui=(disetujui+1) WHERE kode_jadwal='$kode'";
			return $this->db->query($query);
		}

		public function tolak_absen_dosen($id){
			$this->db->set('status_absen_dosen', 1);
			$this->db->where('id_absen_dosen', $id);
			return $this->db->update('absen_dosen');
		}

		public function tolak_riwayat_dosen($kode){
			$query = "UPDATE absen_dosen_riwayat SET ditolak=(ditolak+1) WHERE kode_jadwal='$kode'";
			return $this->db->query($query);
		}

	}

 ?>