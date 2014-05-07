<?php
	class setting extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function getConfig()
		{
			$sql = "SELECT * FROM System_Setting";
			$result = $this->db->query($sql);

			$config_result = array();

			foreach ($result->result() as $row) 
			{
				# code...
				$config_result['Release'] = $row->Release;
				$config_result['Timedisplay'] = $row->Timedisplay;
				$config_result['Year'] = $row->Year;
				$config_result['Term'] = $row->Term;
			}

			return $config_result;
		}
	}

/*This is the end of this file*/