<?php
if(! defined('BASEPATH'))
  exit('No direct script access allowed');
/**
 * Controller for applications
 */
class ApplicationForm_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->helper('url');

  }
  function getQuestions(){
    $query = $this->db->get('question');
    if($query->num_rows() > 0)
      return $query;
    else
        return false;
  }
  function getApplicants(){
    $this->db->select('applicationform.id,applicationform.idExam,applicationform.program,applicationform.created_at,user.firstname,user.middlename,user.lastname,user.email,user.city,exam.name');
    $this->db->from('applicationform');
    $this->db->join('user','applicationform.idUser = user.id');
    $this->db->join('exam','applicationform.idExam = exam.id');

    $query = $this->db->get();
    if($query->num_rows() > 0)
      return $query;
    else
        return false;
  }
  function getApplicantAnswers($id){
    $this->db->select(' questionanswer.textAnswer,
                      	question.id as idQuestion,
                      	question.name,
                      	question.type,
                      	`option`.`name` as optionname,
                      	`applicationform`.id,
                      	`user`.firstname,
                      	`user`.middlename,
                      	`user`.lastname,
                      	`user`.email,
                      	`user`.city'
                      );
    $this->db->from('questionanswer');
    $this->db->join('question','questionanswer.idQuestion = question.id','left');
    $this->db->join('option','questionanswer.idOption = option.id','left');
    $this->db->join('applicationform','applicationform.id = questionanswer.idApplicationForm','left');
    $this->db->join('user','user.id = applicationform.idUser','left');
    $this->db->where('applicationform.id',$id);

    $query = $this->db->get();
    if($query->num_rows() > 0)
      return $query;
    else
        return false;
  }
  function sendMasterExam($data){
    // 'nombres' => $this->input->post('nombres'),
    // 'apaterno' => $this->input->post('apaterno'),
    // 'amaterno' => $this->input->post('amaterno'),
    // 'email' => $this->input->post('email'),
    // 'ciudad' => $this->input->post('ciudad'),
    // 'question1' =$this->db->insert_id()
    $this->db->insert('user',array(
      'firstname'=>$data['nombres'],
      'middlename'=>$data['apaterno'],
      'lastname'=>$data['amaterno'],
      'city'=>$data['ciudad'],
      'email'=>$data['email']
    ));
    $idUser=$this->db->insert_id();
    $this->db->set('created_at', 'NOW()', FALSE);
    $this->db->insert('applicationform',array(
      'idUser'=>$idUser,
      'idExam'=>$data['idExam'],
      'program'=>'M1S01'
    ));
    $idApplicationForm=$this->db->insert_id();
    //insert answers
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  14,
      'idOption'=>  $data['question1'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  15,
      'idOption'=>  $data['question2'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  16,
      'idOption'=>  $data['question3'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  17,
      'idOption'=>  $data['question4'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  18,
      'idOption'=>  $data['question5'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  19,
      'idOption'=>  $data['question6'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  20,
      'idOption'=>  $data['question7'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  21,
      'idOption'=>  $data['question8'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  22,
      'idOption'=>  $data['question9'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  23,
      'idOption'=>  $data['question10'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  24,
      'textAnswer'=>  $data['question11'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  25,
      'idOption'=>  $data['question12'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  26,
      'idOption'=>  $data['question13'],
      'idApplicationForm' => $idApplicationForm
    ));
  }
  function sendDocExam($data){
    // 'nombres' => $this->input->post('nombres'),
    // 'apaterno' => $this->input->post('apaterno'),
    // 'amaterno' => $this->input->post('amaterno'),
    // 'email' => $this->input->post('email'),
    // 'ciudad' => $this->input->post('ciudad'),
    // 'question1' =$this->db->insert_id()
    $this->db->insert('user',array(
      'firstname'=>$data['nombres'],
      'middlename'=>$data['apaterno'],
      'lastname'=>$data['amaterno'],
      'city'=>$data['ciudad'],
      'email'=>$data['email']
    ));
    $idUser=$this->db->insert_id();
    $this->db->set('created_at', 'NOW()', FALSE);
    $this->db->insert('applicationform',array(
      'idUser'=>$idUser,
      'idExam'=>$data['idExam'],
      'program'=>'D1S201'
    ));
    $idApplicationForm=$this->db->insert_id();
    //insert answers
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  1,
      'idOption'=>  $data['question1'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  2,
      'idOption'=>  $data['question2'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  3,
      'idOption'=>  $data['question3'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  4,
      'idOption'=>  $data['question4'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  5,
      'idOption'=>  $data['question5'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  6,
      'idOption'=>  $data['question6'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  7,
      'idOption'=>  $data['question7'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  8,
      'idOption'=>  $data['question8'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  9,
      'idOption'=>  $data['question9'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  10,
      'idOption'=>  $data['question10'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  11,
      'textAnswer'=>  $data['question11'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  12,
      'idOption'=>  $data['question12'],
      'idApplicationForm' => $idApplicationForm
    ));
    $this->db->insert('questionanswer',array(
      'idQuestion'=>  13,
      'idOption'=>  $data['question13'],
      'idApplicationForm' => $idApplicationForm
    ));
  }
}
