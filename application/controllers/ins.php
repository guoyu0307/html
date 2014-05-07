<?php
	class ins extends CI_Controller
	{
		public function ins_registration()
		{
			$this->load->view('ins_registration');
		}
		
		public function view_ta()
		{
			//$this->load->view('ins_view_ta');
			$this->load->library('pagination');
			$this->load->model('ta_model');
			$this->load->helper('url');

			$config['base_url'] = base_url().'index.php/ta/list_all_ta/';
			$config['total_rows'] = $this->db->count_all('TA_Information');
			$config['per_page'] = 10;
			$config['uri_segment'] = '3';//设为页面的参数，如果不添加这个参数分页用不了 
			$config['full_tag_open'] = '<p>';
    		$config['full_tag_close'] = '</p>';
			$this->pagination->initialize($config); 

			$this->load->library('table');
    		$this->table->set_heading('Pregerence', 'Name', 'Email', 'Student', 'Enrollment Year', 'Enrollment Term', 'Program', 'Advisor', 'Comment', 'Operation');
    		
    		$results = $this->ta_model->search_all_ta($config['per_page'],$this->uri->segment(3));
    		$all_new= array();

    		foreach ($results->result() as $row) 
    		{
    			$newr = array();
    			$prefer =  '<select name="'.$row->TA_ID.'" style="width:auto" >
    						<option value="0">---</option>
                			<option value="1">1</option>
                			<option value="2"/>2</option>
                			<option value="3">3</option>
                			<option value="4"/>4</option>
                			<option value="5">5</option>
                			<option value="6"/>6</option>
            				</select>';
    			$newr[] = $prefer;
    			$newr[] = $row->TA_Name;
    			$newr[] = $row->TA_Email;
    			$newr[] = $row->TA_StudentID;
    			$newr[] = $row->TA_Enrollment_Year;
    			$newr[] = $row->TA_Enrollment_Term;
    			$newr[] = $row->TA_Program;
    			$newr[] = $row->TA_Advisor;
    			$newr[] = $row->TA_Comment;
    			$edit = '<a href="http://localhost/html/index.php/ta/view_tabg/'.$row->TA_ID.'">view background</a>';
    			$edit_2 = '<a href="http://localhost/html/index.php/ins/view_ta_eva/'.$row->TA_ID.'">view evaluation</a>';
    			$newr[] = $edit.'</br>'.$edit_2;
    			$all_new[] = $newr;
    		}


    		$data['results'] = $all_new;
    		$this->load->view('ins_view_ta', $data);
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

		public function add_prefer()
		{
			$input_array = $this->input->post();
			var_dump($input_array);
		}

		public function view_evaluation()
		{
			$this->load->model('setting');
			$this->load->model('assignment_model');
			$this->load->model('course_entity');
			$this->load->model('ta_model');

			$config_result = $this->setting->getConfig();

			$ins_ID = $this->session->userdata('Instructor_ID');

			$result = $this->assignment_model->search_assignment($config_result['Year'], $config_result['Term'], $ins_ID);

			$this->load->library('table');
    		$this->table->set_heading('Course ID', 'Course Name', 'Year', 'Term', 'TA Name', 'TA Email', 'Operation');
    		
    		$all_new= array();

    		foreach ($result->result() as $row) 
    		{
    			$newr = array();
    			$result_course = $this->course_entity->search_course_ID($row->Course_ID);
    			foreach ($result_course->result() as $row1) 
    			{
    				# code...
    				$newr[] = $row1->Course_Offical_ID;
    				$newr[] = $row1->Course_Name;
    			}

    			$newr[] = $row->Year;
    			$newr[] = $row->Term;

    			$result_ta = $this->ta_model->search_TA($row->TA_ID);
    			foreach ($result_ta->result() as $row1) 
    			{
    				# code...
    				$newr[] = $row1->TA_Name;
    				$newr[] = $row1->TA_Email;
    			}

    			$op = '<a href="http://localhost/html/index.php/ins/add_evaluation/'.$row->TA_ID.'/'.$ins_ID.'/'.$row->Course_ID.'/'.$config_result['Year'].'/'.$config_result['Term'].'">Add Evaluation</a>';
    			$newr[] = $op;
    			$all_new[] = $newr;
    		}

    		$data['results'] = $all_new;
    		$this->load->view('evaluation', $data);
		}

		public function add_evaluation($ta_id, $ins_id, $course_ID, $year, $term)
		{
			$data = array('Instructor_ID' => $ins_id,
						  'TA_ID' => $ta_id,
						  'Course_ID' => $course_ID,
						  'Year' => $year,
						  'Term' => $term);

			$this->load->view('add_evaluation', $data);
		}

		public function insert_evaluation()
		{
			$grade = array('excellent' => 'A','good' => 'B', 'satisfying' => 'C', 'poor' => 'D');
			$info = array('Instructor_ID' => $this->input->post('Instructor_ID'),
						  'Course_ID' => $this->input->post('Course_ID'),
						  'Year' => $this->input->post('Year'),
						  'Term' => $this->input->post('Term'),
						  'TA_ID' => $this->input->post('TA_ID'),
						  'Grade' => $grade[$this->input->post('rating')],
						  'Comment' => $this->input->post('comment'));

			$this->load->model('evaluation');
			if($this->evaluation->insert_evaluation($info))
			{
				header("Location: http://localhost/html/index.php/ins/view_evaluation");
			}
		}

		public function view_ta_eva($ta_id)
		{
			$this->load->model('evaluation');
			$this->load->model('course_entity');
			$result = $this->evaluation->search_eva('TA_ID', $ta_id);
			$this->load->library('table');
    		$this->table->set_heading('Course ID', 'Course Name', 'Year', 'Term', 'Grade', 'Comment');
			$all_new= array();

			foreach ($result->result() as $row) 
			{
				# code...
				$newr = array();
    			$result_course = $this->course_entity->search_course_ID($row->Course_ID);
    			foreach ($result_course->result() as $row1) 
    			{
    				# code...
    				$newr[] = $row1->Course_Offical_ID;
    				$newr[] = $row1->Course_Name;
    			}
    			$newr[] = $row->Year;
    			$newr[] = $row->Term;
    			$newr[] = $row->Grade;
    			$newr[] = $row->Comment;

    			$all_new[] = $newr;
			}
			$data['results'] = $all_new;
			$this->load->view('view_ta_eva', $data);
		}

		public function search_ta()
		{
			$this->load->library('pagination');

			$this->load->helper('url');

			$config['base_url'] = base_url().'index.php/ta/list_all_ta/';
			//$config['total_rows'] = $this->db->count_all('TA_Information');
			$config['per_page'] = 10;
			$config['uri_segment'] = '3';//设为页面的参数，如果不添加这个参数分页用不了 
			$config['full_tag_open'] = '<p>';
    		$config['full_tag_close'] = '</p>';
			$this->pagination->initialize($config); 

			$this->load->model('ta_model');
			$this->load->model('ta_background');

			$skill = $this->input->post('skills');
			$degree = $this->input->post('degree');

			$result_id = $this->ta_background->search_skill($skill, $degree);

			$this->load->library('table');
    		$this->table->set_heading('Pregerence', 'Name', 'Email', 'Student', 'Enrollment Year', 'Enrollment Term', 'Program', 'Advisor', 'Comment', 'Operation');
    		$all_new= array();
    		
    		foreach ($result_id->result() as $row) 
    		{
    			# code...
    			$results = $this->ta_model->search_TA($row->TA_ID);
    			foreach ($results->result() as $row1) 
    			{
    				# code...
    				$newr = array();
    				$prefer =  '<select name="'.$row1->TA_ID.'" style="width:auto" >
    						<option value="0">---</option>
                			<option value="1">1</option>
                			<option value="2"/>2</option>
                			<option value="3">3</option>
                			<option value="4"/>4</option>
                			<option value="5">5</option>
                			<option value="6"/>6</option>
            				</select>';
    			$newr[] = $prefer;
    			$newr[] = $row1->TA_Name;
    			$newr[] = $row1->TA_Email;
    			$newr[] = $row1->TA_StudentID;
    			$newr[] = $row1->TA_Enrollment_Year;
    			$newr[] = $row1->TA_Enrollment_Term;
    			$newr[] = $row1->TA_Program;
    			$newr[] = $row1->TA_Advisor;
    			$newr[] = $row1->TA_Comment;
    			$edit = '<a href="http://localhost/html/index.php/ta/view_tabg/'.$row1->TA_ID.'">view background</a>';
    			$edit_2 = '<a href="http://localhost/html/index.php/ins/view_ta_eva/'.$row1->TA_ID.'">view evaluation</a>';
    			$newr[] = $edit.'</br>'.$edit_2;
    			$all_new[] = $newr;
    			}
    		}

    		$data['results'] = $all_new;
    		$this->load->view('ins_view_ta', $data);
		}
	}

/*This is the end of this file*/