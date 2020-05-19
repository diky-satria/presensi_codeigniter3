<?php 

	class Dosen extends CI_Controller{
 
		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata('email_user')){
				redirect('auth');
			}
			if($this->session->userdata('role_user') == 3){
				redirect('mahasiswa');
			}
		}

		public function index(){
			$data['judul'] = 'dosen';
			$email = $this->session->userdata('email_user');
			$data['absensi'] = $this->M_dosen->get_absensi($email);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('dosen/index', $data);
			$this->load->view('templates/user_footer');
			$absen = $this->input->post('absen');
			if(isset($absen)){
				$data = [
					'kode_jadwal_dosen' => $this->input->post('kode'),
					'email_dosen_absen' => $this->input->post('email'),
					'status_absen_dosen' => 0
				];
				$this->M_dosen->absen_dosen($data);
				$this->M_admin->update_jadwal($email);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Anda berhasil absen, silahkan cek riwayat absen untuk mengetahui status absen
															</div>');
				redirect('dosen');
			}
		}

		public function jadwal(){
			$data['judul'] = 'jadwal';
			$email = $this->session->userdata('email_user');
			$data['jadwal_dosen'] = $this->M_dosen->jadwal_dosen($email);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('dosen/jadwal', $data);
			$this->load->view('templates/user_footer');
		}

		public function detail_jadwal($kode){
			$data['judul'] = 'detail jadwal';
			$data['det'] = $this->M_dosen->detail_jadwal_dosen($kode);
			$k = $data['det']->kode_jadwal;
			if($data['det']){
				if($kode != $k){
					redirect('dosen/jadwal');	
				}else{
					$this->load->view('templates/user_header', $data);
					$this->load->view('templates/user_topbar');
					$this->load->view('templates/user_sidebar');
					$this->load->view('dosen/detail_jadwal_dosen', $data);
					$this->load->view('templates/user_footer');	
				}
			}else{
				redirect('dosen/jadwal');	
			}
		}

		public function buka_absensi($kode){
			$this->M_dosen->buka_absensi($kode);
			$this->M_dosen->buka_mahasiswa($kode);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Absensi '.$kode.' berhasil dibuka, silahkan cek mahasiswa yang hadir
															</div>');
			redirect('dosen/jadwal');
		}

		public function tutup_absensi($kode){
			$this->M_dosen->tutup_absensi($kode);
			$this->M_dosen->tutup_mahasiswa($kode);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Absensi '.$kode.' berhasil ditutup
															</div>');
			redirect('dosen/jadwal');
		}

		public function absensi_mahasiswa(){
			$data['judul'] = 'absensi jadwal';
			$kode = $this->input->get('kode');
			$data['matkul'] = $this->input->get('matkul');
			$data['absensi_mahasiswa'] = $this->M_dosen->get_absensi_mahasiswa_by_kode($kode);
			if($data['absensi_mahasiswa']){
					$this->load->view('templates/user_header', $data);
					$this->load->view('templates/user_topbar');
					$this->load->view('templates/user_sidebar');
					$this->load->view('dosen/absensi_mahasiswa', $data);
					$this->load->view('templates/user_footer');	
			}else{
				redirect('dosen/jadwal');
			}
		}

		public function riwayat_absensi(){
			$data['judul'] = 'riwayat absensi dosen';
			$data['kode'] = $this->input->get('kode');
			$data['matkul'] = $this->input->get('matkul');
			$data['riwayat'] = $this->M_dosen->get_riwayat_dosen($data['kode']);
			$data['absen'] = $this->M_dosen->get_absen($data['kode']);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('dosen/riwayat_absensi_dosen', $data);
			$this->load->view('templates/user_footer');	
		}

		public function cek($kode){
			$data['judul'] = 'cek mahasiswa';
			$data['mahasiswa'] = $this->M_dosen->get_mahasiswa($kode);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('dosen/cek', $data);
			$this->load->view('templates/user_footer');	
		}

		public function hadir_mahasiswa(){
			$hadir = $this->input->post('hadir');
			$kode = $this->input->post('kode');
			$nama = $this->input->post('nama');
			if(isset($hadir)){
				$data = [
					'kode_jadwal' => $this->input->post('kode'),
					'nama_mhs' => $this->input->post('nama'),
					'status' => 'hadir'
				];
				$this->M_dosen->hadir_mahasiswa($data);
				$this->M_dosen->update_hadir($kode, $nama);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Mahasiswa/i hadir berhasil di cek
															</div>');
				redirect('dosen/cek/'.$kode);
			}
		}

		public function sakit_mahasiswa(){
			$sakit = $this->input->post('sakit');
			$kode = $this->input->post('kode');
			$nama = $this->input->post('nama');
			if(isset($sakit)){
				$data = [
					'kode_jadwal' => $this->input->post('kode'),
					'nama_mhs' => $this->input->post('nama'),
					'status' => 'sakit'
				];
				$this->M_dosen->sakit_mahasiswa($data);
				$this->M_dosen->update_sakit($kode, $nama);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Mahasiswa/i sakit berhasil di cek
															</div>');
				redirect('dosen/cek/'.$kode);
			}
		}

		public function izin_mahasiswa(){
			$izin = $this->input->post('izin');
			$kode = $this->input->post('kode');
			$nama = $this->input->post('nama');
			if(isset($izin)){
				$data = [
					'kode_jadwal' => $this->input->post('kode'),
					'nama_mhs' => $this->input->post('nama'),
					'status' => 'izin'
				];
				$this->M_dosen->izin_mahasiswa($data);
				$this->M_dosen->update_izin($kode, $nama);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Mahasiswa/i izin berhasil di cek
															</div>');
				redirect('dosen/cek/'.$kode);
			}
		}

		public function alpha_mahasiswa(){
			$alpha = $this->input->post('alpha');
			$kode = $this->input->post('kode');
			$nama = $this->input->post('nama');
			if(isset($alpha)){
				$data = [
					'kode_jadwal' => $this->input->post('kode'),
					'nama_mhs' => $this->input->post('nama'),
					'status' => 'alpha'
				];
				$this->M_dosen->alpha_mahasiswa($data);
				$this->M_dosen->update_alpha($kode, $nama);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Mahasiswa/i alpha berhasil di cek
															</div>');
				redirect('dosen/cek/'.$kode);
			}
		}

		public function riwayat_mahasiswa(){
			$data['judul'] = 'riwayat absensi mahasiswa';
			$data['kode'] = $this->input->get('kode');
			$data['email'] = $this->input->get('email');
			$data['matkul'] = $this->input->get('matkul');
			$data['riwayat'] = $this->M_dosen->riwayat($data['kode'], $data['email']);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('dosen/riwayat_mahasiswa', $data);
			$this->load->view('templates/user_footer');	
		}

	}
?>