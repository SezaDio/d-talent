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
			$work_start	= $this->input->post('work_start');
			$work_end	= $this->input->post('work_end');

			$data = array(
				'id_talent' => $id_talent,
				'position' => $this->input->post('position'),
				'company' => $this->input->post('company'),
				'id_location' => $this->input->post('id_location'),
				// add -01 because the day is ignored
				'work_start' => !empty($work_start) ? $work_start.'-01' : null,
				'work_end' => !empty($work_end) ? $work_end.'-01' : null,
				'description' => $this->input->post('description'),
			);
			
			return $this->db->insert('talent_cv_work', $data);
		}

		public function edit_talent_cv_work($id_talent, $id_talent_cv_work)
		{
			$query = $this->db->get_where('talent_cv_work', array('id_talent'=>$id_talent, 'id_talent_cv_work' => $id_talent_cv_work));
			// get 1 object from query
			return $query->row();
		}

		public function update_talent_cv_work($id_talent, $id_talent_cv_work)
		{
			$work_start	= $this->input->post('work_start');
			$work_end	= $this->input->post('work_end');

			$data = array(
				'position' => $this->input->post('position'),
				'company' => $this->input->post('company'),
				'id_location' => $this->input->post('id_location'),
				// add -01 because the day is ignored
				'work_start' => !empty($work_start) ? $work_start.'-01' : null,
				'work_end' => !empty($work_end) ? $work_end.'-01' : null,
				'description' => $this->input->post('description'),
			);
			
			$this->db->where('id_talent', $id_talent);
			$this->db->where('id_talent_cv_work', $id_talent_cv_work);
			return $this->db->update('talent_cv_work', $data);
			// return $this->db->affected_rows;
		}

		public function delete($id_talent, $id_talent_cv_work)
		{
			$this->db->where('id_talent', $id_talent);
			$this->db->where('id_talent_cv_work', $id_talent_cv_work);
			return $this->db->delete('talent_cv_work');
		}
	}