<?php
	class data_file extends CI_Controller
	{
		public function file_view()
		{
      $this->load->view('file');
		}

		public function file_upload()
		{
			$config['upload_path'] = '/Library/WebServer/Documents/html/application/upload/';
  			$config['allowed_types'] = 'xlsx';
  			$config['max_size'] = '10000000';
  			$new_name = time();
  			$config['file_name'] = $new_name;

  			$this->load->library('upload', $config);

  			if(!$this->upload->do_upload())
  			{
  				//echo '<script>alert("Error!")</script>';
  				$this->add_new_course();
  			}
  			else
  			{
  				//echo '<script>alert("Upload succeed!")</script>';
  				$this->read_excel($new_name);
  			}

  			$this->load->view('add_new_course');
		}

		public function read_excel($filename)
		{
			date_default_timezone_set('Asia/Shanghai');
			set_include_path(get_include_path() . PATH_SEPARATOR . '/Library/WebServer/Documents/html/application/PHPExcel_1.8.0_pdf/Classes/');
			include 'PHPExcel/IOFactory.php';
			$inputFileName = '/Library/WebServer/Documents/html/application/upload/'.$filename.'.xlsx';
			$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

			$sheetdata = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
			//var_dump($sheetdata);
			return $sheetdata;
		}

		public function get_file()
		{
			$type = $this->input->post('type');

			  $config['upload_path'] = '/Library/WebServer/Documents/html/application/upload/';
  			$config['allowed_types'] = 'xlsx';
  			$config['max_size'] = '10000000';
  			$new_name = time();
  			$config['file_name'] = $new_name;

  			$this->load->library('upload', $config);

  			if(!$this->upload->do_upload())
  			{
  				echo '<script>alert("Updata Error!")</script>';
  			}
  			else
  			{
  				//echo '<script>alert("Upload succeed!")</script>';
  				$data = $this->read_excel($new_name);
  				//var_dump($data[1]);
  				//echo count($data);
  				unset($data[1]);
  				$this->insert_course($data);
  			}
		}

		public function insert_course($data)
		{
			$this->load->model('course_entity');

      foreach ($data as $key => $value) 
      {
        $result = $this->course_entity->search_course_OID($value['A']);
        if($result->num_rows() > 0)
        {
          echo 'The course '.$value['A'].' has existed.'."/n";
        }
        else
        {
          $info = array('Course_Offical_ID' => $value['A'],
                        'Course_Used_ID' => $value['B'],
                        'Course_Name' => $value['C'],
                        'Credits' => $value['D'],
                        'Comment' => $value['E']);
          $aaa = $this->course_entity->insert_course($info);
        }
      }

      echo '<script>alert("Upload succeed!")</script>';
		}

    public function insert_ta($data)
    {
      $this->load->model('ta_model');
      foreach ($data as $key => $value) 
      {
        # code...
        
      }
    }

    public function export_data()
    {
      date_default_timezone_set('Asia/Shanghai');
      set_include_path(get_include_path() . PATH_SEPARATOR . '/Library/WebServer/Documents/html/application/PHPExcel_1.8.0_pdf/Classes/');

      include_once 'PHPExcel.php';
      include_once 'PHPExcel/IOFactory.php';
      include_once 'PHPExcel/Writer/IWriter.php';
      include_once 'PHPExcel/Writer/Excel5.php';

      $obj_phpexcel = new PHPExcel();

      $this->load->model('course_entity');
      $result = $this->course_entity->get_all();

      $num = 2;

      $obj_phpexcel->getActiveSheet()->setCellValue('A1', 'Course ID');
      $obj_phpexcel->getActiveSheet()->setCellValue('B1', 'Course Used ID');
      $obj_phpexcel->getActiveSheet()->setCellValue('C1', 'Course Name');
      $obj_phpexcel->getActiveSheet()->setCellValue('D1', 'Credits');
      $obj_phpexcel->getActiveSheet()->setCellValue('E1', 'Comment');

      foreach ($result->result() as $row) 
      {
        $obj_phpexcel->getActiveSheet()->setCellValue('A'.$num, $row->Course_Offical_ID);
        $obj_phpexcel->getActiveSheet()->setCellValue('B'.$num, $row->Course_Used_ID);
        $obj_phpexcel->getActiveSheet()->setCellValue('C'.$num, $row->Course_Name);
        $obj_phpexcel->getActiveSheet()->setCellValue('D'.$num, $row->Credits);
        $obj_phpexcel->getActiveSheet()->setCellValue('E'.$num, $row->Comment);

        $num++;
      }

      $obj_Writer = PHPExcel_IOFactory::createWriter($obj_phpexcel,'Excel5');
      $filename = "outexcel.xls";
        
        header("Content-Type: application/force-download"); 
        header("Content-Type: application/octet-stream"); 
        header("Content-Type: application/download"); 
        header('Content-Disposition:inline;filename="'.$filename.'"'); 
        header("Content-Transfer-Encoding: binary"); 
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
        header("Pragma: no-cache"); 
        $obj_Writer->save('php://output'); 
    }

    public function assignment_match()
    {
      $this->load->model('instructor_TA_Pref');
      $this->load->model('ta_course_pref');
      $this->load->model('setting');
      $this->load->model('assignment_model');
      $this->load->model('instructor_course');
      $sys_config = $this->setting->getConfig();

      $ins_pref = $this->instructor_TA_Pref->search_all_pref($sys_config['Year'], $sys_config['Term']);
      $ta_pref = $this->ta_course_pref->search_all_pref($sys_config['Year'], $sys_config['Term']);
      //var_dump($ins_pref);
      echo '</br>';
      //var_dump($ta_pref);
      //if($ins_pref['11']['4'] == '')  echo 'halle';
      $upper_ta = 2;
      $count_ta = array();
      $count_course = array();
      $final_result = array();
      $total = 0;

      foreach ($ta_pref as $key => $value) 
      {
        # code...
        $count_ta[$key] = $upper_ta;
      }

      foreach ($ins_pref as $key => $value) 
      {
        # code...
        $count_course[$key] = 0;
        $total++;
        
      }

      foreach ($ins_pref as $key => $value) 
      {
        # code...
        foreach ($value as $pref => $ta_id) 
        {
          # code...
          if($count_ta[$ta_id[0]] > 0)
          {
            $count_ta[$ta_id[0]]--;
            $count_course[$key] = 1;
            $final_result[$key] = $ta_id[0];
            $total--;
            break;
          }
        }
        
      }

      if($total != 0)
      {
        foreach ($count_course as $key => $value) 
        {
          # code...
          if($value == 0)
          {
            foreach ($count_ta as $key_2 => $value_2) 
            {
              # code...
              if($value_2 > 0)
              {
                $count_ta[$key_2]--;
                $count_course[$key] = 1;
                $final_result[$key] = $key_2;
                $total--;
                break;
              }
            }
          }
        }
      }

      //var_dump($final_result);
      foreach ($final_result as $key => $value) 
      {
        # code...
        $ins_result = $this->instructor_course->search_ins_id($key, $sys_config['Year'], $sys_config['Term']);
        $ins_id = 0;
        foreach ($ins_result->result() as $row) 
        {
          # code...
          $ins_id = $row->Instructor_ID;
        }
        $info = array('Instructor_ID' => $ins_id,
                      'Course_ID' => $key,
                      'Year' => $sys_config['Year'],
                      'Term' => $sys_config['Term'],
                      'TA_ID' => $value);
        if($this->assignment_model->insert_assignment($info))
        {
          //echo 'succeed';
        }
      }

      
    }
	}

/*This is the end of this file*/