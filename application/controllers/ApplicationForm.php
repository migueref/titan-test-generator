<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Controller for applications
 */
class ApplicationForm extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library('menu');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->model('applicationForm_model');
  }
  function index()
  {
    $data['idExam']= $this->uri->segment(3);
    $data['questions']= $this->applicationForm_model->getQuestions();
    $data['menu']=$this->menu->constructMenu();
    $this->load->view('main/header');
    $this->load->view('applicationForm/index',$data);
    $this->load->view('main/footer',$data);
  }
  function applicants()
  {
    $idExam= $this->uri->segment(3);
    $this->load->view('main/header');
    if(!$idExam){
      $data['questions']= $this->applicationForm_model->getApplicants();
      $data['questions']= $this->applicationForm_model->getApplicants();
      $data['menu']=$this->menu->constructMenu();
      $this->load->view('main/header');
      $this->load->view('applicationForm/applicants',$data);
      $this->load->view('main/footer',$data);
    }else{
      $data['questions'] = $this->applicationForm_model->getApplicantAnswers($idExam);
      $data['menu']=$this->menu->constructMenu();
      $this->load->view('main/header');
      $this->load->view('applicationForm/applicant',$data);
      $this->load->view('main/footer',$data);
    }


  }
  function sendDocExam(){
    if($this->input->post('idExam')==1){
      $data = array(
        'nombres'    => $this->input->post('nombres'),
        'apaterno'   => $this->input->post('apaterno'),
        'amaterno'   => $this->input->post('amaterno'),
        'email'      => $this->input->post('email'),
        'ciudad'     => $this->input->post('ciudad'),
        'question1'  => $this->input->post('q1'),
        'question2'  => $this->input->post('q2'),
        'question3'  => $this->input->post('q3'),
        'question4'  => $this->input->post('q4'),
        'question5'  => $this->input->post('q5'),
        'question6'  => $this->input->post('q6'),
        'question7'  => $this->input->post('q7'),
        'question8'  => $this->input->post('q8'),
        'question9'  => $this->input->post('q9'),
        'question10' => $this->input->post('q10'),
        'question11' => $this->input->post('q11'),
        'question12' => $this->input->post('q12'),
        'question13' => $this->input->post('q13'),
        'idExam' => $this->input->post('idExam')
      );
      $this->applicationForm_model->sendDocExam($data);
    }
    if($this->input->post('idExam')==2){
      $data = array(
        'nombres'    => $this->input->post('nombres'),
        'apaterno'   => $this->input->post('apaterno'),
        'amaterno'   => $this->input->post('amaterno'),
        'email'      => $this->input->post('email'),
        'ciudad'     => $this->input->post('ciudad'),
        'question1'  => $this->input->post('q14'),
        'question2'  => $this->input->post('q15'),
        'question3'  => $this->input->post('q16'),
        'question4'  => $this->input->post('q17'),
        'question5'  => $this->input->post('q18'),
        'question6'  => $this->input->post('q19'),
        'question7'  => $this->input->post('q20'),
        'question8'  => $this->input->post('q21'),
        'question9'  => $this->input->post('q22'),
        'question10' => $this->input->post('q23'),
        'question11' => $this->input->post('q24'),
        'question12' => $this->input->post('q25'),
        'question13' => $this->input->post('q26'),
        'idExam' => $this->input->post('idExam')
      );
      $this->applicationForm_model->sendMasterExam($data);
    }
    $data['menu']=$this->menu->constructMenu();
    $this->load->view('main/header');
    $this->load->view('main/success',$data);
    $this->load->view('main/footer',$data);
  }

}
