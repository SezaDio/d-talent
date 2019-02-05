<?php
/**
 * Course model, represents training course
 * @author Nur Hardyanto
 *
 */
class Instructor_model extends CI_Model {
	const INSTRUCTOR_TABLE = "instructors";
	const COURSE_ASSIGN_TABLE = "course_instructor_assign";
	
	public function get_upload_path() { return '/assets/images/trainer/'; } // Do not forget the trailing slash
	
	/**
	 * Fetch course instructors
	 * @param int $idCourse ID course
	 * @return Array|NULL Instructor row object array. NULL if query failed
	 */
	public function get_course_instructors($idCourse, $statusFilter = null) {
		$this->db->from($this::COURSE_ASSIGN_TABLE);
		$this->db->where(array($this::COURSE_ASSIGN_TABLE.'.id_course' => $idCourse));
		
		if ($statusFilter !== null) {
			$this->db->where(array($this::INSTRUCTOR_TABLE.'.status' => $statusFilter));
		}
		
		$this->db->join($this::INSTRUCTOR_TABLE, $this::INSTRUCTOR_TABLE.'.id_instructor='.$this::COURSE_ASSIGN_TABLE.'.id_instructor');
		
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		return $queryResult->result();
	}
	
	/**
	 * Fetch single instuctor object row by its ID
	 * @param int $idTrainer ID instructor
	 * @return Object|NULL Instructor row object. NULL if specified ID is not found
	 */
	public function get_instructor_by_id($idTrainer) {
		$this->db->from($this::INSTRUCTOR_TABLE);
		$this->db->where(array('id_instructor' => $idTrainer));
	
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		return $queryResult->row();
	}
	
	/**
	 * Fetch single instuctor object row by its slug
	 * @param string $trainerSlug instructor slug
	 * @return Object|NULL Instructor row object. NULL if specified ID is not found
	 */
	public function get_instructor_by_slug($trainerSlug) {
		$this->db->from($this::INSTRUCTOR_TABLE);
		$this->db->where(array('slug' => $trainerSlug));
	
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		return $queryResult->row();
	}
	
	
	/**
	 * Fetch courses by the trainer
	 * @param int $idTrainer ID instructor
	 * @return Array|NULL Course row object array. NULL if query failed
	 */
	public function get_courses_by_instructor($idTrainer) {
		$this->db->from($this::COURSE_ASSIGN_TABLE);
		$this->db->where(array($this::COURSE_ASSIGN_TABLE.'.id_instructor' => $idTrainer));
	
		$this->db->join(SRV_TBL_COURSES, $this::COURSE_ASSIGN_TABLE.'.id_course='.SRV_TBL_COURSES.'.id_course');
		
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		
		return $queryResult->result();
	}
	
	
	/**
	 * Increase instructor hits
	 * @param int $idTrainer
	 */
	public function hit_instructor($idTrainer) {
		$this->db->where('id_instructor', $idTrainer);
		$this->db->set('hits', 'hits+1', false);
		$this->db->update($this::INSTRUCTOR_TABLE);
	}
}