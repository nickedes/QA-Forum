<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class valid extends CI_Controller{

    function __construct()
    {  
        parent::__construct();
        $this->load->model("users");
        $this->load->library('Sessionlibrary');
        $this->load->library('form_validation');
    }

    function index()
    {
        if(($this->input->post('email') != NULL) && ($this->input->post('password') != NULL))
        {
            $data = array(
            "email" => $_POST['email'],
            'password' => md5($_POST['password'])
            );
            
            // validations of email and password
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|required|xss_clean');

            // when validations are true
            if($this->form_validation->run()==TRUE)
            {
                // when login is successful.
                if($this->users->check($data)== TRUE)
                {
                    // get user data to create session
                    $sess_data = $this->users->getuser($data['email']);
                    // set session
                    $this->sessionlibrary->set_session($sess_data[0]);
                    
                    $response = array(
                        'email' => $this->input->post('email'),
                        'password' => $this->input->post('password'),
                        'success' => 1
                    );

                }
                else
                { 
                    $response = array(
                        'message' => 'Email id and password donot exist.',
                        'success' => 0
                    );
                }
            }
            else
            {
                $response = array(
                    'email' => form_error('email'),
                    'password' => form_error('password'),
                    'success' => 0
                );

            }
        }
        else
        {
            $response = array(
                'success' => 0,
                'message' => 'Email and password is not set.'
                );
        }
        echo json_encode($response);
    }
}