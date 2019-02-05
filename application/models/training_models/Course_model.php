<?php
/**
 * Course model, represents training course
 * @author Nur Hardyanto
 *
 */
class Course_model extends CI_Model {
	const COURSE_TABLE = SRV_TBL_COURSES;
	const SCHEDULE_TABLE = "schedule";

	public function get_upload_path() { return '/assets/images/course/'; } // Do not forget the trailing slash
	
	private function _apply_filter( $filterConfig ) {
		if (isset($filterConfig['type'])) {
			$this->db->where('course_type', $filterConfig['type']);
		}
		if (isset($filterConfig['visible'])) {
			if ($filterConfig['visible']) {
				$this->db->where('status', 1);
			} else {
				$this->db->where('status', 0);
			}
		}
	}
	/**
	 * Get list of courses.
	 * @return Array Array if course row object
	 */
	public function get_courses( $filterConfig = null ) {
		$this->_apply_filter( $filterConfig );
		
		$this->db->order_by('date_created');
		$query = $this->db->get($this::COURSE_TABLE);
		
		if (!$query) return NULL;
		return $query->result();
	}
	
	/**
	 * Fetch single course object row by its ID
	 * @param int $idCourse ID course
	 * @return Object|NULL Course row object. NULL if specified ID is not found
	 */
	public function get_course_by_id($idCourse) {
		$this->db->from($this::COURSE_TABLE);
		$this->db->where(array('id_course' => $idCourse));
		
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		return $queryResult->row();
	}
	
	/**
	 * Fetch single course object row by its slug
	 * @param string $courseSlug Course slug
	 * @return Object|NULL Course row object. NULL if specified ID is not found
	 */
	public function get_course_by_slug($courseSlug) {
		$this->db->from($this::COURSE_TABLE);
		$this->db->where(array('slug' => $courseSlug));
	
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		return $queryResult->row();
	}
	
	/**
	 * Save course row
	 * 
	 * @param array $courseData Course row data, field based on the database fields
	 * @param int $idCourse ID course. -1 to create new
	 * @return int|NULL Returns saved row ID if succeed, otherwise NULL
	 */
	public function save_course($courseData, $idCourse) {
		$this->db->set($courseData);
		
		$processResult = null;
		if ($idCourse > 0) {
			$this->db->where('id_course', $idCourse);
			$processResult = $this->db->update($this::COURSE_TABLE);
			$returnId = $idCourse;
		} else {
			$processResult = $this->db->insert($this::COURSE_TABLE);
			$returnId = $this->db->insert_id();
		}
		if ($processResult) {
			return $returnId;
		} return null;
	}
	
	/**
	 * Fetch course schedule
	 * @param int $idCourse Course ID
	 * @param int|array $statusFilter Status filter, or array of settings below:<br />
	 * 	<code>after</code>: MySQL formatted date, or 'now' to fetch upcoming schedules<br />
	 * @param bool $joinCourseData [Optional] Join course data. Default is TRUE
	 * @return NULL|Array Return array of row object if succeed, or NULL if query failed
	 */
	public function get_course_schedule($idCourse, $statusFilter = null, $joinCourseData = true) {
		$this->db->order_by('date_start');
		$query = $this->db->select($this::SCHEDULE_TABLE.'.*');
		
		$this->db->from ( $this::SCHEDULE_TABLE );
		
		if ($idCourse > 0) {
			$this->db->where('id_course', $idCourse);
		}
		
		if (!is_array($statusFilter) && ($statusFilter !== null)) {
			$this->db->where($this::SCHEDULE_TABLE.'.status', $statusFilter);
			
		} else if (is_array($statusFilter)) {
			//-- Custom filter...
			if (!empty($statusFilter['after'])) {
				$afterDate = date('Y-m-d H:i:s');
				if ($statusFilter['after'] != 'now') $afterDate = $statusFilter['after'];
				$this->db->where($this::SCHEDULE_TABLE.'.date_start >', $afterDate);
			}
			if (!empty($statusFilter['status'])) {
				$this->db->where($this::SCHEDULE_TABLE.'.status', $statusFilter['status']);
			}
			
		}
		if ($joinCourseData) {
			$this->db->select( $this::COURSE_TABLE.'.*' );
			$this->db->join ( $this::COURSE_TABLE, $this::SCHEDULE_TABLE.'.id_course='.$this::COURSE_TABLE.'.id_course', 'LEFT' );
		}
		
		$query = $this->db->get();
		
		if (!$query) return NULL;
		return $query->result();
	}
	
	/**
	 * Fetch single course schedule object row by its ID
	 * @param int $idSchedule ID schedule
	 * @param int $idCourse ID course. Can be NULL.
	 * @return Object|NULL Schedule row object. NULL if specified ID is not found
	 */
	public function get_schedule_by_id($idSchedule, $idCourse = null) {
		$this->db->from($this::SCHEDULE_TABLE);
		if ($idCourse !== null) $this->db->where(array('id_course' => $idCourse));
		$this->db->where(array('id_schedule' => $idSchedule));
	
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		return $queryResult->row();
	}
	
	/**
	 * Increase course hits
	 * @param int $idCourse
	 */
	public function hit_course($idCourse) {
		$this->db->where('id_course', $idCourse);
		$this->db->set('hits', 'hits+1', false);
		$this->db->update($this::COURSE_TABLE);
	}
	
}