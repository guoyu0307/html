<?php
	class ta extends CI_Controller
	{
		public function ta_registration()
		{
			$this->load->view('ta_registration');
		}
		
		public function background()
		{
			$this->load->helper('form');
			$this->load->view('tabackground');
		}

		public function to_tabackground()
		{
			$this->load->model('ta_background');
			$result = $this->ta_background->search_ta_bg($this->session->userdata('TA_ID'));
			if($result->num_rows() > 0)
			{
				foreach ($result->result() as $row) 
				{
					$data = array('New' => 0,
								  'TA_ID' => $row->TA_ID, 
					          	  'Is_UST_UG' => $row->Is_UST_UG, 
				    	          'C_Language' => $row->C_Language, 
				        	      'Java' => $row->Java,
				          	      'Python' => $row->Python,
				          	      'Algorithm' => $row->Algorithm,
				                  'Computer_Theory' => $row->Computer_Theory,
				                  'Data_base' => $row->Data_base,
				                  'Networks' => $row->Networks,
				                  'Software_Engineering' => $row->Software_Engineering,
				                  'Operating_System' => $row->Operating_System,
				                  'Graphics' => $row->Graphics,
				                  'Computer_Music' => $row->Computer_Music,
				                  'AI' => $row->AI);
					$this->load->view('tabackground', $data);
				}
				
			}
			else
			{
				$data = array('New' => 1);
				$this->load->view('tabackground', $data);
			}
			//echo '<script language="javascript">document.getElementById("c_lang").options[3].selected=true;</script>';
		}

		public function add_background()
		{
			$ta_id = $this->session->userdata('TA_ID');
			$this->load->model('ta_background');
			$result = $this->ta_background->search_ta_bg($ta_id);

			$data = array('TA_ID' => $ta_id, 
					          'Is_UST_UG' => $this->input->post('ug'), 
				    	      'C_Language' => $this->input->post('c_lang'), 
				        	  'Java' => $this->input->post('java'),
				          	  'Python' => $this->input->post('python'),
				          	  'Algorithm' => $this->input->post('algorithm'),
				              'Computer_Theory' => $this->input->post('toc'),
				              'Data_base' => $this->input->post('database'),
				              'Networks' => $this->input->post('network'),
				              'Software_Engineering' => $this->input->post('se'),
				              'Operating_System' => $this->input->post('os'),
				              'Graphics' => $this->input->post('graphics'),
				              'Computer_Music' => $this->input->post('music'),
				              'AI' => $this->input->post('ai'));

			if($result->num_rows() > 0)
			{
				$this->ta_background->update_bg($ta_id, $data);
			}
			else
			{
				$result = $this->ta_background->insert_ta_bg_AR($data);
			}
			//$this->load->view('tabackground');
			header("Location: http://localhost/html/index.php/redirect/to_tabackground");
		}

		public function list_all_ta()
		{
			$this->load->library('pagination');
			$this->load->model('ta_model');
			$this->load->helper('url');

			$config['base_url'] = base_url().'index.php/ta/list_all_ta/';
			$config['total_rows'] = $this->db->count_all('TA_Information');
			$config['per_page'] = 10;
			$config['uri_segment'] = '3';
			$config['full_tag_open'] = '<p>';
    		$config['full_tag_close'] = '</p>';
			$this->pagination->initialize($config); 

			$this->load->library('table');
    		$this->table->set_heading('Name', 'Email', 'Student ID', 'Enrollment Year', 'Enrollment Term', 'Program', 'Advisor', 'TA History', 'Comment', 'Operation');
    		
    		$results = $this->ta_model->search_all_ta($config['per_page'],$this->uri->segment(3));
    		$all_new= array();

    		foreach ($results->result() as $row) 
    		{
    			$newr = array();
    			$newr[] = $row->TA_Name;
    			$newr[] = $row->TA_Email;
    			$newr[] = $row->TA_StudentID;
    			$newr[] = $row->TA_Enrollment_Year;
    			$newr[] = $row->TA_Enrollment_Term;
    			$newr[] = $row->TA_Program;
    			$newr[] = $row->TA_Advisor;
    			$newr[] = ' ';	//TA history
    			$newr[] = $row->TA_Comment;
    			$edit = '<a href="http://localhost/html/index.php/ta/view_tabg/'.$row->TA_ID.'">view background</a>';
    			$newr[] = $edit;
    			$all_new[] = $newr;
    		}

    		$data['results'] = $all_new;
    		$this->load->view('ta_list', $data);
		}

		public function view_tabg($id)
		{
			$this->load->model('ta_background');
			$result = $this->ta_background->search_ta_bg($id);

			if ($result->num_rows() > 0)
			{
				foreach ($result->result() as $row) 
				{
					$data = array('Edited' => 1,
								  'TA_ID' => $row->TA_ID, 
					          	  'Is_UST_UG' => $row->Is_UST_UG, 
				    	          'C_Language' => $row->C_Language, 
				        	      'Java' => $row->Java,
				          	      'Python' => $row->Python,
				          	      'Algorithm' => $row->Algorithm,
				                  'Computer_Theory' => $row->Computer_Theory,
				                  'Data_base' => $row->Data_base,
				                  'Networks' => $row->Networks,
				                  'Software_Engineering' => $row->Software_Engineering,
				                  'Operating_System' => $row->Operating_System,
				                  'Graphics' => $row->Graphics,
				                  'Computer_Music' => $row->Computer_Music,
				                  'AI' => $row->AI);

					$this->load->view('view_tabg', $data);
				}
			}
			else
			{
				$data = array('Edited' => 0);
				$this->load->view('view_tabg', $data);
			}
			
		}

		public function ta_view_course()
		{
			$this->load->library('pagination');
			$this->load->model('course_offering');
			$this->load->model('course_entity');
			$this->load->helper('url');

			$config['base_url'] = base_url().'index.php/ta/ta_view_course/';
			$config['total_rows'] = $this->db->count_all('Course_Offering');
			$config['per_page'] = 10;
			$config['uri_segment'] = '3';//设为页面的参数，如果不添加这个参数分页用不了 
			$config['full_tag_open'] = '<p>';
    		$config['full_tag_close'] = '</p>';
			$this->pagination->initialize($config); 

			$this->load->library('table');
    		$this->table->set_heading('Preference', 'Course ID', 'Course Name', 'Year', 'Term', 'Lab Quota', 'Lecture Quota', 'Lab Sections', 'Lecture Sections', 'Comment');
    		
    		$results = $this->course_offering->search_all_course_offering($config['per_page'],$this->uri->segment(3));
    		$all_new= array();

    		foreach ($results->result() as $row) 
    		{
    			$newr = array();

    			$prefer =  '<select name="'.$row->Course_ID.'" style="width:auto" >
    						<option value="0">---</option>
                			<option value="1">1</option>
                			<option value="2"/>2</option>
                			<option value="3">3</option>
                			<option value="4"/>4</option>
                			<option value="5">5</option>
                			<option value="6"/>6</option>
            				</select>';
            	$newr[] = $prefer;
    			$temp = $this->course_entity->search_id($row->Course_ID);
    			$temp_OID = 0;
    			foreach ($temp->result() as $nrow) 
    			{
    				# code...
    				$temp_OID = $nrow->Course_Offical_ID;
    				$newr[] = $nrow->Course_Offical_ID;
    				$newr[] = $nrow->Course_Name;
    			}
    			$newr[] = $row->Year;
    			$newr[] = $row->Term;
    			$newr[] = $row->Lab_Quota_Avg;
    			$newr[] = $row->Lecture_Quota_Avg;
    			$newr[] = $row->Lab_Sections;
    			$newr[] = $row->Lecture_Sections;
    			$newr[] = $row->Comment;
    			//$temp = $row->Course_ID;
    			//$edit = '<a href="http://localhost/html/index.php/redirect/direct_updata_course/'.$row->Course_ID.'">edit</a>';
    			//$newr[] = $edit;


    			$all_new[] = $newr;
    		}

    		$data['results'] = $all_new;
			$this->load->view('ta_view_course', $data);
			//$this->load->view('ta_view_course');
		}

		public function ta_prefer()
		{
			//
			//
			//
			//
			//
			//
			//Select the assignment
			$all_new= array();
			/*
    		foreach ($results->result() as $row) 
    		{
    			$newr = array();
    			$temp = $this->course_entity->search_id($row->Course_ID);
    			$temp_OID = 0;
    			foreach ($temp->result() as $nrow) 
    			{
    				# code...
    				$temp_OID = $nrow->Course_Offical_ID;
    				$newr[] = $nrow->Course_Offical_ID;
    				$newr[] = $nrow->Course_Name;
    			}
    			$newr[] = $row->Year;
    			$newr[] = $row->Term;
    			$newr[] = $row->Lab_Quota_Avg;
    			$newr[] = $row->Lecture_Quota_Avg;
    			$newr[] = $row->Lab_Sections;
    			$newr[] = $row->Lecture_Sections;
    			$newr[] = $row->Comment;
    			//$temp = $row->Course_ID;
    			//$edit = '<a href="http://localhost/html/index.php/redirect/direct_updata_course/'.$row->Course_ID.'">edit</a>';
    			//$newr[] = $edit;


    			$all_new[] = $newr;
    		}
			*/
    		$data['results'] = $all_new;
			$this->load->library('table');
    		$this->table->set_heading('Course ID', 'Course Name', 'Year', 'Term', 'Lab Quota', 'Lecture Quota', 'Lab Sections', 'Lecture Sections', 'Comment');
			$this->load->view('taprefer', $data);
		}
		public function add_prefer()
		{
			$this->load->model('ta_course_pref');
			$this->load->model('course_entity');

			$ta_id = $this->session->userdata('TA_ID');
			//echo $ta_id;
			$store = array(1 => strtoupper($this->input->post('choice1')),
						   2 => strtoupper($this->input->post('choice2')),
						   3 => strtoupper($this->input->post('choice3')),
						   4 => strtoupper($this->input->post('choice4')),
						   5 => strtoupper($this->input->post('choice5')),
						   6 => strtoupper($this->input->post('choice6')));

			foreach ($store as $key => $value) 
			{
				# code...
				if($value == '')	continue;
				$course_result = $this->course_entity->search_course_OID($value);
				$course_id = 0;
				foreach ($course_result->result() as $row) 
				{
					# code...
					$course_id = $row->Course_ID;
				}
				$info = array('TA_ID' => $ta_id,
							  'Course_ID' => $course_id,
							  'Year' => '1999',
							  'Term' => 'summer',
							  'Preference' => $key);

				$result = $this->ta_course_pref->insert_ta_course($info);
			}
			
		}
	}

/*This is the end of this file*/