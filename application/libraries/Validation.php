<?php 
	/**
	* 
	*/
	class Validation {

        protected $CI;

        // We'll use a constructor, as you can't directly call a function
        // from a property definition.
        public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
                // Access the CodeIgniter Validation library
                $this->CI->load->library('form_validation');

        }

        public function Email()
        {
            $this->CI->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
			return $this->CI->form_validation->run();
        }

        public function password()
        {
			$this->CI->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|required|xss_clean');
        	return $this->CI->form_validation->run();
        }

        public function Username()
        {
			$this->CI->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]');
			return $this->CI->form_validation->run();
        }
		
		public function Mobile()
		{
			$this->CI->form_validation->set_rules('mobileno', 'Mobile', 'required|exact_length[10]');
			return $this->CI->form_validation->run();
		}
		public function confirm_password()
		{
			$this->CI->form_validation->set_rules('confirm_password', 'Confirm password', 'trim|required|matches[password]');
			return $this->CI->form_validation->run();			
		}        
        public function register_validations()
        {
			$this->CI->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
			$this->CI->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|required|xss_clean');
			$this->CI->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]');
			$this->CI->form_validation->set_rules('mobileno', 'Mobile', 'required|exact_length[10]');
			$this->CI->form_validation->set_rules('confirm_password', 'Confirm password', 'trim|required|matches[password]');
        	return $this->CI->form_validation->run();
        }

}
?>