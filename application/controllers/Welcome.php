<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    function __construct(){
        parent::__construct();
          $this->load->helper(array('form', 'url'));
    }
	/*
	 * Method untuk meload view form
	 */
    public function index()
    {
        $this->load->view('welcome_message', array('error' => ' ' ));
    }

    /*
     * Method untuk menghandle action ketika form disubmit
     */
    public function save()
	{
		//mengembalikan (return) nilai atau variable status & message ke client side
		echo json_encode(array('status'=> TRUE, 'message' => 'Form sudah diisi dengan lengkap dan benar'));

        $config['upload_path']          = './gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('berkas')){
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('welcome_message', $error);
        }else{
            $data = "berhasil";
            $this->load->view('welcome_message', $data);
        }
	}

}

/* application/controllers/Welcome.php */
