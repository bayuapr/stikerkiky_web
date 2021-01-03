<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class data_product extends CI_Controller {

    public function index()
    {
        $data['product'] = $this->stiker_model->get_data('product')->result();

        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/product', $data);
        $this->load->view('template_admin/footer');
    }

}

/* End of file data_product.php */
