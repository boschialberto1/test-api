<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentation extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('api_docs');
	}
        
        public function add_example()
        {
                if($this->input->post('username'))
                {
                        $apiComm = new Curl_Example();
                        $x = (object)array(
                                'method'=>'create',
                                'req'=>(object)array("username"=>$this->input->post('username'))
                        );
                        $apiRes = $apiComm->apiCall(json_encode($x),false);
                        $result = json_decode($apiRes);
                        debug($apiRes);
                }
                
                $this->load->view('example/add_user');
        }
        
        public function get_example()
        {
                if($this->input->post('username'))
                {
                        $apiComm = new Curl_Example();
                        $x = (object)array(
                                'method'=>'get',
                                'req'=>(object)array("username"=>$this->input->post('username'))
                        );
                        $apiRes = $apiComm->apiCall(json_encode($x),false);
                        $result = json_decode($apiRes);
                        debug($apiRes);
                }
                
                $this->load->view('example/add_user');
        }
        
        public function update_example()
        {
                if($this->input->post('username') && $this->input->post('new_username'))
                {
                        $apiComm = new Curl_Example();
                        $x = (object)array(
                                'method'=>'update',
                                'req'=>(object)array("new_username"=>$this->input->post('new_username'),"username"=>$this->input->post('username'))
                        );
                        $apiRes = $apiComm->apiCall(json_encode($x),false);
                        $result = json_decode($apiRes);
                        debug($apiRes);
                }
                
                $this->load->view('example/edit_user');
        }
        
        public function delete_example()
        {
                if($this->input->post('username'))
                {
                        $apiComm = new Curl_Example();
                        $x = (object)array(
                                'method'=>'delete',
                                'req'=>(object)array("username"=>$this->input->post('username'))
                        );
                        $apiRes = $apiComm->apiCall(json_encode($x),false);
                        $result = json_decode($apiRes);
                        debug($apiRes);
                }
                
                $this->load->view('example/add_user');
        }
}
