<?php
	class ta extends CI_Controller
	{
		public function ta_registration()
		{
			$this->load->view('ta_registration');
		}
		
		public function new_ta()
		{
			$this->load->model('ta_model');
			$info_array = array('TA_Name' => $this->input->post('name'),
								'TA_Email' => $this->input->post('email'),
								'TA_Password' => $this->input->post('password'),
								'TA_StudentID' => $this->input->post('student_id'),
								'TA_Enrollment_Year' => $this->input->post('year'),
								'TA_Enrollment_Term' => $this->input->post('term'),
								'TA_Program' => $this->input->post('program'),
								'TA_Advisor' => $this->input->post('advisor'),
								'TA_Comment' => $this->input->post('comment'));
			if($this->ta_model->insert_ta($info_array))
			{
				header("Location: http://localhost/html/index.php/welcome");
			}
		}

		public function add_ta()
		{

			$this->load->model('ta_model');
			$info_array = array('TA_Name' => $this->input->post('name'),
								'TA_Email' => $this->input->post('email'),
								'TA_Password' => $this->input->post('email'),
								'TA_StudentID' => $this->input->post('id'),
								'TA_Enrollment_Year' => $this->input->post('year'),
								'TA_Enrollment_Term' => $this->input->post('term'),
								'TA_Program' => $this->input->post('program'),
								'TA_Advisor' => $this->input->post('advisor'),
								'TA_Comment' => $this->input->post('comment'));
			if($this->ta_model->insert_ta($info_array))
			{
				header("Location: http://localhost/html/index.php/ta/direct_add_ta");
			}
		}

		public function direct_add_ta()
		{
			$this->load->view('add_ta');
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

		public function ta_course()
		{
			$this->load->model('setting');
			$sys_config = $this->setting->getConfig();
			if($sys_config['Release'] == 'yes')
			{
				$this->ta_view_result();
			}
			else
			{
				$this->ta_view_course();
			}
		}

		public function ta_view_result()
		{
			$this->load->model('assignment_model');
			$this->load->model('instructor_model');
			$this->load->model('course_entity');
			$this->load->model('setting');
			$this->load->model('course_offering');
			$this->load->model('instructor_course');

			$sys_config = $this->setting->getConfig();

			$this->load->library('table');
    		$this->table->set_heading('Course ID', 'Course Name', 'Year', 'Term', 'Instructor');

    		$all_new = array();
    		$result = $this->assignment_model->search_assignment_ta($sys_config['Year'], $sys_config['Term'], $this->session->userdata['TA_ID']);

    		foreach ($result->result() as $row) 
    		{
    			# code...
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
    			$newr[] = $sys_config['Year'];
    			$newr[] = $sys_config['Term'];

    			//Instructor
    			$ins_result = $this->instructor_course->search_ins_id($row->Course_ID, $row->Year, $row->Term);
    			if($ins_result->num_rows() < 1)
    			{
    				$newr[] = 'Not Decided';
    			}
    			else
    			{
    				foreach ($ins_result->result() as $kkk) 
    				{
    					$result_ins_name = $this->instructor_model->search_instructor($kkk->Instructor_ID);
    					foreach ($result_ins_name->result() as $key) 
    					{
    						$newr[] = $key->Instructor_Name;
    					}
    				}
    			}
    			
    			$all_new[] = $newr;
    		}

    		$data['results'] = $all_new;
			$this->load->view('ta_view_course', $data);
		}

		public function ta_view_course()
		{
			$this->load->model('course_offering');
			$this->load->model('course_entity');
			$this->load->model('setting');
			$this->load->model('instructor_course');
			$this->load->model('instructor_model');

			$sys_config = $this->setting->getConfig();

			$this->load->library('table');
    		$this->table->set_heading('Preference', 'Course ID', 'Course Name', 'Year', 'Term', 'Instructor', 'Lab Quota', 'Lecture Quota', 'Lab Sections', 'Lecture Sections', 'Comment');
    		
    		$results = $this->course_offering->search_all_course_offering($sys_config['Year'], $sys_config['Term']);
    		$all_new= array();

    		foreach ($results->result() as $row) 
    		{
    			$newr = array();

    			$temp = $this->course_entity->search_id($row->Course_ID);
    			$temp_OID = 0;
    			$temp_name = '';
    			foreach ($temp->result() as $nrow) 
    			{
    				# code...
    				$temp_OID = $nrow->Course_Offical_ID;
    				$temp_name = $nrow->Course_Name;
    			}
            	$prefer = '<button class="btn btn-primary" id="'.$row->Course_ID.'" name="'.$temp_OID.'" onClick="getInnerHTML(this.id, this.name)">Select</button>';

            	$newr[] = $prefer;
    			$newr[] = $temp_OID;
    			$newr[] = $temp_name;
    			$newr[] = $row->Year;
    			$newr[] = $row->Term;

    			//Instructor
    			$ins_result = $this->instructor_course->search_ins_id($row->Course_ID, $row->Year, $row->Term);
    			if($ins_result->num_rows() < 1)
    			{
    				$newr[] = 'Not Decided';
    			}
    			else
    			{
    				foreach ($ins_result->result() as $kkk) 
    				{
    					$result_ins_name = $this->instructor_model->search_instructor($kkk->Instructor_ID);
    					foreach ($result_ins_name->result() as $key) 
    					{
    						$newr[] = $key->Instructor_Name;
    					}
    				}
    			}

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
			$ta_id = $this->session->userdata['TA_ID'];
			$input_array = $this->input->post();

			$this->load->model('setting');
			$this->load->model('ta_course_pref');

			$sys_config = $this->setting->getConfig();

			foreach ($input_array as $key => $value) 
			{
				if($value == '0')	continue;

				if($this->ta_course_pref->exist($ta_id, $key, $sys_config['Year'], $sys_config['Term']))
				{
					//if the ta has selected this course
					continue;
				}
				else
				{
					$info = array('TA_ID' => $ta_id,
								  'Course_ID' => $key,
								  'Year' => $sys_config['Year'],
								  'Term' => $sys_config['Term'],
								  'Preference' => $value);
					$result = $this->ta_course_pref->insert_ta_course($info);
				}
			}

			echo 'succeed';
	
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