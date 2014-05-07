<?php
	class registration_model extends CI_Model
	{
		public function __constract()
		{
			$this->load->database();
		}

		/*conver the data to aovide the SQL inject*/
		public function escape_data(&$info)
		{
			foreach ($info as $key => $value)
			{
				$value = $this->db->escape($value);
				$info[$key] = $value;
			}

		}

		/*Insert information by active record method*/
		public function insert_DB_data_AR($info_array, $table)
		{
			$this->escape_data($info_array);

			$this->db->insert($table, $info_array);

			if ($this->db->affected_row() == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/*Generate the SQL for data and table*/
		public function generate_sql($info_array, $table)
		{
			$this->escape_data($info_array);

			$sql = 'insert into '.$table.' (';
			foreach ($info_array as $key => $value) 
			{
				$sql = $sql.$key.',';
			}
			$sql = rtrim($sql, ',');
			$sql = $sql.') values (';
			foreach ($info_array as $key => $value) 
			{
				# code...
				$sql = $sql.$value.',';
			}
			$sql = rtrim($sql, ',');
			$sql = $sql.')';

			return $sql;
		}

		/*Insert Information by normal method*/
		public function insert_DB_data($info_array, $table)
		{
			$sql = generate_sql($info_aray, $table);
			$this->db->query($sql);
			
			if ($this->db->affected_row() == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

	}

/*This is the end of this file*/
/*This is the base class of data insertion*/