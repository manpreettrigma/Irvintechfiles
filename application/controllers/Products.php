<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('Product');
    }
    
    function index(){
        $data = array();
        //get products data from database
        $data['products'] = $this->product->getRows();
        //pass the products data to view
        $this->load->view('products/index', $data);
    }
    
    function buy(){
        //Set variables for paypal form
        $returnURL = base_url().'paypal/success'; //payment success url
        $cancelURL = base_url().'paypal/cancel'; //payment cancel url
        $notifyURL = base_url().'paypal/ipn'; //ipn url
        //get particular product data
        $product = $this->product->getRows($id);
        $userID = 1; //current user id
      
        
       // $this->paypal_lib->add_field('return', $returnURL);
       // $this->paypal_lib->add_field('cancel_return', $cancelURL);
       // $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name',"test");
        $this->paypal_lib->add_field('custom', "1");
        $this->paypal_lib->add_field('item_number', "1");
        $this->paypal_lib->add_field('amount', "20");        
    
        $this->paypal_lib->paypal_auto_form();
    }
}