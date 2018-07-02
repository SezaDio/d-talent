<?php

	class TalentCVWorkModel extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		public function get_talent_cv_work($id_talent)
		{
			$query = $this->db->order_by('work_end', 'DESC')->get_where('talent_cv_work', array('id_talent' => $id_talent));
			return $query->result();
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

		public function edit_talent_cv_work($id_talent_cv_work)
		{
			$query = $this->db->get_where('talent_cv_work', array('id_talent_cv_work' => $id_talent_cv_work));
			// get 1 object from query
			return $query->row();
		}

		public function update_talent_cv_work($id_talent_cv_work)
		{
			$data = array(
				'position' => $this->input->post('position'),
				'company' => $this->input->post('company'),
				'location' => $this->input->post('location'),
				// add -01 because the day is ignored
				'work_start' => $this->input->post('work_start') . '-01',
				'work_end' => $this->input->post('work_end') . '-01',
				'description' => $this->input->post('description'),
				// 'image' => $this->input->post('image'),
			);
			
			$this->db->where('id_talent_cv_work', $id_talent_cv_work);
			return $this->db->update('talent_cv_work', $data);
			// return $this->db->affected_rows;
		}

		public function delete($id_talent_cv_work)
		{
			$this->db->where('id_talent_cv_work', $id_talent_cv_work);
			return $this->db->delete('talent_cv_work');
		}
	}