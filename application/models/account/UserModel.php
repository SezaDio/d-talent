<?php

	class UserModel extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		// Cek keberadaan user di sistem
		function check_user_account($username, $password)
		{
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			return $this->db->get();
		}

		//Mengambil data user
		function get_user($id_user)
		{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('id_user', $id_user);

			return $this->db->get();
		}
		
		// Cek keberadaan user di sistem
		function check_member_account($email, $password)
		{
			$this->db->select('*');
			$this->db->from('member');
			$this->db->where('email', $email);
			$this->db->where('password', md5($password));

			return $this->db->get();
		}

		//Mengambil data user
		function get_member($id_member)
		{
			$this->db->select('*');
			$this->db->from('member');
			$this->db->where('id_member', $id_member);

			return $this->db->get();
		}

	}
