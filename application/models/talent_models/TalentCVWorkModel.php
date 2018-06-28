<?php

	class TalentCVWorkModel extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		public function get_talent_cv_work($id_talent)
		{
			# code...
		}

		public function create_talent_cv_work($id_talent)
		{
			$data = array(
				'id_talent' => $id_talent,
				'position' => $this->input->post('position'),
				'company' => $this->input->post('company'),
				'location' => $this->input->post('location'),
				// add -01 because the day is ignored
				'work_start' => $this->input->post('work_start') . '-01',
				'work_end' => $this->input->post('work_end') . '-01',
				'description' => $this->input->post('description'),
				// 'image' => $this->input->post('image'),
			);
			
			return $this->db->insert('talent_cv_work', $data);
		}
	}