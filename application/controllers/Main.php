<?php
if(! defined('BASEPATH'))
  exit('No direct script access allowed');
  /**
 *
 */
class Main extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('menu');
    $this->load->model('exam');
  }
  function success()
  {

  }
  function index()
  {
    $idExam= $this->uri->segment(3);
    $this->load->view('main/header');
    if(!$idExam){
      $data['exams']= $this->exam->getExams();
    }else{
      $data['exams'] = $this->exam->getExam($idExam);
    }
    $data['menu']=$this->menu->constructMenu();
    $this->load->view('main/main',$data);
    $this->load->view('main/footer',$data);
  }
  function send()
  {
    $data['idExam']= $this->uri->segment(3);
    $this->load->view('main/header');
    if(!$data['idExam']){
      $data['exams']= $this->exam->getExams();
      $data['options'] = $this->exam->getQuestions($data['idExam']);

    }else{
      $data['exams'] = $this->exam->getExam($data['idExam']);
      $data['questions'] = $this->exam->getQuestions($data['idExam']);
      $data['options'] = $this->exam->getOptions($data['idExam']);

    }
    $data['menu']=$this->menu->constructMenu();
    $this->load->view('applicationForm/index',$data);
    $this->load->view('main/footer',$data);
  }

}
