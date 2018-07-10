<?php

	class CompanyUpdatesModel extends CI_Model
	{
		function construct()
		{
			parent::__construct();
		}

		public function get_all($id_company)
		{
			$this->db->select('*');
			$this->db->from('company_update');
			$this->db->where('id_company', $id_company);
			$this->db->where('status', 1);
			$this->db->order_by('created_at', 'DESC');

			return $this->db->get();
		}

		public function create($id_company, $image_filename=null)
		{
			$data = array(
				'id_company'  => $id_company,
				'title' 	  => $this->input->post('title'),
				'content' 	  => $this->input->post('content'),
				'image' 	  => $image_filename,
				'status' 	  => $this->input->post('status'),
				// 'created_at' auto fill by MySQL
			);
			
			return $this->db->insert('company_update', $data);
		}

		public function edit($id_company_update)
		{
			$query = $this->db->get_where('company_update', array('id_company_update' => $id_company_update));
			// get 1 object from query
			return $query->row();
		}

		public function update($id_company_update)
		{
			$data = array(
				'title' 	  => $this->input->post('title'),
				'content' 	  => $this->input->post('content'),
				'image' 	  => $this->input->post('image'),
				'status' 	  => $this->input->post('status'),
			);
			
			$this->db->where('id_company_update', $id_company_update);
			return $this->db->update('company_update', $data);
		}

		public function delete($id_company_update)
		{
			$this->db->where('id_company_update', $id_company_update);
			return $this->db->delete('company_update');
		}
	}