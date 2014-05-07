<?php
	/*
		This class includes the course-instructor match information in database
	 */
	class instructor_course extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function insert_course_ins($info_array)
		{
			$course_id = $this->db->escape($info_array['Course_ID']);
			$year = $this->db->escape($info_array['Year']);
			$term = $this->db->escape($info_array['Term']);
			$ins_ID = $this->db->escape($info_array['Instructor_ID']);

			$sql = "INSERT INTO Instructor_Course
					(Course_ID, Year, Term, Instructor_ID) values
					($course_id, $year, $term, $ins_ID)";

			return $this->db->query($sql);
		}

		public function insert_course_ins_AR($info_array)
		{
			return $this->db->insert('Instructor_Course', $info_array);
		}

		public function search_ins_id($id, $year, $term)
		{
			$sql = "SELECT * FROM Instructor_Course WHERE Course_ID = ? AND Year = ? AND Term = ?";
			$result = $this->db->query($sql, array($id, $year, $term));

			return $result;
		}

	}
/*This is the end of this file*/