<?php

	class TalentModel extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		public function find($id_talent)
		{
			$query = $this->db->get_where('talent', array('id_talent' => $id_talent));
			return $query->row();
		}

		public function updateProfile($id_talent, $foto_sampul_filename=null, $foto_profil_filename=null)
		{
			$data = array(
				'foto_sampul'   => $foto_sampul_filename,
				'foto_profil'   => $foto_profil_filename,
				'kemampuan' 	=> $this->input->post('kemampuan'),
				'tentang_saya' 	=> $this->input->post('tentang_saya'),
			);
			
			$this->db->where('id_talent', $id_talent);
			return $this->db->update('talent', $data);
		}

		public function checkPassword($id_talent, $password)
		{
			$this->db->select('*');
			$this->db->from('talent');
			$this->db->where('id_talent', $id_talent);
			$this->db->where('password', md5($password));

			return $this->db->get();
		}

		public function updatePassword($id_talent, $new_password)
		{
			$password = md5($new_password);
			$data = array(
				'password'   => $password
			);
			
			$this->db->where('id_talent', $id_talent);
			return $this->db->update('talent', $data);
		}

		public function updateAccount($id_talent)
		{
			$data = array(
				'nama' 			=> $this->input->post('nama'),
				'email' 		=> $this->input->post('email'),
				'nomor_ponsel' 	=> $this->input->post('nomor_ponsel'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'id_kota' 		=> $this->input->post('id_kota'),
				'id_provinsi' 	=> $this->input->post('id_provinsi')
			);
			
			$this->db->where('id_talent', $id_talent);
			return $this->db->update('talent', $data);
		}
	}