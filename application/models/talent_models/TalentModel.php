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

	}