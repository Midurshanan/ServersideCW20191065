<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class questioncontroller extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('qmodel');
	}

	public function index()
	{
		$this->load->model('qmodel');
		$this->data['names'] = $this->qmodel->getPeoples();
		$this->load->view('dummy1', $this->data);
	}
	
	public function person() {
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			
			$question = $this->input->post('question');
			$op1 = $this->input->post('op1');
			$op2 = $this->input->post('op2');
			$op3 = $this->input->post('op3');
			$op4 = $this->input->post('op4');
			$answer = $this->input->post('answer');
			$questiontype = $this->input->post('questiontype');
			
			$data = $this->qmodel->insertperson($question,$op1,$op2,$op3,$op4,$answer,$questiontype);
			echo json_encode($data);
		}
		
		elseif ($this->input->server('REQUEST_METHOD') == 'GET') {
		     
			 $qid = $this->input->get('qid');
			 
			 $deleted = $this->qmodel->deleteperson($qid);
			 echo json_encode($deleted);
		
		}
	}
	
	
	
	public function user() {
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$question = $this->input->post('question');
			$op1 = $this->input->post('op1');
			$op2 = $this->input->post('op2');
			$op3 = $this->input->post('op3');
			$op4 = $this->input->post('op4');
			$answer = $this->input->post('answer');
			$questiontype = $this->input->post('questiontype');
			
			$update = $this->peoplemodel->updatePerson($question,$op1,$op2,$op3,$op4,$answer,$questiontype);
			echo json_encode($update);
			
	
		}
		
		elseif ($this->input->server('REQUEST_METHOD') == 'GET') {
		     
			 $qid = $this->input->get('qid');
			 
			 $edit = $this->qmodel->getPerson($qid);
			 echo json_encode($edit);
		}
	}
	
	
	
}
