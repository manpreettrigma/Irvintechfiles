<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Courseregisteration extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('account/Account_manage_model');
        $this->load->library('paypal_lib');
        $this->load->library('session');
        $this->load->library('image_lib');
        $this->load->library('upload');
    }

    public function index() {
        $this->data['title'] = 'LMS | Course Registeration';
        $this->load->view('public/header', $this->data);
        $this->load->view('course_registeration/registeration');
        $this->load->view('public/footer');
    }
}