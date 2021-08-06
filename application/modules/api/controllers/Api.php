<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
			$this->load->model('auth_model');
			$this->load->module('template');
			$this->load->library('session');
		}
	public function index()
	{	
		
			
	}


	function userlogin(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			
			  
		     $email=$taskdata['email'];
			 $phone=$taskdata['phone'];
			
			
   
        if(empty($taskdata['email'])){
            $response['error_code']="1";
			$response['response_string']="Failed";
			$response['data']="";
        }
        else if(empty($taskdata['phone'])){
            $response['error_code']="1";
			$response['response_string']="Failed";
			$response['data']="";
        }
        else{
    		$email=$taskdata['email'];
    		$password=$taskdata['phone'];
    
    		$response['error_code']="1";
    		
            
			
    		$count=$this->auth_model->count_row_multiple('email',$email,'phone',$password,'users');
			
			if($count>=1)
			{
				$data=$this->auth_model->get_specific_data('email',$email,'users');
				$response['error_code']="0";
			$response['response_string']="User Found";
			$response['userdata']=$data;
			
			}
			else{
				$response['error_code']="1";
			$response['response_string']="No User Found";
			$response['id']="";
				
			}
    			
    				
    			
    		
        }

		header('Content-Type: application/json');
		echo json_encode($response);

	}



	function doctorlogin(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			
			  
		     $email=$taskdata['email'];
			 $phone=$taskdata['phone'];
			
			
   
        if(empty($taskdata['email'])){
            $response['error_code']="1";
			$response['response_string']="Failed";
			$response['data']="";
        }
        else if(empty($taskdata['phone'])){
            $response['error_code']="1";
			$response['response_string']="Failed";
			$response['data']="";
        }
        else{
    		$email=$taskdata['email'];
    		$password=$taskdata['phone'];
    
    		$response['error_code']="1";
    		
            
			
    		$count=$this->auth_model->count_row_multiple('email',$email,'phone',$password,'doctors');
			
			if($count>=1)
			{
				$data=$this->auth_model->get_specific_data('email',$email,'doctors');
				$response['error_code']="0";
			$response['response_string']="Doctor Found";
			$response['userdata']=$data;
			
			}
			else{
				$response['error_code']="1";
			$response['response_string']="No Doctor Found";
			$response['id']="";
				
			}
    			
    				
    			
    		
        }

		header('Content-Type: application/json');
		echo json_encode($response);

	}
	function get_allergies_list(){
		  $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$status=1;
			$data = $this->auth_model->get_specific_data('Status', $status,'allergies');
			if(!empty($data))
			{
				$response['error_code']="0";
			    $response['response_string']="Allergy Found";
			     $response['data']=$data;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="No Allergy Found";
			     $response['data']="";
			}
			 header('Content-Type: application/json');
		     echo json_encode($response);
		
		
	}
	
	function get_disease_list(){
		  $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$status=1;
			$data = $this->auth_model->get_specific_data('Status', $status,'disease');
			if(!empty($data))
			{
				$response['error_code']="0";
			    $response['response_string']="Disease Found";
			     $response['data']=$data;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="No Disease Found";
			     $response['data']="";
			}
			 header('Content-Type: application/json');
		     echo json_encode($response);
		
		
	}
	function get_surgery_list(){
		  $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$status=1;
			$data = $this->auth_model->get_specific_data('Status', $status,'surgeries');
			if(!empty($data))
			{
				$response['error_code']="0";
			    $response['response_string']="Surgery Found";
			     $response['data']=$data;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="No Surgery Found";
			     $response['data']="";
			}
			 header('Content-Type: application/json');
		     echo json_encode($response);
		
		
	}
	function doctor_profile_edit(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$this->load->library('form_validation');
			
		$doctor_id			=		$this->input->post('doctorid');
	    $fname 			=		$this->input->post('fname');
		$lname 			=		$this->input->post('lname');
		$fathername		=		$this->input->post('fathername');
		$gender 		=		$this->input->post('gender');
		
		$dob 			=		$this->input->post('dob');
		$category 		=		$this->input->post('category');
		$address		=		$this->input->post('address');
		$state			=		$this->input->post('state');
		$city			=		$this->input->post('city');
		$pincode		=		$this->input->post('pincode');
		$lat 			=		$this->input->post('lat');
		$long 			=		$this->input->post('long');


		$registration_no		=		$this->input->post('registration_no');
		$mc						=		$this->input->post('mc');
		$mc_year				=		$this->input->post('mc_year');
		$md						=		$this->input->post('md');
		$md_year 				=		$this->input->post('md_year');
		$md_college 			=		$this->input->post('md_college');
		$experience 			=		$this->input->post('experience');

		$specility 				=		$this->input->post('specility');
			$this->form_validation->set_rules('doctorid', 'Doctorid', 'required'); 
			$this->form_validation->set_rules('fname', 'Fname', 'required'); 
			$this->form_validation->set_rules('lname', 'Lname', 'required'); 
			$this->form_validation->set_rules('fathername', 'Fathername', 'required'); 
			
			$this->form_validation->set_rules('gender', 'Gender', 'required'); 
			$this->form_validation->set_rules('dob', 'Dob', 'required'); 
			$this->form_validation->set_rules('category', 'Category', 'required'); 
			$this->form_validation->set_rules('address', 'Address', 'required');
			
			$this->form_validation->set_rules('state', 'State', 'required'); 
			$this->form_validation->set_rules('city', 'City', 'required'); 
			$this->form_validation->set_rules('pincode', 'Pincode', 'required'); 
			$this->form_validation->set_rules('lat', 'Lat', 'required');
			$this->form_validation->set_rules('long', 'Long', 'required');
			
			$this->form_validation->set_rules('registration_no', 'Registration_no', 'required'); 
			$this->form_validation->set_rules('mc', 'Mc', 'required'); 
			$this->form_validation->set_rules('mc_year', 'Mc_Year', 'required'); 
			$this->form_validation->set_rules('md', 'Md', 'required');
			$this->form_validation->set_rules('md_year', 'Md_year', 'required');
			$this->form_validation->set_rules('md_college', 'Md_college', 'required');
			$this->form_validation->set_rules('experience', 'Experience', 'required');
			
			if ($this->form_validation->run() == FALSE) { 
            // $this->load->view('myform'); 
			//echo "fail";
			 $response['error_code']="1";
			$response['response_string']="All Fields Are Not Filled";
			$response['data']="";
             } 
		  else { 
            
			
			$u_data = array(

				'category_id'			=>		$category,
				'speciality_id'			=>		$specility_val,
				'first_name'			=>		$fname,
				'last_name'				=>		$lname
				
				
			);
			


			$ui_data = array(
				'father_name'			=>		$fathername,
				'gender'				=>		$gender,
				'dob'					=>		$dob,
				'address'				=>		$address,
				'state'					=>		$state,
				'city'					=>		$city,
				'pincode'				=>		$pincode,
				'latitude'				=>		$lat,
				'longitude'				=>		$long,
				'added_on'				=>		date('Y-m-d'),
				'added_by' 				=>		$session_user_id
			);

			$uf_data = array(
				'registration_no'		=>		$registration_no,		
				'medical_council'		=>		$mc,
				'certification_year'	=>		$mc_year,
				'medical_degree'		=>		$md,
				'passout_year'			=>		$md_year,
				'college_name'			=>		$md_college,
				'experience' 			=>		$experience,
				'added_on'				=>		date('Y-m-d'),
				'added_by' 				=>		$session_user_id
			);	


			$result = $this->auth_model->edit_user1($u_data, $ui_data, $uf_data,$doctor_id);
			if($result)
			{
				$response['error_code']="0";
			    $response['response_string']="Record Updated Successfully";
			    $response['data']="";
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="Eror In Updation";
			    $response['data']="";
			}
         } 
		 
        header('Content-Type: application/json');
		echo json_encode($response);


	}


}//end of class