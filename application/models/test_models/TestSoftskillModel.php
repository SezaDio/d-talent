<?php

	class TestSoftskillModel extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		public function get_all()
		{
			$query = $this->db->get('test_softskill');
			return $query->result();
		}

		public function insert_batch()
		{
			// get data
			$array_category  	= $this->input->post('category[]');
			$array_sub_category = $this->input->post('sub_category[]');
			$array_statement 	= $this->input->post('statement[]');

			// create data for insert_batch
			$data = [[]];
			foreach ($array_category as $key => $category) {
				$data[$key]['category']  	= $category;
				$data[$key]['sub_category'] = $array_sub_category[$key];
				$data[$key]['statement'] 	= $array_statement[$key];
			}

			return $this->db->insert_batch('test_softskill', $data);
		}

		public function find($id_test_softskill)
		{
			$query = $this->db->get_where('test_softskill', ['id_test_softskill'=>$id_test_softskill]);
			// get 1 object from query
			return $query->row();
		}

		public function update($id_test_softskill)
		{
			$data = array(
				'category'  	=> $this->input->post('category'),
				'sub_category'  => $this->input->post('sub_category'),
				'statement' 	=> $this->input->post('statement'),
			);
			
			$this->db->where('id_test_softskill', $id_test_softskill);
			return $this->db->update('test_softskill', $data);
		}

		public function delete($id_test_softskill)
		{
			$this->db->where('id_test_softskill', $id_test_softskill);
			return $this->db->delete('test_softskill');
		}
	}