<?php
	/*
		This class includes the operation of course entity in the database
	 */
	class course_entity extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		/*Insert course information by normal method*/
		public function insert_course($info_array)
		{
			//$course_id = $this->db->escape($info_array['Course_ID']);
			$course_offical_ID = $this->db->escape($info_array['Course_Offical_ID']);
			$course_used_id = $this->db->escape($info_array['Course_Used_ID']);
			$name = $this->db->escape($info_array['Course_Name']);
			$credits = $this->db->escape($info_array['Credits']);
			$comment = $this->db->escape($info_array['Comment']);

			$sql = "INSERT INTO Course_Information
					(Course_Offical_ID, Course_Used_ID, Course_Name, Credits, Comment) values
					($course_offical_ID, $course_used_id, $name, $credits, $comment)";
			
			return $this->db->query($sql);

		}

		/*Insert course information by AR method*/
		public function insert_course_AR($info_array)
		{
			return $this->db->insert('Course_Information', $info_array);
		}

		/*search course by ID*/
		public function search_course_ID($id)
		{
			$sql = "SELECT * FROM Course_Information WHERE Course_ID = ?";
			$result = $this->db->query($sql, array($id));

			return $result;
		}

		/*search course by offical ID*/
		public function search_course_OID($id)
		{
			$sql = "SELECT * FROM Course_Information WHERE Course_Offical_ID = ?";
			$result = $this->db->query($sql, array($id));

			return $result;
		}

		public function search_all_course($num, $offset)
		{
			//$query = $this->db->get('Course_Information', $num, $offset);
			if($offset == null)	$offset = 0;   
			$sql = "SELECT * FROM Course_Information LIMIT $offset, $num";
			$query = $this->db->query($sql);
    		return $query;
		}

		public function search_id($course_id)
		{
			$sql = "SELECT Course_Offical_ID, Course_Name FROM Course_Information WHERE Course_ID = ?";
			$result = $this->db->query($sql, array($course_id));

			return $result;
		}

		public function update_course($id, $data)
		{
			$this->db->where('Course_ID', $id);
			return $this->db->update('Course_Information', $data);
		}

		public function get_all()
		{
			$sql = "SELECT * FROM Course_Information";
			$result = $this->db->query($sql);

			return $result;
		}
	}
/*This is the end of this file*/