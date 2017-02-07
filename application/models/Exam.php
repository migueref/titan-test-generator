<?php
if(! defined('BASEPATH'))
  exit('No direct script access allowed');
/**
 * Controller for applications
 */
class Exam extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  function getExams(){
    $query = $this->db->get('exam');
    if($query->num_rows() > 0)
      return $query;
    else
        return false;
  }
  function getExam($id){
    $this->db->where('id',$id);
    $query = $this->db->get('exam');
    if($query->num_rows() > 0)
      return $query;
    else
        return false;

  }
  function getQuestions($id){
    $this->db->select('question.id,question.name,question.type');
    $this->db->from('question');
    $this->db->join('examquestion','examquestion.idQuestion = question.id');
    $this->db->where('examquestion.idExam',$id);

    $query = $this->db->get();
    if($query->num_rows() > 0)
      return $query;
    else
        return false;
  }function getOptions($id){
    $this->db->select('option.id,option.name,question_option.idQuestion');
    $this->db->from('option');
    $this->db->join('question_option','question_option.idOption = option.id');
    $this->db->join('examquestion','examquestion.idQuestion = question_option.idQuestion');
    $this->db->where('examquestion.idExam',$id);

    $query = $this->db->get();
    if($query->num_rows() > 0)
      return $query;
    else
        return false;
  }
}
