<?php 

	class Auth extends CI_Controller{

		public function index(){
			if($this->session->userdata('email_user')){
				redirect('mahasiswa');
			}
			$data['judul'] = 'login';
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',
				[ 'min_length' => 'Password minimal 6 karakter' ]);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/auth_header', $data);
				$this->load->view('auth/index');
				$this->load->view('templates/auth_footer');	
			}else{
				$email = $this->input->post('email', true);
				$password = $this->input->post('password', true);
				$user = $this->db->get_where('user', ['email_user' => $email])->row();
				if($user){
					if($user->status == 0){
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Email anda belum aktif, silahkan kunjungi petugas TU untuk mengaktifkan email anda agar bisa login
															</div>');
						redirect('auth');
					}else{
						if(password_verify($password, $user->password_user)){
							$data = [
								'nama_user' => $user->nama_user,
								'email_user' => $user->email_user,
								'role_user' => $user->role_user
							];
							$this->session->set_userdata($data);
							if($this->session->userdata('role_user') == 1){
								redirect('admin');	
							}elseif($this->session->userdata('role_user') == 2){
								redirect('dosen');
							}else{
								redirect('mahasiswa');
							}
						}else{
							$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
																  Password salah
																</div>');
							redirect('auth');
						}
					}
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Email tidak terdaftar
															</div>');
					redirect('auth');
				}
			}
		}

		public function logout(){
			$this->session->unset_userdata('nama_user');
			$this->session->unset_userdata('email_user');
			$this->session->unset_userdata('role_user');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Anda telah keluar
															</div>');
			redirect('auth');
		}

		public function lupa_password(){
			if($this->session->userdata('email_user')){
				redirect('mahasiswa');
			}
			$data['judul'] = 'lupa password';
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/auth_header', $data);
				$this->load->view('auth/lupa_password');
				$this->load->view('templates/auth_footer');	
			}else{
				$email = $this->input->post('email');
				$user = $this->M_mahasiswa->get_user($email);
				if($user){
					$this->session->set_userdata('reset_email', $email);
					$this->M_auth->lupa_password();
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Email tidak terdaftar
															</div>');
					redirect('auth/lupa_password');
				}
			}
		}

		public function reset(){
			$email = $this->input->get('email');
			$token = $this->input->get('token');
			$user = $this->db->get_where('user', ['email_user' => $email])->row_array();
			if($user){
				$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
				if($user_token){
					$this->session->set_userdata('reset_email', $email);
					$this->ubah_password();
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
										  Error token
										</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
										  Error email
										</div>');
				redirect('auth');
			}
		}

		public function ubah_password(){
			if($this->session->userdata('email_user')){
				redirect('mahasiswa');
			}
			if(!$this->session->userdata('reset_email')){
				redirect('auth');
			}
			$data['judul'] = 'reset password';
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
					'min_length' => 'password minimal 6 karakter'
				]);
			$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi password', 'trim|required|matches[password]', [
					'matches' => 'Konfirmasi password salah'
				]);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/auth_header', $data);
				$this->load->view('auth/reset_password');
				$this->load->view('templates/auth_footer');		
			}else{
				$password = $this->input->post('password');
				$konfirmasi_password = password_hash($this->input->post('konfirmasi_password'), PASSWORD_DEFAULT);
				$email = $this->session->userdata('reset_email');

				$this->db->set('password_user', $konfirmasi_password);
				$this->db->where('email_user', $email);
				$this->db->update('user');

				$this->db->delete('user_token', ['email' => $email]);
				$this->session->unset_userdata('reset_email');

				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
										  Reset password berhasil, silahkan login
										</div>');
				redirect('auth');
			}
		}

	}

 ?>