<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class qmodel extends CI_Model {

	public function getPeoples()
	{
		$this->db->select("*");
		$this->db->from('question');
		
		$query = $this->db->get();
		
		return $query->result();
		
		$num_data_returned = $query->num_rows;
		
		if ($num_data_returned < 1) {
			
			echo "There is no data in the database";
			exit(); }
	}
	
	public function insertPerson($question,$op1,$op2,$op3,$op4,$answer,$questiontype) {
		
		$this->db->set('question', $question);
		$this->db->set('op1', $op1);
		$this->db->set('op2', $op2);
		$this->db->set('op3', $op3);
        $this->db->set('op4', $op4);
        $this->db->set('answer', $answer);
        $this->db->set('questiontype', $questiontype);
        $this->db->insert('question');

	}
	
	public function deletePerson($qid) {
		$this->db->where('qid', $qid);
		$this->db->delete('question');
	}
	
	public function getPerson($qid) {
         
		 $this->db->where('qid', $qid);
		 $query = $this->db->get('question');
		 
		 if($query->result()) {
		
		$result = $query->result();
		
		foreach ($result as $row) {
			
			$users[$row->personID] = array($row->question, $row->op1 ,$row->op2 ,$row->op3 ,$row->op4 , $row->answer,$row->questiontype);	
		}
		return $users;	 
		 }
		 
	}
	
	
		public function updatePerson($qid,$question,$op1,$op2,$op3,$op4,$answer,$questiontype) {
		
		$this->db->where('qid', $qid);
		$this->db->set('question', $question);
		$this->db->set('op1', $op1);
		$this->db->set('op2', $op2);
		$this->db->set('op3',$op3);
        $this->db->set('op4', $op4);
        $this->db->set('answer', $answer);
        $this->db->set('questiontype', $questiontype);
        $this->db->where('question', $question);
	}
	
	
}
