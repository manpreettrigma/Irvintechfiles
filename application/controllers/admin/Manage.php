<?php

class Manage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('c718b175bc162f27f740fbfa91a3f090')) {
            redirect('admin');
        } else {
            $this->load->model('admin/Admin_manage_model');
            $this->load->model('admin/User_manage_model');
        }
    }

    function admin_data_table() {
        $tableData = array();
        $draw = $this->input->post('draw');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        if (!empty($_REQUEST['search']['value'])) {
            $search = $_REQUEST['search']['value'];
        } else {
            $search = '';
        }
        $data = $this->Admin_manage_model->get_adminlist($length, $start, $search);
        $rotalRecord = $this->Admin_manage_model->get_total_record('admin');
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $tableData[] = array($value['firstname'], $value['firstname'], $value['lastname'], $value['email'], '<a href="javascript:void(0)">Edit</a>');
            }
        }

        $json_data = array(
            "draw" => intval($draw),
            "recordsTotal" => intval($rotalRecord),
            "recordsFiltered" => intval($rotalRecord),
            "data" => $tableData
        );
        echo json_encode($json_data);
    }

    public function manage_users() {
        $admin_level = $this->session->DBFB02C48B52C44881B6F43007240A9C;
        $this->load->view('admin/include/subheader');
        if ($admin_level == 1) {
            $this->load->view('admin/include/superadminsidebar');
        } else {
            $this->load->view('admin/include/adminsidebar');
        }
        $this->data['userlist'] = $this->User_manage_model->get_userlist();
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/manage/users/list_users', $this->data);
        $this->load->view('admin/include/footer');
    }

    public function manage_admins() {

        $admin_level = $this->session->DBFB02C48B52C44881B6F43007240A9C;
        $this->load->view('admin/include/subheader');

        if ($admin_level == 1) {
            $this->load->view('admin/include/superadminsidebar');
        } else {
            redirect('admin');
        }
        //$this->data['adminlist'] = $this->Admin_manage_model->get_adminlist(0,2);
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/manage/admins/admins');
        $this->load->view('admin/include/footer');
    }

    public function new_admin() {
        $admin_level = $this->session->DBFB02C48B52C44881B6F43007240A9C;
        if ($admin_level != 1) {
            redirect('admin');
        } else {
            $this->form_validation->set_rules('user-name', 'User Name', 'required|alpha_numeric|is_unique[admin.username]', array('required' => '%s is a required Field', 'is_unique' => 'This username already exists.'));
            $this->form_validation->set_rules('first-name', 'First Name', 'required|alpha', array('required' => '%s is a required Field'));
            $this->form_validation->set_rules('last-name', 'Last Name', 'required|alpha', array('required' => '%s is a required Field'));
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[15]|alpha_dash', array('required' => '%s is a required Field'));
            $this->form_validation->set_rules('email-id', 'Email', 'required|valid_email|is_unique[admin.email]', array('required' => '%s is a required Field',
                'is_unique' => 'This email id already exists'));
            $this->form_validation->set_rules('position', 'Admin Type', 'required', array('required' => '%s must be selected.'));
            $this->form_validation->set_error_delimiters('<ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-rdequired">', '</li></ul>');
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/include/subheader');
                $this->load->view('admin/include/superadminsidebar');
                $this->load->view('admin/include/menufooter');
                $this->load->view('admin/include/topnavigation');
                $this->load->view('admin/manage/admins/add_admin');
                $this->load->view('admin/include/footer');
            } else {
                $data = array('username' => $this->input->post('user-name'),
                    'firstname' => $this->input->post('first-name'),
                    'lastname' => $this->input->post('last-name'),
                    'email' => $this->input->post('email-id'),
                    'role' => $this->input->post('position'),
                    'password' => md5($this->input->post('password'))
                );
                $this->Admin_manage_model->create_admin($data);
                redirect('admin/manage_admins');
            }
        }
    }

    public function manage_user() {
        if (null == $this->input->post('user_activation')) {
            redirect('admin'); //redirect to admin homepage if no data has been posted to this function. this can occur if the address is typed mannually in address bar
        } else {
            if ($this->input->post('user_activation') == 1) { //the input ==1 means request is for activation of the user
                $id = $this->input->post('id'); //id of the user . who's account will be activated
                $this->User_manage_model->unblock_user($id);
                redirect($_SERVER['HTTP_REFERER']);
            } else { //input !=1
                if ($this->input->post('user_activation') == 2) { //input==2 means request for blocking or deactivation of the user. 
                    $id = $this->input->post('id'); //id of the user . who's account will be de-activated
                    $this->User_manage_model->block_user($id);
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }
    }

    public function edit_user($id = NULL) {

        $admin_level = $this->session->DBFB02C48B52C44881B6F43007240A9C;
        $this->load->view('admin/include/subheader');
        if ($admin_level == 1) {
            $this->load->view('admin/include/superadminsidebar');
        } else {
            redirect('admin');
        }
        if ($this->input->post()) {
            $this->input->post('meta_info')['website'];
            $users['email'] = $this->input->post('email');
            $users['status'] = $this->input->post('status');
            $this->User_manage_model->update_user( $users, $id);
            if (!empty($this->input->post('meta_info'))) {
                foreach ($this->input->post('meta_info') as $key => $value) {
                    $where = array('user_id' => $id, 'user_key' => $key);
                    $data = array('user_value' => $value);
                    $this->User_manage_model->update_user_info($data,$where);
                }
            }
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Updated!</strong> User updated successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/manage_users');
        }
        $this->data['userlist'] = $this->User_manage_model->get_userlist($id);
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/manage/users/edit_user', $this->data);
        $this->load->view('admin/include/footer');
    }

    public function block_user($id = 0) {

        if ($id == 0 || $id == null) {
            redirect('admin/manage_users');
        } else {
            $this->User_manage_model->block_user($id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Blocked!</strong> User blocked successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/manage_users');
        }
    }

    public function unblock_user($id = 0) {

        if ($id == 0 || $id == null) {
            redirect('admin/manage_users');
        } else {
            $this->User_manage_model->unblock_user($id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Active!</strong> User enabled successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/manage_users');
        }
    }

    public function view_user($id = 0) {
        if ($id == 0) {
            redirect('admin/manage_users');
        } else {
            $this->data['userinfo'] = $this->User_manage_model->get_user_info($id);
            $this->data['lisitings'] = $this->User_manage_model->get_user_listings($id);
            $admin_level = $this->session->DBFB02C48B52C44881B6F43007240A9C;
            $this->load->view('admin/include/subheader');
            if ($admin_level == 1) {
                $this->load->view('admin/include/superadminsidebar');
            } else {
                $this->load->view('admin/include/adminsidebar');
            }

            $this->load->view('admin/include/menufooter');
            $this->load->view('admin/include/topnavigation');
            $this->load->view('admin/manage/users/profile', $this->data);
            $this->load->view('admin/include/footer');
        }
    }

    public function delete_user($id) {
        if ($id == 0) {
            redirect('admin/manage_users');
        } else {
            $this->User_manage_model->remove_user($id);
            $flash_message = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Deleted!</strong> User deleted successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/manage_users');
        }
    }

    public function remove_admin($id = 0) {
        $admin_level = $this->session->DBFB02C48B52C44881B6F43007240A9C;
        if ($id == 0 || $admin_level != 1) {
            redirect('admin/manage_admins');
        } else {
            $this->form_validation->set_rules('action', 'Option', 'required', array('required' => "Please select one of the options."));
            if ($this->form_validation->run() == false) {
                $this->User_manage_model->remove_admin($id);
                redirect('admin/manage_admins');
            } else {
                $data = array('id_validation' => $this->input->post('action'),
                );
                $this->User_manage_model->update_user($data, $id);
                $config['mailtype'] = 'html';

                $this->email->initialize($config);
            }
        }
    }

}
