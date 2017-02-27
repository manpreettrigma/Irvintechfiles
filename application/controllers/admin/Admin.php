<?php

ob_start();

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->has_userdata('c718b175bc162f27f740fbfa91a3f090')) {
            redirect('admin/Dashboard');
        } else {
            $this->load->model('admin/Admin_auth_model');
        }
    }
    
    

    public function index() {
        $this->form_validation->set_rules('username', 'User Name', 'required', array('required' => '%s cannot be left blank'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s cannot be left blank'));
        if ($this->form_validation->run() == false) {

            $this->data['login_error'] = "";
            $this->load->view('admin/include/header');
            $this->load->view('admin/main_page/login', $this->data);
        } else {

            $username = $this->input->post('username');
            $raw_password = $this->input->post('password');
            $password = md5($raw_password);
            $authenticate = $this->Admin_auth_model->validate_admin($username, $password);
            if ($authenticate) {
                $admin_level = $authenticate['0']['role'];
                $id = $authenticate['0']['admin_id'];
                if (isset($authenticate['0']['firstname'])) {
                    $admin_name = $authenticate['0']['firstname'] . " " . $authenticate['0']['lastname'];
                } else {
                    $admin_name = $authenticate['0']['username'];
                }
                if ($authenticate['0']['image'] != 0 && $authenticate['0']['image'] != null) {
                    $image = $authenticate['0']['image'];
                } else {
                    $image = base_url() . "public/images/user.jpg";
                }
                $user = array(
                    'FA050A35C46D9B67F55317373B168DFF' => $image,
                    'c718b175bc162f27f740fbfa91a3f090' => $id,
                    'DBFB02C48B52C44881B6F43007240A9C' => $admin_level,
                    'b8f161078fab0d06eaa8b1a4e9cac7d2' => $admin_name
                );
                $this->session->set_userdata($user);
                redirect('admin/Dashboard');
            } else {
                $this->data['login_error'] = "Username/Password doesn't match.";
                $this->load->view('admin/include/header');
                $this->load->view('admin/main_page/login', $this->data);
            }
        }
    }

    public function request_password() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('admin/include/header');
            $this->load->view('admin/main_page/request_password');
        } else {
            $user = $this->input->post('username');
            $admin_validate = $this->Admin_auth_model->get_user($user); //verify the email/username from database
            if (!$admin_validate) { //  generate error if email/username not found
                $this->data['error'] = "Email/username not found";
                $this->load->view('admin/include/header', $this->data);
                $this->load->view('admin/main_page/request_password');
            } else { // if username/email is found in database
                $user = $admin_validate['0']['admin_id'];
                $request_exists = $this->Admin_auth_model->verify_password_request($user);  ///check if the user has already made a password request
                if (!$request_exists) {
                    $this->data['error'] = "You have already requested for a password reset. Please contact superadmin for further support.";
                    $this->load->view('admin/include/header', $this->data);
                    $this->load->view('admin/main_page/request_password');
                } else {
                    $this->Admin_auth_model->request_password($user);
                    $this->data['success'] = "You have successfully requested for a new password. you will be notified by email when your request will be accepted.";
                    $this->load->view('admin/include/header', $this->data);
                    $this->load->view('admin/main_page/request_password');
                }
            }
        }
    }

}
