<?php

defined('BASEPATH') or exit('No direct script access allowed');

class data_product extends CI_Controller
{

    public function index()
    {
        $data['product'] = $this->stiker_model->get_data('product')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/product', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add_product()
    {

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_add_product');
        $this->load->view('templates_admin/footer');
        // $this->load->view('templates_admin/wrapper');
    }

    public function add_product_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->add_product();
        } else {
            $name_product  = htmlspecialchars($this->input->post('name_product'));
            $description   = htmlspecialchars($this->input->post('description'));
            $status        = htmlspecialchars($this->input->post('status'));
            $price         = htmlspecialchars($this->input->post('price'));

            $photo               = $_FILES['photo']['name'];
            if ($photo = '') {
            } else {
                $config['upload_path']     = './assets/upload/';
                $config['allowed_types']   = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) {
                    echo "Photo of Product Failed to Upload";
                } else {
                    $photo = $this->upload->data('file_name');
                }
            }

            $data = array(
                'name_product'       => $name_product,
                'description'        => $description,
                'price'              => $price,
                'status'             => $status,
                'photo'              => $photo,
            );

            $this->stiker_model->insert_data($data, 'product');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Product Data Added Successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/data_product');
        }
    }

    public function update_product($id)
    {
        $where = array('id_product' => $id);
        $data['product'] = $this->db->query("SELECT * FROM product WHERE id_product='$id'")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_product', $data);
        $this->load->view('templates_admin/footer');
        // $this->load->view('templates_admin/wrapper');
    }

    public function update_product_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update_product;
        } else {
            $id            = $this->input->post('id_product');
            $name_product  = htmlspecialchars($this->input->post('name_product'));
            $description   = htmlspecialchars($this->input->post('description'));
            $status        = htmlspecialchars($this->input->post('status'));
            $price         = htmlspecialchars($this->input->post('price'));
            $photo        = $_FILES['photo']['name'];
            if ($photo) {
                $config['upload_path']     = './assets/upload/';
                $config['allowed_types']   = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('photo')) {
                    $photo = $this->upload->data('file_name');
                    $this->db->set('photo', $photo);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'name_product'       => $name_product,
                'description'        => $description,
                'price'              => $price,
                'status'             => $status,
                'photo'              => $photo,
            );
            // var_dump($data);
            // die();
            $where = array(
                'id_product' => $id
            );

            $this->stiker_model->update_data('product', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Product Data Successfully Updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/data_product');
        }
    }

    // public function updateUpload()
    // {
    //     $gambar               = $_FILES['gambar']['name'];
    //     if ($gambar = '') {
    //     } else {
    //         $config['upload_path']     = './assets/upload/';
    //         $config['allowed_types']   = 'jpg|jpeg|png|tiff';

    //         $this->load->library('upload', $config);
    //         if (!$this->upload->do_upload('gambar')) {
    //             echo "Gambar Mobil Gagal DiUpload";
    //         } else {
    //             $gambar = $this->upload->data('file_name');
    //         }
    //     }
    // }

    public function _rules()
    {
        $this->form_validation->set_rules('name_product', 'Name Product', 'required', array('required' => '%s Must be filled !!!'));
        $this->form_validation->set_rules('description', 'Description', 'required', array('required' => '%s Must be filled !!!'));
        $this->form_validation->set_rules('price', 'Price', 'required', array('required' => '%s Must be filled !!!'));
        $this->form_validation->set_rules('status', 'Status', 'required', array('required' => '%s Must be filled !!!'));
    }

    public function detail_product($id)
    {
        $data['detail'] = $this->stiker_model->ambil_id_product($id);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_product', $data);
        $this->load->view('templates_admin/footer');
        // $this->load->view('templates_admin/wrapper');
    }

    public function delete_product($id)
    {
        // $where = array('id_product' => $id);
        // if ($id->gambar != null) {
        //     $target_file = './assets/upload/' .$id->gambar;
        //     unlink($target_file);
        // }
        $where = array('id_product' => $id);
        $this->stiker_model->delete_data($where, 'product');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Product Data Deleted Successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/data_product');
        // $file_name = './assets/upload/'.$data->gambar;
        // if (is_readable($file_name) && unlink($file_name)) {
        //     $delete =$this->sewa_model->ambil_id_mobil($id);
        //     redirect('admin/data_mobil');
        // }else {
        //     echo "Gagal";
        // }
    }

    public function cari()
    {
        $keyword       = $this->input->post('keyword');
        $data['product'] = $this->stiker_model->get_keyword_product($keyword);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_mobil', $data);
        $this->load->view('templates_admin/footer');
        $this->load->view('templates_admin/wrapper');
    }
}



/* End of file data_product.php */
