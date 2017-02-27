<?php

class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('c718b175bc162f27f740fbfa91a3f090')) {
            redirect('admin');
        } else {
            $this->load->model('admin/Page_manage_model');
            $this->load->helper('email');
            $this->load->helper(array('form', 'url'));
        }
    }

    public function index() {

        $admin_level = $this->session->DBFB02C48B52C44881B6F43007240A9C;
        $this->load->view('admin/include/subheader');
        if ($admin_level == 1) {
			//$data['navbaritems'] = $this->Page_manage_model->get_navbaritems();
			$this->load->view('admin/include/superadminsidebar');
	       // $this->load->view('admin/include/set_order',$data);
        } else {
            redirect('admin');
        }

        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/page/index');
        $this->load->view('admin/include/footer');
    }

    public function add() {

        if ($this->input->post()) {
            $title = $this->input->post('title');
            $slug = $this->input->post('slug');
            $headline = $this->input->post('headline');
            $description = $this->input->post('description');
            $created = date('Y-m-d H:i:s');
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('slug', 'Slug', 'trim|required|is_unique[pages.slug]');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
            if ($this->form_validation->run()) {
                $imagePrefix = time();
                $imagePrefix1 = time();
                $imagename = $imagePrefix;
                $banerimagename = $imagePrefix1;
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2000;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;
                $config['overwrite'] = false;
                $config['file_name'] = $imagename; // set the name here


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('userfile')) {
                    $upload_image = array('upload_data' => $this->upload->data());

                    //print_r($upload_image);
                    $imagename = $upload_image['upload_data']['file_name'];
                } else {
                    $imagename = $_POST['upload_image'];
                }

                if ($this->upload->do_upload('bannerfile')) {

                    $upload_image = array('banner_data' => $this->upload->data());

                    $banerimagename = $upload_image['banner_data']['file_name'];
                } else {

                    $banerimagename = $_POST['banner_image'];
                }

                $data = array('title' => $title, 'slug' => $slug, 'description' => $description, 'created_at' => $created, 'image' => $imagename, 'Headline' => $headline, 'banner_image' => $banerimagename);
                $this->Page_manage_model->add_page($data);
                redirect('admin/page');
            }
        }

        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/page/add');
        $this->load->view('admin/include/footer');
    }

    public function edit($id = 0) {
        $this->data[] = array();
        if ($id == 0) {
            redirect('admin/pages');
        }

        $getData = $this->Page_manage_model->edit_page($id);
        $this->data['page_content'] = $getData;
        if ($this->input->post()) {

            $title = $this->input->post('title');
            $slug = $this->input->post('slug');
            $sidebar = $this->input->post('sidebar');
            $headline = $this->input->post('headline');
            $description = $this->input->post('description');
            $post_id = $this->input->post('id');



            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('slug', 'Slug', 'trim|required|edit_unique[pages.slug.' . $id . ']');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
            if ($this->form_validation->run()) {
                $imagePrefix = time();
                $imagename = $imagePrefix;
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2000;
                $config['max_width'] = 20000;
                $config['max_height'] = 1768;
                $config['overwrite'] = false;
                $config['file_name'] = $imagename; // set the name here

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('userfile')) {
                    $upload_image = array('upload_data' => $this->upload->data());

                    //print_r($upload_image);
                    $imagename = $upload_image['upload_data']['file_name'];
                } else {
                    //echo  $_POST['upload_image'];
                    //print_r($_POST); exit;
                    $imagename = $_POST['upload_image'];
                }

                if ($this->upload->do_upload('bannerfile')) {

                    $data2 = array('upload_data' => $this->upload->data());
                    //print_r($data2);die();
                    //print_r($upload_image);
                    $banerimagename = $data2['upload_data']['file_name'];
                } else {
                    $banerimagename = $_POST['banner_image'];
                }



                $this->Page_manage_model->update_page($title, $slug, $sidebar, $headline, $description, $post_id, $imagename, $banerimagename);
                //$this->Page_manage_model->update_page($title, $slug, $sidebar, $headline, $description, $post_id, $imagename);
                redirect('admin/page');
            }
        }

        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/page/edit', $this->data);
        $this->load->view('admin/include/footer');
    }

    public function edit_profile() {
        $id = $this->session->userdata('c718b175bc162f27f740fbfa91a3f090');
        $data['admin_records'] = $this->Page_manage_model->get_admin_details($id);
        if ($this->input->post()) {

            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $raw_password = $this->input->post('password');
            $password = md5($raw_password);
            $email = $this->input->post('email');
            $imagePrefix = time();
            $imagename = $imagePrefix;
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['file_name'] = $imagename; // set the name here

            $this->load->library('upload', $config);
            if ($this->upload->do_upload()) {
                $upload_image = array('upload_data' => $this->upload->data());
                $imagename = $upload_image['upload_data']['file_name'];
            } else {
                $imagename = $_POST['upload_image'];
            }
            $this->Page_manage_model->update_admin_profile($id, $first_name, $last_name, $password, $imagename, $email);

            redirect('admin/page/edit_profile');
        }

        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/page/edit_profile', $data);
        $this->load->view('admin/include/footer');
    }

    public function delete($id) {
        if ($id == 0) {
            redirect('admin/page');
        } else {
            $this->Page_manage_model->delete_page($id);
            redirect('admin/page');
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
        $data = $this->Page_manage_model->get_pages($length, $start, $search);
        $rotalRecord = $this->Page_manage_model->get_total_record('pages');
        if (!empty($data)) {
            foreach ($data as $key => $value) {

                $tableData[] = array($value['slug'], $value['title'], ($value['sidebar'] == 1) ? 'Enable' : 'Desable', $value['created_at'], '<a href="' . base_url() . 'admin/page/edit/' . $value['id'] . '">Edit</a> | <a onclick="confirm_delete(' . $value['id'] . ')" href="javascript:void(0)">Delete</a>');
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

    function admin_manage_fields_table() {

        $tableData = array();
        $draw = $this->input->post('draw');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        if (!empty($_REQUEST['search']['value'])) {
            $search = $_REQUEST['search']['value'];
        } else {
            $search = '';
        }
        $data = $this->Page_manage_model->get_provider($length, $start, $search);
        $rotalRecord = $this->Page_manage_model->get_total_Providerrecord('manage_fields');
        if (!empty($data)) {
            foreach ($data as $key => $value) {

                $tableData[] = array($value['id'], $value['role_type'], $value['field'], '<a href="' . base_url() . 'admin/page/edit_provider/' . $value['id'] . '">Edit</a> | <a onclick="confirm_delete(' . $value['id'] . ')" href="javascript:void(0)">Delete</a>');
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

    function image_delete() {
        $id = $_GET['id'];

        $this->Page_manage_model->update_image($id);
        //  redirect('admin/page/edit/'.$id);
    }

    function imagebanner_delete() {
        $id = $_GET['id'];
        $this->Page_manage_model->update_bannerimage($id);
        //  redirect('admin/page/edit/'.$id);
    }

    public function add_provider() {

        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        if ($this->input->post()) {
            $role_type = "Provider";
            $field = $this->input->post('field_type');
            $this->form_validation->set_rules('field_name', 'Field Name', 'trim|required|is_unique[manage_field_meta.field_name]');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
            $data = array('role_type' => $role_type, 'field' => $field);
            $field_id = $this->Page_manage_model->add_provider($data);
            // echo"<pre>"; print_r($field_id);die();
            $table = 'manage_field_meta';
            $meta_array = array();
            $inputsArr = $this->input->post();
            if ($this->form_validation->run()) {
                if ($inputsArr['field_type'] == 'textarea' || $inputsArr['field_type'] == 'text') {
                    $data_field = array();
                    if (!empty($inputsArr['field_label'])) {

                        foreach ($inputsArr['field_label'] as $keyLabel => $provider_label) {
                            $data_field['field_data']['field_label_' . $keyLabel] = $provider_label;
                        }
                    }
                    if (!empty($inputsArr['field_name'])) {
                        foreach ($inputsArr['field_name'] as $keyName => $provider_name) {
                            $data_field['field_data']['field_name_' . $keyName] = $provider_name;
                        }
                    }
                    if (!empty($inputsArr['field_placeholder'])) {

                        foreach ($inputsArr['field_placeholder'] as $keyPlaceholder => $provider_placeholder) {
                            $data_field['field_data']['field_placholder_' . $keyPlaceholder] = $provider_placeholder;
                        }
                    }
                }
                if (!empty($inputsArr['field_choice'])) {
                    if ($inputsArr['field_type'] == 'select' || $inputsArr['field_type'] == 'checkbox' || $inputsArr['field_type'] == 'radio') {
                        $data_field = array();

                        foreach ($inputsArr['field_choice'] as $keyChoice => $provider_choice) {
                            serialize($data_field['field_data']['field_choice_' . $keyChoice] = serialize($provider_choice));
                        }
                    }
                }
                foreach ($data_field as $key => $value) {

                    foreach ($value as $key1 => $values) {


                        $user_data = array('field_id' => $field_id, 'key' => $key1, 'value' => $values);
                        $this->Page_manage_model->add_manage_field_meta($table, $user_data);
                    }
                }
                $data['msg'] = $this->session->set_flashdata('provider_message', 'provider updated successfully');
            }
        }

        $this->load->view('admin/page/add_provider');
        $this->load->view('admin/include/footer');
    }

    public function provider_page() {

        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/page/provider_page');
        $this->load->view('admin/include/footer');
    }

    public function settings() {
        $data['setting_records'] = $this->Page_manage_model->get_settings_id();
        $id = $data['setting_records']->id;
        if ($this->input->post()) {
            $headline = $this->input->post('headline');
            $email = $this->input->post('email');
            $phone_no = $this->input->post('phone_no');
            $address = $this->input->post('address');

            $imagePrefix = time();
            $imagename = $imagePrefix;
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['file_name'] = $imagename; // set the name here

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('')) {
                $upload_image = array('upload_data' => $this->upload->data());

                //print_r($upload_image);
                $imagename = $upload_image['upload_data']['file_name'];
            } else {
                $imagename = $_POST['upload_image'];
            }

            $data = array('logo_image' => $imagename, 'headline' => $headline, 'email_id' => $email, 'phone_no' => $phone_no, 'address' => $address);

            if (empty($id)) {
                $this->Page_manage_model->add_SettingsPage($data);
            } else {
                $this->Page_manage_model->update_records($id, $data);
            }
            redirect('admin/page/settings');
        }
        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/page/settings', $data);
        $this->load->view('admin/include/footer');
    }

}
