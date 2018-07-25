<?php

	class TestWorkAttitudeModel extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		public function get_all()
		{
			$query = $this->db->get('test_work_attitude');
			return $query->result();
		}

		public function insert_batch()
		{
			// get data
			$array_statement = $this->input->post('statement[]');

			// create data for insert_batch
			foreach ($array_statement as $key => $value) 
			{
				$data[$key]['statement'] = $array_statement[$key];
			}

			return $this->db->insert_batch('test_work_attitude', $data);
		}

		public function find($id_tes_work_attitude)
		{
			$query = $this->db->get_where('test_work_attitude', ['id_test_work_attitude'=>$id_tes_work_attitude]);
			// get 1 object from query
			return $query->row();
		}

		public function update($id_tes_work_attitude)
		{
			$data = array(
				'statement' => $this->input->post('statement'),
			);
			
			$this->db->where('id_test_work_attitude', $id_tes_work_attitude);
			return $this->db->update('test_work_attitude', $data);
		}

		public function delete($id_tes_work_attitude)
		{
			$this->db->where('id_test_work_attitude', $id_tes_work_attitude);
			return $this->db->delete('test_work_attitude');
		}
	}