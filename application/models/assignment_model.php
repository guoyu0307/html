 <?php
	class assignment_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function insert_assignment($info_array)
		{
			return $this->db->insert('Assignment', $info_array);
		}

		public function search_all_assignment($num, $offset)
		{
			if($offset == null)	$offset = 0;   
			$sql = "SELECT * FROM Assignment LIMIT $offset, $num";
			$query = $this->db->query($sql);
    		return $query;
		}

		public function search_assignment($year, $term, $ins)
		{
			$sql = "SELECT * FROM Assignment WHERE Year = ? AND Term = ? AND Instructor_ID = ?";
			$query = $this->db->query($sql, array($year, $term, $ins));
    		return $query;
		}
	}

/*This is the end of this file*/