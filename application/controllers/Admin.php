 <?php 

	class Admin extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata('email_user')){
				redirect('auth');
			}
			if($this->session->userdata('role_user') != 1){
				redirect('mahasiswa');
			}
		}

		public function index(){
			$data['judul'] = 'dashboard';
			$data['count_admin'] = $this->M_admin->count_admin();
			$data['count_dosen'] = $this->M_admin->count_dosen();
			$data['count_jurusan'] = $this->M_admin->count_jurusan();
			$data['count_mahasiswa'] = $this->M_admin->count_mahasiswa();
			$data['count_ruangan'] = $this->M_admin->count_ruangan();
			$data['count_matkul'] = $this->M_admin->count_matkul();
			$data['count_jadwal_dosen'] = $this->M_admin->count_jadwal_dosen();
			$data['count_konfirmasi_dosen'] = $this->M_admin->count_konfirmasi_dosen();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/index', $data);
			$this->load->view('templates/user_footer');
		}

		public function admin_admin(){
			$data['judul'] = 'admin';
			$data['admin'] = $this->M_admin->get_admin();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/admin_admin');
			$this->load->view('templates/user_footer');
		}

		public function tambah_admin(){
			$data['judul'] = 'tambah admin';
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|numeric',
				[ 'numeric' => 'Data harus angka' ]);
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin.email_admin]|is_unique[user.email_user]',
				['is_unique' => 'Email sudah terdaftar']);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_admin');
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'nama_admin' => $this->input->post('nama'),
					'telepon_admin' => $this->input->post('telepon'),
					'alamat_admin' => $this->input->post('alamat'),
					'email_admin' => $this->input->post('email')
				];
				$user = [
					'nama_user' => $this->input->post('nama'),
					'email_user' => $this->input->post('email'),
					'password_user' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'role_user' => 1,
					'status' => 1
				];
				$this->M_admin->tambah_admin($data);
				$this->M_user->tambah_user($user);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Admin berhasil ditambahkan, beri tahu admin baru untuk segera mengubah password bawaan aplikasi (unusia)
															</div>');
				redirect('admin/admin_admin');
			}
		}

		public function ubah_admin($id){
			$data['judul'] = 'ubah admin';
			$data['admin'] = $this->M_admin->get_admin_id($id);
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|numeric',
				[ 'numeric' => 'Data harus angka' ]);
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/ubah_admin', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$id = $this->input->post('id');
				$email = $this->input->post('email');
				$data = [
					'nama_admin' => $this->input->post('nama'),
					'telepon_admin' => $this->input->post('telepon'),
					'alamat_admin' => $this->input->post('alamat')
				];
				$user = $this->input->post('nama');
				$this->M_admin->ubah_admin($data, $id);
				$this->M_user->ubah_user($user, $email);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Admin berhasil diubah
															</div>');
				redirect('admin/admin_admin');
			}
		}

		public function hapus_admin(){
			$id = $this->input->get('id');
			$email = $this->input->get('email');
			$this->M_admin->hapus_admin($id);
			$this->M_user->hapus_user($email);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Admin berhasil dihapus
															</div>');
			redirect('admin/admin_admin');
		}

		public function dosen(){
			$data['judul'] = 'dosen';
			$data['dosen'] = $this->M_admin->get_dosen();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/dosen', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_dosen(){
			$data['judul'] = 'tambah dosen';
			$this->form_validation->set_rules('nid', 'Nomor Induk Dosen', 'trim|required|is_unique[dosen.nid]',
				[ 'is_unique' => 'Nomor Induk Dosen sudah terdaftar' ]);
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|numeric',
				[ 'numeric' => 'Data harus angka' ]);
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[dosen.email_dosen]|is_unique[user.email_user]',
				['is_unique' => 'Email sudah terdaftar']);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_dosen');
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'nid' => $this->input->post('nid'),
					'nama_dosen' => $this->input->post('nama'),
					'telepon_dosen' => $this->input->post('telepon'),
					'alamat_dosen' => $this->input->post('alamat'),
					'email_dosen' => $this->input->post('email'),
					'status' => 0
				];
				$user = [
					'nama_user' => $this->input->post('nama'),
					'email_user' => $this->input->post('email'),
					'password_user' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'role_user' => 2,
					'status' => 0
				];
				$this->M_admin->tambah_dosen($data);
				$this->M_user->tambah_user($user);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Dosen berhasil ditambahkan, beri tahu dosen baru untuk segera mengubah password bawaan aplikasi (unusia)
															</div>');
				redirect('admin/dosen');
			}
		}

		public function ubah_dosen($id){
			$data['judul'] = 'tambah dosen';
			$data['dosen'] = $this->M_admin->get_dosen_id($id);
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|numeric',
				[ 'numeric' => 'Data harus angka' ]);
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/ubah_dosen');
				$this->load->view('templates/user_footer');	
			}else{
				$email = $this->input->post('email');
				$id = $this->input->post('id');
				$data = [
					'nama_dosen' => $this->input->post('nama'),
					'telepon_dosen' => $this->input->post('telepon'),
					'alamat_dosen' => $this->input->post('alamat')
				];
				$user = $this->input->post('nama');
				$this->M_admin->ubah_dosen($data, $id);
				$this->M_user->ubah_user($user, $email);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Dosen berhasil diubah
															</div>');
				redirect('admin/dosen');
			}
		}

		public function hapus_dosen(){
			$id = $this->input->get('id');
			$email = $this->input->get('email');
			$this->M_admin->hapus_dosen($id);
			$this->M_user->hapus_user($email);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Dosen berhasil dihapus
															</div>');
			redirect('admin/dosen');
		}

		public function buka_access_dosen(){
			$id = $this->input->get('id');
			$email = $this->input->get('email');
			$this->M_admin->buka_access_dosen($id);
			$this->M_user->buka_access_user($email);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Access dosen berhasil dibuka
															</div>');
			redirect('admin/dosen');
		}

		public function mahasiswa(){
			$data['judul'] = 'mahasiswa';
			$data['mahasiswa'] = $this->M_admin->get_mahasiswa();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/mahasiswa', $data);
			$this->load->view('templates/user_footer');
		}

		public function detail_mahasiswa($id){
			$data['judul'] = 'mahasiswa';
			$data['mahasiswa'] = $this->M_admin->get_mahasiswa_id($id);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/detail_mahasiswa', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_mahasiswa(){
			$data['judul'] = 'tambah mahasiswa';
			$data['jurusan'] = $this->M_admin->get_jurusan();
			$this->form_validation->set_rules('nim', 'NIM', 'trim|required|is_unique[mahasiswa.nim]',
				[ 'is_unique' => 'NIM sudah terdaftar' ]);
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
			$this->form_validation->set_rules('semester', 'Semester', 'trim|required');
			$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[mahasiswa.email_mahasiswa]|is_unique[user.email_user]',
				[ 'is_unique' => 'Email sudah terdaftar' ]);
			$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|numeric',
				[ 'numeric' => 'Data harus angka' ]);
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_mahasiswa');
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'nim' => $this->input->post('nim'),
					'nama_mahasiswa' => $this->input->post('nama'),
					'email_mahasiswa' => $this->input->post('email'),
					'jurusan' => $this->input->post('jurusan'),
					'semester' => $this->input->post('semester'),
					'kelas' => $this->input->post('kelas'),
					'telepon_mahasiswa' => $this->input->post('telepon'),
					'alamat_mahasiswa' => $this->input->post('alamat'),
					'status' => 0
				];
				$user = [
					'nama_user' => $this->input->post('nama'),
					'email_user' => $this->input->post('email'),
					'password_user' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'role_user' => 3,
					'status' => 0
				];
				$this->M_admin->tambah_mahasiswa($data);
				$this->M_user->tambah_user($user);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Mahasiswa/i berhasil ditambahkan, beri tahu mahasiswa/i baru untuk mengubah password bawaan aplikasi (unusia)
															</div>');
				redirect('admin/mahasiswa');
			}
		}

		public function ubah_mahasiswa($id){
			$data['judul'] = 'tambah mahasiswa';
			$data['jurusan'] = $this->M_admin->get_jurusan();
			$data['mahasiswa'] = $this->M_admin->get_mahasiswa_id($id);
			$data['jr'] = $data['mahasiswa']->jurusan;
			$data['sm'] = $data['mahasiswa']->semester;
			$data['kl'] = $data['mahasiswa']->kelas;
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|numeric',
				[ 'numeric' => 'Data harus angka' ]);
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/ubah_mahasiswa', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'nama_mahasiswa' => $this->input->post('nama'),
					'jurusan' => $this->input->post('jurusan'),
					'semester' => $this->input->post('semester'),
					'kelas' => $this->input->post('kelas'),
					'telepon_mahasiswa' => $this->input->post('telepon'),
					'alamat_mahasiswa' => $this->input->post('alamat')
				];
				$user = $this->input->post('nama');
				$email = $this->input->post('email');
				$this->M_admin->ubah_mahasiswa($data, $id);
				$this->M_user->ubah_user($user, $email);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Mahasiswa/i berhasil diubah
															</div>');
				redirect('admin/mahasiswa');
			}
		}

		public function hapus_mahasiswa(){
			$id = $this->input->get('id');
			$email = $this->input->get('email');
			$this->M_admin->hapus_mahasiswa($id);
			$this->M_user->hapus_user($email);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Mahasiswa/i berhasil dihapus
															</div>');
			redirect('admin/mahasiswa');
		}

		public function buka_access_mahasiswa(){
			$id = $this->input->get('id');
			$email = $this->input->get('email');
			$this->M_admin->buka_access_mahasiswa($id);
			$this->M_user->buka_access_user($email);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Access mahasiswa/i berhasil dibuka
															</div>');
			redirect('admin/mahasiswa');
		}

		public function jurusan(){
			$data['judul'] = 'jurusan';
			$data['jurusan'] = $this->M_admin->get_jurusan();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/jurusan', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_jurusan(){
			$data['judul'] = 'tambah jurusan';
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required|is_unique[jurusan.nama_jurusan]',
				['is_unique' => 'Jurusan ini sudah terdaftar']);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_jurusan');
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'nama_jurusan' => $this->input->post('jurusan')
				];
				$this->M_admin->tambah_jurusan($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Jurusan berhasil ditambahkan
															</div>');
				redirect('admin/jurusan');
			}
		}

		public function ubah_jurusan($id){
			$data['judul'] = 'ubah jurusan';
			$data['jurusan'] = $this->M_admin->get_jurusan_id($id);
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/ubah_jurusan');
				$this->load->view('templates/user_footer');	
			}else{
				$data = $this->input->post('jurusan');
				$this->M_admin->ubah_jurusan($data, $id);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Jurusan berhasil diubah
															</div>');
				redirect('admin/jurusan');
			}
		}

		public function hapus_jurusan($id){
			$this->M_admin->hapus_jurusan($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Jurusan berhasil dihapus
															</div>');
			redirect('admin/jurusan');
		}

		public function ruangan(){
			$data['judul'] = 'ruangan';
			$data['ruangan'] = $this->M_admin->get_ruangan();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/ruangan', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_ruangan(){
			$data['judul'] = 'tambah ruangan';
			$this->form_validation->set_rules('ruangan', 'Ruangan', 'trim|required|is_unique[ruangan.no_ruangan]',
				[ 'is_unique' => 'Ruangan ini sudah terdaftar' ]);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_ruangan');
				$this->load->view('templates/user_footer');	
			}else{
				$data = [ 'no_ruangan' => $this->input->post('ruangan')];
				$this->M_admin->tambah_ruangan($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Ruangan berhasil ditambahkan
															</div>');
				redirect('admin/ruangan');
			}
		}

		public function hapus_ruangan($id){
			$this->M_admin->hapus_ruangan($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Ruangan berhasil dihapus
															</div>');
			redirect('admin/ruangan');
		}

		public function matkul(){
			$data['judul'] = 'mata kuliah';
			$data['matkul'] = $this->M_admin->get_matkul();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/matkul', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_matkul(){
			$data['judul'] = 'tambah kuliah';
			$this->form_validation->set_rules('matkul', 'Mata kuliah', 'trim|required|is_unique[mata_kuliah.nama_matkul]',
				[ 'is_unique' => 'Mata kuliah sudah terdaftar' ]);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_matkul', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'nama_matkul' => $this->input->post('matkul')
				];
				$this->M_admin->tambah_matkul($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Mata kuliah berhasil ditambahkan
															</div>');
				redirect('admin/matkul');
			}
		}

		public function hapus_matkul($id){
			$this->M_admin->hapus_matkul($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Mata kuliah berhasil dihapus
															</div>');
			redirect('admin/matkul');
		}

		public function jadwal_dosen(){
			$data['judul'] = 'jadwal dosen';
			$data['jadwal_dosen'] = $this->M_admin->get_jadwal_dosen();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/jadwal_dosen', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_jadwal_dosen(){
			$data['judul'] = 'tambah jadwal dosen';
			$data['kode'] = $this->input->get('kode');
			$data['jurusan'] = $this->M_admin->get_jurusan();
			$data['dosen_by_nama'] = $this->M_admin->get_dosen_by_nama();
			$data['matkul_by_nama'] = $this->M_admin->get_matkul_by_nama();
			$data['ruangan'] = $this->M_admin->get_ruangan();
			$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
			$this->form_validation->set_rules('dosen', 'Dosen', 'trim|required');
			$this->form_validation->set_rules('matkul', 'Mata Kuliah', 'trim|required');
			$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');
			$this->form_validation->set_rules('ruangan', 'Ruangan', 'trim|required');
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
			$this->form_validation->set_rules('semester', 'Semester', 'trim|required');
			$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_jadwal_dosen', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$waktu = $this->input->post('waktu');
				$ruangan = $this->input->post('ruangan');
				$sql = "SELECT * FROM jadwal_dosen WHERE waktu='$waktu' AND ruangan='$ruangan'";
				$en = $this->db->query($sql)->row();
				$ck = $en->waktu;
				if($ck){
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Waktu dan ruangan sudah terdaftar
															</div>');
					redirect('admin/tambah_jadwal_dosen?kode='.$data['kode']);
				}else{
					$data = [
						'kode_jadwal' => $this->input->post('kode'),
						'nama_dosen' => $this->input->post('dosen'),
						'matkul' => $this->input->post('matkul'),
						'jurusan_jadwal' => $this->input->post('jurusan'),
						'semester_jadwal' => $this->input->post('semester'),
						'kelas_jadwal' => $this->input->post('kelas'),
						'waktu' => $this->input->post('waktu'),
						'ruangan' => $this->input->post('ruangan'),
						'status_jadwal' => 0,
						'status_mahasiswa' => 0
					];
					$dosen = [
						'kode_jadwal' => $this->input->post('kode'),
						'nama_dosen_riwayat' => $this->input->post('dosen')
					];
					$this->M_admin->tambah_dosen_riwayat($dosen);
					$this->M_admin->tambah_jadwal_dosen($data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
																  Jadwal dosen berhasil ditambahkan
																</div>');
					redirect('admin/jadwal_dosen');
				}
			}
		}

		public function detail_jadwal($id){
			$data['judul'] = 'detail jadwal dosen';
			$data['jadwal_dosen'] = $this->M_admin->get_jadwal_dosen_id($id);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/detail_jadwal', $data);
			$this->load->view('templates/user_footer');
		}

		public function ubah_jadwal($id){
			$data['judul'] = 'ubah jadwal dosen';
			$data['kode'] = $this->input->get('kode');
			$data['jad'] = $this->M_admin->get_jadwal_dosen_id($id);
			$data['dos'] = $data['jad']->email_dosen;
			$data['mat'] = $data['jad']->matkul;
			$data['rua'] = $data['jad']->ruangan;
			$data['jur'] = $data['jad']->jurusan_jadwal;
			$data['sem'] = $data['jad']->semester_jadwal;
			$data['kel'] = $data['jad']->kelas_jadwal;
			$data['jurusan'] = $this->M_admin->get_jurusan();
			$data['dosen_by_nama'] = $this->M_admin->get_dosen_by_nama();
			$data['matkul_by_nama'] = $this->M_admin->get_matkul_by_nama();
			$data['ruangan'] = $this->M_admin->get_ruangan();
			$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/ubah_jadwal', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$waktu = $this->input->post('waktu');
				$ruangan = $this->input->post('ruangan');
				$kode = $this->input->post('kode');
				$data = [
					'nama_dosen' => $this->input->post('dosen'),
					'matkul' => $this->input->post('matkul'),
					'jurusan_jadwal' => $this->input->post('jurusan'),
					'semester_jadwal' => $this->input->post('semester'),
					'kelas_jadwal' => $this->input->post('kelas')
				];
				$dosen = [
					'nama_dosen_riwayat' => $this->input->post('dosen')
				];
				$this->M_admin->ubah_dosen_riwayat($dosen, $kode);
				$this->M_admin->ubah_jadwal_dosen($data, $id);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Jadwal dosen berhasil diubah
															</div>');
				redirect('admin/jadwal_dosen');
			}
		}

		public function hapus_jadwal(){ 
			$id = $this->input->get('id');
			$kode = $this->input->get('kode');
			$this->M_admin->hapus_jadwal($id);
			$this->M_admin->hapus_absensi_mhs($kode);
			$this->M_admin->hapus_dos($kode);
			$this->M_admin->hapus_riwayat_dosen($kode);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Jadwal dosen berhasil dihapus
															</div>');
			redirect('admin/jadwal_dosen');
		}

		public function buka_jadwal($id){
			$this->M_admin->buka_jadwal($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Jadwal dosen berhasil dibuka
															</div>');
			redirect('admin/jadwal_dosen');
		}

		public function tutup_jadwal($id){
			$this->M_admin->tutup_jadwal($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Jadwal dosen berhasil ditutup
															</div>');
			redirect('admin/jadwal_dosen');
		}

		public function absensi_mahasiswa(){
			$data['id'] = $this->input->get('id');
			$data['kode'] = $this->input->get('kode');
			$data['dosen'] = $this->input->get('dosen');
			$data['judul'] = 'absensi mahasiswa';
			$data['jadwal'] = $this->M_admin->get_jadwal_dosen_id($data['id']);
			$data['mhs'] = $this->M_admin->get_absensi_mahasiswa_by_kode($data['kode']);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/absensi_mahasiswa', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_absensi_mahasiswa(){
			$data['judul'] = 'tambah absensi mahasiswa';
			$data['id'] = $this->input->get('id');
			$id = $this->input->post('id');
			$dosen = $this->input->post('dosen');
			$kode = $this->input->post('kode');
			$data['kode'] = $this->input->get('kode');
			$data['dosen'] = $this->input->get('dosen');
			$data['mhs'] = $this->M_admin->get_mahasiswa_by_nama();
			$this->form_validation->set_rules('nama', 'Mahasiswa/i', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_absensi_mahasiswa', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$mhs = $this->input->post('nama');
				$que = "SELECT * FROM absen_mahasiswa WHERE kode_jadwal='$kode' AND nama_mhs='$mhs'";
				$cek = $this->db->query($que)->row();
				$na = $cek->nama_mhs;
				if($na){
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Mahasiswa/i yang anda pilih sudah terdaftar di absen mata kuliah ini
															</div>');
					redirect('admin/tambah_absensi_mahasiswa?id='.$id.'&kode='.$kode.'&dosen='.$dosen);
				}else{
					$data = [
						'kode_jadwal' => $this->input->post('kode'),
						'nama_mhs' => $this->input->post('nama')
					];
					$this->M_admin->tambah_absensi_mahasiswa($data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
																  Mahasiswa/i di absensi '.$dosen.' berhasil ditambahkan
																</div>');
					redirect('admin/absensi_mahasiswa?id='.$id.'&kode='.$kode.'&dosen='.$dosen);
				}
			}
		}

		public function hapus_absensi_mahasiswa(){
			$id = $this->input->get('id');
			$kode = $this->input->get('kode');
			$dosen = $this->input->get('dosen');
			$id_dosen = $this->input->get('id_dosen');
			$this->M_admin->hapus_absensi_mahasiswa($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Mahasiswa/i di absensi '.$dosen.' berhasil dihapus
															</div>');
			redirect('admin/absensi_mahasiswa?id='.$id_dosen.'&kode='.$kode.'&dosen='.$dosen);
		}

		public function riwayat_absensi_dosen(){
			$data['judul'] = 'riwayat absensi dosen';
			$data['id'] = $this->input->get('id');
			$data['kode'] = $this->input->get('kode');
			$data['dosen'] = $this->M_admin->get_jadwal_dosen_id($data['id']);
			$data['absensi_dosen'] = $this->M_admin->get_absensi_dosen($data['kode']);
			$data['riwayat'] = $this->M_admin->get_riwayat_dosen($data['kode']);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/riwayat_absensi_dosen', $data);
			$this->load->view('templates/user_footer');
		}

		public function konfirmasi_absen_dosen(){
			$data['judul'] = 'konfirmasi absen mahasiswa';
			$data['konfirmasi'] = $this->M_admin->get_konfirmasi_absen_dosen();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/konfirmasi_absen_dosen', $data);
			$this->load->view('templates/user_footer');
		}

		public function konfir_absen_dosen(){
			$id = $this->input->get('id');
			$kode = $this->input->get('kode');
			$this->M_admin->konfirmasi_riwayat_dosen($kode);
			$this->M_admin->konfir_absen_dosen($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Absen berhasil dikonfirmasi
															</div>');
			redirect('admin/konfirmasi_absen_dosen');
		}

		public function tolak_absen_dosen(){
			$id = $this->input->get('id');
			$kode = $this->input->get('kode');
			$this->M_admin->tolak_absen_dosen($id);
			$this->M_admin->tolak_riwayat_dosen($kode);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Absen berhasil ditolak
															</div>');
			redirect('admin/konfirmasi_absen_dosen');
		}

	}
?>