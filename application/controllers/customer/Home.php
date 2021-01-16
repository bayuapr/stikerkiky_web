<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('templates_customer/header');
        $this->load->view('customer/dashboard');
        $this->load->view('templates_customer/footer');
    }

}

/* End of file Home.php */
