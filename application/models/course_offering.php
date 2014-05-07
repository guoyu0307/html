<?php
	/*
		This class includes the operating of course offering in database
	 */
	class course_offering extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function insert_course_offering($info_array)
		{
			$course_id = $this->db->escape($info_array['Course_ID']);
			$year = $this->db->escape($info_array['Year']);
			$term = $this->db->escape($info_array['Term']);
			$lab_quota = $this->db->escape($info_array['Lab_Quota_Avg']);
			$lecture_quota = $this->db->escape($info_array['Lecture_Quota_Avg']);
			$lab_section = $this->db->escape($info_array['Lab_Sections']);
			$lecture_section = $this->db->escape($info_array['Lecture_Sections']);
			$comment = $this->db->escape($info_array['Comment']);

			$sql = "INSERT INTO Course_Offering
					(Course_ID, Year, Term, Lab_Quota_Avg, Lecture_Quota_Avg, Lab_Sections, Lecture_Sections, Comment) values
					($course_id, $year, $term, $lab_quota, $lecture_quota, $lab_section, $lecture_section, $comment)";

			return $this->db->query($sql);
		}

		public function insert_course_offering_AR($info_array)
		{
			return $this->db->insert('Courser_Offering', $info_array);
		}

		public function search_courseOff_ID($id, $year, $term)
		{
			$sql = "SELECT * FROM Course_Offering WHERE Course_ID = ? AND Year = ? AND Term = ?";
			$result = $this->db->query($sql, array($id, $year, $term));

			return $result;
		}

		public function serarch_courseoff($id, $year, $term)
		{
			$sql = "SELECT * FROM Course_Offering WHERE Course_ID = ? AND Year = ? AND Term = ?";
			$result = $this->db->query($sql, array($id, $year, $term));

			return $result;
		}

		public function search_all_course_offering($num, $offset)
		{
			if($offset == null)	$offset = 0;
			$sql = "SELECT * FROM Course_Offering LIMIT $offset, $num";
			$query = $this->db->query($sql);
    		return $query;
		}

		public function update_course_offering($id, $year, $term, $data)
		{
			$this->db->where('Course_ID', $id);
			$this->db->where('Year', $year);
			$this->db->where('Term', $term);
			return $this->db->update('Course_Offering', $data);
		}
	}
/*This is the end of this file*/