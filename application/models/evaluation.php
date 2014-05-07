<?php
	/*
		This class includes the operation of evaluation in the database
	 */
	class evaluation extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function insert_evaluation($info_array)
		{
			$ins_id = $this->db->escape($info_array['Instructor_ID']);
			$course_id = $this->db->escape($info_array['Course_ID']);
			$year = $this->db->escape($info_array['Year']);
			$term = $this->db->escape($info_array['Term']);
			$ta_id = $this->db->escape($info_array['TA_ID']);
			$grade = $this->db->escape($info_array['Grade']);
			$comment = $this->db->escape($info_array['Comment']);

			$sql = "INSERT INTO Evaluation 
					(Instructor_ID, Course_ID, Year, Term, TA_ID, Grade, Comment) values
					($ins_id, $course_id, $year, $term, $ta_id, $grade, $comment)";

			return $this->db->query($sql);
		}

		public function insert_evaluation_AR($info_array)
		{
			return $this->db->insert('Evaluation', $info_array);
		}

		public function search_eva($field, $value)
		{
			$sql = "SELECT * FROM Evaluation WHERE $field = ?";
			$result = $this->db->query($sql, array($value));
			return $result;
		}
	}
/*This is the end of this file*/