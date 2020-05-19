<?php 

	class Mahasiswa extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata('email_user')){
				redirect('auth');
			}
		}

		public function index(){
			$data['judul'] = 'jadwal saya';
			$email = $this->session->userdata('email_user');
			$data['get'] = $this->M_mahasiswa->get_mahasiswa($email);
			if($data['get']){
				$jurusan = $data['get']->jurusan;
				$semester = $data['get']->semester;
				$kelas = $data['get']->kelas;
				$data['jadwal'] = $this->M_mahasiswa->get_jadwal($jurusan, $semester, $kelas);	
			}
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('mahasiswa/index', $data);
			$this->load->view('templates/user_footer');
		}

		public function riwayat_absensi(){
			$data['judul'] = 'riwayat';
			$kode = $this->input->get('kode');
			$email = $this->input->get('email');
			$data['absen'] = $this->M_mahasiswa->get_absensi($kode, $email);
			$data['riwayat'] = $this->M_mahasiswa->get_riwayat($kode, $email);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('mahasiswa/riwayat_absensi', $data);
			$this->load->view('templates/user_footer');	
		}

		public function ubah_password(){
			$data['judul'] = 'ubah password';
			$email = $this->session->userdata('email_user');
			$user = $this->M_mahasiswa->get_user($email);
			$this->form_validation->set_rules('password_lama', 'Password lama', 'trim|required|min_length[6]',
				[ 'min_length' => 'Password minimal 6 karakter' ]);
			$this->form_validation->set_rules('password_baru', 'Password baru', 'trim|required|min_length[6]',
				[ 'min_length' => 'Password minimal 6 karakter' ]);
			$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi password', 'trim|required|matches[password_baru]',
				[ 'matches' => 'Konfirmasi password salah' ]);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('mahasiswa/ubah_password', $data);
				$this->load->view('templates/user_footer');		
			}else{
				$password_lama = $this->input->post('password_lama');
				$password_baru = $this->input->post('password_baru');
				$konfirmasi_password = password_hash($this->input->post('konfirmasi_password'), PASSWORD_DEFAULT);
				if(password_verify($password_lama, $user->password_user)){
					if($password_baru == $password_lama){
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Password baru tidak boleh sama dengan password lama
															</div>');
						redirect('mahasiswa/ubah_password');
					}else{
						$this->M_mahasiswa->ubah_password($konfirmasi_password, $email);
						$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Password berhasil diubah
															</div>');
						redirect('mahasiswa/ubah_password');
					}
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Password lama yang anda masukan salah
															</div>');
					redirect('mahasiswa/ubah_password');
				}
			}
		}

	}

 ?>