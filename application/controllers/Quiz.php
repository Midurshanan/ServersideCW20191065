class Quiz extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('quizmodel');
        $this->load->model('session');
        $this->load->model('url');
        $this->load->model('form');
        $this->load->model('form_validation');
    }

    public function create(){

        $this->form_validation->set_rules('Title','Title','required');
        $this->form_validation->set_rules('Catogorty','Catogorty','required');
        $this->form_validation->set_rules('Difficulty','Difficulty','required');
    
    if($this->form_validation->run() == FALSE){

        echo json_encode(['status'=>'error','message'=>validation_errors()]);
        return;
    }

    $data = array(
        'questionid' => $this->input->post('questionid'),
        'answertext' => $this->input->post('answertext'),
        'iscorrect' => $this->input->post('iscorrect')
    );

    $this->quizmodel->addanswer($data);
    echo json_encode(['status'=> 'success','message'=> 'Answer Added successful']);
    }

    public function listquiz(){
        $quizz = $this->quizmodel->getquiz();
        echo json_encode($quizz);
    }

    public function getquestion($quizid){
        $question = $this->quizmodel->getquestion($quizid);
        foreach($question as &$question){
            $question->answer = $this->quizmodel->getanswer($question->answer);
        }
        echo json_encode($question);
    }



}
{
    
}