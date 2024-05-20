<?php 

class quizmodel extends CI_Model{

    public function __construct(){

        $this->db->select("qid,question,op1,op2,op3,op4,answer,questiontype");
    $this->db->from("question");

    $query = $this->db->get();

    return $query->result();

    $num_data_returned = $query->num_rows;

    if($num_data_returned < 1){

        echo "There is no data in base";
        exit();
        
    }

    }

}
