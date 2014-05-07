<?php
	
	class test extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//include('FirePHPCore-0.3.2/lib/FirePHPCore/fb.php');
			//FB::log($this);
			$this->load->model('ta_model');
			$this->load->model('ta_background');
			//$this->load->database();
		}

		public function index()
		{
			include('FirePHPCore-0.3.2/lib/FirePHPCore/fb.php');
			
			/*
			$data = array('Instructor_Name' => 'a""r',
				          'Instructor_Email' => '111117',
				          'Instructor_Password' => '199032312323207');

			$result = $this->instructor_reg_model->insert_instructor($data);
			
			echo $result;
			*/
			//echo $data['Instructor_Name'];
			//$test = $this->db->escape($data['Instructor_Name']);
			//echo $data['Instructor_Name'];
			//echo $test;
			
			$data = array('TA_Name' => 'guoyu',
						  'TA_Email' => 'leung@ust.hk',
						  'TA_Password' => '12345678',
						  'TA_StudentID' => '20145123',
						  'TA_Enrollment_Year' => '2014',
						  'TA_Enrollment_Term' => 'Summer',
						  'TA_Program' => 'cse',
						  'TA_Advisor' => 'david',
						  'TA_Comment' => 'this is the comment');
			
			$result = $this->ta_model->insert_ta($data);
			echo $result;
		}

		public function add_bg()
		{
			$data = array('TA_ID' => 1, 
				          'Is_UST_UG' => 1, 
				          'C_Language' => 0, 
				          'Java' => 1,
				          'Python' => 2,
				          'Algorithm' => 3,
				          'Computer_Theory' => 0,
				          'Data_base' => 1,
				          'Networks' => 2,
				          'Software_Engineering' => 3,
				          'Operating_System' => 0,
				          'Graphics' => 1,
				          'Computer_Music' => 2,
				          'AI' => 3);
			$result = $this->ta_background->insert_ta_bg_AR($data);
			echo $result;
		}

		public function search_bg($id)
		{
			$result = $this->ta_background->search_ta_bg($id);
			foreach ($result->result() as $row) 
			{
				echo $row->TA_ID;
				echo $row->Java;
			}
		}

		public function search_ta($id)
		{
			$result = $this->ta_model->search_TA($id);
			foreach ($result->result() as $row) 
			{
				echo $row->TA_ID;
				echo $row->TA_Name;
			}
		}

		public function search_course($id)
		{
			$this->load->model('course_entity');
			$result = $this->course_entity->search_course_ID($id);
			foreach ($result->result() as $row) 
			{
				# code...
				echo $row->Course_Offical_ID;
				echo $row->Credits;
			}
		}

		public function search_course_off($type, $value)
		{
			$this->load->model('course_offering');
			$result = $this->course_offering->search_courseOff_ID($type, $value);
			foreach ($result->result() as $row ) 
			{
				# code...
				echo $row->Course_ID;
				echo $row->Year;
				echo $row->Term;
			}
		}

		public function search_eva($field, $value)
		{
			$this->load->model('evaluation');
			$result = $this->evaluation->search_eva($field, $value);
			foreach ($result->result() as $row) 
			{
				# code...
				echo $row->Course_ID;
				echo $row->Grade;
			}
		}
		public function escape_data(&$info)
		{
			foreach ($info as $key => $value)
			{
				$value = $this->db->escape($value);
				$info[$key] = $value;
			}
			
			return $info;
		}

		public function test()
		{
			$data = array('TA_Name' => 'Leung leang',
						  'TA_Email' => 'leung@ust.hk',
						  'TA_Password' => '12345678',
						  'TA_StudentID' => '20145123',
						  'TA_AvailableTime' => '1.2',
						  'TA_EnrollmentTime' => '20140304',
						  'TA_Program' => 'cse',
						  'TA_Advisor' => 'david',
						  'TA_Description' => 'te dife eir ');
			//$this->load->model('registration_model');
			//$this->registration_model->escape_data($data);
			
			foreach ($data as $key => $value)
			{
				$value = $this->db->escape($value);
				$data['$key'] = $value;
			}

			/*
			$table = 'test';
			$sql = 'insert into '.$table.'(';
			foreach($data as $key=>$value)
			{
				$sql = $sql.$key.',';
			}
			$sql = rtrim($sql, ',');
			$sql = $sql.') values (';
			foreach ($data as $key => $value) 
			{
				# code...
				$sql = $sql.$value.',';
			}
			$sql = rtrim($sql, ',');
			$sql = $sql.')';
			echo $sql;
			*/
			
		}

		public function insert_admin()
		{
			$data = array('Account' => 'GUOYU',
				  		  'Password' => '1234567',
				  		  'Email' => '123@ust.com');
			$this->load->model('administrator');
			$result = $this->administrator->insert_admin($data);
			echo $result;
		}

		public function insert_course()
		{
			$data = array('Course_ID' => 1,
				          'Course_Offical_ID' => 'CSIT2123',
						  'Course_Used_ID' => 'cs2323',
						  'Course_Name' => 'computer graphics',
						  'Credits' => '4',
						  'Comment' => 'this is new');
			$this->load->model('course_entity');
			$result = $this->course_entity->insert_course($data);
			echo $result;
		}

		public function insert_offer()
		{
			$data = array('Course_ID' => 2,
						  'Year' => '1993',
						  'Term' => 'Spring',
						  'Lab_Quota_Avg' => 50,
						  'Lecture_Quota_Avg' => 50,
						  'Lab_Sections' => 2,
						  'Lecture_Sections' => 2,
						  'Comment' => "This is first");
			$this->load->model('course_offering');
			$result = $this->course_offering->insert_course_offering($data);
			echo $result;
		}

		public function insert_eva()
		{
			$data = array('Instructor_ID' => 1,
						  'Course_ID' => 2,
						  'Year' => '1111',
						  'Term' => 'Spring',
						  'TA_ID' => 1,
						  'Grade' => 'A+',
						  'Comment' => 'Tese');
			$this->load->model('evaluation');
			$result = $this->evaluation->insert_evaluation_AR($data);
			echo $result;
		}

		public function insert_cou_ins()
		{
			$data = array('Course_ID' => 1,
						  'Year' => '1999',
						  'Term' => 'Spring',
						  'Instructor_ID' => 1);
			$this->load->model('instructor_course');
			$result = $this->instructor_course->insert_course_ins($data);
			echo $result;
		}

		public function insert_ins_ta()
		{
			$data = array('TA_ID' => 1,
						  'Instructor_ID' => 1,
						  'Course_ID' => 1,
						  'Year' => '1111',
						  'Term' => 'summer',
						  'Preference' => 3);
			$this->load->model('instructor_TA_Pref');
			$result = $this->instructor_TA_Pref->insert_ins_ta($data);
			echo $result;
		}

		public function insert_ta_course()
		{
			$data = array('TA_ID' => 1,
						  'Course_ID' => 1,
						  'Year' => '1993',
						  'Term' => 'Winter',
						  'Preference' => 2);
			$this->load->model('ta_course_pref');
			$result = $this->ta_course_pref->insert_ta_course($data);
			echo $result;
		}
	}