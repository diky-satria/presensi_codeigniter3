<?php 

	class M_user extends CI_Model{

		public function tambah_user($user){
			return $this->db->insert('user', $user);
		}

		public function ubah_user($user, $email){
			$this->db->set('nama_user', $user);
			$this->db->where('email_user', $email);
			return $this->db->update('user');
		}

		public function hapus_user($email){
			return $this->db->delete('user', ['email_user' => $email]);
		}

		public function buka_access_user($email){
			$this->db->set('status', 1);
			$this->db->where('email_user', $email);
			return $this->db->update('user');
		}

	}

 ?>