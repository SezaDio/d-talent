<?php
/**
 * Gallery model, represents course documentation galleries
 * @author Nur Hardyanto
 *
 */
class Gallery_model extends CI_Model {
	const PHOTOS_TABLE = "gallery_photos";
	
	public function get_upload_path() { return '/assets/upload/documentary/'; } // Do not forget the trailing slash
	
	/**
	 * Fetch course facilities
	 * @param int $idCourse ID course
	 * @return Object|NULL Instructor row object array. NULL if query failed
	 */
	public function get_course_documentaries($idCourse, $filterOption = null) {
		$this->db->from($this::PHOTOS_TABLE);
		$this->db->where(array($this::PHOTOS_TABLE.'.id_course' => $idCourse));
		
		if ($filterOption !== null) {
			//-- Implement custom filter here
		}
		
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		return $queryResult->result();
	}
	
	/**
	 * Increment hits photo
	 * @param int $idPhoto ID gallery photo
	 * @author Nur Hardyanto
	 */
	public function hit_article($idPhoto) {
		$this->db->where('id_photo', $idPhoto);
		$this->db->set('hits', 'hits+1', false);
		$this->db->update($this::PHOTOS_TABLE);
	}
}